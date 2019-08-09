@extends('layouts.server.server')
@section('title')
Danh sách nhà sản xuất
@endsection
@section('content')
<div class="content_container">
	<h1>{{isset($head_title)?$head_title:'Admin Dashboard'}}</h1>
	<hr>
	<div class="dashboard_home">
		<div class="top_index_users clearfix">
			<a href="{{route('admin.vendors.create')}}" class="btn btn-md btn-primary">Thêm mới</a>
			<form action="{{url()->current()}}" method="get">
				<input type="text" name="s" placeholder="Nhập tên danh mục" value="{{!empty(request()->s)?request()->s:FALSE}}" class="form-control">
			</form>
		</div>
		<div class="user">
			<table class="table table-stripped">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên</th>
						<th>Mô tả</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($vendors as $vendor)
					<tr>
						<td>{{$vendor->id}}</td>
						<td>{{$vendor->name}}</td>
						<td>{{$vendor->description}}</td>
						<td><a href="{{route('admin.vendors.edit',['id'=>$vendor->id])}}" class="btn btn-md btn-success"><i class="fa fa-edit"></i> Sửa</a></td>
						<td><a href="{{route('admin.vendors.delete',['id'=>$vendor->id])}}" class="btn btn-md btn-danger" onclick="if(confirm('Bạn muốn xóa nhà sản xuất này?')) return true; return false;"><i class="fa fa-trash"></i> Xóa</a></td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td colspan="5" align="right">{{ $vendors->links() }}</td>
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