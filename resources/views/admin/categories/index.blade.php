@extends('layouts.server.server')
@section('title')
Danh sách danh mục
@endsection
@section('content')
<div class="content_container">
	<h1>{{isset($head_title)?$head_title:'Admin Dashboard'}}</h1>
	<hr>
	<div class="dashboard_home">
		@if (count($errors) > 0)
		@dd($errors)
		@endif
		<div class="top_index_users clearfix">
			<a href="{{route('admin.categories.create')}}" class="btn btn-md btn-primary">Thêm mới</a>
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
						<th>Danh mục cha</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($categories as $cat)
					<tr>
						<td>{{$cat->id}}</td>
						<td>{{$cat->name}}</td>
						<td class="desc-custom">{{ strip_tags($cat->description) }}</td>
						<td>{{$cat->cat_name}}</td>
						<td><a href="{{route('admin.categories.edit',['id'=>$cat->id])}}" class="btn btn-md btn-success"><i class="fa fa-edit"></i> Sửa</a></td>
						<td><a href="{{route('admin.categories.delete',['id'=>$cat->id])}}" class="btn btn-md btn-danger" onclick="if(confirm('Bạn muốn xóa danh mục này ?')) return true; return false;"><i class="fa fa-trash"></i> Xóa</a></td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td colspan="6" align="center">{{ $categories->links() }}</td>
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