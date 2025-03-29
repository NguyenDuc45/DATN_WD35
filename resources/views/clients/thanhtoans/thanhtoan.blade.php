@extends('layouts.client')

@section('title')
Thanh toán
@endsection

@section('css')
@endsection

@section('breadcrumb')
<section class="breadcrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-contain">
                    <h2>Thanh toán</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>

                            <li class="breadcrumb-item active">Thanh toán</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- Checkout section Start -->
<section class="checkout-section-2 section-b-space">
    <div class="container-fluid-lg">
        <div class="row g-sm-4 g-3">
            <div class="col-lg-8">
                <div class="left-sidebar-checkout">
                    <div class="checkout-detail-box">
                        <ul>
                            <li>
                                <div class="checkout-icon">
                                    <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ggihhudh.json"
                                        trigger="loop-on-hover"
                                        colors="primary:#121331,secondary:#646e78,tertiary:#0baf9a" class="lord-icon">
                                    </lord-icon>
                                </div>
                                <div class="checkout-box">
                                    <div class="checkout-title">
                                        <h4>Địa chỉ nhận hàng</h4>
                                    </div>

                                    <div class="checkout-detail">
                                        <div class="row g-4">
                                            <div class="col-xxl-6 col-lg-12 col-md-6">
                                                <div class="delivery-address-box">
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="jack" id="flexRadioDefault1">
                                                        </div>

                                                        <div class="label">
                                                            <label>Home</label>
                                                        </div>

                                                        <ul class="delivery-address-detail">
                                                            <li>
                                                                <h4 class="fw-500">Jack Jennas</h4>
                                                            </li>

                                                            <li>
                                                                <p class="text-content"><span class="text-title">Address
                                                                        : </span>8424 James Lane South San
                                                                    Francisco, CA 94080</p>
                                                            </li>

                                                            <li>
                                                                <h6 class="text-content"><span class="text-title">Pin
                                                                        Code
                                                                        :</span> +380</h6>
                                                            </li>

                                                            <li>
                                                                <h6 class="text-content mb-0"><span
                                                                        class="text-title">Phone
                                                                        :</span> + 380 (0564) 53 - 29 - 68</h6>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-6 col-lg-12 col-md-6">
                                                <div class="delivery-address-box">
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="jack" id="flexRadioDefault2" checked="checked">
                                                        </div>

                                                        <div class="label">
                                                            <label>Office</label>
                                                        </div>

                                                        <ul class="delivery-address-detail">
                                                            <li>
                                                                <h4 class="fw-500">Jack Jennas</h4>
                                                            </li>

                                                            <li>
                                                                <p class="text-content"><span class="text-title">Address
                                                                        :</span>Nakhimovskiy R-N / Lastovaya Ul.,
                                                                    bld. 5/A, appt. 12
                                                                </p>
                                                            </li>

                                                            <li>
                                                                <h6 class="text-content"><span class="text-title">Pin
                                                                        Code :</span>
                                                                    +380</h6>
                                                            </li>

                                                            <li>
                                                                <h6 class="text-content mb-0"><span
                                                                        class="text-title">Phone
                                                                        :</span> + 380 (0564) 53 - 29 - 68</h6>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <label for="">Số điện thoại:</label>
                                                    <input class="form-control" type="number" name="sdt_nguoi_nhan" value="{{ Auth::user()->so_dien_thoai ?? '' }}">
                                                </div>
                                                <div class="mt-3">
                                                    <label for="">Địa chỉ:</label>
                                                    <input class="form-control" type="text" name="dia_chi_nguoi_nhan" value="{{ Auth::user()->dia_chi ?? '' }}">
                                                </div>
                                                <div class="mt-3">
                                                    <label for="">Ghi chú:</label>
                                                    <input class="form-control" type="text" name="ghi_chu" value="{{ old('ghi_chu') ?? '' }}">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="checkout-icon">
                                    <lord-icon target=".nav-item" src="https://cdn.lordicon.com/qmcsqnle.json"
                                        trigger="loop-on-hover" colors="primary:#0baf9a,secondary:#0baf9a"
                                        class="lord-icon">
                                    </lord-icon>
                                </div>
                                <div class="checkout-box">
                                    <div class="checkout-title">
                                        <h4>Hình thức thanh toán</h4>
                                    </div>

                                    <div class="checkout-detail">
                                        <div class="accordion accordion-flush custom-accordion"
                                            id="accordionFlushExample">
                                            <div class="accordion-item">
                                                <div class="accordion-header" id="flush-headingFour">
                                                    <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseFour">
                                                        <div class="custom-form-check form-check mb-0">
                                                            <label class="form-check-label" for="cash"><input
                                                                    class="form-check-input mt-0" type="radio"
                                                                    name="flexRadioDefault" id="cash" checked>
                                                                COD</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="flush-collapseFour" class="accordion-collapse collapse show"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <p class="cod-review">
                                                            Thanh toán khi nhận hàng
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="accordion-item">
                                                <div class="accordion-header" id="flush-headingThree">
                                                    <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseThree">
                                                        <div class="custom-form-check form-check mb-0">
                                                            <label class="form-check-label" for="wallet"><input
                                                                    class="form-check-input mt-0" type="radio"
                                                                    name="flexRadioDefault" id="wallet">
                                                                Ví điện tử</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <h5 class="text-uppercase mb-4">Chọn ví
                                                        </h5>
                                                        <div class="row">
                                                        <div class="col-md-6">
                                                                <div class="custom-form-check form-check">
                                                                <form action="{{ url('/momo_payment') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="total_momo" value="{{ $total_after }}">
                                            <button type="submit" class="btn btn-default check_out" name="payUrl">Thanh
                                                toán MOMO</button>
                                        </form>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="custom-form-check form-check">
                                                                    <input class="form-check-input mt-0"
                                                                        type="radio" name="flexRadioDefault"
                                                                        id="gpay">
                                                                    <label class="form-check-label"
                                                                        for="gpay">Google Pay</label>
                                                                </div>
                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="right-side-summery-box">
                    <div class="summery-box-2">
                        <div class="summery-header">
                            <h3>Chi tiết đơn hàng</h3>
                        </div>

                        <ul class="summery-contain">
                            @foreach ($chiTietGioHangs as $chiTietGioHang)
                            <li>
                                <img src="{{ Storage::url($chiTietGioHang->hinh_anh) }}"
                                    class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                <h4>{{ $chiTietGioHang->ten_san_pham }} x
                                    <span class="so-luong">{{ $chiTietGioHang->so_luong }}</span>
                                </h4>
                                <h4 hidden><span class="gia-moi">{{ $chiTietGioHang->gia_moi }}</span>đ</h4>
                                <h4 class="price"><span class="tong"></span>đ</h4>
                            </li>
                            @endforeach
                        </ul>

                        <ul class="summery-total">
                            <li>
                                <h4>Tổng sản phẩm</h4>
                                <h4 class="price"><span id="tong-san-pham"></span>đ</h4>
                            </li>

                            <li>
                                <h4>Phí vận chuyển</h4>
                                <h4 class="price"><span id="phi-van-chuyen">1000</span>đ</h4>
                            </li>

                            <li>
                                <h4>Giảm giá</h4>
                                <h4 class="price">- <span id="giam-gia">0</span>đ</h4>
                            </li>

                            <li class="list-total">
                                <h4>Tổng tiền</h4>
                                <h4 class="price"><span id="tong-tien"></span>đ</h4>
                            </li>
                        </ul>
                    </div>

                    <a href="{{ route('thanhtoans.dathangthanhcong') }}"
                        class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold">Đặt hàng</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Checkout section End -->

<!-- Add address modal box start -->
<div class="modal fade theme-modal" id="add-address" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Add a new address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-floating mb-4 theme-form-floating">
                        <input type="text" class="form-control" id="fname" placeholder="Enter First Name">
                        <label for="fname">First Name</label>
                    </div>
                </form>

                <form>
                    <div class="form-floating mb-4 theme-form-floating">
                        <input type="text" class="form-control" id="lname" placeholder="Enter Last Name">
                        <label for="lname">Last Name</label>
                    </div>
                </form>

                <form>
                    <div class="form-floating mb-4 theme-form-floating">
                        <input type="email" class="form-control" id="email" placeholder="Enter Email Address">
                        <label for="email">Email Address</label>
                    </div>
                </form>

                <form>
                    <div class="form-floating mb-4 theme-form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="address" style="height: 100px"></textarea>
                        <label for="address">Enter Address</label>
                    </div>
                </form>

                <form>
                    <div class="form-floating mb-4 theme-form-floating">
                        <input type="email" class="form-control" id="pin" placeholder="Enter Pin Code">
                        <label for="pin">Pin Code</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-md" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn theme-bg-color btn-md text-white" data-bs-dismiss="modal">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Add address modal box end -->
@endsection

@section('js')
<script>
    function showTong() {
        giaMois = document.getElementsByClassName("gia-moi")
        soLuongs = document.getElementsByClassName("so-luong")
        tongs = document.getElementsByClassName("tong")
        tongSanPham = document.getElementById("tong-san-pham")
        giamGia = document.getElementById("giam-gia")
        phiVanChuyen = document.getElementById("phi-van-chuyen")
        tongTien = document.getElementById("tong-tien")

        sum = 0
        for (let i = 0; i < giaMois.length; i++) {
            tongs[i].innerHTML = Number(giaMois[i].innerHTML) * Number(soLuongs[i].innerHTML)
            sum += Number(tongs[i].innerHTML)
            console.log(i);
            console.log(sum);

        }

        tongSanPham.innerHTML = sum
        tongTien.innerHTML = Number(tongSanPham.innerHTML) - Number(giamGia.innerHTML) + Number(phiVanChuyen.innerHTML)
    }

    showTong()
</script>
@endsection
