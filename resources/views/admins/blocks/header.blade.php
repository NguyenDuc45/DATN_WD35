<div class="page-header">
    <div class="header-wrapper m-0">
        <div class="header-logo-wrapper p-0">
            <div class="logo-wrapper">
                <a href="index.html">
                    <img class="img-fluid main-logo"
                        src="{{ Storage::url(Auth::user()->anh_dai_dien) ?? 'images/logo.jpg' }}" alt="logo">
                    <img class="img-fluid white-logo"
                        src="{{ Storage::url(Auth::user()->anh_dai_dien) ?? 'images/logo.jpg' }}" alt="logo">

                </a>
            </div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                <a href="index.html">
                    <img src="{{ Storage::url(Auth::user()->anh_dai_dien) ?? 'images/logo.jpg' }}" class="img-fluid"
                        alt="">

                </a>
            </div>
        </div>

        {{-- <form class="form-inline search-full" action="javascript:void(0)" method="get">
            <div class="form-group w-100">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                            placeholder="Tìm kiếm .." name="q" title="">
                        <i class="close-search" data-feather="x"></i>
                        <div class="spinner-border Typeahead-spinner" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="Typeahead-menu"></div>
                </div>
            </div>
        </form> --}}
        <div class="nav-right col-6 pull-right right-header p-0">
            <ul class="nav-menus">
                <li>
                    <span class="header-search">
                        <i class="ri-search-line"></i>
                    </span>
                </li>
                <li class="onhover-dropdown">
                    <div class="notification-box">
                        <i class="ri-notification-line"></i>
                        <span class="badge rounded-pill badge-theme"></span>
                    </div>
                    <ul class="notification-dropdown onhover-show-div">
                        <li>
                            <i class="ri-notification-line"></i>
                            <h6 class="f-18 mb-0">Thông báo</h6>
                        </li>
                        {{-- <li>
                            <a href="#" class="d-flex">
                                <span class="col-8">Thông báo 1</span>
                                <span class="col-4">
                                    <div class="float-end">10 min.</div>
                                </span>
                            </a>
                        </li> --}}
                        {{-- <li>
                            <a class="btn btn-primary" href="javascript:void(0)">Xem toàn bộ</a>
                        </li> --}}
                    </ul>
                </li> 
                <li>
                    <div class="mode">
                        <i class="ri-moon-line"></i>
                    </div>
                </li>
                <li class="profile-nav onhover-dropdown pe-0 me-0">
                    <div class="media profile-media">
                        <img class="user-profile rounded-circle"
                            src="{{ Storage::url(Auth::user()->anh_dai_dien ?? 'images/logo.jpg') }}" alt="">
                        <div class="user-name-hide media-body">
                            <span>{{ Auth::user()->ten_nguoi_dung }}</span>
                            <p class="mb-0 font-roboto">{{ Auth::user()->roles->pluck('name')->first() }}<i
                                    class="middle ri-arrow-down-s-line"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li>
                            <a href="{{ route('setting-infor.private') }}">
                                <i data-feather="users"></i>
                                <span>Thông tin cá nhân</span>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="order-list.html">
                                <i data-feather="archive"></i>
                                <span>Đơn hàng</span>
                            </a>
                        </li> --}}
                        {{-- <li>
                            <a href="support-ticket.html">
                                <i data-feather="phone"></i>
                                <span>Liên hệ</span>
                            </a>
                        </li> --}}
                        <li>
                            <a href="{{ route('pass.edit') }}">
                                <i data-feather="settings"></i>
                                <span>Đổi mật khẩu</span>
                            </a>
                        </li>
                        <li>
                            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="{{ route('logout') }}">
                                <i data-feather="log-out"></i>
                                <span>Đăng xuất</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
