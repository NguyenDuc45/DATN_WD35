<style>
.option {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: 2px solid #ddd;
    color: #333;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    margin: 5px;
    transition: all 0.3s ease-in-out;
}

.option:hover {
    border-color: #0da487;
}

.option.selected {
    background-color: #0da487;
    color: white;
    border-color: #0da487;
}
</style>
<!-- Quick View Modal Box Start -->
<div class="modal fade theme-modal view-modal" id="view" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
        {{-- core-quickView --}}
        <div class="modal-content">
            <div class="modal-header p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row g-sm-4 g-2">
                    <div class="col-lg-6">
                        <div class="slider-image">
                            <img src="" class="img-fluid blur-up lazyload"
                                alt="">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="right-sidebar-modal">
                            <h4 class="title-name"></h4>
                            <div style="display: flex">
                                <h4 class="gia_moi" style="color: #0da487"></h4>
                                <del class="gia_cu" style="margin-left: 20px"></del>
                            </div>
                            <div class="product-rating">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class=""></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class=""></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class=""></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class=""></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class=""></i>
                                    </li>
                                </ul>
                                <span class="danh_gia ms-2">8 Reviews</span>
                            </div>

                            <div class="product-detail">
                                <h4>Mô tả</h4>
                                <p class="mo_ta"></p>
                            </div>

                            <ul class="brand-list">
                                <li>
                                    <div class="brand-box">
                                        <h5>Danh mục:</h5>
                                        <h6 class="danh_muc"></h6>
                                    </div>
                                </li>
                            </ul>

                            <div class="variant-section"></div>

                            <div class="modal-button">
                                <button onclick="location.href = 'cart.html';"
                                    class="btn btn-md add-cart-button icon">Add
                                    To Cart</button>
                                <button onclick="location.href = 'product-left.html';"
                                    class="btn theme-bg-color view-button icon text-white fw-bold btn-md">
                                    View More Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick View Modal Box End -->

<!-- Cookie Bar Box Start -->
{{-- <div class="cookie-bar-box">
    <div class="cookie-box">
        <div class="cookie-image">
            <img src="../assets/client/images/cookie-bar.png" class="blur-up lazyload" alt="">
            <h2>Cookies!</h2>
        </div>

        <div class="cookie-contain">
            <h5 class="text-content">We use cookies to make your experience better</h5>
        </div>
    </div>

    <div class="button-group">
        <button class="btn privacy-button">Privacy Policy</button>
        <button class="btn ok-button">OK</button>
    </div>
</div> --}}
<!-- Cookie Bar Box End -->

<!-- Deal Box Modal Start -->
<div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title w-100" id="deal_today">Deal Today</h5>
                    <p class="mt-1 text-content">Recommended deals for you.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="deal-offer-box">
                    <ul class="deal-offer-list">
                        <li class="list-1">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="../assets/client/images/vegetable/product/10.png" class="blur-up lazyload"
                                        alt="">
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-2">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="../assets/client/images/vegetable/product/11.png" class="blur-up lazyload"
                                        alt="">
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-3">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="../assets/client/images/vegetable/product/12.png"
                                        class="blur-up lazyload" alt="">
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-1">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="../assets/client/images/vegetable/product/13.png"
                                        class="blur-up lazyload" alt="">
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Deal Box Modal End -->

<!-- Tap to top button start -->
<div class="theme-option">
    <div class="back-to-top">
        <a id="back-to-top" href="#">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
</div>
<!-- Tap to top button end -->

<!-- Add address modal box start -->
<div class="modal fade theme-modal" id="add-address" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add a new address</h5>
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

<!-- Edit Profile Start -->
@if (isset($user))
<form id="myForm" action="{{ route('users.update',$user->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade theme-modal" id="editProfile" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Chỉnh sửa thông tin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-xxl-12">

                                <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control @error('ten_nguoi_dung') is-invalid @enderror" name="ten_nguoi_dung"
                                    id="pname" value="{{ $user->ten_nguoi_dung ?? '' }}">
                                    <label for="pname">Họ và tên</label>
                                </div>
                                @error('ten_nguoi_dung')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                        </div>

                        <div class="col-xxl-6">

                                <div class="form-floating theme-form-floating">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email1" name="email"
                                        value="{{ $user->email ?? ''}}">
                                    <label for="email1">Địa chỉ email</label>
                                </div>
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                        </div>

                        <div class="col-xxl-6">

                                <div class="form-floating theme-form-floating">
                                    <input class="form-control @error('so_dien_thoai') is-invalid @enderror" type="tel" value="{{ $user->so_dien_thoai ?? ''}}"
                                     name="so_dien_thoai" id="mobile" maxlength="10"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value =
                                            this.value.slice(0, this.maxLength);">
                                    <label for="mobile">Số điện thoại</label>
                                </div>
                                @error('so_dien_thoai')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                        </div>

                        <div class="col-12">

                                <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control @error('dia_chi') is-invalid @enderror" id="address1"
                                        name="dia_chi" value="{{ $user->dia_chi ?? ''}}">
                                    <label for="address1">Địa chỉ</label>
                                </div>
                                @error('dia_chi')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

                        </div>

                        {{-- <div class="col-12">

                                <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control" id="address2" value="CA 94080">
                                    <label for="address2">Add Address 2</label>
                                </div>

                        </div> --}}
                        @if (isset($user))
                        <div class="col-xxl-4">

                                <div class="form-floating theme-form-floating">
                                    <select class="form-select" id="floatingSelect" name="gioi_tinh">
                                        <option selected>Chọn Giới tính</option>
                                        <option {{ ($user->gioi_tinh == 1 ? 'selected' : '') }} value="1">Nam</option>
                                        <option {{ ($user->gioi_tinh == 0 ? 'selected' : '') }} value="0">Nữ</option>
                                    </select>
                                    <label for="floatingSelect">Giới tính</label>
                                </div>

                        </div>
                        @endif

                        <div class="col-xxl-4">
                                <div class="form-floating theme-form-floating">
                                    <input type="date" class="form-control @error('ngay_sinh') is-invalid @enderror" id="address3"
                                    value="{{ $user->ngay_sinh }}" name="ngay_sinh">
                                    <label for="address3">Ngày sinh</label>
                                </div>
                                @error('ngay_sinh')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="col-xxl-4">
                                <div class="form-floating theme-form-floating">
                                    <input type="file" class="form-control @error('anh_dai_dien') is-invalid @enderror"
                                    id="address3" name="anh_dai_dien">
                                    <label for="address3">Ảnh đại diện</label>
                                </div>
                                @error('anh_dai_dien')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-animation btn-md fw-bold"
                        data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn theme-bg-color btn-md fw-bold text-light">Lưu thay đổi</button>

                </div>
            </div>
        </div>
    </div>
</form>

@endif

<!-- Edit Profile End -->

<!-- Edit Card Start -->
<div class="modal fade theme-modal" id="editCard" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel8">Edit Card</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row g-4">
                    <div class="col-xxl-6">
                        <form>
                            <div class="form-floating theme-form-floating">
                                <input type="text" class="form-control" id="finame" value="Mark">
                                <label for="finame">First Name</label>
                            </div>
                        </form>
                    </div>

                    <div class="col-xxl-6">
                        <form>
                            <div class="form-floating theme-form-floating">
                                <input type="text" class="form-control" id="laname" value="Jecno">
                                <label for="laname">Last Name</label>
                            </div>
                        </form>
                    </div>

                    <div class="col-xxl-4">
                        <form>
                            <div class="form-floating theme-form-floating">
                                <select class="form-select" id="floatingSelect12">
                                    <option selected>Card Type</option>
                                    <option value="kingdom">Visa Card</option>
                                    <option value="states">MasterCard Card</option>
                                    <option value="fra">RuPay Card</option>
                                    <option value="china">Contactless Card</option>
                                    <option value="spain">Maestro Card</option>
                                </select>
                                <label for="floatingSelect12">Card Type</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-animation btn-md fw-bold"
                    data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn theme-bg-color btn-md fw-bold text-light">Update Card</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Card End -->

<!-- Remove Profile Modal Start -->
<div class="modal fade theme-modal remove-profile" id="removeProfile" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header d-block text-center">
                <h5 class="modal-title w-100" id="exampleModalLabel22">Are You Sure ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="remove-box">
                    <p>The permission for the use/group, preview is inherited from the object, object will create a
                        new permission for this object</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn theme-bg-color btn-md fw-bold text-light"
                    data-bs-target="#removeAddress" data-bs-toggle="modal">Yes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade theme-modal remove-profile" id="removeAddress" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel12">Done!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="remove-box text-center">
                    <h4 class="text-content">It's Removed.</h4>
                </div>
            </div>
            <div class="modal-footer pt-0">
                <button type="button" class="btn theme-bg-color btn-md fw-bold text-light"
                    data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    $("#myForm").submit(function(e) {
        e.preventDefault(); // Ngăn reload trang

        let formData = new FormData(this);
        formData.append("_method", "PUT"); // Laravel yêu cầu thêm _method=PUT khi gửi bằng POST

        $.ajax({
            url: $(this).attr("action"),
            type: "POST", // Laravel không hỗ trợ AJAX PUT, phải dùng POST
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $(".text-danger").remove(); // Xóa lỗi cũ
                $("#editProfile").modal("hide"); // Đóng modal
                location.reload(); // Tải lại trang để thấy cập nhật mới
            },
            error: function(xhr) {
                $(".text-danger").remove(); // Xóa lỗi cũ

                let errors = xhr.responseJSON.errors;
                if (errors) {
                    $.each(errors, function(field, messages) {
                        let input = $(`[name="${field}"]`);
                        let errorHtml = `<p class="text-danger">${messages[0]}</p>`;

                        input.after(errorHtml); // Hiển thị lỗi dưới input
                    });
                }
            }
        });
    });
});

</script>
<script>
    $(document).ready(function () {
        $(".variant").click(function () {
            $(".variant").removeClass("selected"); // Bỏ chọn tất cả
            $(this).addClass("selected"); // Chọn biến thể hiện tại
            console.log("Size được chọn:", $(this).data("size")); // In ra console
        });
    });
</script>
<script>
$(document).ready(function () {
    let selectedAttributes = {};
    let bienTheList = []; // Lưu danh sách biến thể để sử dụng lại

    $(".btn-quick-view").click(function () {
        let productId = $(this).data("id");

        $.ajax({
            url: 'http://127.0.0.1:8000/quick-view?id=' + productId,
            method: 'GET',
            success: function (response) {
                // Lưu biến thể vào biến toàn cục
                bienTheList = response.bien_the;

                // Cập nhật thông tin chung
                $('#view .title-name').text(response.ten_san_pham);
                $('#view .slider-image img').attr('src', response.hinh_anh);
                $('#view .danh_muc').text(response.danh_muc);
                $('#view .mo_ta').text(response.mo_ta);
                $('#view .danh_gia').text(response.danh_gia + ' lượt đánh giá');
                $('#view .gia_moi').text(response.gia_moi + ' đ');
                $('#view .gia_cu').text(response.gia_cu + ' đ');
                let so_sao = response.so_sao;
                $('#view .rating li svg').css({
                    'fill': 'none',
                    'stroke': '#ffc107'
                });

                $('#view .rating li').each(function (index) {
                    if (index < so_sao) {
                        $(this).find('svg').css({
                            'fill': '#ffc107',
                            'stroke': '#ffc107'
                        });
                    }
                });


                // Gom nhóm thuộc tính từ biến thể
                let thuocTinhMap = {};
                response.bien_the.forEach(bienThe => {
                    bienThe.thuoc_tinh_gia_tri.forEach(thuocTinh => {
                        if (!thuocTinhMap[thuocTinh.ten]) {
                            thuocTinhMap[thuocTinh.ten] = new Set();
                        }
                        thuocTinhMap[thuocTinh.ten].add(thuocTinh.gia_tri);
                    });
                });

                // Hiển thị danh sách thuộc tính
                let thuocTinhHtml = "";
                Object.keys(thuocTinhMap).forEach(tenThuocTinh => {
                    thuocTinhHtml += `<h3>${tenThuocTinh}</h3>`;
                    thuocTinhHtml += `<div id="thuoc_tinh_${tenThuocTinh.replace(/\s+/g, '_')}" class="thuoc-tinh-group">`;
                    thuocTinhMap[tenThuocTinh].forEach(giaTri => {
                        thuocTinhHtml += `
                            <span class="option" data-thuoc-tinh="${tenThuocTinh}" data-gia-tri="${giaTri}">
                                ${giaTri}
                            </span>
                        `;
                    });
                    thuocTinhHtml += `</div>`;
                });

                $('.variant-section').html(thuocTinhHtml);
            },
            error: function () {
                alert('Không tìm thấy sản phẩm!');
            }
        });
    });

    // Xử lý chọn thuộc tính
    $(document).on("click", ".option", function() {
        let thuocTinh = $(this).data("thuoc-tinh");
        let giaTri = $(this).data("gia-tri");

        // Cập nhật giá trị thuộc tính đã chọn
        selectedAttributes[thuocTinh] = giaTri;

        // Bỏ chọn tất cả option cùng nhóm
        $(`.option[data-thuoc-tinh='${thuocTinh}']`).removeClass("selected");
        $(this).addClass("selected");

        // Kiểm tra và cập nhật ảnh biến thể
        updateVariantImage();
    });

    function updateVariantImage() {
        let matchedVariant = null;

        bienTheList.forEach(variant => {
            let isMatch = true;

            variant.thuoc_tinh_gia_tri.forEach(attr => {
                if (selectedAttributes[attr.ten] !== attr.gia_tri) {
                    isMatch = false;
                }
            });

            if (isMatch) {
                matchedVariant = variant;
            }
        });

        if (matchedVariant) {
            $("#view .slider-image img").attr("src", matchedVariant.anh_bien_the);
        } else {
            $("#view .slider-image img").attr("src", "/storage/uploads/sanphams/default.png");
        }
    }
});

</script>
