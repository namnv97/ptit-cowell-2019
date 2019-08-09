@extends('layouts.server.server')
@section('title')
Thiết lập Header
@endsection
@section('css')

<style>
	#logo{
		display: none;
		width: 300px;
	}

	#logo[src] {
		display: block !important; 
	}
</style>

@endsection
@section('content')
<div class="content_container">
	<h1>{{isset($head_title)?$head_title:'Admin Dashboard'}}</h1>
	<hr>
	<div class="dashboard_home">
		@if(session('errors'))
		<div class="errors">
			@foreach(session('errors')->all() as $msg)
			<p>{{$msg}}</p>
			@endforeach
		</div>
		@endif
		@if(session('msg'))
		<div class="alert alert-success">{{session('msg')}}</div>
		@endif
		<form action="{{route('admin.options.header')}}" method="post">
			@csrf
			<div class="row">
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					<div class="form-group">
						<label>Logo</label>
						@if(isset($header_logo))
						<img alt="logo" id="logo" src="{{old('logo')?old('logo'):$header_logo}}">
						@else
						<img alt="logo" id="logo" {{old('logo')?'src="'.old('logo').'"':FALSE}}>
						@endif
						<input type="hidden" name="logo" value="{{old('logo')?old('logo'):(isset($header_logo)?$header_logo:FALSE)}}">
						<span class="choose_logo {{(old('logo') || isset($header_logo))?FALSE:'add'}} btn btn-xs btn-primary">{{(old('logo') || isset($header_logo))?'Xóa ảnh':'Chọn ảnh'}}</span>
					</div>
					<div class="form-group">
						<label>Số điện thoại</label>
						<input type="text" name="phone" class="form-control" value="{{old('phone')?old('phone'):(isset($header_phone)?$header_phone:FALSE)}}">
					</div>
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">
					<button class="btn btn-lg btn-success">Lưu</button>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection
@section('script')
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('body').on('click','.choose_logo',function(){
				if(jQuery(this).hasClass('add'))
				{
					CKFinder.popup( {
						chooseFiles: true,
						onInit: function( finder ) {
							finder.on( 'files:choose', function( evt ) {
								var file = evt.data.files.first();
								jQuery('#logo').attr('src',file.getUrl());
								jQuery('.choose_logo').prev().val(file.getUrl());
								jQuery('.choose_logo').removeClass('add');
								jQuery('.choose_logo').text('Xóa ảnh');
							} );
						}
					} );
				}
				else
				{
					if(confirm("Bạn muốn xóa ảnh này ?"))
					{
						jQuery('.choose_logo').text('Chọn ảnh');
						jQuery('.choose_logo').addClass('add');
						jQuery('#logo').removeAttr('src');
						jQuery('.choose_logo').prev().val('');
					}

				}

			});
		});
	</script>
@endsection