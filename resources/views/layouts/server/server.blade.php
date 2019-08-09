<!DOCTYPE html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>@yield('title','Admin Dashboard')</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('cowell/admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('cowell/admin/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('cowell/admin/css/admin_lte.css')}}">
    <link rel="stylesheet" href="{{asset('cowell/admin/css/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('cowell/admin/css/ionicon.min.css')}}">
    <link rel="stylesheet" href="{{asset('cowell/admin/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('cowell/admin/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('cowell/admin/css/admin_style.css')}}">
    @yield('css')

</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <a href="{{route('home')}}" class="logo" target="_blank">
          <span class="logo-mini"><b>Cowell</b> Asia</span>
          <span class="logo-lg"><b>Cowell</b> Asia</span>
      </a>
      <nav class="navbar navbar-static-top">
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('cowell/admin/img/logo.jpg')}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{asset('cowell/admin/img/logo.jpg')}}" class="img-circle" alt="User Image">

                            <p>{{Auth::user()->name}}</p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{route('client.profile')}}" class="btn btn-default btn-flat" target="_blank">Cá nhân</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{route('logout')}}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('cowell/admin/img/logo.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{(request()->is('admin'))?'active':FALSE}}">
                <a href="{{route('admin.dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview {{(request()->is('admin/categories*'))?'active':FALSE}}">
                <a href="{{route('admin.categories.index')}}">
                    <i class="fa fa-book"></i>
                    <span>Danh mục</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{(request()->is('admin/categories'))?'active':FALSE}}"><a href="{{route('admin.categories.index')}}"><i class="fa fa-circle-o"></i> Tất cả</a></li>
                    <li class="{{(request()->is('admin/categories/create'))?'active':FALSE}}"><a href="{{route('admin.categories.create')}}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
            <li class="treeview {{(request()->is('admin/products*'))?'active':FALSE}}">
                <a href="{{route('admin.products.index')}}">
                    <i class="fa fa-gift"></i>
                    <span>Sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{(request()->is('admin/products'))?'active':FALSE}}"><a href="{{route('admin.products.index')}}"><i class="fa fa-circle-o"></i> Tất cả</a></li>
                    <li class="{{(request()->is('admin/products/create'))?'active':FALSE}}"><a href="{{route('admin.products.create')}}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
            <li class="treeview {{(request()->is('admin/vendors*'))?'active':FALSE}}">
                <a href="{{route('admin.vendors.index')}}">
                    <i class="fa fa-briefcase"></i>
                    <span>Nhà sản xuất</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{(request()->is('admin/vendors'))?'active':FALSE}}"><a href="{{route('admin.vendors.index')}}"><i class="fa fa-circle-o"></i> Tất cả</a></li>
                    <li class="{{(request()->is('admin/vendors/create'))?'active':FALSE}}"><a href="{{route('admin.vendors.create')}}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
            <li class="treeview {{(request()->is('admin/orders*'))?'active':FALSE}}">
                <a href="{{route('admin.orders.index')}}">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Đơn hàng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{(request()->is('admin/orders'))?'active':FALSE}}"><a href="{{route('admin.orders.index')}}"><i class="fa fa-circle-o"></i> Tất cả</a></li>
                    <li class="{{(request()->is('admin/orders/create'))?'active':FALSE}}"><a href="{{route('admin.orders.create')}}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
            @if(Auth::user()->roles > 6)
            <li class="treeview {{(request()->is('admin/users*'))?'active':FALSE}}">
                <a href="{{route('admin.users.index')}}">
                    <i class="fa fa-user-circle"></i>
                    <span>Người dùng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{(request()->is('admin/users'))?'active':FALSE}}"><a href="{{route('admin.users.index')}}"><i class="fa fa-circle-o"></i> Tất cả</a></li>
                    <li class="{{(request()->is('admin/users/create'))?'active':FALSE}}"><a href="{{route('admin.users.create')}}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
            @endif
            <li class="treeview {{(request()->is('admin/options*'))?'active':FALSE}}">
                <a href="{{route('admin.options.index')}}">
                    <i class="fa fa-cog"></i>
                    <span>Options</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{(request()->is('admin/options/header-setting'))?'active':FALSE}}"><a href="{{route('admin.options.header')}}"><i class="fa fa-circle-o"></i> Thiết lập Header</a></li>
                    <li class="{{(request()->is('admin/options/footer-setting'))?'active':FALSE}}"><a href="{{route('admin.options.footer')}}"><i class="fa fa-circle-o"></i> Thiết lập Footer</a></li>
                    <li class="{{request()->is('admin/options/home-setting')?'active':FALSE}}">
                        <a href="{{route('admin.options.home')}}"><i class="fa fa-circle-o"></i> Thiết lập Trang chủ</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    
</aside>

<div class="content-wrapper">
    @yield('content')
</div>
<script src="{{asset('cowell/admin/js/jquery-1.9.1.js')}}"></script>
<script src="{{asset('cowell/admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('cowell/admin/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('cowell/admin/js/adminlte.min.js')}}"></script>
<script src="{{asset('cowell/admin/js/sweet.alert.min.js')}}"></script>
<script src="{{asset('cowell/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('cowell/ckfinder/ckfinder.js')}}"></script>
<script src="{{asset('cowell/admin/js/config_ck.js')}}"></script>
<script src="{{asset('cowell/admin/js/select2.min.js')}}"></script>
<script src="{{asset('cowell/admin/js/clamp.min.js')}}"></script>
<script src="{{asset('cowell/admin/js/custom.js')}}"></script>

@yield('script')

</body>
</html>
