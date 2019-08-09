@extends('layouts.server.server')
@section('title')
Danh sách sản phẩm
@endsection
@section('content')
<div class="content_container">
	<h1>{{isset($head_title)?$head_title:'Admin Dashboard'}}</h1>
	<hr>
	<div class="dashboard_home">
		<div class="top_index_users clearfix">
			<a href="{{route('admin.products.create')}}" class="btn btn-md btn-primary">Thêm mới</a>
			<form action="{{url()->current()}}" method="get">
				<input type="text" name="s" placeholder="Nhập tên sản phẩm" value="{{!empty(request()->s)?request()->s:FALSE}}" class="form-control">
			</form>
		</div>
		<div class="user">
			<table class="table table-stripped">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên</th>
						<th>Nhà cung cấp</th>
						<th>Danh mục</th>
						<th>Giá</th>
						<th>Số lượng</th>
						<th>Mô tả</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($products as $product)
					<tr>
						<td>{{$product->id}}</td>
						<td>{{$product->name}}</td>
						<td>{{$product->vendor_name}}</td>
						<td>{{$product->cat_name}}</td>
						<td>{{number_format($product->price)}}</td>
						<td>{{$product->quantity}}</td>
						<td class="desc__custom">{{strip_tags($product->description)}}</td>
						<td><a href="{{route('admin.products.edit',['id'=>$product->id])}}" class="btn btn-md btn-success"><i class="fa fa-edit"></i> Sửa</a></td>
						<td><a href="{{route('admin.products.delete',['id'=>$product->id])}}" class="btn btn-md btn-danger" onclick="if(confirm('Bạn muốn xóa sản phẩm này?')) return true; return false;"><i class="fa fa-trash"></i> Xóa</a></td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td colspan="9">{{ $products->links() }}</td>
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