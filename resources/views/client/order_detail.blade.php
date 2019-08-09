@extends('layouts.client.client')
@section('title')
Chi tiết đơn hàng {{request()->segment(2)}}
@endsection
@section('content')
<div class="page_order_detail">
	<div class="container">
		<h1>Chi tiết đơn hàng {{request()->segment(2)}}</h1>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<h3>Thông tin đơn hàng</h3>
				<table class="table">
					<thead>
						<tr>
							<th>STT</th>
							<th>Ảnh sản phẩm</th>
							<th>Tên sản phẩm</th>
							<th>Giá</th>
							<th>Số lượng</th>
						</tr>
					</thead>
					<tbody>
						@php
						$total = 0
						@endphp
						@foreach($items as $key => $item)
						@php
						$total += intval($item->price)*intval($item->quantity)
						@endphp
						<tr>
							<td>{{$key+1}}</td>
							<td><img src="{{asset($item->image)}}" alt="{{$item->name}}"></td>
							<td>{{$item->name}}</td>
							<td>{{number_format($item->price)}}</td>
							<td>{{$item->quantity}}</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td colspan="5">Tổng cộng : {{number_format($total)}} VND</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<h3>Thông tin nhận hàng</h3>
				<div class="info_receive">
					<p><strong>Họ tên : </strong> {{$order->name}}</p>
					<p><strong>Số điện thoại : </strong> {{$order->phone}}</p>
					<p><strong>Địa chỉ : </strong> {{$order->address}}</p>
					<p><strong>Ghi chú : </strong> {{$order->notes}}</p>
					@php
					$arr = ['1' => 'Chờ giao hàng', '2' => 'Đang giao hàng', '3'=> 'Giao hàng thành công']
					@endphp
					<p><strong>Trạng thái :</strong> {{$arr[$order->status]}}</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection