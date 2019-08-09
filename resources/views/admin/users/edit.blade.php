@extends('layouts.server.server')
@section('title')
Thêm người dùng
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
		<form action="{{route('admin.users.update')}}" id="create_user" method="post">
			@csrf
			<div class="form-group">
				<label>Họ tên</label>
				<input type="text" name="name" class="form-control" value="{{old('name')?old('name'):$user->name}}">
			</div>
			<div class="form-group">
				<label>Kiểu thành viên</label>
				<div class="left30">
					<select name="roles" class="form-control">
						<option value="1">Chọn kiểu thành viên</option>
						<option value="8" {{old('roles')?((old('roles') == 8)?'selected':FALSE):(($user->roles == 8)?'selected':FALSE)}}>Admin</option>
						<option value="6" {{old('roles')?((old('roles') == 6)?'selected':FALSE):(($user->roles == 6)?'selected':FALSE)}}>Editor</option>
						<option value="1" {{old('roles')?((old('roles') == 1)?'selected':FALSE):(($user->roles == 1)?'selected':FALSE)}}>User</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label>Email</label>
				<span class="form-control">{{$user->email}}</span>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="text-center">
				<input type="hidden" name="id" value="{{$user->id}}">
				<button type="submit" class="btn btn-md btn-primary">Cập nhật</button>
			</div>
		</form>
	</div>
</div>

@endsection
@section('script')
<script type="text/javascript">
	console.log('12');
</script>
@endsection