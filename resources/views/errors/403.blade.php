@extends('layouts.none')

@section('css')

@endsection

@section('content')
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Feb 2025 14:00:54 GMT -->


<body>

    <!-- Header Start -->
    <!-- Header End -->

    <!-- mobile fix menu start -->
    <div class="mobile-menu d-md-none d-block mobile-cart">
        <ul>
            <li class="active">
                <a href="index.html">
                    <i class="iconly-Home icli"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="mobile-category">
                <a href="javascript:void(0)">
                    <i class="iconly-Category icli js-link"></i>
                    <span>Category</span>
                </a>
            </li>

            <li>
                <a href="search.html" class="search-box">
                    <i class="iconly-Search icli"></i>
                    <span>Search</span>
                </a>
            </li>

            <li>
                <a href="wishlist.html" class="notifi-wishlist">
                    <i class="iconly-Heart icli"></i>
                    <span>My Wish</span>
                </a>
            </li>

            <li>
                <a href="cart.html">
                    <i class="iconly-Bag-2 icli fly-cate"></i>
                    <span>Cart</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- mobile fix menu end -->

    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <center>
                        <div class="breadcrumb-contain">
                            <h2>403 Page</h2>
                            <nav>
                            </nav>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- 404 Section Start -->
    <section class="section-404 section-lg-space">
        <div class="container-fluid-lg">
            <div class="row">
                <center>
                    <div style="margin: auto" class="col-12">
                        <div class="image-404">
                            <img style="height: 500px; width: 100%; border-radius:24px" src="{{ asset('/assets/images/inner-page/403.webp') }}" class="img-fluid blur-up lazyload" alt="">
                        </div>
                    </div>
                </center>

                <div class="col-12">
                    <div class="contain-404">
                            <button id="back-btn" data-previous-url="{{ $previousUrl }}"
                            class="btn btn-md text-white theme-bg-color mt-4 mx-auto">Trở lại trang trước đó</button>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 404 Section End -->



    <!-- Location Modal Start -->

    <!-- Location Modal End -->

    <!-- Deal Box Modal Start -->

    <!-- Tap to top and theme setting button end -->

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->

    <!-- latest jquery-->

</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Feb 2025 14:00:54 GMT -->
</html>
@endsection
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
@section('js')
@endsection
<script>
    $(document).ready(function() {
        document.getElementById('back-btn').addEventListener('click', function() {
            let previousUrl = this.getAttribute('data-previous-url');
            window.location.href = previousUrl || '{{ route("home") }}'; // Mặc định về home nếu không có
        });
    });
</script>
