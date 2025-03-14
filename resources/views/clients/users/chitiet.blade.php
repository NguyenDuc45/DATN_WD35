@extends('layouts.client')

@section('title')
    Tài khoản
@endsection

@section('css')
@endsection

@section('breadcrumb')
@endsection

@section('content')
    <!-- User Dashboard Section Start -->
    <section class="user-dashboard-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 col-lg-4">
                    <div class="dashboard-left-sidebar">
                        <div class="close-button d-flex d-lg-none">
                            <button class="close-sidebar">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="profile-box">
                            <div class="cover-image">
                                <img src="../assets/images/inner-page/cover-img.jpg" class="img-fluid blur-up lazyload" alt="">
                            </div>
                
                            <div class="profile-contain">
                                <div class="profile-image">
                                    <div class="position-relative">
                                        <img src="../assets/images/inner-page/user/1.jpg"
                                            class="blur-up lazyload update_img" alt="">
                                        <div class="cover-icon">
                                            <i class="fa-solid fa-pen">
                                                <input type="file" onchange="readURL(this,0)">
                                            </i>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="profile-name">
                                    <h3>Vicki E. Pope</h3>
                                    <h6 class="text-content">vicki.pope@gmail.com</h6>
                                </div>
                            </div>
                        </div>
                
                        <ul class="nav nav-pills user-nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-dashboard-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-dashboard" type="button"><i data-feather="home"></i>
                                    Bảng Điều Khiển</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-order-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-order" type="button"><i
                                        data-feather="shopping-bag"></i> Đơn Hàng</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-wishlist-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-wishlist" type="button"><i data-feather="heart"></i>
                                    Danh Sách Yêu Thích</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-card-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-card" type="button" role="tab"><i
                                        data-feather="credit-card"></i> Thẻ Đã Lưu</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-address-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-address" type="button" role="tab"><i
                                        data-feather="map-pin"></i> Địa Chỉ</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"><i
                                        data-feather="user"></i>
                                    Hồ Sơ</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-download-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-download" type="button" role="tab"><i
                                        data-feather="download"></i> Tải Xuống</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-security-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-security" type="button" role="tab"><i
                                        data-feather="shield"></i> Bảo Mật</button>
                            </li>
                        </ul>
                    </div>
                </div>
                

                <div class="col-xxl-9 col-lg-8">
                    <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">Show
                        Menu</button>
                    <div class="dashboard-right-sidebar">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel">
                                <div class="dashboard-home">
                                    <div class="title">
                                        <h2>Bảng Điều Khiển Của Tôi</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use
                                                    xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf">
                                                </use>
                                            </svg>
                                        </span>
                                    </div>
                                
                                    <div class="dashboard-user-name">
                                        <h6 class="text-content">Xin chào, <b class="text-title">Vicki E. Pope</b></h6>
                                        <p class="text-content">Từ bảng điều khiển tài khoản của tôi, bạn có thể xem nhanh hoạt động gần đây của tài khoản và cập nhật thông tin của mình. Chọn một liên kết bên dưới để xem hoặc chỉnh sửa thông tin.</p>
                                    </div>
                                
                                    <div class="total-box">
                                        <div class="row g-sm-4 g-3">
                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="total-contain">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/order.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/order.svg"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="total-detail">
                                                        <h5>Tổng Đơn Hàng</h5>
                                                        <h3>3658</h3>
                                                    </div>
                                                </div>
                                            </div>
                                
                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="total-contain">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/pending.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/pending.svg"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="total-detail">
                                                        <h5>Tổng Đơn Hàng Chờ Xử Lý</h5>
                                                        <h3>254</h3>
                                                    </div>
                                                </div>
                                            </div>
                                
                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="total-contain">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/wishlist.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/wishlist.svg"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="total-detail">
                                                        <h5>Tổng Danh Sách Yêu Thích</h5>
                                                        <h3>32158</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="dashboard-title">
                                        <h3>Thông Tin Tài Khoản</h3>
                                    </div>
                                
                                    <div class="row g-4">
                                        <div class="col-xxl-6">
                                            <div class="dashboard-content-title">
                                                <h4>Thông Tin Liên Hệ <a href="javascript:void(0)"
                                                        data-bs-toggle="modal" data-bs-target="#editProfile">Chỉnh Sửa</a>
                                                </h4>
                                            </div>
                                            <div class="dashboard-detail">
                                                <h6 class="text-content">MARK JECNO</h6>
                                                <h6 class="text-content">vicki.pope@gmail.com</h6>
                                                <a href="javascript:void(0)">Đổi Mật Khẩu</a>
                                            </div>
                                        </div>
                                
                                        <div class="col-xxl-6">
                                            <div class="dashboard-content-title">
                                                <h4>Bản Tin <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile">Chỉnh Sửa</a></h4>
                                            </div>
                                            <div class="dashboard-detail">
                                                <h6 class="text-content">Bạn hiện không đăng ký bất kỳ bản tin nào</h6>
                                            </div>
                                        </div>
                                
                                        <div class="col-12">
                                            <div class="dashboard-content-title">
                                                <h4>Sổ Địa Chỉ <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile">Chỉnh Sửa</a></h4>
                                            </div>
                                
                                            <div class="row g-4">
                                                <div class="col-xxl-6">
                                                    <div class="dashboard-detail">
                                                        <h6 class="text-content">Địa Chỉ Thanh Toán Mặc Định</h6>
                                                        <h6 class="text-content">Bạn chưa thiết lập địa chỉ thanh toán mặc định.</h6>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#editProfile">Chỉnh Sửa Địa Chỉ</a>
                                                    </div>
                                                </div>
                                
                                                <div class="col-xxl-6">
                                                    <div class="dashboard-detail">
                                                        <h6 class="text-content">Địa Chỉ Giao Hàng Mặc Định</h6>
                                                        <h6 class="text-content">Bạn chưa thiết lập địa chỉ giao hàng mặc định.</h6>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#editProfile">Chỉnh Sửa Địa Chỉ</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="tab-pane fade" id="pills-wishlist" role="tabpanel">
                                <div class="dashboard-wishlist">
                                    <div class="title">
                                        <h2>Lịch Sử Danh Sách Yêu Thích Của Tôi</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use
                                                    xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf">
                                                </use>
                                            </svg>
                                        </span>
                                    </div>
                                    
                                    <div class="row g-sm-4 g-3">
                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail.html">
                                                            <img src="../assets/images/cake/product/2.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                        
                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Rau củ</span>
                                                        <a href="product-left-thumbnail.html">
                                                            <h5 class="name">Bánh mì tươi và bột bánh ngọt 200g</h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">
                                                            Phô mai thơm ngon với nụ cười rạng rỡ. Phô mai Mascarpone kết hợp với rượu, phô mai cứng,
                                                            món phô mai mà ai cũng yêu thích, macaroni phô mai, croque monsieur.
                                                        </p>
                                                        <h6 class="unit mt-1">250 ml</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">$08.02</span>
                                                            <del>$15.15</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button" tabindex="0">
                                                                Thêm vào giỏ
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                                        <i class="fa fa-minus"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail.html">
                                                            <img src="../assets/images/cake/product/3.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                        
                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Rau củ</span>
                                                        <a href="product-left-thumbnail.html">
                                                            <h5 class="name">Bánh quy bơ hảo hạng vị bơ đậu phộng 600g</h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">
                                                            Phô mai Feta, Taleggio, Croque Monsieur, Swiss, Manchego, Cheesecake, Dolcelatte, Jarlsberg. 
                                                            Phô mai cứng Danish Fontina, Boursin, phô mai tan chảy, phô mai fondue.
                                                        </p>
                                                        <h6 class="unit mt-1">350 G</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">$04.33</span>
                                                            <del>$10.36</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button" tabindex="0">
                                                                Thêm vào giỏ
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                                        <i class="fa fa-minus"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail.html">
                                                            <img src="../assets/images/cake/product/4.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                            
                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Đồ ăn nhẹ</span>
                                                        <a href="product-left-thumbnail.html">
                                                            <h5 class="name">Gói SnackAmor gồm que Jowar và khoai tây Jowar</h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">
                                                            Phô mai cứng Lancashire, Parmesan. Phô mai Danish Fontina, Mozzarella, phô mai kem,
                                                            phô mai nặng mùi, phô mai và rượu, bánh phô mai Dolcelatte, Stilton.
                                                            Phô mai kem, Parmesan, Ai đã lấy miếng phô mai của tôi? Khi phô mai xuất hiện, mọi người đều vui vẻ.
                                                            Phô mai kem, Red Leicester, Ricotta, Edam.
                                                        </p>
                                                        <h6 class="unit mt-1">570 G</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">$12.52</span>
                                                            <del>$13.62</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button" tabindex="0">
                                                                Thêm vào giỏ
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                                        <i class="fa fa-minus"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail.html">
                                                            <img src="../assets/images/cake/product/5.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Đồ ăn nhẹ</span>
                                                        <a href="product-left-thumbnail.html">
                                                            <h5 class="name">Khoai tây chiên Yumitos rắc ớt 100 g</h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">
                                                            Phô mai Cheddar, Pecorino, phô mai cứng, phô mai và bánh quy,
                                                            Bocconcini, Babybel. Phô mai bò, dê, Paneer, phô mai kem, Fromage,
                                                            phô mai Cottage, phô mai súp lơ, Jarlsberg.
                                                        </p>
                                                        <h6 class="unit mt-1">100 G</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">$10.25</span>
                                                            <del>$12.36</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button" tabindex="0">
                                                                Thêm vào giỏ
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                                        <i class="fa fa-minus"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail.html">
                                                            <img src="../assets/images/cake/product/6.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Rau củ</span>
                                                        <a href="product-left-thumbnail.html">
                                                            <h5 class="name">Bánh quy Choco Chip giòn Fantasy</h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">
                                                            Phô mai Bavarian bergkase nặng mùi, phô mai Thụy Sĩ, Lancashire, Manchego tan chảy. 
                                                            Phô mai Red Leicester, paneer, khi phô mai tan chảy, ai cũng vui vẻ, croque monsieur, 
                                                            phô mai dê, port-salut.
                                                        </p>
                                                        <h6 class="unit mt-1">550 G</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">$14.25</span>
                                                            <del>$16.57</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button" tabindex="0">Thêm vào giỏ hàng
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                                        <i class="fa fa-minus"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail.html">
                                                            <img src="../assets/images/cake/product/7.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Rau củ</span>
                                                        <a href="product-left-thumbnail.html">
                                                            <h5 class="name">Bột bánh mì tươi và bánh ngọt 200 g</h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">
                                                            Phô mai tan chảy, babybel, phô mai phấn và phô mai. 
                                                            Port-salut, kem phô mai, khi phô mai tan chảy, ai cũng vui vẻ, 
                                                            kem phô mai, phô mai cứng, kem phô mai, phô mai Red Leicester.
                                                        </p>
                                                        <h6 class="unit mt-1">1 Kg</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">$12.68</span>
                                                            <del>$14.69</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button" tabindex="0">Thêm vào giỏ hàng
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                                        <i class="fa fa-minus"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail.html">
                                                            <img src="../assets/images/cake/product/2.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Rau củ</span>
                                                        <a href="product-left-thumbnail.html">
                                                            <h5 class="name">Bột bánh mì tươi và bánh ngọt 200 g</h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">
                                                            Phô mai dạng xịt, phô mai cottage, dây phô mai. 
                                                            Phô mai Red Leicester, paneer, fontina Đan Mạch, queso, lancashire, 
                                                            khi phô mai tan chảy, ai cũng vui vẻ, phô mai cottage, paneer.
                                                        </p>
                                                        <h6 class="unit mt-1">250 ml</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">$08.02</span>
                                                            <del>$15.15</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button" tabindex="0">Thêm vào giỏ hàng
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                                        <i class="fa fa-minus"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-order" role="tabpanel">
                                <div class="dashboard-order">
                                    <div class="title">
                                        <h2>Lịch Sử Đơn Hàng Của Tôi</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf">
                                                </use>
                                            </svg>
                                        </span>
                                    </div>
                                    

                                    <div class="order-contain">
                                        <div class="order-box dashboard-bg-box">
                                            <div class="order-container">
                                                <div class="order-icon">
                                                    <i data-feather="box"></i>
                                                </div>
                                        
                                                <div class="order-detail">
                                                    <h4>Giao Hàng <span>Đang Chờ Xử Lý</span></h4>
                                                    <h6 class="text-content">Phô mai Gouda, Parmesan, Caerphilly, Mozzarella, phô mai Cottage, phô mai súp lơ, Taleggio, Gouda.</h6>
                                                </div>
                                            </div>
                                        
                                            <div class="product-order-detail">
                                                <a href="product-left-thumbnail.html" class="order-image">
                                                    <img src="../assets/images/vegetable/product/1.png"
                                                        class="blur-up lazyload" alt="">
                                                </a>
                                        
                                                <div class="order-wrap">
                                                    <a href="product-left-thumbnail.html">
                                                        <h3>Bánh Quy Choco Chip Giòn Fantasy</h3>
                                                    </a>
                                                    <p class="text-content">Phô mai Cheddar, Dolcelatte, Gouda. Mì Macaroni với phô mai, phô mai sợi, phô mai Feta, Halloumi, phô mai Cottage, Jarlsberg, phô mai tam giác.</p>
                                                    <ul class="product-size">
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Giá: </h6>
                                                                <h5>$20.68</h5>
                                                            </div>
                                                        </li>
                                        
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Đánh Giá: </h6>
                                                                <div class="product-rating ms-2">
                                                                    <ul class="rating">
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                        
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Người Bán: </h6>
                                                                <h5>Fresho</h5>
                                                            </div>
                                                        </li>
                                        
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Số Lượng: </h6>
                                                                <h5>250 G</h5>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="order-box dashboard-bg-box">
                                            <div class="order-container">
                                                <div class="order-icon">
                                                    <i data-feather="box"></i>
                                                </div>
                                        
                                                <div class="order-detail">
                                                    <h4>Đã Giao Hàng <span class="success-bg">Thành Công</span></h4>
                                                    <h6 class="text-content">Phô mai nướng, nụ cười phô mai, phô mai Cottage, Caerphilly. Ai cũng yêu thích phô mai Cottage, phô mai cỡ lớn.</h6>
                                                </div>
                                            </div>
                                        
                                            <div class="product-order-detail">
                                                <a href="product-left-thumbnail.html" class="order-image">
                                                    <img src="../assets/images/vegetable/product/2.png" alt=""
                                                        class="blur-up lazyload">
                                                </a>
                                        
                                                <div class="order-wrap">
                                                    <a href="product-left-thumbnail.html">
                                                        <h3>Cà Phê Lạnh Pha Sẵn 50 g</h3>
                                                    </a>
                                                    <p class="text-content">Phô mai Pecorino, Paneer, Port-Salut. Khi phô mai xuất hiện, ai cũng vui vẻ. Phô mai Red Leicester, Mascarpone, Blue Castello, phô mai súp lơ.</p>
                                                    <ul class="product-size">
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Giá: </h6>
                                                                <h5>$20.68</h5>
                                                            </div>
                                                        </li>
                                        
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Đánh Giá: </h6>
                                                                <div class="product-rating ms-2">
                                                                    <ul class="rating">
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                        
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Người Bán: </h6>
                                                                <h5>Fresho</h5>
                                                            </div>
                                                        </li>
                                        
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Số Lượng: </h6>
                                                                <h5>250 G</h5>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="order-box dashboard-bg-box">
                                            <div class="order-container">
                                                <div class="order-icon">
                                                    <i data-feather="box"></i>
                                                </div>
                                        
                                                <div class="order-detail">
                                                    <h4>Đang Giao Hàng <span>Chờ Xử Lý</span></h4>
                                                    <h6 class="text-content">Nụ cười phô mai, Boursin, bánh cheesecake, phô mai Blue Castello, phô mai kem, Lancashire, phô mai tan chảy.</h6>
                                                </div>
                                            </div>
                                        
                                            <div class="product-order-detail">
                                                <a href="product-left-thumbnail.html" class="order-image">
                                                    <img src="../assets/images/vegetable/product/3.png" alt=""
                                                        class="blur-up lazyload">
                                                </a>
                                        
                                                <div class="order-wrap">
                                                    <a href="product-left-thumbnail.html">
                                                        <h3>Bánh Quy Bơ Đậu Phộng Cao Cấp 600 g</h3>
                                                    </a>
                                                    <p class="text-content">Phô mai bò Bavarian Bergkase, Mascarpone, Paneer, Squirty Cheese, Fromage Frais, lát phô mai. Khi phô mai xuất hiện, ai cũng vui vẻ.</p>
                                                    <ul class="product-size">
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Giá: </h6>
                                                                <h5>$20.68</h5>
                                                            </div>
                                                        </li>
                                        
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Đánh Giá: </h6>
                                                                <div class="product-rating ms-2">
                                                                    <ul class="rating">
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                        
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Người Bán: </h6>
                                                                <h5>Fresho</h5>
                                                            </div>
                                                        </li>
                                        
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Số Lượng: </h6>
                                                                <h5>250 G</h5>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="order-box dashboard-bg-box">
                                            <div class="order-container">
                                                <div class="order-icon">
                                                    <i data-feather="box"></i>
                                                </div>
                                        
                                                <div class="order-detail">
                                                    <h4>Đã Giao Hàng <span class="success-bg">Thành Công</span></h4>
                                                    <h6 class="text-content">Caerphilly, Port-Salut, Parmesan, Pecorino, Croque Monsieur, Dolcelatte, phô mai tan chảy, phô mai & rượu.</h6>
                                                </div>
                                            </div>
                                        
                                            <div class="product-order-detail">
                                                <a href="product-left-thumbnail.html" class="order-image">
                                                    <img src="../assets/images/vegetable/product/4.png"
                                                        class="blur-up lazyload" alt="">
                                                </a>
                                        
                                                <div class="order-wrap">
                                                    <a href="product-left-thumbnail.html">
                                                        <h3>Gói Combo SnackAmor gồm Thanh Jowar và Khoai Tây Jowar</h3>
                                                    </a>
                                                    <p class="text-content">Phô mai lớn, phô mai kem, Pepper Jack, lát phô mai, Danish Fontina. Ai cũng yêu thích phô mai nướng, Bavarian Bergkase.</p>
                                                    <ul class="product-size">
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Giá: </h6>
                                                                <h5>$20.68</h5>
                                                            </div>
                                                        </li>
                                        
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Đánh Giá: </h6>
                                                                <div class="product-rating ms-2">
                                                                    <ul class="rating">
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                        
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Người Bán: </h6>
                                                                <h5>Fresho</h5>
                                                            </div>
                                                        </li>
                                        
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Số Lượng: </h6>
                                                                <h5>250 G</h5>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-address" role="tabpanel">
                                <div class="dashboard-address">
                                    <div class="title title-flex">
                                        <div>
                                            <h2>Sổ Địa Chỉ Của Tôi</h2>
                                            <span class="title-leaf">
                                                <svg class="icon-width bg-gray">
                                                    <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf">
                                                    </use>
                                                </svg>
                                            </span>
                                        </div>
                                    
                                        <button class="btn theme-bg-color text-white btn-sm fw-bold mt-lg-0 mt-3"
                                            data-bs-toggle="modal" data-bs-target="#add-address">
                                            <i data-feather="plus" class="me-2"></i> Thêm Địa Chỉ Mới
                                        </button>
                                    </div>
                                    

                                    <div class="row g-sm-4 g-3">
                                        <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                            <div class="address-box">
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jack"
                                                            id="flexRadioDefault2" checked>
                                                    </div>
                                                
                                                    <div class="label">
                                                        <label>Nhà</label>
                                                    </div>
                                                
                                                    <div class="table-responsive address-table">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2">Jack Jennas</td>
                                                                </tr>
                                                
                                                                <tr>
                                                                    <td>Địa chỉ :</td>
                                                                    <td>
                                                                        <p>8424 James Lane, South San Francisco, CA 94080</p>
                                                                    </td>
                                                                </tr>
                                                
                                                                <tr>
                                                                    <td>Mã bưu điện :</td>
                                                                    <td>+380</td>
                                                                </tr>
                                                
                                                                <tr>
                                                                    <td>Điện thoại :</td>
                                                                    <td>+ 812-710-3798</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                
                                                <div class="button-group">
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile"><i data-feather="edit"></i>
                                                        Chỉnh sửa</button>
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                                        Xóa</button>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                            <div class="address-box">
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jack"
                                                            id="flexRadioDefault3">
                                                    </div>
                                        
                                                    <div class="label">
                                                        <label>Văn phòng</label>
                                                    </div>
                                        
                                                    <div class="table-responsive address-table">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2">Terry S. Sutton</td>
                                                                </tr>
                                        
                                                                <tr>
                                                                    <td>Địa chỉ :</td>
                                                                    <td>
                                                                        <p>2280 Rose Avenue Kenner, LA 70062</p>
                                                                    </td>
                                                                </tr>
                                        
                                                                <tr>
                                                                    <td>Mã bưu điện :</td>
                                                                    <td>+25</td>
                                                                </tr>
                                        
                                                                <tr>
                                                                    <td>Điện thoại :</td>
                                                                    <td>+ 504-228-0969</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                        
                                                <div class="button-group">
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile"><i data-feather="edit"></i>
                                                        Chỉnh sửa</button>
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                                        Xóa</button>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                            <div class="address-box">
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jack"
                                                            id="flexRadioDefault4">
                                                    </div>
                                        
                                                    <div class="label">
                                                        <label>Hàng xóm</label>
                                                    </div>
                                        
                                                    <div class="table-responsive address-table">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2">Juan M. McKeon</td>
                                                                </tr>
                                        
                                                                <tr>
                                                                    <td>Địa chỉ :</td>
                                                                    <td>
                                                                        <p>1703 Carson Street Lexington, KY 40593</p>
                                                                    </td>
                                                                </tr>
                                        
                                                                <tr>
                                                                    <td>Mã bưu điện :</td>
                                                                    <td>+78</td>
                                                                </tr>
                                        
                                                                <tr>
                                                                    <td>Điện thoại :</td>
                                                                    <td>+ 859-257-0509</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                        
                                                <div class="button-group">
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile"><i data-feather="edit"></i>
                                                        Chỉnh sửa</button>
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                                        Xóa</button>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                            <div class="address-box">
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jack"
                                                            id="flexRadioDefault5">
                                                    </div>
                                        
                                                    <div class="label">
                                                        <label>Nhà 2</label>
                                                    </div>
                                        
                                                    <div class="table-responsive address-table">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2">Gary M. Bailey</td>
                                                                </tr>
                                        
                                                                <tr>
                                                                    <td>Địa chỉ :</td>
                                                                    <td>
                                                                        <p>2135 Burning Memory Lane Philadelphia, PA
                                                                            19135</p>
                                                                    </td>
                                                                </tr>
                                        
                                                                <tr>
                                                                    <td>Mã bưu điện :</td>
                                                                    <td>+26</td>
                                                                </tr>
                                        
                                                                <tr>
                                                                    <td>Điện thoại :</td>
                                                                    <td>+ 215-335-9916</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                        
                                                <div class="button-group">
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile"><i data-feather="edit"></i>
                                                        Chỉnh sửa</button>
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                                        Xóa</button>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                            <div class="address-box">
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jack"
                                                            id="flexRadioDefault1">
                                                    </div>
                                        
                                                    <div class="label">
                                                        <label>Nhà 2</label>
                                                    </div>
                                        
                                                    <div class="table-responsive address-table">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2">Gary M. Bailey</td>
                                                                </tr>
                                        
                                                                <tr>
                                                                    <td>Địa chỉ :</td>
                                                                    <td>
                                                                        <p>2135 Burning Memory Lane Philadelphia, PA
                                                                            19135</p>
                                                                    </td>
                                                                </tr>
                                        
                                                                <tr>
                                                                    <td>Mã bưu điện :</td>
                                                                    <td>+26</td>
                                                                </tr>
                                        
                                                                <tr>
                                                                    <td>Điện thoại :</td>
                                                                    <td>+ 215-335-9916</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                        
                                                <div class="button-group">
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile"><i data-feather="edit"></i>
                                                        Chỉnh sửa</button>
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                                        Xóa</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-card" role="tabpanel">
                                <div class="dashboard-card">
                                    <div class="title title-flex">
                                        <div>
                                            <h2>Chi tiết thẻ của tôi</h2>
                                            <span class="title-leaf">
                                                <svg class="icon-width bg-gray">
                                                    <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf">
                                                    </use>
                                                </svg>
                                            </span>
                                        </div>
                                        

                                        <button class="btn theme-bg-color text-white btn-sm fw-bold mt-lg-0 mt-3"
                                        data-bs-toggle="modal" data-bs-target="#editCard">
                                        <i data-feather="plus" class="me-2"></i> Thêm thẻ mới
                                    </button>
                                    
                                    </div>

                                    <div class="row g-4">
                                        <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                            <div class="payment-card-detail">
                                                <div class="card-details">
                                                    <div class="card-number">
                                                        <h4>XXXX - XXXX - XXXX - 2548</h4>
                                                    </div>
                                            
                                                    <div class="valid-detail">
                                                        <div class="title">
                                                            <span>Hiệu lực</span>
                                                            <span>đến</span>
                                                        </div>
                                                        <div class="date">
                                                            <h3>08/05</h3>
                                                        </div>
                                                        <div class="primary">
                                                            <span class="badge bg-pill badge-light">Chính</span>
                                                        </div>
                                                    </div>
                                            
                                                    <div class="name-detail">
                                                        <div class="name">
                                                            <h5>Audrey Carol</h5>
                                                        </div>
                                                        <div class="card-img">
                                                            <img src="../assets/images/payment-icon/1.jpg"
                                                                class="img-fluid blur-up lazyloaded" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="edit-card">
                                                    <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                        href="javascript:void(0)"><i class="far fa-edit"></i> Chỉnh sửa</a>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#removeProfile"><i
                                                            class="far fa-minus-square"></i> Xóa</a>
                                                </div>
                                            </div>
                                            
                                            <div class="edit-card-mobile">
                                                <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                    href="javascript:void(0)"><i class="far fa-edit"></i> Chỉnh sửa</a>
                                                <a href="javascript:void(0)"><i class="far fa-minus-square"></i> Xóa</a>
                                            </div>
                                            
                                        </div>
                                        <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                            <div class="payment-card-detail">
                                                <div class="card-details card-visa">
                                                    <div class="card-number">
                                                        <h4>XXXX - XXXX - XXXX - 1536</h4>
                                                    </div>
                                        
                                                    <div class="valid-detail">
                                                        <div class="title">
                                                            <span>Hiệu lực</span>
                                                            <span>đến</span>
                                                        </div>
                                                        <div class="date">
                                                            <h3>12/23</h3>
                                                        </div>
                                                        <div class="primary">
                                                            <span class="badge bg-pill badge-light">Chính</span>
                                                        </div>
                                                    </div>
                                        
                                                    <div class="name-detail">
                                                        <div class="name">
                                                            <h5>Leah Heather</h5>
                                                        </div>
                                                        <div class="card-img">
                                                            <img src="../assets/images/payment-icon/2.jpg"
                                                                class="img-fluid blur-up lazyloaded" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                                <div class="edit-card">
                                                    <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                        href="javascript:void(0)"><i class="far fa-edit"></i> Chỉnh sửa</a>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#removeProfile"><i
                                                            class="far fa-minus-square"></i> Xóa</a>
                                                </div>
                                            </div>
                                        
                                            <div class="edit-card-mobile">
                                                <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                    href="javascript:void(0)"><i class="far fa-edit"></i> Chỉnh sửa</a>
                                                <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                    Xóa</a>
                                            </div>
                                        </div>
                                        

                                        <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                            <div class="payment-card-detail">
                                                <div class="card-details debit-card">
                                                    <div class="card-number">
                                                        <h4>XXXX - XXXX - XXXX - 1366</h4>
                                                    </div>
                                        
                                                    <div class="valid-detail">
                                                        <div class="title">
                                                            <span>Hiệu lực</span>
                                                            <span>đến</span>
                                                        </div>
                                                        <div class="date">
                                                            <h3>05/21</h3>
                                                        </div>
                                                        <div class="primary">
                                                            <span class="badge bg-pill badge-light">Chính</span>
                                                        </div>
                                                    </div>
                                        
                                                    <div class="name-detail">
                                                        <div class="name">
                                                            <h5>Mark Jecno</h5>
                                                        </div>
                                                        <div class="card-img">
                                                            <img src="../assets/images/payment-icon/3.jpg"
                                                                class="img-fluid blur-up lazyloaded" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                                <div class="edit-card">
                                                    <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                        href="javascript:void(0)"><i class="far fa-edit"></i> Chỉnh sửa</a>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#removeProfile"><i
                                                            class="far fa-minus-square"></i> Xóa</a>
                                                </div>
                                            </div>
                                        
                                            <div class="edit-card-mobile">
                                                <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                    href="javascript:void(0)"><i class="far fa-edit"></i> Chỉnh sửa</a>
                                                <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                    Xóa</a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-profile" role="tabpanel">
                                <div class="dashboard-profile">
                                    <div class="title">
                                        <h2>Hồ Sơ Của Tôi</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf">
                                                </use>
                                            </svg>
                                        </span>
                                    </div>
                                    

                                    <div class="profile-detail dashboard-bg-box">
                                        <div class="dashboard-title">
                                            <h3>Tên Hồ Sơ</h3>
                                        </div>
                                        <div class="profile-name-detail">
                                            <div class="d-sm-flex align-items-center d-block">
                                                <h3>Vicki E. Pope</h3>
                                                <div class="product-rating profile-rating">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                    
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editProfile">Chỉnh sửa</a>
                                        </div>
                                    
                                        <div class="location-profile">
                                            <ul>
                                                <li>
                                                    <div class="location-box">
                                                        <i data-feather="map-pin"></i>
                                                        <h6>Downers Grove, IL</h6>
                                                    </div>
                                                </li>
                                    
                                                <li>
                                                    <div class="location-box">
                                                        <i data-feather="mail"></i>
                                                        <h6>vicki.pope@gmail.com</h6>
                                                    </div>
                                                </li>
                                    
                                                <li>
                                                    <div class="location-box">
                                                        <i data-feather="check-square"></i>
                                                        <h6>Được cấp phép trong 2 năm</h6>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    
                                        <div class="profile-description">
                                            <p>Các loại hình nhà ở có thể được phân loại dựa trên cách chúng kết nối với các căn hộ và đất lân cận. Các hình thức sở hữu nhà khác nhau có thể được áp dụng cho cùng một loại hình nhà ở.</p>
                                        </div>
                                    </div>
                                    

                                    <div class="profile-about dashboard-bg-box">
                                        <div class="row">
                                            <div class="col-xxl-7">
                                                <div class="dashboard-title mb-3">
                                                    <h3>Giới thiệu Hồ Sơ</h3>
                                                </div>
                                    
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Giới tính:</td>
                                                                <td>Nữ</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ngày sinh:</td>
                                                                <td>21/05/1997</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Số điện thoại:</td>
                                                                <td>
                                                                    <a href="javascript:void(0)">+91 846 - 547 - 210</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Địa chỉ:</td>
                                                                <td>549 Sulphur Springs Road, Downers, IL</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                    
                                                <div class="dashboard-title mb-3">
                                                    <h3>Thông Tin Đăng Nhập</h3>
                                                </div>
                                    
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Email:</td>
                                                                <td>
                                                                    <a href="javascript:void(0)">vicki.pope@gmail.com
                                                                        <span data-bs-toggle="modal" data-bs-target="#editProfile">Chỉnh sửa</span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Mật khẩu:</td>
                                                                <td>
                                                                    <a href="javascript:void(0)">●●●●●●
                                                                        <span data-bs-toggle="modal" data-bs-target="#editProfile">Chỉnh sửa</span></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                    
                                            <div class="col-xxl-5">
                                                <div class="profile-image">
                                                    <img src="../assets/images/inner-page/dashboard-profile.png"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-download" role="tabpanel">
                                <div class="dashboard-download">
                                    <div class="title">
                                        <h2>Tải Xuống Của Tôi</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    

                                    <div class="download-detail dashboard-bg-box">
                                        <form>
                                            <div class="input-group download-form">
                                                <input type="text" class="form-control"
                                                    placeholder="Search your download">
                                                <button class="btn theme-bg-color text-light" type="button"
                                                    id="button-addon2">Tìm kiếm</button>
                                            </div>
                                        </form>

                                        <div class="select-filter-box">
                                            <select class="form-select">
                                                <option selected="">Tất cả chợ trực tuyến</option>
                                                <option value="1">Một</option>
                                                <option value="2">Hai</option>
                                                <option value="3">Ba</option>
                                            </select>
                                        
                                            <ul class="nav nav-pills filter-box" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pills-data-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-data"
                                                        type="button">Dữ liệu đã mua</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-title-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-title" type="button">Tiêu đề</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-rating-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-rating" type="button">Xếp hạng của tôi</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-recent-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-recent" type="button">Cập nhật gần đây</button>
                                                </li>
                                            </ul>
                                        </div>
                                        

                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-data" role="tabpanel">
                                                <div class="download-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Hình ảnh</th>
                                                                    <th>Tên</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/1.png" class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Sheltos - Mẫu Angular 17 cho Bất động sản</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">Tải xuống</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Tất cả tệp & tài liệu</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (văn bản)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/2.png" class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Oslo - Chủ đề Shopify đa năng. Nhanh, sạch sẽ và linh hoạt. OS 2.0</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">Tải xuống</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Tất cả tệp & tài liệu</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (văn bản)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/3.png" class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Boho - Mẫu React JS cho Bảng điều khiển quản trị</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">Tải xuống</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Tất cả tệp & tài liệu</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (văn bản)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-title">
                                                <div class="download-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Hình ảnh</th>
                                                                    <th>Tên</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/1.png" class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Sheltos - Mẫu Angular 17 cho Bất động sản</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">Tải xuống</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Tất cả tệp & tài liệu</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (văn bản)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/2.png" class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Oslo - Chủ đề Shopify đa năng. Nhanh, sạch sẽ và linh hoạt. OS 2.0</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">Tải xuống</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Tất cả tệp & tài liệu</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (văn bản)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/3.png" class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Boho - Mẫu React JS cho Bảng điều khiển quản trị</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">Tải xuống</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Tất cả tệp & tài liệu</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (văn bản)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="tab-pane fade" id="pills-rating">
                                                <div class="download-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Hình ảnh</th>
                                                                    <th>Tên</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/1.png" class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Sheltos - Mẫu Angular 17 cho Bất động sản</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">Tải xuống</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Tất cả tệp & tài liệu</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (văn bản)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/2.png" class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Oslo - Chủ đề Shopify đa năng. Nhanh, sạch sẽ và linh hoạt. OS 2.0</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">Tải xuống</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Tất cả tệp & tài liệu</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (văn bản)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/3.png" class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Boho - Mẫu React JS cho Bảng điều khiển quản trị</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">Tải xuống</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Tất cả tệp & tài liệu</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (văn bản)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="tab-pane fade" id="pills-recent">
                                                <div class="download-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Hình ảnh</th>
                                                                    <th>Tên</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/1.png" class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Sheltos - Mẫu Angular 17 cho Bất động sản</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">Tải xuống</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Tất cả tệp & tài liệu</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (văn bản)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/2.png" class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Oslo - Chủ đề Shopify đa năng. Nhanh, sạch sẽ và linh hoạt. OS 2.0</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">Tải xuống</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Tất cả tệp & tài liệu</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (văn bản)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>
                                                                        <img src="../assets/images/theme-icon/3.png" class="img-fluid" alt="">
                                                                    </td>
                                                                    <td>Boho - Mẫu React JS cho Bảng điều khiển quản trị</td>
                                                                    <td>
                                                                        <div class="dropdown download-dropdown">
                                                                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">Tải xuống</button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Tất cả tệp & tài liệu</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (PDF)</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="dropdown-item" href="#">Chứng nhận giấy phép & mã mua hàng (văn bản)</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-security" role="tabpanel">
                                <div class="dashboard-privacy">
                                    <div class="dashboard-bg-box">
                                        <div class="dashboard-title mb-4">
                                            <h3>Quyền riêng tư</h3>
                                        </div>
                            
                                        <div class="privacy-box">
                                            <div class="d-flex align-items-start">
                                                <h6>Cho phép người khác xem hồ sơ của tôi</h6>
                                                <div class="form-check form-switch switch-radio ms-auto">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="redio">
                                                    <label class="form-check-label" for="redio"></label>
                                                </div>
                                            </div>
                                            <p class="text-content">Tất cả mọi người sẽ có thể xem hồ sơ của tôi</p>
                                        </div>
                            
                                        <div class="privacy-box">
                                            <div class="d-flex align-items-start">
                                                <h6>Chỉ những người đã lưu hồ sơ này mới có thể xem hồ sơ của tôi</h6>
                                                <div class="form-check form-switch switch-radio ms-auto">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="redio2">
                                                    <label class="form-check-label" for="redio2"></label>
                                                </div>
                                            </div>
                                            <p class="text-content">Tất cả mọi người sẽ không thể xem hồ sơ của tôi</p>
                                        </div>
                            
                                        <button class="btn theme-bg-color btn-md fw-bold mt-4 text-white">Lưu thay đổi</button>
                                    </div>
                            
                                    <div class="dashboard-bg-box mt-4">
                                        <div class="dashboard-title mb-4">
                                            <h3>Cài đặt tài khoản</h3>
                                        </div>
                            
                                        <div class="privacy-box">
                                            <div class="d-flex align-items-start">
                                                <h6>Xóa tài khoản của bạn sẽ vĩnh viễn</h6>
                                                <div class="form-check form-switch switch-radio ms-auto">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="redio3">
                                                    <label class="form-check-label" for="redio3"></label>
                                                </div>
                                            </div>
                                            <p class="text-content">Sau khi tài khoản của bạn bị xóa, bạn sẽ bị đăng xuất và không thể đăng nhập lại.</p>
                                        </div>
                            
                                        <div class="privacy-box">
                                            <div class="d-flex align-items-start">
                                                <h6>Xóa tài khoản của bạn sẽ tạm thời</h6>
                                                <div class="form-check form-switch switch-radio ms-auto">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="redio4">
                                                    <label class="form-check-label" for="redio4"></label>
                                                </div>
                                            </div>
                                            <p class="text-content">Sau khi tài khoản của bạn bị xóa, bạn sẽ bị đăng xuất và có thể tạo tài khoản mới.</p>
                                        </div>
                            
                                        <button class="btn theme-bg-color btn-md fw-bold mt-4 text-white">Xóa tài khoản của tôi</button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- User Dashboard Section End -->
@endsection

@section('js')
@endsection
