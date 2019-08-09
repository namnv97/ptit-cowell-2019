@extends('layouts.client.client')
@section('title')
Cảm ơn bạn đã đặt hàng
@endsection
@section('content')

<div class="container">
	<div class="row">
		<div id="form">
			<div v-html="msg">
				{{msg}}
			</div>
			<div class="form-group">
				<label>Tên sản phẩm</label>
				<input type="text" name="name" :value="name">
			</div>
			<div class="form-group">
				<label>Giá sản phẩm</label>
				<input type="text" name="price" :value="price">
			</div>
			<div class="form-group">
				<label>Số lượng</label>
				<input type="number" name="quantity" :value="quantity">
			</div>
			<button class="btn btn-md btn-primary" v-on:click="add()">Thêm</button>
		</div>
	</div>
</div>

@endsection
@section('script')
<script src="{{asset('cowell/client/js/vue.js')}}"></script>
<script src="{{asset('cowell/client/js/axios.min.js')}}"></script>
<script type="text/javascript">
	var data_add = {
		name: null,
		price: null,
		quantity: null,
		msg : null
	}

	var add_product = new Vue({
		el: '#form',
		data: data_add,
		methods: {
			add: function(){
				this.name = jQuery('#form input[name=name]').val();
				this.price = jQuery('#form input[name=price]').val();
				this.quantity = jQuery('#form input[name=quantity]').val();
				axios.get('http://localhost:8000/api/add_product',
				{
					params: {
						name: this.name,
						price: this.price,
						quantity: this.quantity
					}
				})
				.then(response => (this.msg = response.data.msg))
				.catch(function (error) {
					console.log(error);
				})
				.finally(function () {
				});
			}


		}
	});
</script>
@endscript