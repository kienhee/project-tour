@php
$menu = [['name' => 'Trang chủ', 'route' => 'client.index'], ['name' => 'Địa điểm', 'route' => 'client.destination'],
['name' => 'Tour', 'route' => 'client.tour'], ['name' => 'Khách sạn', 'route' => 'client.hotel'], ['name' => 'Tin tức',
'route' => 'client.blog'], ['name' => 'Liên hệ', 'route' => 'client.contact'], ['name' => 'Về chúng tôi', 'route' =>
'client.about-us']];
@endphp
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('client.index') }}">Hello World<span>Travel Agency</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> <i class="fa-solid fa-bars" style="font-size: 25px"></i>
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                @foreach ($menu as $item)
                <li class="nav-item {{ url()->current() == route($item['route']) ? 'active' : '' }}"><a
                        href="{{ url()->current() == route($item['route']) ? 'javascript:void(0)' : route($item['route']) }}"
                        class="nav-link">{{ $item['name'] }}</a></li>
                @endforeach

                @if (Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-ellipsis" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->full_name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('client.user') }}">Thông tin tài khoản</a>
                        <a class="dropdown-item" href="{{ route('client.favourite-tours') }}">Các Tour đã lưu</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('client.logout') }}">Đăng xuất</a>
                    </div>
                </li>
                @else
                <li class="nav-item {{ url()->current() == route('client.login') ? 'active' : '' }}"><a
                        href="{{ route('client.login') }}" class="nav-link">Đăng nhập</a></li>
                <li class="nav-item {{ url()->current() == route('client.register') ? 'active' : '' }}"><a
                        href="{{ route('client.register') }}" class="nav-link">Đăng ký</a></li>
                @endif


            </ul>
        </div>
    </div>
</nav>
