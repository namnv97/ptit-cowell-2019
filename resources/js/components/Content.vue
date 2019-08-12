<template>
	<div class="page_checkout" id="checkout">
		<div class="container">
			<h1>Thanh toán</h1>
			<form @submit="checkForm" action="/checkout" method="post" novalidate="true">
				<input type="hidden" name="_token" :value="csrf">
				<div class="alert alert-warning" v-if="errors.length">
					<b>Vui lòng kiểm tra các thông tin sau:</b>
					<ul>
						<li v-for="error in errors">{{ error }}</li>
					</ul>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
						<div class="info_payment">
							<h3>Thông tin thanh toán</h3>
							<div class="form-group">
								<label>Họ tên *</label>
								<input type="text" name="name" class="form-control" v-model="name" autocomplete="off">
							</div>
							<div class="form-group">
								<label>Email *</label>
								<input type="text" name="email" v-model="email" placeholder="Email" class="form-control" autocomplete="off">
							</div>
							<div class="form-group">
								<label>Số điện thoại *</label>
								<input type="text" name="phone" class="form-control" v-model="phone" autocomplete="off">
							</div>
							<div class="form-group">
								<label>Địa chỉ *</label>
								<textarea name="address" rows="4" class="form-control" style="resize: none;" placeholder="Địa chỉ nhận hàng" v-model="address"></textarea>
							</div>
							<div class="form-group">
								<label>Ghi chú</label>
								<textarea name="notes" rows="4" class="form-control" style="resize: none;" placeholder="Ghi chú" v-model="note"></textarea>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
						<div class="info_order">
							<h3>Đơn hàng của bạn</h3>
							<table class="table" v-if="check_checkout">
								<thead>
									<tr>
										<th>Sản phẩm</th>
										<th>Tổng</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="item in items">
										<td>{{item.name}} <strong>x{{item.quantity}}</strong></td>
										<td>{{display(item.price*item.quantity)}}VND</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td>Tổng</td>
										<td>{{total(items)}}</td>
									</tr>
								</tfoot>
							</table>
							<div class="policy">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos ipsum voluptate numquam, iure odio commodi rerum quasi distinctio qui eligendi similique eius consequatur modi! Voluptas quam consequatur debitis recusandae facilis.
								</p>
							</div>
							<div class="text-center">
								<input type="hidden" name="total" value="84669999" autocomplete="off">
								<button class="btn btn-md btn-primary" type="submit">Đặt hàng</button>
							</div>
						</div>
					</div>
				</div>
			</form></div>
		</div>
	</template>

	<script>
		export default {
			el: '#checkout',
			data () {
				return {
					csrf: document.querySelector('meta[name="csrf-token"]').content,
					errors: [],
					name: null,
					email: null,
					phone: null,
					address: null,
					note: null,
					items: [],
					check_checkout: false
				}
			},
			mounted() {
				
			},
			created() {
				axios.get('api/get_current_user/'+this.userId)
				.then(response => {
					this.name = response.data.name;
					this.email = response.data.email;
				})
				.catch(e => {
					this.errors.push(e);
				});

				axios.get('api/get_item_checkout')
				.then(response => {
					this.items = response.data;
					this.check_checkout = true;
				})
				.catch(e => {
					this.errors.push(e);
				})
			},
			methods: {
				display: function(e)
				{
					return convert(e);
				},
				total: function(items)
				{
					var total = 0;
					items.forEach(function(e){
						total += e.price*e.quantity;
					});

					return convert(total)+'VND';
				},
				checkForm: function (e) {
					this.errors = [];

					if (!this.name) {
						this.errors.push("Họ tên không được để trống.");
					}
					if (!this.email) {
						this.errors.push('Email không được để trống.');
					} else if (!this.validEmail(this.email)) {
						this.errors.push('Vui lòng kiểm tra định dạng Email.');
					}

					if(!this.phone) {
						this.errors.push('Số điện thoại không được để trống');
					}
					else if (!this.validatePhone(this.phone)) {
						this.errors.push('Vui lòng kiểm tra lại số điện thoại.');
					}

					if(!this.address) {
						this.errors.push('Địa chỉ nhận hàng không được để trống');
					}

					if (!this.errors.length) {
						return true;
					}

					e.preventDefault();
				},
				validEmail: function (email) {
					var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
					return re.test(email);
				},
				validatePhone: function(phone)
				{
					var re = /^[09|08|07|03|05]([0-9]{9,10})$/;
					return re.test(phone);
				}
			}
		}

		function convert(x) {
			return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}
	</script>