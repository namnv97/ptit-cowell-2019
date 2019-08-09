@extends('layouts.server.server')
@section('title')
Cập nhật nhà sản xuất
@endsection
@section('content')
<div class="content_container">
	<h1>{{isset($head_title)?$head_title:'Admin Dashboard'}}</h1>
	<hr>
	<div class="dashboard_home">
		@if(session('msg'))
		<div class="errors">
		@foreach(session('msg') as $msg)
		<p>{{$msg}}</p>
		@endforeach
		@endif
		<form action="{{route('admin.vendors.update')}}" method="post" id="edit_products">
			@csrf
			<div class="form-group">
				<label>Nhà sản xuất</label>
				<input type="text" name="name" class="form-control" placeholder="Nhà sản xuất" value="{{old('name')?old('name'):$vendor->name}}">
			</div>
			<div class="form-group">
				<label>Mô tả</label>
				<textarea name="description" rows="5" style="resize: none;" class="form-control" placeholder="Mô tả cho nhà sản xuất">{{old('description')?old('description'):$vendor->description}}</textarea>
			</div>
			<div class="text-center">
				<input type="hidden" name="id" value="{{$vendor->id}}">
				<button class="btn btn-md btn-primary" type="submit">Cập nhật</button>
			</div>
		</form>		
	</div>
</div>

@endsection