@extends('layouts.client.client')
@section('title')
{{$head_title}}
@endsection
@section('content')

<div class="page_login">
	<div class="container">
		<form action="{{route('login')}}" method="post">
			<h1 class="text-center">Đăng nhập</h1>
			@csrf
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" placeholder="Email">
			</div>
			<div class="form-group">
				<label>Mật khẩu</label>
				<input type="password" class="form-control" placeholder="Password" name="password">
			</div>
			<div class="text-center">
				<button class="btn btn-md btn-primary" type="submit">Đăng nhập</button>
			</div>
		</form>
	</div>
</div>

@endsection