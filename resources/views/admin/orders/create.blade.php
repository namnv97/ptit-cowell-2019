@extends('layouts.server.server')
@section('title')
Thêm mới đơn hàng
@endsection
@section('content')
<div class="content_container">
	<h1>{{isset($head_title)?$head_title:'Admin Dashboard'}}</h1>
	<hr>
	<div class="dashboard_home">
		@if(session('errors'))
		<div class="alert alert-warning">
			@foreach(session('errors')->all() as $msg)
			<p>{{$msg}}</p>
			@endforeach
		</div>
		@endif
		<form action="{{route('admin.orders.create')}}" method="post" id="admin_add_order">
			@csrf
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<h3>Thông tin khách hàng</h3>
					<div class="form-group">
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<label>Họ tên</label>
								<input type="text" name="name" class="form-control" placeholder="Họ tên" value="{{old('name')?old('name'):FALSE}}">
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<label>Số điện thoại</label>
								<input type="text" name="phone" class="form-control" placeholder="Số điện thoại" value="{{old('phone')?old('phone'):FALSE}}">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Địa chỉ</label>
						<textarea name="address" rows="5" style="resize: none;" class="form-control" placeholder="Địa chỉ nhận hàng">{{old('address')?old('address'):FALSE}}</textarea>
					</div>
					<div class="form-group">
						<label>Ghi chú</label>
						<textarea name="notes" placeholder="Ghi chú đơn hàng" rows="5" style="resize: none;" class="form-control">{{old('notes')?old('notes'):FALSE}}</textarea>
					</div>
					
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<h3>Đơn hàng</h3>
					<div class="table-responsive">
						<table class="table" id="table_product">
							<thead>
								<tr>
									<th>STT</th>
									<th>Ảnh</th>
									<th>Tên sản phẩm</th>
									<th>Giá</th>
									<th>Số lượng</th>
									<th>Thành tiền</th>
									<th></th>
								</tr>
							</thead>
							<tbody>

							</tbody>
							<tfoot>
								<tr>
									<td colspan="4" class="add_product">
										<span class="btn btn-md btn-success" data-toggle="modal" data-target="#add_product">Chọn sản phẩm</span>
									</td>
									<td colspan="3" class="total">Tổng <span>0 VND</span></td>
								</tr>
							</tfoot>
						</table>
					</div>
					<div id="add_product" class="modal fade" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Thêm sản phẩm</h4>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<label>Chọn sản phẩm</label>
										<div class="row">
											<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
												<input type="text" id="product_id" class="form-control" placeholder="Nhập tên sản phẩm">
												<ul id="list__product">
													<span>Nhập tên sản phẩm</span>
												</ul>
											</div>
											<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
												<input type="number" id="quani" class="form-control" value="1" min='1'>
											</div>
										</div>
									</div>
									<div class="text-center">
										<span class="btn btn-md btn-success add_to_table" data-dismiss="modal">Hoàn thành</span>
									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="text-center">
						<input type="hidden" name="total" value="">
						<button class="btn btn-md btn-primary" type="submit">Thêm đơn hàng</button>
					</div>
				</div>
			</div>
		</form>
	</div>

</div>
@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		var products = [];

		jQuery('body').on('click','#list__product li',function(){
			jQuery('#list__product li').removeClass('active');
			jQuery(this).addClass('active');
			var txt = jQuery(this).text();
			jQuery('#product_id').val(txt);
			jQuery('#list__product').hide();
		})

		jQuery('#product_id').on('click',function(){
			if(jQuery('#list__product').css('display') == 'none')
			{
				jQuery('#list__product').show();
			}
		});

		jQuery('#product_id').on('keyup',function(){
			var key = jQuery(this).val();
			jQuery.ajax({
				url: '{{route('admin.orders.products')}}',
				type: 'get',
				dataType: 'html',
				data: {
					key: key
				},
				beforeSend: function(){
					jQuery('#list__product li').remove();
					jQuery('#list__product span').text('');
					jQuery('#list__product span').addClass('loading');
				},
				success: function(res){
					if(res.length > 0)
					{
						jQuery('#list__product').html(res);
					}
					else
					{
						jQuery('#list__product span').removeClass('loading');
						jQuery('#list__product span').text('Không có sản phẩm nào');
					}
				},
				error: function(){

				}
			})
		});

		jQuery('#add_product span.add_to_table').on('click',function(){
			var check = 0;
			jQuery('#list__product li').each(function(){
				if(jQuery(this).hasClass('active')) check = 1;
			});

			if(check == 1)
			{
				var id = jQuery('#list__product li.active').data('value');
				var quantity = jQuery('#quani').val();
				jQuery.ajax({
					url: '{{route('admin.orders.product')}}',
					type: 'get',
					dataType: 'html',
					data:{
						id: id,
						quantity: quantity
					},
					beforeSend: function(){
						jQuery('#table_product').addClass('auto');
					},
					success: function(res){
						jQuery('#table_product').removeClass('auto');
						jQuery('#table_product tbody').append(res);
						jQuery('#list__product li').remove();
						jQuery('#product_id').val('');
						jQuery('#quani').val('1');
						loadtable();
					},
					error: function(){

					}

				})
			}
		});

		jQuery('body').on('click','#table_product tbody span.fa-trash',function(){
			if(confirm('Bạn chắc chắn xóa sản phẩm này ?'))
			{
				jQuery(this).parents('tr').first().remove();
				loadtable();
			}
			return false;
		});

		jQuery('#admin_add_order').on('submit',function(){
			var name = jQuery(this).find('input[name=name]').val();
			if(name.length == 0)
			{
				alert("Họ tên không được để trống");
				jQuery(this).find('input[name=name]').focus();
				return false;
			}

			var phone = jQuery(this).find('input[name=phone]').val();
			if(phone.length == 0)
			{
				alert("Số điện thoại không được để trống");
				jQuery(this).find('input[name=phone]').focus();
				return false;
			}

			var address = jQuery(this).find('textarea[name=address]').val();
			if(address.length == 0)
			{
				alert("Địa chỉ không được để trống");
				jQuery(this).find('textarea[name=address]').focus();
				return false;
			}

			var x = 0;

			jQuery(this).find('input.inputid').each(function(){
				x ++;
			});

			if(x == 0)
			{
				alert("Sản phẩm không được để trống. Vui lòng chọn sản phẩm");
				return false;
			}


		})

		jQuery('body').on('click','.inputqty span',function(){
			var num = jQuery(this).parent().find('input').val();

			if(jQuery(this).hasClass('minus')) num = parseInt(num) - 1;
			else num = parseInt(num) + 1;

			jQuery(this).parent().find('input').val(num);
			jQuery(this).parent().find('input').trigger('change');
		});

		jQuery('body').on('change','.inputqty input',function(){
			var num = jQuery(this).val();

			var price = jQuery(this).parents('tr').first().find('.sg_price').data('price');

			var total = parseInt(num)*parseInt(price);

			jQuery(this).parents('td').next().text(numberWithCommas(total));

			if(num <= 0) jQuery(this).val('1');
			loadtable();
		});



	});


	function loadtable()
	{
		var i = 1;
		var total = 0;
		jQuery('#table_product tbody tr').each(function(){
			jQuery(this).find('td').eq(0).text(i);
			i ++;
			var price = jQuery(this).find('.sg_price').data('price');
			var quantity = jQuery(this).find('.inputqty').find('input').val();


			total += parseInt(price)*parseInt(quantity);
		});

		jQuery('#table_product tfoot td.total span').text(numberWithCommas(total)+' VND');
		jQuery('input[name=total]').val(total);
	}

	function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>
@endsection