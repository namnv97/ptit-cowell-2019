@extends('layouts.server.server')
@section('title')
Thiết lập Footer
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
		@if(session('msg'))
		<div class="alert alert-success">{{session('msg')}}</div>
		@endif
		<form action="{{route('admin.options.footer')}}" method="post">
			@csrf
			<div class="list_content">
				<div class="item_content">
					<h3>Nội dung 1</h3>
					<div class="form-group">
						<label>Tiêu đề</label>
						<input type="text" name="title1" class="form-control" value="{{old('title1')?old('title1'):(isset($ft1['title'])?$ft1['title']:FALSE)}}">
					</div>
					<div class="form-group">
						<label>Nội dung</label>
						<textarea name="ctft1" id="cft1" rows="5" style="resize: none;" class="form-control">{{old('ctft1')?old('ctft1'):(isset($ft1['ctft'])?$ft1['ctft']:FALSE)}}</textarea>
					</div>
				</div>
				<div class="item_content">
					<h3>Nội dung 2</h3>
					<div class="form-group">
						<label>Tiêu đề</label>
						<input type="text" name="title2" class="form-control" value="{{old('title2')?old('title2'):(isset($ft2['title'])?$ft2['title']:FALSE)}}">
					</div>
					<div class="form-group">
						<label>Nội dung</label>
						<textarea name="ctft2" id="cft2" rows="5" style="resize: none;" class="form-control">{{old('ctft2')?old('ctft2'):(isset($ft2['ctft'])?$ft2['ctft']:FALSE)}}</textarea>
					</div>
				</div>
				<div class="item_content">
					<h3>Nội dung 3</h3>
					<div class="form-group">
						<label>Tiêu đề</label>
						<input type="text" name="title3" class="form-control" value="{{old('title3')?old('title3'):(isset($ft3['title'])?$ft3['title']:FALSE)}}">
					</div>
					<div class="form-group">
						<label>Nội dung</label>
						<textarea name="ctft3" id="cft3" rows="5" style="resize: none;" class="form-control">{{old('ctft3')?old('ctft3'):(isset($ft3['ctft'])?$ft3['ctft']:FALSE)}}</textarea>
					</div>
				</div>
				<div class="item_content">
					<h3>Fanpage Facebook</h3>
					<div class="form-group">
						<textarea name="facebook" id="cft4" rows="5" style="resize: none;" class="form-control">{{old('facebook')?old('facebook'):(isset($fb['ctft'])?$fb['ctft']:FALSE)}}</textarea>
					</div>
				</div>
				<div class="item_content">
					<h3>CopyRight</h3>
					<label>Copyright &copy;{{date('Y')}} by </label>&ensp;<input type="text" name="copyright" value="{{old('copyright')?old('copyright'):(isset($copyright)?$copyright:FALSE)}}">
				</div>
			</div>
			<div class="text-center">
				<button class="btn btn-md btn-primary" type="submit">Lưu</button>
			</div>
		</form>
	</div>
</div>

@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function() {
		CKEDITOR.replace('cft1');
		CKEDITOR.replace('cft2');
		CKEDITOR.replace('cft3');
	});
</script>
@endsection