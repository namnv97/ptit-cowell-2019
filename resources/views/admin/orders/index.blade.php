@extends('layouts.server.server')
@section('title')
Danh sách đơn hàng
@endsection
@section('content')
<div class="content_container">
	<h1>{{isset($head_title)?$head_title:'Admin Dashboard'}}</h1>
	<hr>
	<div class="dashboard_home">
		<div class="top_index_users clearfix">
			<a href="{{route('admin.orders.create')}}" class="btn btn-md btn-primary">Thêm mới</a>
			<form action="{{url()->current()}}" method="get">
				<input type="text" name="s" placeholder="Nhập mã đơn hàng" value="{{!empty(request()->s)?request()->s:FALSE}}" class="form-control">
			</form>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>Mã đơn hàng</th>
					<th>Người nhận</th>
					<th>Số điện thoại</th>
					<th>Địa chỉ</th>
					<th>Ghi chú</th>
					<th>Tổng đơn hàng</th>
					<th>Trạng thái</th>
					<th>Hành động</th>
				</tr>
			</thead>
			<tbody>
				@if(!empty($orders))
				@foreach($orders as $order)
				<tr>
					<td><a href="{{route('admin.orders.edit',['id'=>'CW'.$order->id])}}">CW{{$order->id}}</a></td>
					<td>{{$order->name}}</td>
					<td>{{$order->phone}}</td>
					<td>{{$order->address}}</td>
					<td>{{$order->notes}}</td>
					<td>{{number_format($order->total)}}</td>
					@php
					$stt = array(
						'1' => 'Chờ giao hàng',
						'2' => 'Đang giao hàng',
						'3' => 'Giao hàng thành công'
					)
					@endphp
					<td>{{$stt[$order->status]}}</td>
					<td><a href="{{route('admin.orders.edit',['id' => 'CW'.$order->id])}}" class="btn btn-md btn-danger"><i class="fa fa-edit"></i> Sửa</a></td>
				</tr>
				@endforeach
				@endif
			</tbody>
			<tfoot>
				<tr>
					<th>Mã đơn hàng</th>
					<th>Người nhận</th>
					<th>Số điện thoại</th>
					<th>Địa chỉ</th>
					<th>Ghi chú</th>
					<th>Tổng đơn hàng</th>
					<th>Hành động</th>
				</tr>
			</tfoot>
		</table>
		<div class="text-center">
			{{$orders->links()}}
		</div>
	</div>
</div>
@endsection