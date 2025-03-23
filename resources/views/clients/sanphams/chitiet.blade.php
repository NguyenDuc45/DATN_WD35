@extends('layouts.client')

@section('title')
    Chi tiết sản phẩm
@endsection

@section('css')
    <style>
        .option {
            display: inline-block;
            margin-right: 10px;
        }

        .option-box {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .option-box:hover,
        .option input:checked+.option-box {
            border: 2px solid black;
        }
    </style>
@endsection

@section('breadcrumb')
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Chi tiết sản phẩm</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>

                                <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <!-- Product Start -->
    <section class="product-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
                    <div class="row g-4">
                        <div class="col-xl-6 wow fadeInUp">
                            <div class="product-left-box">
                                <div class="row g-sm-4 g-2">
                                    <div class="col-12">
                                        <div class="product-main no-arrow">
                                            <div>
                                                <div class="slider-image">
                                                    <!-- Hiển thị hình ảnh chính của sản phẩm -->
                                                    <img src="{{ asset('storage/' . $sanPhams->hinh_anh) }}" id="img-1"
                                                        data-zoom-image="{{ asset('storage/' . $sanPhams->hinh_anh) }}"
                                                        class="img-fluid image_zoom_cls-0 blur-up lazyload" alt="">
                                                </div>
                                            </div>

                                            <!-- Hiển thị các hình ảnh phụ -->
                                            @foreach ($anhSPs as $anhSP)
                                                <div>
                                                    <div class="slider-image">
                                                        <img src="{{ asset('storage/' . $anhSP->link_anh_san_pham) }}"
                                                            data-zoom-image="{{ asset('storage/' . $anhSP->link_anh_san_pham) }}"
                                                            class="img-fluid image_zoom_cls-0 blur-up lazyload"
                                                            alt="">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="left-slider-image left-slider no-arrow slick-top">
                                            <!-- Hiển thị hình ảnh chính của sản phẩm trong sidebar -->
                                            <div>
                                                <div class="sidebar-image">
                                                    <img src="{{ asset('storage/' . $sanPhams->hinh_anh) }}"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div>

                                            <!-- Hiển thị các hình ảnh phụ trong sidebar -->
                                            @foreach ($anhSPs as $anhSP)
                                                <div>
                                                    <div class="sidebar-image">
                                                        <img src="{{ asset('storage/' . $anhSP->link_anh_san_pham) }}"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 wow fadeInUp">
                            <!-- Ví dụ trong chitiet.blade.php -->
                            <h2 class="product-name">
                                {{ $sanPhams->ten_san_pham }}
                            </h2>
                            <br>
                            <div class="right-box-contain">
                                <h6 class="offer-top">({{ $phanTramGiamGia }}% off)</h6>
                                <h2 class="name"></h2>
                                <div class="price-rating">
                                    <h3 class="theme-color price">
                                        <?= number_format($sanPhams->gia_moi, 0, ',', '.') ?>₫ <br><del
                                            class="text-content">
                                            <?= number_format($sanPhams->gia_cu, 0, ',', '.') ?>₫</del>
                                </div>

                                <div class="product-contain">
                                    <p class="w-100"></p>
                                </div>

                                <div class="product-package">
                                    <div class="mb-3">
                                        <strong>MÀU:</strong>
                                        <span id="selected-color">Chưa chọn</span>
                                    </div>
                                    <div class="d-flex">
                                        @foreach ($sanPhams->bienThes->where('thuoc_tinh_id', 2) as $bienThe)
                                            @php
                                                $mauSac = optional($bienThe->giaTriThuocTinh)->gia_tri;
                                            @endphp
                                            @if ($mauSac)
                                                <label class="option color-option" style="cursor: pointer;">
                                                    <input type="radio" name="color" class="d-none variant-selector"
                                                        value="{{ $bienThe->id }}" data-price="{{ $bienThe->gia_ban }}"
                                                        data-quantity="{{ $bienThe->so_luong }}"
                                                        data-name="{{ strtoupper($mauSac) }}">

                                                    <span class="option-box"
                                                        style="background-color: {{ $mauSac }};"></span>
                                                </label>
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class="mb-3">
                                        <strong>SIZE:</strong>
                                    </div>
                                    <div class="d-flex">
                                        @foreach ($sanPhams->bienThes->where('thuoc_tinh_id', 1) as $bienThe)
                                            @php
                                                $size = optional($bienThe->giaTriThuocTinh)->gia_tri;
                                            @endphp
                                            @if ($size)
                                                <label class="option size-option" style="cursor: pointer;">
                                                    <input type="radio" name="size" class="d-none variant-selector"
                                                        value="{{ $bienThe->id }}" data-price="{{ $bienThe->gia_ban }}"
                                                        data-name="{{ strtoupper($size) }}">
                                                    <span class="option-box">{{ $size }}</span>
                                                </label>
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class="mt-3">
                                        <strong>GIÁ:</strong> 
                                        <span id="product-price">{{ number_format(0, 0, ',', '.') }}</span> ₫
                                    </div>
                                    <div class="mt-2">
                                        <strong>SỐ LƯỢNG:</strong> <span id="product-quantity">0</span>
                                    </div>






                                </div>

                                <div class="time deal-timer product-deal-timer mx-md-0 mx-auto" id="clockdiv-1"
                                    data-hours="1" data-minutes="2" data-seconds="3">
                                    <div class="product-title">
                                        <h4>Khuyến mãi kết thúc sau</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="counter d-block">
                                                <div class="days d-block">
                                                    <h5></h5>
                                                </div>
                                                <h6>Days</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter d-block">
                                                <div class="hours d-block">
                                                    <h5></h5>
                                                </div>
                                                <h6>Hours</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter d-block">
                                                <div class="minutes d-block">
                                                    <h5></h5>
                                                </div>
                                                <h6>Min</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter d-block">
                                                <div class="seconds d-block">
                                                    <h5></h5>
                                                </div>
                                                <h6>Sec</h6>
                                            </div>
                                        </li>
                                    </ul>
                                </div>



                                <div class="note-box product-package">
                                    <div class="cart_qty qty-box product-qty">
                                        <div class="input-group">
                                            <button type="button" class="qty-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text"
                                                name="quantity" value="1">
                                            <button type="button" class="qty-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <button onclick="location.href = 'cart.html';"
                                        class="btn btn-md bg-dark cart-button text-white w-100">Thêm vào giỏ hàng</button>
                                </div>

                                <div class="buy-box">
                                    <a href="wishlist.html">
                                        <i data-feather="heart"></i>
                                        <span>
                                            Thêm vào danh sách yêu thích</span>
                                    </a>

                                    {{-- <a href="compare.html">
                                        <i data-feather="shuffle"></i>
                                        <span>Add To Compare</span>
                                    </a> --}}

                                </div>

                                <div class="pickup-box">
                                    {{-- <div class="product-title">
                                        <h4>Mô tả</h4>
                                    </div>

                                    <div class="pickup-detail">
                                        <h4 class="text-content w-100">{!! $sanPhams->mo_ta !!}</h4>
                                    </div> --}}

                                    <div class="product-info">
                                        <ul class="product-info-list product-info-list-2">
                                            <li>Danh mục :
                                                <a href="javascript:void(0)">
                                                    {{ $sanPhams->danhMuc->ten_danh_muc ?? 'Không có danh mục' }}
                                                </a>
                                            </li>

                                            <li>Ngày thêm :
                                                <a href="javascript:void(0)">
                                                    {{ $sanPhams->created_at->format('d/m/Y') }}
                                                </a>
                                            </li>


                                            </a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>

                                <div class="payment-option">
                                    <div class="product-title">
                                        <h4>Phương thức thanh toán</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/1.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/2.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/3.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/4.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/5.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block wow fadeInUp">
                    <div class="right-sidebar-box">
                        <div class="vendor-box">
                            <div class="vendor-contain">




                                <div class="vendor-list">
                                    <ul>
                                        <li>
                                            <div class="address-contact">
                                                <i data-feather="headphones"></i>
                                                <h5>Liên hệ: <span class="text-content">0387660612
                                                    </span></h5>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="address-contact">
                                                <i data-feather="map-pin"></i>
                                                <h5>Địa chỉ: </h5>
                                            </div> <br>
                                            <div
                                                style="width: 100%; max-width: 600px; height: 400px; margin: 0 auto; overflow: hidden; border: 1px solid #ccc;">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.863806021129!2d105.74468151095591!3d21.038134787375412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1sen!2sus!4v1742563208168!5m2!1sen!2sus"
                                                    width="100%" height="100%" style="border:0;" allowfullscreen=""
                                                    loading="lazy">
                                                </iframe>
                                            </div>
                                        </li>


                                    </ul>
                                </div>
                            </div>

                            <div class="pt-25">
                                <div class="hot-line-number">
                                    <h5>Thời gian làm việc:</h5>
                                    <h6>Thứ Hai - Thứ Sáu: 7:00 sáng - 8:30 tối
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Product End -->

    <!-- Related Product Section Start -->

    <!-- Related Product Section End -->

    <!-- Nav Tab Section Start -->
    <section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="product-section-box m-0">
                        <div class="accordion accordion-box" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse1">Mô tả</button>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="product-description">
                                            <div class="nav-desh">
                                                {!! $sanPhams->mo_ta !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                         
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse4">Đánh giá</button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="review-box">
                                            <div class="row">
                                                <div class="col-xl-5">
                                                    <div class="product-rating-box">
                                                        <div class="row">
                                                            @php
                                                                $tongDanhGia = $sanPhams->danhGias->count(); // Tổng lượt đánh giá
                                                                $trungBinhDanhGia =
                                                                    $tongDanhGia > 0
                                                                        ? round($sanPhams->danhGias->avg('so_sao'), 1)
                                                                        : 0; // Làm tròn 1 chữ số thập phân
                                                            @endphp

                                                            <div class="product-main-rating">
                                                                <h2>({{ $trungBinhDanhGia }} / 5)</h2>
                                                                <h5>{{ $tongDanhGia }} lượt đánh giá</h5>
                                                            </div>


                                                            @php
                                                                $tongDanhGia = $sanPhams->danhGias->count(); // Tổng lượt đánh giá
                                                                $soSao = [5, 4, 3, 2, 1]; // Các mức sao từ 5 đến 1
                                                                $danhGiaSao = [];

                                                                foreach ($soSao as $sao) {
                                                                    $danhGiaSao[$sao] = $sanPhams->danhGias
                                                                        ->where('so_sao', $sao)
                                                                        ->count();
                                                                }
                                                            @endphp

                                                            <div class="col-xl-12">
                                                                <ul class="product-rating-list">
                                                                    @foreach ($soSao as $sao)
                                                                        @php
                                                                            $soLuong = $danhGiaSao[$sao] ?? 0;
                                                                            $tiLe =
                                                                                $tongDanhGia > 0
                                                                                    ? round(
                                                                                        ($soLuong / $tongDanhGia) * 100,
                                                                                        1,
                                                                                    )
                                                                                    : 0;
                                                                        @endphp
                                                                        <li>
                                                                            <div class="rating-product">
                                                                                <h5>{{ $sao }}<i
                                                                                        data-feather="star"></i></h5>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar"
                                                                                        style="width: {{ $tiLe }}%;">
                                                                                    </div>
                                                                                </div>
                                                                                <h5 class="total">{{ $soLuong }}
                                                                                </h5>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>

                                                                <div class="review-title-2">
                                                                    <h4 class="fw-bold">Đánh giá sản phẩm này</h4>
                                                                    <p>Hãy cho chúng tôi biết đánh giá của bạn</p>
                                                                    <button class="btn" type="button"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#writereview">Viết đánh
                                                                        giá</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-7">
                                                    <div class="review-people">
                                                        <ul class="review-list">
                                                            @if ($sanPhams->danhGias->count() > 0)
                                                                @foreach ($sanPhams->danhGias->sortByDesc('created_at') as $danhGia)
                                                                    <li>
                                                                        <div class="people-box">
                                                                            <div>
                                                                                <div class="people-image people-text">
                                                                                    <img alt="user" class="img-fluid"
                                                                                        src="{{ $danhGia->nguoiDung->anh_dai_dien ?? asset('default-avatar.jpg') }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="people-comment">
                                                                                <div class="people-name">
                                                                                    <a href="javascript:void(0)"
                                                                                        class="name">{{ $danhGia->nguoiDung->ten_nguoi_dung }}</a>
                                                                                    <div class="date-time">
                                                                                        <h6 class="text-content">
                                                                                            {{ \Carbon\Carbon::parse($danhGia->created_at)->format('d/m/Y H:i') }}
                                                                                        </h6>
                                                                                        <div class="product-rating">
                                                                                            <ul class="rating">
                                                                                                @for ($i = 1; $i <= 5; $i++)
                                                                                                    <li>
                                                                                                        <i data-feather="star"
                                                                                                            class="{{ $i <= $danhGia->so_sao ? 'fill' : '' }}"></i>
                                                                                                    </li>
                                                                                                @endfor
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="reply">
                                                                                    <p>{{ $danhGia->nhan_xet }}</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            @else
                                                                <p style="color: red">Chưa có đánh giá nào.</p>
                                                            @endif




                                                        </ul>
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
            </div>
        </div>
    </section>
    <!-- Nav Tab Section End -->

    <!-- Related Product Section Start -->
    <section class="product-list-section section-b-space">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Sản phẩm liên quan</h2>
                <span class="title-leaf">
                    <svg class="icon-width">
                        <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-6_1 product-wrapper">
                        <div>
                            <div class="product-box-3 wow fadeInUp">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="product-left-2.html">
                                            <img src="../assets/images/cake/product/11.png"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>

                                        <ul class="product-option">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="product-footer">
                                    <div class="product-detail">
                                        <span class="span-name">Cake</span>
                                        <a href="product-left-thumbnail.html">
                                            <h5 class="name">Chocolate Chip Cookies 250 g</h5>
                                        </a>
                                        <div class="product-rating mt-2">
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
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                            </ul>
                                            <span>(5.0)</span>
                                        </div>
                                        <h6 class="unit">500 G</h6>
                                        <h5 class="price"><span class="theme-color">$10.25</span> <del>$12.57</del>
                                        </h5>
                                        <div class="add-to-cart-box bg-white">
                                            <button class="btn btn-add-cart addcart-button">Add
                                                <span class="add-icon bg-light-gray">
                                                    <i class="fa-solid fa-plus"></i>
                                                </span>
                                            </button>
                                            <div class="cart_qty qty-box">
                                                <div class="input-group bg-white">
                                                    <button type="button" class="qty-left-minus bg-gray"
                                                        data-type="minus" data-field="">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                    <input class="form-control input-number qty-input" type="text"
                                                        name="quantity" value="0">
                                                    <button type="button" class="qty-right-plus bg-gray"
                                                        data-type="plus" data-field="">
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
        </div>
    </section>
    <!-- Related Product Section End -->

    <!-- Review Modal Start -->
    <div class="modal fade theme-modal question-modal" id="writereview" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Viết đánh giá</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <form class="product-review-form">
                        <div class="product-wrapper">
                            <div class="product-image">
                                <img class="img-fluid" alt="{{ $sanPhams->ten_san_pham }}"
                                    src="{{ asset($sanPhams->hinh_anh ?? 'default-product.jpg') }}">
                            </div>
                            <div class="product-content">
                                <h5 class="name">{{ $sanPhams->ten_san_pham }}</h5>
                                <div class="product-review-rating">
                                    <div class="product-rating">
                                        <h6 class="price-number">{{ number_format($sanPhams->gia_moi, 0, ',', '.') }} đ</h6>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="review-box">
                            <div class="product-review-rating">
                                <label></label>
                                <div class="product-rating">
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
                        </div>
                        <div class="review-box">
                            <label for="content" class="form-label">Câu trả lời của bạn *</label>
                            <textarea id="content" rows="3" class="form-control" placeholder="Câu trả lời của bạn"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-md btn-theme-outline fw-bold"
                        data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-md fw-bold text-light theme-bg-color">Gửi</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Review Modal End -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Khởi tạo tính năng zoom cho ảnh chính  
            const mainImage = $('#img-1');
            if (mainImage.length) {
                mainImage.elevateZoom({
                    zoomType: "inner",
                    cursor: "crosshair",
                    scrollZoom: true,
                    responsive: true,
                    zoomWindowWidth: 400,
                    zoomWindowHeight: 400,
                });
            }

            // Khởi tạo tính năng zoom cho các ảnh phụ khi di chuyển chuột  
            $('.slider-image img').not('#img-1').each(function() {
                $(this).hover(function() {
                    $(this).elevateZoom({
                        zoomType: "inner",
                        cursor: "crosshair",
                        scrollZoom: true,
                        responsive: true,
                        zoomWindowWidth: 400,
                        zoomWindowHeight: 400,
                    });
                }, function() {
                    // Khi chuột rời đi, hủy zoom để giải phóng bộ nhớ  
                    $.fn.elevateZoom.destroy();
                });
            });
            $(document).on('mousewheel DOMMouseScroll', function(e) {
                var zoomWindow = $('.zoomWindow');
                if (zoomWindow.is(':visible')) {
                    e.preventDefault(); // Ngăn chặn sự kiện mặc định  
                    var delta = (e.originalEvent.wheelDelta || -e.originalEvent.detail);
                    window.scrollBy(0, delta > 0 ? -30 : 30); // Cuộn lên hoặc cuộn xuống  
                }
            });
        });





        document.querySelectorAll('.variant-selector').forEach(input => {
            input.addEventListener('change', function() {
                let price = this.getAttribute('data-price'); // Lấy giá
                let quantity = this.getAttribute('data-quantity'); // Lấy số lượng (bổ sung vào input)

                // Hiển thị giá với format VNĐ
                document.getElementById('product-price').innerText = new Intl.NumberFormat('vi-VN').format(
                    price) + ' VNĐ';

                // Hiển thị số lượng
                document.getElementById('product-quantity').innerText = quantity;
            });
        });
    </script>
@endsection
