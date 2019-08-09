@extends('layouts.client.client')
@section('title')
Thay đổi mật khẩu
@endsection
@section('content')

<div class="page_author">
	<div class="container">
		<h1 class="text-center">Thay đổi mật khẩu</h1>
		@if(session('errors'))
		<div class="alert alert-warning">
			@foreach(session('errors')->all() as $msg)
			<p>{{$msg}}</p>
			@endforeach
		</div>
		@endif
		<form action="{{route('client.changepass')}}" method="post" style="width: 50%; margin: 0 auto;">
			@csrf
			<div class="form-group">
				<label>Mật khẩu cũ*</label>
				<input type="password" name="oldpassword" class="form-control" value="{{old('oldpassword')}}">
			</div>
			<div class="form-group">
				<label>Mật khẩu mới</label>
				<input type="password" name="password" class="form-control" value="{{old('password')}}">
			</div>
			<div class="form-group">
				<label>Xác nhận mật khẩu</label>
				<input type="password" name="password_confirmation" class="form-control" value="{{old('password_confirmation')}}">
			</div>
			<div class="text-center">
				<button class="btn btn-md btn-primary" type="submit">Thay đổi</button>
			</div>
		</form>
	</div>
</div>

@endsection
@section('script')

@endsection