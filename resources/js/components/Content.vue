<template>
	<div class="page_cart" id="cartvue">
		<div class="container">
			<h1>Giỏ hàng</h1>
			<div class="alert alert-warning" v-if="check_cart(items)">
				Bạn chưa có sản phẩm nào trong giỏ hàng. <a href="#">Quay lại</a> mua hàng
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>STT</th>
						<th>Ảnh sản phẩm</th>
						<th>Tên sản phẩm</th>
						<th>Giá</th>
						<th>Số lượng</th>
						<th>Thành tiền</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr :data-product="item.id" v-for="item in items">

						<td>{{item.key}}</td>
						<td><img :src="item.thumbnail" :alt="item.name" style="width: 50px;height: 50px;"></td>
						<td><a href="#">{{item.name}}</a></td>
						<td class="price" :data-price="item.price">{{display_price(item.price)}}</td>
						<td>
							<div class="quantity">
								<input type="text" name="quantity" class="form-control" v-model="item.quantity" min="1">
								<button class="minus"> - </button>
								<button class="plus"> + </button>
							</div>
						</td>

						<td class="s_total">{{single_total(item.price,item.quantity)}}</td>

						<td class="delete_item"><i class="fa fa-trash" title="Xóa sản phẩm"></i></td>

					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4" class="total">Tổng cộng : <span>{{total}}</span></td>
						<td colspan="3" class="action_cart">
							<img :src="loading_img" alt="loading" id="loading">
							<a href="/checkout" class="btn btn-md btn-primary">Thanh toán</a>
							<button class="btn btn-md btn-danger"><i class="fa fa-trash"></i> Xóa giỏ hàng</button>
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</template>

<script>
	export default {
		el: '#cartvue',
		data () {
			return {
				items: [
					{
						key: 1,
						id: 15,
						name: 'Sản phẩm 1',
						price: 12000000,
						thumbnail: 'http://localhost:8000/cowell/uploads/images/27129_acer_r241y.jpg',
						quantity: 2,
					},
					{
						key: 2,
						id: 28,
						name: 'Sản phẩm 2',
						price: 10000000,
						thumbnail: 'http://localhost:8000/cowell/uploads/images/27129_acer_r241y.jpg',
						quantity: 4,
					}
				],
				total: 64000000,
				loading_img: 'http://localhost:8000/cowell/uploads/images/loading.gif'
			}
		},
		mounted() {
			this.total = convert(this.total)+' VND';
		},
		methods: {
			check_cart: function(items){
				return false;
			},
			single_total: function(price,quantity)
			{
				return convert(price*quantity);
			},
			display_price: function(price)
			{
				return convert(price)+' VND';
			}
		}
	}

	function convert(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
</script>