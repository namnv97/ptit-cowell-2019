@extends('layouts.server.server')
@section('title')
Thêm danh mục
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
		<form action="{{route('admin.categories.create')}}" method="post" id="create_categories">
			@csrf
			<div class="form-group">
				<label>Tên danh mục</label>
				<input type="text" name="name" class="form-control" placeholder="Tên danh mục" value="{{old('name')}}">
			</div>
			<div class="form-group">
				<label>Đường dẫn</label>
				<input type="text" name="slug" class="form-control" placeholder="Đường dẫn danh mục" value="{{old('slug')}}">
			</div>
			<div class="form-group">
				<label>Mô tả</label>
				<textarea name="description" id="description" rows="5" style="resize: none;" class="form-control" placeholder="Mô tả cho danh mục">{{old('description')}}</textarea>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<label>Danh mục cha</label>
						<select name="parent_id" class="form-control">
							<option value="0">None</option>
							@if(!empty($cate))
							@foreach($cate as $cat)
							<option value="{{$cat->id}}">{{$cat->name}}</option>
							@endforeach
							@endif
						</select>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
						<button class="btn btn-md btn-primary" type="submit">Thêm danh mục</button>
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
		jQuery('input[name=name]').on('change',function(){
			var slug = jQuery('input[name=slug]').val();
			if(slug.length == 0)
			{
				var name = jQuery(this).val();
				slug =  ChangeToSlug(name);
				jQuery('input[name=slug]').val(slug);
			}
		});

		CKEDITOR.replace('description');



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

<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse perferendis nesciunt, molestias accusantium fuga itaque quos aliquam labore amet nihil tenetur! Fuga eius itaque, nobis ratione eveniet officiis, corporis nisi. -->