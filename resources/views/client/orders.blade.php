@extends('layouts.client.client')
@section('title')
Danh sách đơn hàng đã đặt
@endsection
@section('content')

<div class="page_orders">
	<div class="container">
		<h1>Danh sách đơn hàng đã đặt</h1>
		@if(isset($orders))
		<table class="table">
			<thead>
				<tr>
					<th>STT</th>
					<th>Mã đơn hàng</th>
					<th>Người nhận</th>
					<th>Số điện thoại</th>
					<th>Tổng cộng</th>
					<th>Hành động</th>
				</tr>
			</thead>
			<tbody>
				@foreach($orders as $key => $order)
				<tr>
					<td>{{$key+1}}</td>
					<td><a href="{{route('client.orders',['code' => 'CW'.$order->id])}}">CW{{$order->id}}</a></td>
					<td>{{$order->name}}</td>
					<td>{{$order->phone}}</td>
					<td>{{number_format($order->total)}}</td>
					<td><a href="{{route('client.orders',['code' => 'CW'.$order->id])}}" class="btn btn-primary">Chi tiết</a></td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>STT</th>
					<th>Mã đơn hàng</th>
					<th>Người nhận</th>
					<th>Số điện thoại</th>
					<th>Tổng cộng</th>
					<th>Hành động</th>
				</tr>
			</tfoot>
		</table>
		<div class="text-center">{{$orders->links()}}</div>
		@else
		<div class="alert alert-warning">
			Bạn chưa có đơn đặt hàng nào ...
		</div>
		@endif
	</div>
</div>

@endsection