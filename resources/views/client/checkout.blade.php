@extends('layouts.client.client')
@section('title')
Thanh toán
@endsection
@section('content')

<div class="page_checkout">
	<div class="container">
		<h1>{{$head_title}}</h1>
		@if(session('errors'))
		<div class="alert alert-warning">
			@foreach(session('errors')->all() as $msg)
			<p>{{$msg}}</p>
			@endforeach
		</div>
		@endif
		<form action="{{route('cart.checkout')}}" method="post">
			@csrf
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
				<div class="info_payment">
					<h3>Thông tin thanh toán</h3>
					<div class="form-group">
						<label>Họ tên *</label>
						<input type="text" name="name" class="form-control" value="{{old('name')?old('name'):Auth::user()->name}}">
					</div>
					<div class="form-group">
						<label>Email *</label>
						<input type="text" name="email" value="{{old('email')?old('email'):Auth::user()->email}}" placeholder="Email" class="form-control">
					</div>
					<div class="form-group">
						<label>Số điện thoại *</label>
						<input type="text" name="phone" class="form-control" value="{{old('phone')?old('phone'):FALSE}}">
					</div>
					<div class="form-group">
						<label>Địa chỉ *</label>
						<textarea name="address" rows="4" class="form-control" style="resize: none;" placeholder="Địa chỉ nhận hàng"></textarea>
					</div>
					<div class="form-group">
						<label>Ghi chú</label>
						<textarea name="notes" rows="4" class="form-control" style="resize: none;" placeholder="Ghi chú"></textarea>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
				<div class="info_order">
					<h3>Đơn hàng của bạn</h3>
					<table class="table">
						<thead>
							<tr>
								<th>Sản phẩm</th>
								<th>Tổng</th>
							</tr>
						</thead>
						<tbody>
							@if(!empty($items))
							@php
							$total = 0
							@endphp
							@foreach($items as $item)
							<tr>
								<td>{{$item['name']}} <strong>x{{$item['quantity']}}</strong></td>
								<td>{{number_format($item['price']*$item['quantity'])}}VND</td>
							</tr>
							@php
							$total += $item['price']*$item['quantity']
							@endphp
							@endforeach
							@endif
						</tbody>
						<tfoot>
							<tr>
								<td>Tổng</td>
								<td>{{number_format($total)}}VND</td>
							</tr>
						</tfoot>
					</table>
					<div class="policy">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos ipsum voluptate numquam, iure odio commodi rerum quasi distinctio qui eligendi similique eius consequatur modi! Voluptas quam consequatur debitis recusandae facilis.
						</p>
					</div>
					<div class="text-center">
						<input type="hidden" name="total" value="{{$total}}">
						<button class="btn btn-md btn-primary" type="submit">Đặt hàng</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){

	});

	function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

</script>
@endsection