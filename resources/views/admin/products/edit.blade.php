@extends('layouts.server.server')
@section('title')
Cập nhật sản phẩm
@endsection
@section('css')
<style>
	img#thumbnail_create
	{
		display: none;
		width: 100px;
	}

	img#thumbnail_create[src]
	{
		display: block !important;
	}

</style>
@endsection
@section('content')
<div class="content_container">
	<h1>{{isset($head_title)?$head_title:'Admin Dashboard'}}</h1>
	<hr>
	<div class="dashboard_home">
		@if(session('errors'))
		<div class="errors">
			@foreach(session('errors')->all() as $msg)
			<p>{{$msg}}</p>
			@endforeach
		</div>
		@endif
		<form action="{{route('admin.products.update')}}" method="post" id="create_products">
			@csrf
			<div class="form-group">
				<label>Tên sản phẩm</label>
				<input type="text" name="name" class="form-control" placeholder="Tên sản phẩm" value="{{old('name')?old('name'):$product->name}}">
			</div>
			<div class="form-group">
				<label>Đường dẫn sản phẩm</label>
				<input type="text" name="slug" class="form-control" placeholder="Đường dẫn sản phẩm" value="{{old('slug')?old('slug'):$product->slug}}">
			</div>
			<div class="form-group">
				<label>Mô tả</label>
				<textarea name="description" id="description" rows="5" style="resize: none;" class="form-control" placeholder="Mô tả cho danh mục">{{old('description')?old('description'):$product->description}}</textarea>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group">
					<label>Nhà cung cấp</label>
					<select name="vendor_id" class="form-control">
						<option value="0">None</option>
						@if(!empty($vendors))
						@foreach($vendors as $vendor)
						<option value="{{$vendor->id}}" {{old('vendor_id')?((old('vendor_id') == $vendor->id)?'selected':FALSE):(($product->vendor_id == $vendor->id)?'selected':FALSE)}}>{{$vendor->name}}</option>
						@endforeach
						@endif
					</select>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group">
					<label>Giá</label>
					<input type="text" name="price" class="form-control" placeholder="Giá sản phẩm" value="{{old('price')?old('price'):$product->price}}">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group">
					<label>Số lượng</label>
					<input type="text" name="quantity" class="form-control" placeholder="Số lượng" value="{{old('quantity')?old('quantity'):$product->quantity}}">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
					<label>Danh mục cha</label>
					<select id="cat_parent" name="cat_parent" class="form-control">
						<option value="0">None</option>
						@if(!empty($cates))
						@foreach($cates as $cat)
						<option value="{{$cat->id}}" {{old('cat_parent')?((old('cat_parent') == $cat->id)?'selected':FALSE):(($parent_id == $cat->id)?'selected':FALSE)}}>{{$cat->name}}</option>
						@endforeach
						@endif
					</select>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
					<label>Danh mục</label>
					<select name="cate_id" class="form-control">
						@if(!empty($childs))
						@foreach($childs as $cat)
						<option value="{{$cat->id}}" {{old('cate_id')?((old('cate_id') == $cat->id)?'selected':FALSE):(($product->cate_id == $cat->id)?'selected':FALSE)}}>{{$cat->name}}</option>
						@endforeach
						@endif
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
					<label>Sale Date Start</label>
					@if(!empty($product->sale_date_start))
					@php
						$sale_date_start = date_create_from_format('Y-m-d H:i:s',$product->sale_date_start)->format('d/m/Y');
					@endphp
					@endif
					<input type="text" name="sale_date_start" id="sale_date_start" class="form-control" value="{{old('sale_date_start')?old('sale_date_start'):(isset($sale_date_start)?$sale_date_start:FALSE)}}">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
					<label>Sale Date End</label>
					@if(!empty($product->sale_date_end))
					@php
						$sale_date_end = date_create_from_format('Y-m-d H:i:s',$product->sale_date_end)->format('d/m/Y');
					@endphp
					@endif
					<input type="text" name="sale_date_end" id="sale_date_end" class="form-control" value="{{old('sale_date_end')?old('sale_date_end'):(isset($sale_date_end)?$sale_date_end:FALSE)}}">
				</div>
			</div>
			<div class="form-group">
				@if(old('image'))
				<img src="{{old('image')}}" alt="anh-san-pham" id="thumbnail_create">
				<span class="btn btn-md btn-danger btn_thumbnail">Xóa ảnh sản phẩm</span>
				<input type="hidden" name="image" value="{{old('image')}}">
				@else
				<img src="{{asset($product->image)}}" alt="anh-san-pham" id="thumbnail_create">
				<span class="btn btn-md btn-danger btn_thumbnail">Xóa ảnh sản phẩm</span>
				<input type="hidden" name="image" value="{{$product->image}}">
				@endif
				
			</div>
			<div class="text-center">
				<input type="hidden" name="id" value="{{$product->id}}">
				<button class="btn btn-md btn-primary" type="submit">Cập nhật sản phẩm</button>
			</div>
		</form>		
	</div>
</div>

@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery( "#sale_date_start" ).datepicker({
			minDate: 0,
			dateFormat : 'dd/mm/yy',
			onClose: function( selectedDate ) {
				// jQuery( "#sale_date_end" ).datepicker( "option", "maxDate", selectedDate );
				var date = jQuery(this).datepicker('getDate');
				jQuery( "#sale_date_end" ).datepicker( "option", "minDate", date );
			}
		});

		jQuery( "#sale_date_end" ).datepicker({
			dateFormat : 'dd/mm/yy',
			onClose: function( selectedDate ) {
				jQuery( "#sale_date_start" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
		jQuery('body').on('click','.btn_thumbnail',function(){
			if(jQuery(this).hasClass('btn-success'))
			{
				CKFinder.popup( {
					chooseFiles: true,
					onInit: function( finder ) {
						finder.on( 'files:choose', function( evt ) {
							var file = evt.data.files.first();
							jQuery('#thumbnail_create').attr('src',file.getUrl());
							jQuery('.btn_thumbnail').next().val(file.getUrl());
							jQuery('.btn_thumbnail').removeClass('btn-success');
							jQuery('.btn_thumbnail').addClass('btn-danger');
							jQuery('.btn_thumbnail').text('Xóa ảnh sản phẩm');
						} );
					}
				} );
			}
			else
			{
				if(confirm("Bạn muốn xóa ảnh bài viết ?"))
				{
					jQuery('.btn_thumbnail').text('Thêm ảnh sản phẩm');
					jQuery('.btn_thumbnail').removeClass('btn-danger');
					jQuery('.btn_thumbnail').addClass('btn-success');
					jQuery('#thumbnail_create').removeAttr('src');
					jQuery('.btn_thumbnail').next().val('');
				}
				
			}
			
		});

		jQuery('#cat_parent').on('change',function(){
			var id = jQuery(this).val();
			if(id == 0)
			{
				jQuery('select[name=cate_id]').html('');
				return false;
			}
			jQuery.ajax({
				headers: {
					'X-CSRF-TOKEN': '{{ csrf_token() }}',
				},
				url: '{!! route('admin.products.get_child_cate') !!}',
				type: 'post',
				dataType: 'html',
				data: {
					id: id
				},
				beforeSend: function(){
				},
				success: function(res){
					jQuery('select[name=cate_id]').html(res);
				},
				error: function(){
				}
			});
		});

		jQuery('input[name=quantity],input[name=price]').on('keypress',function(e){
			if(e.keyCode < 48 || e.keyCode > 57) return false;
		});

		CKEDITOR.replace('description');

		
	});
</script>
@endsection