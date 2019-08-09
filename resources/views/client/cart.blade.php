@extends('layouts.client.client')
@section('title')
Giỏ hàng
@endsection
@section('content')

<div class="page_cart">
	<div class="container">
		<h1>{{$head_title}}</h1>
		@if(empty($cart_items))
		<div class="alert alert-warning">
			Bạn chưa có sản phẩm nào trong giỏ hàng. <a href="{{route('home')}}">Quay lại</a> mua hàng
		</div>
		@else
		<table class="table">
			<thead>
				<tr>
					<th>STT</th>
					<th>Ảnh sản phẩm</th>
					<th>Tên sản phẩm</th>
					<th>Giá</th>
					<th>Số lượng</th>
					<th>Thành tiền</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@php
				$total = 0;
				@endphp
				@foreach($cart_items as $key => $item)
				
				<tr data-product="{{$item['product']->id}}">

					<td>{{$key+1}}</td>
					<td><img src="{{asset($item['product']->image)}}" alt="product-image" style="width: 50px;height: 50px;"></td>
					<td><a href="#">{{$item['product']->name}}</a></td>
					<td class="price" data-price="{{$item['product']->price}}">{{number_format($item['product']->price)}}</td>
					<td>
						<div class="quantity">
							<input type="text" name="quantity" class="form-control" value="{{$item['quantity']}}" min="1">
							<button class="minus"> - </button>
							<button class="plus"> + </button>
						</div>
					</td>

					<td class="s_total">{{number_format(intval($item['product']->price)*intval($item['quantity']))}}</td>

					<td class="delete_item"><i class="fa fa-trash" title="Xóa sản phẩm"></i></td>

				</tr>
					
				@php
				$total += intval($item['product']->price)*intval($item['quantity']);
				@endphp
				@endforeach

			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" class="total">Tổng cộng : <span>{{number_format($total)}}</span></td>
					<td colspan="3" class="action_cart">
						<img src="{{asset('cowell/uploads/images/loading.gif')}}" alt="loading" id="loading">
						@if(Auth::check())
						<a href="{{route('cart.checkout')}}" class="btn btn-md btn-primary">Thanh toán</a>
						@else
						<a href="{{route('login')}}" class="btn btn-md btn-primary" title="Vui lòng đăng nhập trước khi tiến hành đặt hàng đặt hàng">Thanh toán</a>
						@endif
						<button class="btn btn-md btn-danger"><i class="fa fa-trash"></i> Xóa giỏ hàng</button>
					</td>
				</tr>
			</tfoot>
		</table>

		@endif
	</div>
</div>


@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('table input').on('change',function(){
			
			var num = jQuery(this).val();
			if(parseInt(num) <= 0)
			{
				num = 1;
				jQuery(this).val('1');
			}
			var total = calculator();
			jQuery('table tfoot .total span').text(numberWithCommas(total));
			
			var id = jQuery(this).parents('tr').first().data('product');
			jQuery.ajax({
				headers: {
					'X-CSRF-TOKEN': '{{ csrf_token() }}',
				},
				url: '{{route('cart.update_item')}}',
				type: 'post',
				dataType: 'json',
				data: {
					id: id,
					num: num
				},
				beforeSend: function() {
					jQuery('table tfoot img#loading').css('opacity',1);
				},
				success: function(res)
				{
					if(res.status == true) console.log(res);
					else console.log('fail');
					jQuery('table tfoot img#loading').css('opacity',0);
				}
			})
		});

		jQuery('table .quantity button').on('click',function(){
			var num = jQuery(this).parent().find('input').val();
			if(jQuery(this).hasClass('minus'))
			{
				num = parseInt(num) - 1;
			}
			else
			{
				num = parseInt(num) + 1;
			}

			var ci = num;

			if(parseInt(num) <= 0) ci = 1; 

			var price = jQuery(this).parents('tr').first().find('.price').data('price');

			var s_total = parseInt(price)*parseInt(ci);

			jQuery(this).parents('tr').first().find('.s_total').text(numberWithCommas(s_total));

			jQuery(this).parent().find('input').val(num);
			jQuery(this).parent().find('input').trigger('change');
		});

		jQuery('table tbody .delete_item i').on('click',function(){
			if(confirm("Bạn chắc chắn xóa sản phẩm này ?"))
			{
				var curr = jQuery(this);
				var id = jQuery(this).parents('tr').first().data('product');
				jQuery.ajax({
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}',
					},
					url: '{{route('cart.delete_item')}}',
					type: 'post',
					dataType: 'json',
					data: {
						id: id
					},
					beforeSend: function() {
						jQuery('table tfoot img#loading').css('opacity',1);
					},
					success: function(res)
					{
						if(res.status == true)
						{
							console.log(res);
							curr.parents('tr').first().remove();
							var cart = jQuery('.shopping-cart span');

							var num = cart.text();

							num = parseInt(num)-1;
							if(num == 0) window.location.href = '';
							if(num > 0) cart.text(num);
							else cart.remove();

							load_id();
						}
						else
						{
							console.log('fail');
						}
						jQuery('table tfoot img#loading').css('opacity',0);
					}
				})

				
			}
			return false;
		});


		jQuery('table tfoot .action_cart button').on('click', function(){
			if(confirm("Bạn chắc chắn muốn xóa giỏ hàng ?"))
			{
				jQuery.ajax({
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}',
					},
					url: '{{route('cart.delete_cart')}}',
					type: 'post',
					dataType: 'json',
					beforeSend: function() {
						jQuery('table tfoot img#loading').css('opacity',1);
					},
					success: function(res)
					{
						if(res.status == true) window.location.href = '{{route('cart.index')}}';
						else console.log('fail');
					}
				});
			}

			return false;
		});


	});

	function calculator()
	{
		var total = 0;
		jQuery('table tbody tr').each(function(){
			var price = jQuery(this).find('.price').data('price');
			var num = jQuery(this).find('input').val();
			total += parseInt(price)*parseInt(num);
		});

		return total;
	}

	function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function load_id()
    {
    	var i = 1;
    	jQuery('table tbody tr').each(function(){
    		jQuery(this).find('td').first().text(i);
    		i ++;
    	});
    	var total = calculator();

    	jQuery('table td.total span').text(numberWithCommas(total));
    }
</script>
@endsection