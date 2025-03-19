@extends('layouts.client')

@section('title')
    Sản phẩm yêu thích
@endsection

@section('css')
@endsection

@section('breadcrumb')
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Sản phẩm yêu thích</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>

                                <li class="breadcrumb-item active">Sản phẩm yêu thích</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <!-- Wishlist Section Start -->
    <section class="wishlist-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-3 g-2">
                @if (isset($user))
                @foreach ($user->sanPhamYeuThichs as $item)
                <div class="col-xxl-2 col-lg-3 col-md-4 col-6 product-box-contain">
                    <div class="product-box-3 h-100">
                        <div class="product-header">
                            <div class="product-image">
                                <a href="{{ route('sanphams.chitiet',$item->id) }}">
                                    <img src="{{ Storage::url($item->hinh_anh) }}"
                                        class="img-fluid blur-up lazyload" alt="">
                                </a>

                                <div class="product-header-top">
                                    <button style="border: none" class="wishlist-button" data-id="{{ $item->id }}">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="product-footer">
                            <div class="product-detail">
                                <span class="span-name">{{ $item->danhMuc->ten_danh_muc }}</span>
                                <a href="{{ route('sanphams.chitiet',$item->id) }}">
                                    <h5 class="name">{{ $item->ten_san_pham }}</h5>
                                </a>
                                {{-- <h6 class="unit mt-1">{{ number_format($item->gia_cu,0,'.') }}</h6> --}}
                                <h5 class="price">
                                    <span class="theme-color">{{ number_format($item->gia_moi,0,'.') }} đ</span>
                                    <del>{{ number_format($item->gia_cu,0,'.') }} đ</del>
                                </h5>

                                <div class="add-to-cart-box bg-white mt-2">
                                    <button style="float: right; color: #0da487" class="btn">Add
                                    </button>
                                    <div class="cart_qty qty-box">
                                        <div class="input-group bg-white">
                                            <button type="button" class="qty-left-minus bg-gray" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text"
                                                name="quantity" value="0">
                                            <button type="button" class="qty-right-plus bg-gray" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif



            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.wishlist-button', function () {
            var sanPhamId = $(this).data('id');
            var button = $(this);

            $.ajax({
                url: '/xoa-yeu-thich/' + sanPhamId,
                type: 'DELETE',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                success: function (response) {
                    if (response.success) {
                        button.closest('.product-header').parent().remove();
                    }
                },
                error: function () {
                    alert('Lỗi kết nối, vui lòng thử lại!');
                }
            });
        });
    });
    </script>
