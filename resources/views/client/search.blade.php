@extends('layouts.client.client')
@section('title')
Kết quả tìm kiếm cho {{request()->s}}
@endsection
@section('css')
<style>
	#form-sort
	{
		display: none;
	}
</style>
@endsection
@section('content')
<div class="page_category">
	<div class="container">
		<h1 class="page_title"><span>Kết quả tìm kiếm cho : {{request()->s}}</span></h1>
		@if(isset($products))
		<div class="sort_product">
			<div class="choose">
				<select id="sort_product" class="form-control">
					<option value="popular" {{(request()->sort_by == 'popular')?'selected':FALSE}}>Phổ biến</option>
					<option value="price-asc" {{((request()->sort_by.'-'.request()->sort == 'price-asc'))?'selected':FALSE}}>Giá từ thấp đến cao</option>
					<option value="price-desc" {{((request()->sort_by.'-'.request()->sort == 'price-desc'))?'selected':FALSE}}>Giá từ cao đến thấp</option>
					<option value="name-asc" {{((request()->sort_by.'-'.request()->sort == 'name-asc'))?'selected':FALSE}}>A-Z</option>
					<option value="name-desc" {{((request()->sort_by.'-'.request()->sort == 'name-desc'))?'selected':FALSE}}>Z-A</option>
				</select>
				<form action="{{url()->current()}}" method="get" id="form-sort">
					<input type="text" name="sort_by" value="">
					<input type="text" name="sort" value="">
				</form>
			</div>
		</div>
		<div class="row">
			@foreach($products as $product)
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="box-item">
					<div class="box-image">
						<a href="#">
							<img src="{{asset($product->image)}}" alt="">
						</a>
					</div>
					<div class="box-text">
						<h3 class="title text-center">
							<a href="{{route('client.product',['slug'=>$product->slug])}}">{{$product->name}}</a>
						</h3>
						<p class="price text-center" data-value="10">Giá : <span>
							<!-- <i style="text-decoration: line-through;color: #000;">25.000 VND</i>  -->
							{{number_format($product->price)}} VND
						</span>
					</p>
					<p class="text-center">
						@if($product->quantity <= 0)
						<span class="btn btn-md btn-warning">Hết hàng</span>
						@else
						<button class="btn btn-sm btn-danger btn-add" data-value="{{$product->id}}">Thêm vào giỏ</button>
						@endif
					</p>
				</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="text-center">
			{{$products->links()}}
		</div>
		@else
		<div class="alert alert-warning">
			Sản phẩm đang được cập nhật ...
		</div>
		@endif
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#sort_product').on('change',function(){
			var val = jQuery(this).val();
			val = val.split('-');
			if(val.length == 1)
			{
				jQuery('#form-sort input[name=sort]').remove();
			}
			else
			{
				jQuery('#form-sort input[name=sort]').val(val[1]);
			}
			jQuery('#form-sort input[name=sort_by]').val(val[0]);
			
			jQuery('#form-sort').submit();
		});

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


	});
</script>
@endsection