@if(!Auth::check())
<a href="#" data-toggle="modal" data-target="#form_log" class="btn btn-link btn-primary">
    <i class="fa fa-user"></i>&ensp;Đăng nhập
</a>
<div id="form_log" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Đăng nhập</h4>
            </div>
            <div class="modal-body">
                <form id="form_in" action="{{route('login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-md btn-primary">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@else
<div class="userlogin">
    <p><span>Xin chào : <b>{{Auth::user()->name}}</b> <i class="fa fa-angle-down"></i></span></p>
    <ul class="list_info">
        @if(Auth::user()->roles > 5)
        <li><a href="{{route('admin.dashboard')}}">Trang quản trị</a></li>
        @endif
        <li><a href="{{route('client.profile')}}">Cập nhật thông tin</a></li>
        <li><a href="{{route('client.changepass')}}">Thay đổi mật khẩu</a></li>
        <li><a href="{{route('client.orders')}}">Xem đơn hàng</a></li>
        <li>
            <a href="{{route('logout')}}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>
@endif