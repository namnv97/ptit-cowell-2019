@extends('layouts.server.server')
@section('title')
Thêm người dùng
@endsection
@section('content')
<div class="content_container">
	<h1>{{isset($head_title)?$head_title:'Admin Dashboard'}}</h1>
	<hr>
	<div class="dashboard_home">
		@if(session('msg'))
			<div class="error">
			@foreach(session('msg') as $msg)
				<p>{{$msg}}</p>
			@endforeach
			</div>
		@endif
		<form action="{{route('admin.users.create')}}" id="create_user" method="post">
			@csrf
			<div class="form-group">
				<label>Họ tên</label>
				<input type="text" name="name" class="form-control" value="{{old('name')}}">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" value="{{old('email')}}">
			</div>
			<div class="form-group">
				<label>Kiểu thành viên</label>
				<div class="left30">
					<select name="roles" class="form-control">
						<option value="1">Chọn kiểu thành viên</option>
						<option value="8">Admin</option>
						<option value="6">Editor</option>
						<option value="1">User</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-md btn-primary">Thêm</button>
			</div>
		</form>
	</div>
</div>

@endsection
@section('script')
<script type="text/javascript">
	
</script>
@endsection