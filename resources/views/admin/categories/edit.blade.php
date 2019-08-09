@extends('layouts.server.server')
@section('title')
Cập nhật danh mục
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
		<form action="{{route('admin.categories.update')}}" method="post" id="edit_category">
			@csrf
			<div class="form-group">
				<label>Tên danh mục</label>
				<input type="text" name="name" class="form-control" placeholder="Tên danh mục" value="{{old('name')?old('name'):$cate->name}}">
			</div>
			<div class="form-group">
				<label>Đường dẫn</label>
				<input type="text" name="slug" class="form-control" placeholder="Đường dẫn danh mục" value="{{old('slug')?old('slug'):$cate->slug}}">
			</div>
			<div class="form-group">
				<label>Mô tả</label>
				<textarea name="description" id="description" rows="5" style="resize: none;" class="form-control" placeholder="Mô tả cho danh mục">{{old('description')?old('description'):$cate->description}}</textarea>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<label>Danh mục cha</label>
						<select name="parent_id" class="form-control">
							<option value="0">None</option>
							@if(!empty($cates))
							@foreach($cates as $cat)
							<option value="{{$cat->id}}">{{$cat->name}}</option>
							@endforeach
							@endif
						</select>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
						<input type="hidden" name="id" value="{{$cate->id}}">
						<button class="btn btn-md btn-primary" type="submit">Cập nhật</button>
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
		CKEDITOR.replace('description');
	});
</script>
@endsection


