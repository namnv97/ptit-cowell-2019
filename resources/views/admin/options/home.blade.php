@extends('layouts.server.server')
@section('title')
Thiết lập trang chủ
@endsection
@section('css')
<style>
	.table_banner tbody tr td:first-child
	{
		width: 80%;
	}

	.table_banner tbody tr td:first-child img
	{
		display: none;
		width: 100%;
	}

	.table_banner tbody tr td:first-child img[src]
	{
		display: block;
	}
	
	.table_banner tbody tr td:last-child
	{
		vertical-align: middle;
		text-align: center;
	}

	.table_banner tbody tr td:last-child i
	{
		cursor: pointer;
		font-size: 18px;
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
		<form action="{{route('admin.options.home')}}" method="post">
			@csrf
			<div class="form-group">
				<label>Banner trang chủ</label>
				<table class="table table_banner">
					<tbody>
						@if(!empty($banners))
						@foreach($banners as $banner)
						<tr>
							<td>
								<img src="{{asset($banner)}}" alt="images">
								<span class="add btn btn-danger btn-sm">Xóa ảnh</span>
								<input type="hidden" value="{{$banner}}" name="banner[]">
							</td>
							<td title="Xóa ảnh"><i class="fa fa-trash btn btn-sm btn-danger"></i></td>
						</tr>
						@endforeach
						@endif
					</tbody>
					<tfoot>
						<tr>
							<td colspan="2" align="center"><span class="add_row btn btn-md btn-warning">Thêm</span></td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="form-group">
				<label>Mục tiêu bán hàng</label>
				<div class="list_reddot">
					<div class="item_red">
						@if(isset($target1))
						<img src="{{asset($target1['img'])}}" alt="img1">
						<span class="add_image btn btn-sm btn-danger">Xóa ảnh</span>
						<input type="hidden" name="image1" value="{{$target1['img']}}">
						@else
						<img alt="img1">
						<span class="add_image plus btn btn-sm btn-success">Chọn ảnh</span>
						<input type="hidden" name="image1">
						@endif
						<hr>
						<textarea name="reddot1" id="reddot1" rows="5" class="form-control" style="resize: none;">{{old('reddot1')?old('reddot1'):(isset($target1)?$target1['content']:FALSE)}}</textarea>
					</div>
					<div class="item_red">
						@if(isset($target2))
						<img src="{{asset($target2['img'])}}" alt="img1">
						<span class="add_image btn btn-sm btn-danger">Xóa ảnh</span>
						<input type="hidden" name="image2" value="{{$target2['img']}}">
						@else
						<img alt="img1">
						<span class="add_image plus btn btn-sm btn-success">Chọn ảnh</span>
						<input type="hidden" name="image2">
						@endif
						<hr>
						<textarea name="reddot2" id="reddot2" rows="5" class="form-control" style="resize: none;">{{old('reddot2')?old('reddot2'):(isset($target2)?$target2['content']:FALSE)}}</textarea>
					</div>
					<div class="item_red">
						@if(isset($target3))
						<img src="{{asset($target3['img'])}}" alt="img1">
						<span class="add_image btn btn-sm btn-danger">Xóa ảnh</span>
						<input type="hidden" name="image3" value="{{$target3['img']}}">
						@else
						<img alt="img1">
						<span class="add_image plus btn btn-sm btn-success">Chọn ảnh</span>
						<input type="hidden" name="image3">
						@endif
						<hr>
						<textarea name="reddot3" id="reddot3" rows="5" class="form-control" style="resize: none;">{{old('reddot3')?old('reddot3'):(isset($target3)?$target3['content']:FALSE)}}</textarea>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Danh mục hiển thị trang chủ</label>
				<select name="cate_home[]" multiple="multiple" id="cate_home" class="form-control">
					@if(!empty($cates_pr))
					@foreach($cates_pr as $cat)
					<optgroup label="{{$cat['label']}}">
						@if(!empty($cat['sub']))
						@foreach($cat['sub'] as $ct)
						<option value="{{$ct['id']}}" {{(in_array($ct['id'],$cate_home))?'selected':FALSE}}>{{$ct['name']}}</option>
						@endforeach
						@endif
					</optgroup>
					@endforeach
					@endif
				</select>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-md btn-primary">Lưu</button>
			</div>
		</form>
	</div>
</div>



@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#cate_home').select2();
		jQuery('.add_row').on('click',function(){
			jQuery('.table_banner tbody').append(`
				<tr>
					<td>
						<img alt="images">
						<span class="add plus btn btn-success btn-sm">Chọn ảnh</span>
						<input type="hidden" name="banner[]">
					</td>
					<td title="Xóa ảnh"><i class="fa fa-trash btn btn-sm btn-danger"></i></td>
				</tr>
				`);
		});

		jQuery('body').on('click','.table_banner tbody i' ,function(){
			if(confirm("Bạn chắc chắn muốn xóa ?"))
			{
				jQuery(this).parents('tr').first().remove();
			}
		});
		jQuery('body').on('click','.table_banner .add',function(){
			var $this = jQuery(this);
			if(jQuery(this).hasClass('plus'))
			{
				CKFinder.popup( {
					chooseFiles: true,
					onInit: function( finder ) {
						finder.on( 'files:choose', function( evt ) {
							var file = evt.data.files.first();
							$this.prev().attr('src',file.getUrl());
							$this.next().val(file.getUrl());
							$this.removeClass('plus');
							$this.removeClass('btn-success');
							$this.addClass('btn-danger');
							$this.text('Xóa ảnh');
						} );
					}
				} );
			}
			else
			{
				if(confirm("Bạn muốn xóa ảnh này ?"))
				{
					$this.text('Chọn ảnh');
					$this.removeClass('btn-danger');
					$this.addClass('btn-success');
					$this.addClass('plus');
					$this.prev().removeAttr('src');
					$this.next().val('');
				}
				
			}
			
		});


		CKEDITOR.replace('reddot1');
		CKEDITOR.replace('reddot2');
		CKEDITOR.replace('reddot3');

		jQuery('body').on('click','.add_image',function(){
			var $this = jQuery(this);
			if($this.hasClass('plus'))
			{
				CKFinder.popup( {
					chooseFiles: true,
					onInit: function( finder ) {
						finder.on( 'files:choose', function( evt ) {
							var file = evt.data.files.first();
							$this.prev().attr('src',file.getUrl());
							$this.next().val(file.getUrl());
							$this.removeClass('plus');
							$this.removeClass('btn-success');
							$this.addClass('btn-danger');
							$this.text('Xóa ảnh');
						} );
					}
				} );
			}
			else
			{
				$this.removeClass('btn-danger');
				$this.addClass('btn-success');
				$this.addClass('plus');
				$this.text('Chọn ảnh');
				$this.prev().removeAttr('src');
				$this.next().val('');
			}
		});
	});
</script>
@endsection