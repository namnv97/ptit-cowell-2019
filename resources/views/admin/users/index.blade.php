@extends('layouts.server.server')
@section('title')
Danh sách người dùng
@endsection
@section('content')
<div class="content_container">
	<h1>{{isset($head_title)?$head_title:'Admin Dashboard'}}</h1>
	<hr>
	<div class="dashboard_home">
		<div class="top_index_users clearfix">
			<a href="{{route('admin.users.create')}}" class="btn btn-md btn-primary">Thêm mới</a>
			<form action="{{url()->current()}}" method="get">
				<input type="text" name="s" placeholder="Nhập tên người dùng" value="{{!empty(request()->s)?request()->s:FALSE}}" class="form-control">
			</form>
		</div>
		<div class="user">
			<table class="table table-stripped">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên</th>
						<th>Email</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td><a href="{{route('admin.users.edit',['id'=>$user->id])}}" class="btn btn-md btn-success"><i class="fa fa-edit"></i> Sửa</a></td>
						<td><a href="{{route('admin.users.delete',['id'=>$user->id])}}" class="btn btn-md btn-danger" onclick="if(confirm('Bạn muốn xóa người dùng ?')) return true; return false;"><i class="fa fa-trash"></i> Xóa</a></td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td colspan="5" align="right">{{ $users->links() }}</td>
					</tr>
				</tfoot>
			</table>
			
		</div>
		
	</div>


</div>

@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		@if(session('delete'))
		Swal.fire({
			position: 'center',
			type: 'success',
			title: "{{session('delete')}}",
			showConfirmButton: false,
			timer: 1000
		});
		@endif
		@if(session('done'))
		Swal.fire({
			position: 'center',
			type: 'success',
			title: "{{session('done')}}",
			showConfirmButton: false,
			timer: 1000
		});
		@endif
	});
</script>
@endsection