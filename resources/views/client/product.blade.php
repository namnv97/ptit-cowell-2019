@extends('layouts.client.client')
@section('title')
{{$head_title}}
@endsection
@section('content')

<div class="page_product">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<img src="{{asset($product->image)}}" alt="{{$product->name}}" class="thumnail_product">
			</div>
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 intro_product">
				<h1 class="title">{{$product->name}}</h1>
				<p class="price">Giá : <span>{{number_format($product->price)}} VND</span></p>
				<div class="product_share">
					<a href="#" class="fa fa-facebook-square"></a>
					<a href="#" class="fa fa-google"></a>
					<a href="#" class="fa fa-linkedin"></a>
					<a href="#" class="fa fa-twitter"></a>
				</div>
				<div class="description">
					{!! $product->description !!}
				</div>
				<div class="buy_product">
					@if($product->quantity <= 0)
					<span class="btn btn-md btn-warning">Hết hàng</span>
					@else
					<button class="btn btn-md btn-danger btn-add" data-value="{{$product->id}}">Thêm vào giỏ</button>
					<button class="btn btn-primary btn-md buynow {{(Auth::check())?'login':FALSE}}">Mua ngay</button>
					@endif
				</div>
			</div>
			@if(Auth::check())
			<div id="productModal" class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title text-center"><strong>Mua ngay</strong> {{$product->name}}</h4>
						</div>
						<div class="modal-body">
							<form action="{{route('orders.add')}}" method="post">
								@csrf
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 left">
										<img src="{{asset($product->image)}}" alt="{{$product->name}}">
										<p class="price" data-price="{{$product->price}}">{{number_format($product->price)}} VND</p>
										<div class="quantity">
											<input type="text" name="quantity[]" value="1" class="form-control">
											<span class="minus"> - </span>
											<span class="plus"> + </span>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 right">
										<h3 class="text-center">Thông tin nhận hàng</h3>
										<div class="form-group">
											<label>Họ tên *</label>
											<input type="text" name="name" class="form-control" placeholder="Họ tên" value="{{Auth::user()->name}}">
										</div>
										<div class="form-group">
											<label>Email *</label>
											<input type="text" name="email" class="form-control" value="{{Auth::user()->email}}" placeholder="Email">
										</div>
										<div class="form-group">
											<label>Số điện thoại *</label>
											<input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
										</div>
										<div class="form-group">
											<label>Địa chỉ *</label>
											<textarea name="address" rows="5" style="resize: none;" placeholder="Địa chỉ nhận hàng" class="form-control"></textarea>
										</div>
										<div class="form-group">
											<label>Ghi chú</label>
											<textarea name="notes" rows="5" class="form-control" placeholder="Ghi chú"></textarea>
										</div>
										<div class="divide"></div>
										<p class="total">Tổng cộng : <span>{{number_format($product->price)}} VND</span></p>
										<div class="divide"></div>
										<input type="hidden" name="total" value="{{$product->price}}">
										<input type="hidden" name="id[]" value="{{$product->id}}">
										<div class="text-center">
											<button type="submit" class="btn btn-md btn-primary">Đặt hàng</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
			@endif
		</div>
		<div class="relate_product">
			<h3 class="title"><span>Sản phẩm liên quan</span></h3>
			<div class="row">
				@for($i = 0; $i < 4; $i ++)
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					<div class="item">
						<div class="image">
							<a href="#">
								<img src="{{asset('cowell/uploads/images/product.png')}}" alt="">
							</a>
						</div>
						<div class="text">
							<p class="title_product"><a href="#">Sản phẩm</a></p>
							<p class="price">12.000.000 VND</p>
						</div>
					</div>
				</div>
				@endfor
			</div>
		</div>
	</div>
</div>

@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		var add = true;

		jQuery('body').on('click','.btn-add',function(){
			var id = jQuery(this).data('value');
			if(add == true)
			{
				jQuery.ajax({
					url: "{{route('cart.add')}}",
					type: 'get',
					dataType: 'html',
					data: {
						id: id
					},
					beforeSend: function(){
						add = false;
					},
					success: function(res){
						var ui = jQuery.parseJSON(res);
						if(ui.status == true)
						{
							Swal.fire({
								position: 'center',
								type: 'success',
								title: 'Sản phẩm đã thêm vào giỏ',
								showConfirmButton: false,
								timer: 1000
							})
							var span = jQuery('.shopping-cart').find('span').text();
							jQuery('.shopping-cart span').remove();
							jQuery('.shopping-cart').append('<span>'+ui.items+'</span>');
						}
						add = true;
					},
					error: function(){
					}
				});
			}
		});

		jQuery('#productModal .left .quantity span').on('click',function(){
			var num = jQuery(this).parent().find('input').val();
			if(jQuery(this).hasClass('minus'))
			{
				num = parseInt(num) - 1;
			}
			else
			{
				num = parseInt(num) + 1;
			}

			jQuery(this).parent().find('input').val(num);
			jQuery(this).parent().find('input').trigger('change');
		});

		jQuery('#productModal .left .quantity input').on('keypress',function(e){
			if(e.keyCode < 48 || e.keyCode > 57) return false;
		});

		jQuery('#productModal form').on('submit',function(){
			var name = jQuery(this).find('input[name=name]').val();
			if(name.length == 0)
			{
				alert('Họ tên không được để trống');
				jQuery(this).find('input[name=name]').focus();
				return false;
			}

			var phone = jQuery(this).find('input[name=phone]').val();
			if(phone.length == 0)
			{
				alert('Số điện thoại không được để trống');
				jQuery(this).find('input[name=phone]').focus();
				return false;
			}

			var address = jQuery(this).find('textarea[name=address]').val();
			if(address.length == 0)
			{
				alert('Họ tên không được để trống');
				jQuery(this).find('input[name=address]').focus();
				return false;
			}
		});


		jQuery('#productModal .left .quantity input').on('change',function(){
			calculator(jQuery(this));
		});

		jQuery('.buynow').on('click',function(){
			if(jQuery(this).hasClass('login'))
			{
				jQuery('#productModal').modal('show');
			}
			else
			{
				if(confirm("Vui lòng đăng nhập để mua hàng. Bạn có muốn đăng nhập không ?"))
				{
					window.open('{{route('login')}}');
				}
				return false;
			}
		});


	})

	function calculator(element)
	{
		var num = element.val();
		if(parseInt(num) <= 0) num = 1;
		element.val(num);
		var price = element.parents('.quantity').prev().data('price');

		var total = parseInt(num)*parseInt(price);
		jQuery('#productModal .total span').text(numberWithCommas(total)+' VND');
		jQuery('#productModal input[name=total]').val(total);
	}
	function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    } 
</script>
@endsection