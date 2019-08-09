@extends('layouts.client.client')
@section('title')
Trang chủ
@endsection
@section('content')

<div class="banners">
    @include('layouts.client.banner')
    <div class="container">
        <div class="why_choose">
            <div class="row">
                @if(isset($target))
                @foreach($target as $tar)
                @php
                    $arr = json_decode($tar->option_value,true)
                @endphp
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="item">
                        <img src="{{asset($arr['img'])}}" alt="img">
                        <div class="text">
                            {!! $arr['content'] !!}
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<div class="container">
    @if(isset($best_seller))
    <div class="best_sale aos" data-aos="fade-up" data-duration="2500">
        <h2 class="title"><span>Sản phẩm bán chạy</span></h2>
        <div class="row">
            @foreach($best_seller as $product)
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="box-item">
                    <div class="box-img">
                        <a href="{{route('client.product',['slug'=>$product->slug])}}">
                            <img src="{{asset($product->image)}}" alt="{{$product->name}}" width="100%" />
                            <!-- <span class="sale_img">-10%</span> -->
                        </a>
                    </div>
                    <div class="box-text">
                        <h3 class="title text-center">
                            <a href="{{route('client.product',['slug'=>$product->slug])}}">{{$product->name}}</a>
                        </h3>
                        <p class="price text-center" data-value="10">Giá : <span>
                            {{number_format($product->price)}} VND</span>
                        </p>
                        <p class="text-center">
                            @if($product->quantity <= 0)
                            <button class="btn btn-md btn-warning">Hết hàng</button>
                            @else
                            <button class="btn btn-sm btn-danger btn-add" data-value="{{$product->id}}">Thêm vào giỏ</button>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
@if(!empty($list_by_cate))
@foreach($list_by_cate as $key => $cate)
@if(isset($cate['products']) && !empty($cate['products']))
<div class="category_list aos" data-aos="{{($key%2 == 0)?'fade-left':'fade-right'}}" data-duration='2500'>
    <h2 class="title"><a href="{{$cate['cat']['name']}}" target="_blank">{{$cate['cat']['name']}}</a></h2>
    @if(!empty($cate['products']))
    <div class="owl-carousel product_by_cat">
        @foreach($cate['products'] as $product)
        <div class="item">
            <a href="{{route('client.product',['slug' => $product->slug])}}">
                <img src="{{asset($product->image)}}" alt="{{$product->name}}">
                <!-- <span class="sale_img">-10%</span> -->
            </a>
            <div class="hover_text">
                <h4 class="title text-center">
                    <a href="{{route('client.product',['slug' => $product->slug])}}">{{$product->name}}</a>
                </h4>
                <p class="price text-center">Giá :
                    <span>{{number_format($product->price)}} VND</span>
                </p>
                <p class="text-center">
                    @if($product->quantity <= 0)
                    <span class="btn btn-warning btn-md">Hết hàng</span>
                    @else
                    <button class="btn btn-sm btn-danger btn-add" data-value="{{$product->id}}">Thêm vào giỏ</button>
                    @endif
                </p>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endif
@endforeach
@endif
</div>
@endsection
@section('script')
<script type="text/javascript">
    jQuery(document).ready(function(){


        jQuery('body').on('click','.btn-add',function(){
            var id = jQuery(this).data('value');
            jQuery.ajax({
                url: "{{route('cart.add')}}",
                type: 'get',
                dataType: 'html',
                data: {
                    id: id
                },
                beforeSend: function(){

                },
                success: function(res){
                    var ui = jQuery.parseJSON(res);
                    if(ui.status == true)
                    {
                        Swal.fire({
                            position: 'center',
                            type: 'success',
                            title: 'Sản phẩm đã thêm vào giỏ',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        var span = jQuery('.shopping-cart').find('span').text();
                        jQuery('.shopping-cart span').remove();
                        jQuery('.shopping-cart').append('<span>'+ui.items+'</span>');
                    }
                },
                error: function(){
                }
            });
        });
    });
</script>
@endsection