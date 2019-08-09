@extends('layouts.server.server')
@section('title')
Cập nhật đơn hàng {{request()->segment(4)}}
@endsection
@section('content')
<div class="content_container">
	<h1>{{isset($head_title)?$head_title:'Admin Dashboard'}}</h1>
	<hr>
	<div class="dashboard_home">
		@if(session('errors'))
		<div class="alert alert-warning">
			@foreach(session('errors')->all() as $msg)
			<p>{{$msg}}</p>
			@endforeach
		</div>
		@endif
		@if(session('msg_update'))
		<div class="alert alert-success">
			<p>{{session('msg_update')}}</p>
		</div>
		@endif
		<form action="{{route('admin.orders.update')}}" method="post" id="edit_order">
			@csrf
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
					<h3>Thông tin khách hàng</h3>
					<div class="form-group">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<label>Họ tên</label>
								<input type="text" name="name" class="form-control" value="{{old('name')?old('name'):$order->name}}">
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<label>Số điện thoại</label>
								<input type="text" name="phone" class="form-control" value="{{old('phone')?old('phone'):$order->phone}}">		
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Địa chỉ</label>
						<textarea name="address" rows="5" style="resize: none;" class="form-control">{{old('address')?old('address'):$order->address}}</textarea>
					</div>
					<div class="form-group">
						<label>Ghi chú</label>
						<textarea name="notes" rows="5" style="resize: none;" class="form-control">{{old('notes')?old('notes'):$order->notes}}</textarea>
					</div>
					<h3>Thông tin đơn hàng</h3>
					<table class="table">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên sản phẩm</th>
								<th>Giá</th>
								<th>Số lượng</th>
								<th>Thành tiền</th>
							</tr>
						</thead>
						<tbody>
							@php
							$total = 0
							@endphp
							@foreach($items as $key => $item)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$item->name}}</td>
								<td>{{number_format($item->price)}}</td>
								<td>{{$item->quantity}}</td>
								<td>{{number_format($item->price*$item->quantity)}}</td>
							</tr>
							@php
							$total += $item->price*$item->quantity
							@endphp
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th colspan="5" class="total">Tổng cộng : {{number_format($total)}} VND</th>
							</tr>
						</tfoot>
					</table>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="form-group rigpd">
						<label>Trạng thái đơn hàng</label>
						<select name="status" class="form-control">
							<option value="0">Chọn trạng thái đơn hàng</option>
							<option value="1" {{old('status')?((old('status') == 1)?'selecte':FALSE):(($order->status == 1)?'selected':FALSE)}}>Chờ giao hàng</option>
							<option value="2" {{old('status')?((old('status') == 2)?'selecte':FALSE):(($order->status == 2)?'selected':FALSE)}}>Đang giao hàng</option>
							<option value="3" {{old('status')?((old('status') == 3)?'selecte':FALSE):(($order->status == 3)?'selected':FALSE)}}>Giao hàng thành công</option>
						</select>
					</div>
					<input type="hidden" name="id" value="{{request()->segment(4)}}">
					<div class="text-center"><button class="btn btn-md btn-primary" type="submit">Cập nhật</button></div>
				</div>
			</div>

		</form>
	</div>
</div>
@endsection