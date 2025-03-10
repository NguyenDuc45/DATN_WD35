<div class="sidebar-wrapper">
    <div id="sidebarEffect"></div>
    <div>
        <div style="padding-top: 0px" class="logo-wrapper logo-wrapper-center">
            <a href="{{ route('index') }}" data-bs-original-title="" title="">
                <img style="width:150px; height: 80px" class="img-fluid for-white" src="{{  Storage::url($globalSetting->logo ?? 'storage/logo.webp')  }}" alt="logo">
            </a>
            <div class="back-btn">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="toggle-sidebar">
                <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
            </div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="{{ route('index') }}">
                <img class="img-fluid main-logo main-white" src="{{ asset('assets/images/logo/logo.png') }}"
                    alt="logo">
                <img class="img-fluid main-logo main-dark" src="{{ asset('assets/images/logo/logo-white.png') }}"
                    alt="logo">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left"></i>
            </div>

            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"></li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('index') }}">
                            <i class="ri-home-line"></i>
                            <span>Tổng quan</span>
                        </a>
                    </li>

                    @haspermission('users-view')
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                <i class="ri-user-3-line"></i>
                                <span>Quản lý tài khoản</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a href="{{ route('users.index') }}">Danh sách</a>
                                </li>

                                @role('SuperAdmin')
                                    <li>
                                        <a href="{{ route('roles.index') }}">Vai trò</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('permissions.index') }}">Quyền</a>
                                    </li>
                                @endrole
                            </ul>
                        </li>
                    @endhaspermission

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-store-3-line"></i>
                            <span>Quản lý sản phẩm</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{ route('sanphams.index') }}">Sản phẩm</a>
                            </li>

                            <li>
                                <a href="{{ route('danhmucsanphams.index') }}">Danh mục</a>
                            </li>

                            <li>
                                <a href="{{ route('thuoctinhs.index') }}">Thuộc tính</a>
                            </li>

                            <li>
                                <a href="{{ route('danhgias.index') }}">Đánh giá</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-book-2-line"></i>
                            <span>Quản lý bài viết</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{ route('baiviets.index') }}">Danh sách</a>
                            </li>

                            <li>
                                <a href="{{ route('danhmucbaiviets.index') }}">Danh mục bài viết</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('donhangs.index') }}">
                            <i class="ri-archive-line"></i>
                            <span>Đơn hàng</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('phieugiamgias.index') }}">
                            <i class="ri-price-tag-3-line"></i>
                            <span>Phiếu giảm giá</span>
                        </a>
                    </li>

                    {{-- <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('lienhe') }}">
                            <i class="ri-phone-line"></i>
                            <span>Liên hệ</span>
                        </a>
                    </li> --}}

                    @can('role:SuperAdmin')
                        <li class="sidebar-list">
                            <a href="{{ route('configuration.common') }}"
                                class="linear-icon-link sidebar-link sidebar-title link-nav">
                                <i class="ri-settings-line"></i>
                                <span>Cài đặt</span>
                            </a>

                        </li> 
                    @endcan
                </ul>
            </div>

            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
            </div>
        </nav>
    </div>
</div>
