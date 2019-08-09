<!DOCTYPE html>
<html>

<head>
    <title>Cart Vue</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{asset('cowell/uploads/images/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('cowell/uploads/images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{asset('cowell/client/css/library.min.css')}}">
</head>

<body>
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="logo">
                        <a href="{{route('home')}}">
                            <img src="{{asset($header_logo)}}" width="100%">
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 hidden-sm hidden-xs" id="search">
                        <form action="{{route('client.search')}}" method="get">
                            <input type="text" name="s" class="form-control" autocomplete="off" placeholder="Tìm kiếm.." value="{{isset($_GET['s'])?$_GET['s']:FALSE}}">
                            <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="hidden-sm hidden-xs col-md-3 col-lg-3" id="hotline">
                        @php
                        $tel = $header_phone;
                        @endphp
                        <a href="tel:{{$tel}}">
                            <img src="{{asset('cowell/client/img/phone_volume.png')}}">
                            <div>
                                <p>Hotline</p>
                                <p>{{preg_replace('/([0-9]{4})([0-9]{3})([0-9]+)/',"$1.$2.$3",$tel)}}</p>
                            </div>
                        </a>
                        @include('layouts.client.auth')
                    </div>
                </div>
            </div>
        </div>
        <div class="container hidden-lg hiden-md bar_mobile">
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 bar_menu">
                    <button class="btn btn-sm"><i class="fa fa-bars"></i></button>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" id="search_mb">
                    <form action="#">
                        <input type="text" name="s" class="form-control" autocomplete="off" placeholder="Tìm kiếm.." value="">
                        <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <a data-toggle="modal" data-target="#form_log" style="font-size: 24px;cursor: pointer;">
                        <i class="fa fa-user"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="header-main">
            @include('layouts.client.menus')
        </div>
    </header>
    <main>
        <div id="app">
            <App></App>
        </div>
    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ft-item">
                    @if(isset($ft1) && !empty($ft1))
                    {!! $ft1['ctft'] !!}
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ft-item">
                    @if(isset($ft2) && !empty($ft2))
                    @if(isset($ft2['title']) && !empty($ft2['title']))
                    <h4>{{$ft2['title']}}</h4>
                    @endif
                    {!! $ft2['ctft'] !!}
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ft-item">
                    @if(isset($ft3) && !empty($ft3))
                    @if(isset($ft3['title']) && !empty($ft3['title']))
                    <h4>{{$ft3['title']}}</h4>
                    @endif
                    {!! $ft3['ctft'] !!}
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ft-item">
                    @if(isset($fb) && !empty($fb))
                    {!! $fb['ctft'] !!}
                    @endif
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright">
        <div class="container">
            <span>Copyright &copy;{{date('Y')}} by {{$copyright}}</span>
        </div>
    </div>
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <script src="{{asset('cowell/client/js/library.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery.ajax({
                url: "{{route('cart.count_items')}}",
                type: 'get',
                dataType: 'json',
                success: function(res)
                {
                    var items = Object.keys(res).length;
                    if(parseInt(items) > 0) jQuery('.shopping-cart').append('<span>'+items+'</span>');
                }
            });
        });
    </script>
    <script type="text/javascript">
        @if(session('msg_order'))
        Swal.fire({
            position: 'center',
            type: 'success',
            title: '{{session('msg_order')}}',
            showConfirmButton: false,
            timer: 1000
        });
        @endif

        @if(session('login_success'))
        Swal.fire({
            position: 'center',
            type: 'success',
            title: '{{session('login_success')}}',
            showConfirmButton: false,
            timer: 1000
        });
        @endif

        @if(session('login_fail'))
        Swal.fire({
            type: 'error',
            text: '{{session('login_fail')}}',
        })
        @endif
    </script>


    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2&appId=381461119271778&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <script async defer src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2&appId=381461119271778&autoLogAppEvents=1"></script>
</body>
</html>
