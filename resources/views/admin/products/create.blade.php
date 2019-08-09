@extends('layouts.server.server')
@section('title')
Thêm sản phẩm
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
		<form action="{{route('admin.products.create')}}" method="post" id="create_products">
			@csrf
			<div class="form-group">
				<label>Tên sản phẩm</label>
				<input type="text" name="name" class="form-control" placeholder="Tên sản phẩm" value="{{old('name')}}">
			</div>
			<div class="form-group">
				<label>Đường dẫn sản phẩm</label>
				<input type="text" name="slug" class="form-control" placeholder="Đường dẫn sản phẩm" value="{{old('slug')}}">
			</div>
			<div class="form-group">
				<label>Mô tả</label>
				<textarea name="description" id="description" rows="5" style="resize: none;" class="form-control" placeholder="Mô tả cho danh mục">{{old('description')}}</textarea>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group">
					<label>Nhà cung cấp</label>
					<select name="vendor_id" class="form-control">
						<option value="0">None</option>
						@if(!empty($vendors))
						@foreach($vendors as $vendor)
						<option value="{{$vendor->id}}">{{$vendor->name}}</option>
						@endforeach
						@endif
					</select>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group">
					<label>Giá</label>
					<input type="text" name="price" class="form-control" placeholder="Giá sản phẩm" value="{{old('price')}}">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group">
					<label>Số lượng</label>
					<input type="text" name="quantity" class="form-control" placeholder="Số lượng" value="{{old('quantity')}}">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
					<label>Danh mục cha</label>
					<select id="cat_parent" class="form-control">
						<option value="0">None</option>
						@if(!empty($cates))
						@foreach($cates as $cat)
						<option value="{{$cat->id}}">{{$cat->name}}</option>
						@endforeach
						@endif
					</select>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
					<label>Danh mục</label>
					<select name="cate_id" class="form-control">
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
					<label>Sale Date Start</label>
					<input type="text" name="sale_date_start" id="sale_date_start" class="form-control" value="{{old('sale_date_start')}}">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
					<label>Sale Date End</label>
					<input type="text" name="sale_date_end" id="sale_date_end" class="form-control" value="{{old('sale_date_end')}}">
				</div>
			</div>
			<div class="form-group">
				@if(old('image'))
				<img src="{{old('image')}}" alt="anh-san-pham" id="thumbnail_create">
				<span class="btn btn-md btn-danger btn_thumbnail">Xóa ảnh sản phẩm</span>
				@else
				<img alt="anh-san-pham" id="thumbnail_create">
				<span class="btn btn-md btn-success btn_thumbnail">Thêm ảnh sản phẩm</span>
				@endif
				<input type="hidden" name="image" value="{{old('image')}}">
			</div>
			<div class="text-center"><button class="btn btn-md btn-primary" type="submit">Thêm sản phẩm</button></div>
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
	jQuery(document).ready(function(){
		jQuery('input[name=name]').on('change',function(){
			var slug = jQuery('input[name=slug]').val();
			if(slug.length == 0)
			{
				var name = jQuery(this).val();
				slug =  ChangeToSlug(name);
				jQuery('input[name=slug]').val(slug);
			}
		});
	});

	function ChangeToSlug(str)
    {
        var slug;
        //Đổi chữ hoa thành chữ thường
        slug = str.toLowerCase();
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        slug = slug.replace(/\&/gi, 'va');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');

        return slug;
    }
</script>
@endsection