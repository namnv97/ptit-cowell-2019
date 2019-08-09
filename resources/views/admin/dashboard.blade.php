@extends('layouts.server.server')
@section('title')
Admin Dashboard
@endsection
@section('content')
<div class="content_container">
	<h1>{{isset($head_title)?$head_title:'Admin Dashboard'}}</h1>
	<hr>
	<div class="dashboard_home">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="item">
					<a class="btn btn-primary" href="{{route('admin.products.index')}}">
						<h3>Sản phẩm</h3>
						<!-- ftag: product -->
						<div>{{$product}}</div>
					</a>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="item">
					<a class="btn btn-primary" href="{{route('admin.categories.index')}}">
						<h3>Danh mục</h3>
						<!-- ftag: post -->
						<div>{{$cate}}</div>
					</a>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="item">
					<a class="btn btn-primary" href="{{route('admin.users.index')}}">
						<h3>Người dùng</h3>
						<!-- ftag: User -->
						<div>{{$user}}</div>
					</a>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="item">
					<a class="btn btn-primary" href="{{route('admin.vendors.index')}}">
						<h3>Nhà sản xuất</h3>
						<!-- ftag: User -->
						<div>{{$vendor}}</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('script')
	<script type="text/javascript">
		console.log('12');
	</script>
@endsection