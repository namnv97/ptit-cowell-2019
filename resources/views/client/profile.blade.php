@extends('layouts.client.client')
@section('title')
Trang cá nhân
@endsection
@section('content')

<div class="page_author">
	<div class="container">
		<h1 class="text-center">Thông tin cá nhân</h1>
		@if(session('errors'))
		<div class="alert alert-warning">
			@foreach(session('errors')->all() as $msg)
			<p>{{$msg}}</p>
			@endforeach
		</div>
		@endif
		@if(session('msg_update'))
		<div class="alert alert-success">
			<p>{{session('msg_update')}}</p>
		</div>
		@endif
		<form action="{{route('client.profile')}}" method="post" style="width: 50%; margin: 0 auto;">
			@csrf
			<div class="form-group">
				<label>Họ tên *</label>
				<input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
			</div>
			<div class="form-group">
				<label>Email *</label>
				<span class="form-control">{{Auth::user()->email}}</span>
			</div>
			<div class="form-group">
				<label>Số điện thoại</label>
				<input type="text" name="email" class="form-control" value="{{Auth::user()->phone}}">
			</div>
			<div class="form-group">
				<label>Kiểu thành viên</label>
				@php
					$arr = array(
						'1' => 'Thành viên',
						'6' => 'Editor',
						'8' => 'Administrator',
						'9' => 'Super Administrator'
					);
				@endphp
				<span class="form-control">{{$arr[Auth::user()->roles]}}</span>
			</div>
			<div class="text-center">
				<button class="btn btn-md btn-primary" type="submit">Cập nhật</button>
			</div>
		</form>
	</div>
</div>

@endsection
@section('script')

@endsection