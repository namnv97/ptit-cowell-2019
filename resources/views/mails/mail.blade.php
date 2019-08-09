<h1>Thông báo đơn hàng : CW{{$order['id']}}</h1>
<p><strong>Họ tên : </strong> {{$order['name']}}</p>
<p><strong>Email : </strong> {{$order['email']}}</p>
<p><strong>Số điện thoại : </strong> {{$order['phone']}}</p>
<p><strong>Địa chỉ : </strong> {{$order['address']}}</p>
<p><strong>Ghi chú : </strong> {{$order['notes']}}</p>
<table width="100%" border="1" style="text-align: center;">
	<thead>
		<tr>
			<th>STT</th>
			<th>Tên sản phẩm</th>
			<th>Đơn giá</th>
			<th>Số lượng</th>
			<th>Thành tiền</th>
		</tr>
	</thead>
	<tbody>
		@php
		$total = 0
		@endphp
		@foreach($order['product'] as $key => $product)
		<tr>
			<td>{{$key+1}}</td>
			<td>{{$product['name']}}</td>
			<td>{{number_format($product['price'])}}VND</td>
			<td>{{$product['quantity']}}</td>
			<td>{{number_format($product['price']*$product['quantity'])}}VND</td>
		</tr>
		@php
			$total += $product['price']*$product['quantity']
		@endphp
		@endforeach
	</tbody>
	<tfoot>
		<tr>
			<td colspan="5" style="text-align: center;padding: 10px 0;"><strong style="font-size: 20px;">Tổng cộng :</strong> <span style="font-size: 20px;color: orange;font-weight: bold;">{{number_format($total)}}VND</span></td>
		</tr>
	</tfoot>
</table>

<p style="color: red;font-size: 18px;">Cảm ơn bạn đã đặt hàng</p>
<p>Mail được gửi từ Shopping Laravel <a href="http://localhost:8000">http://localhost:8000</a></p>