<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fastkart">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-logged-in" content="{{ Auth::check() ? 'true' : 'false' }}">

    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/iconly@latest/css/iconly.css">

    <!-- Google font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap">

    <!-- Bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{ asset('assets/client/css/vendors/bootstrap.css') }}">

    <!-- Wow css -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/animate.min.css') }}">

    <!-- Iconly css -->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/css/bulk-style.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/css/vendors/animate.css') }}">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('assets/client/css/style.css') }}">

    <!-- Pusher -->
    <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>

    @yield('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/iconly@1.0.0/css/iconly.min.css">

    <style>
        .swal-custom-popup {
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .swal-custom-title {
            font-size: 20px;
            font-weight: bold;
            color: #e74c3c;
        }

        .swal-custom-confirm {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 6px;
        }

        .swal-custom-cancel {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 6px;
        }
    </style>
</head>

<body class="bg-effect">
    <!-- Loader Start -->
    <div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!-- Loader End -->

    <!-- Header Start -->
    @include('clients.blocks.header')
    <!-- Header End -->

    @yield('breadcrumb')

    @yield('content')

    <!-- Footer Section Start -->
    @include('clients.blocks.footer')
    <!-- Footer Section End -->

    @include('clients.blocks.extra')

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->

    <!-- Latest jQuery -->
    <script src="{{ asset('assets/client/js/jquery-3.6.0.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('assets/client/js/jquery-ui.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/client/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/bootstrap/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/bootstrap/popper.min.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('assets/client/js/feather/feather.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/feather/feather-icon.js') }}"></script>

    <!-- Lazyload JS -->
    <script src="{{ asset('assets/client/js/lazysizes.min.js') }}"></script>

    <!-- Slick JS -->
    <script src="{{ asset('assets/client/js/slick/slick.js') }}"></script>
    <script src="{{ asset('assets/client/js/slick/slick-animation.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/slick/custom_slick.js') }}"></script>

    <!-- Auto Height JS -->
    <script src="{{ asset('assets/client/js/auto-height.js') }}"></script>

    <!-- Price Range JS -->
    <script src="{{ asset('assets/client/js/ion.rangeSlider.min.js') }}"></script>

    <!-- Sidebar Open JS -->
    <script src="{{ asset('assets/client/js/filter-sidebar.js') }}"></script>

    <!-- Quantity JS -->
    <script src="{{ asset('assets/client/js/quantity-2.js') }}"></script>

    <!-- Zoom JS -->
    <script src="{{ asset('assets/client/js/jquery.elevatezoom.js') }}"></script>
    <script src="{{ asset('assets/client/js/zoom-filter.js') }}"></script>

    <!-- Sticky Bar JS -->
    <script src="{{ asset('assets/client/js/sticky-cart-bottom.js') }}"></script>

    <!-- Timer JS -->
    <script src="{{ asset('assets/client/js/timer1.js') }}"></script>

    <!-- Fly Cart JS -->
    <script src="{{ asset('assets/client/js/fly-cart.js') }}"></script>

    <!-- Quantity JS -->
    <script src="{{ asset('assets/client/js/quantity-2.js') }}"></script>

    <!-- WOW JS -->
    <script src="{{ asset('assets/client/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/custom-wow.js') }}"></script>

    <!-- Script JS -->
    <script src="{{ asset('assets/client/js/script.js') }}"></script>

    <!-- Theme Setting JS -->
    <script src="{{ asset('assets/client/js/theme-setting.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('js')
    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Thành công!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Thất bại",
                    text: "{{ session('error') }}",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            });
        </script>
    @endif

    @isset(Auth::user()->id)
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var userId = {{ Auth::user()->id ?? 'null' }};
                var nguoiNhanId = 1;

                // Load tin nhắn
                fetch(`/messages/${nguoiNhanId}`)
                    .then(response => response.json())
                    .then(messages => {
                        var chatBox = document.getElementById("chat-box");
                        chatBox.innerHTML = "";
                        messages.forEach(chat => {
                            var align = chat.nguoi_gui_id === userId ? "text-end" : "text-start";

                            let chatMessage = document.createElement("p");
                            chatMessage.classList.add(align);
                            chatMessage.innerHTML =
                                `<strong>${chat.ten_nguoi_gui}:</strong> ${chat.noi_dung}`;

                            chatBox.appendChild(chatMessage);
                        });
                        chatBox.scrollTop = chatBox.scrollHeight;
                    })
                    .catch(error => console.error("Lỗi khi tải tin nhắn:", error));

                document.getElementById("chat-form").addEventListener("submit", function(e) {
                    e.preventDefault();

                    let noiDungInput = document.getElementById("noi_dung");
                    let noiDung = noiDungInput.value.trim();
                    if (!noiDung) return;

                    fetch('/send-chat', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                nguoi_gui_id: userId,
                                nguoi_nhan_id: nguoiNhanId,
                                noi_dung: noiDung,
                                channel: userId
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            noiDungInput.value = ""; // Xóa input sau khi gửi
                        })
                        .catch(error => console.error("Lỗi:", error));
                });

                // Kết nối Pusher
                Pusher.logToConsole = true;

                var pusher = new Pusher("0ca5e8c271c25e1264d2", {
                    cluster: "ap1"
                });

                var channel = pusher.subscribe("chat." + {{ Auth::user()->id }});

                channel.bind("send-chat", function(data) {
                    var chatBox = document.getElementById("chat-box");
                    const chat = data.chat
                    console.log(chat);

                    var align = chat.nguoi_gui_id === userId ? "text-end" : "text-start";
                    let chatMessage = document.createElement("p");
                    chatMessage.classList.add(align);
                    chatMessage.innerHTML = `<strong>${chat.ten_nguoi_gui}:</strong> ${chat.noi_dung}`;

                    chatBox.appendChild(chatMessage);
                    chatBox.scrollTop = chatBox.scrollHeight;
                });
            });
        </script>
    @endisset
</body>
<script>
    function Logout(ev) {
        ev.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>

        Swal.fire({
            title: "Bạn có chắc chắn muốn đăng xuất?",
            // text: "Hãy chắc chắn rằng bạn đã lưu tất cả công việc trước khi đăng xuất.",
            iconHtml: '<i class="fas fa-sign-out-alt" style="color:#e74c3c"></i>',
            showCancelButton: true,
            confirmButtonColor: "#e74c3c", // Màu đỏ nổi bật
            cancelButtonColor: "#0e947a", // Màu xanh nhẹ
            confirmButtonText: "Đăng xuất ngay",
            cancelButtonText: "Ở lại",
            background: "#f4f6f7", // Màu nền nhẹ nhàng
            color: "#333", // Màu chữ
            customClass: {
                popup: "swal-custom-popup",
                title: "swal-custom-title",
                confirmButton: "swal-custom-confirm",
                cancelButton: "swal-custom-cancel"
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('logout.client') }}"; // Điều hướng đến route logout
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
        $(".notifi-wishlist").on("click", function(e) {
            e.preventDefault(); // Ngăn chặn load lại trang

            var button = $(this); // Lưu nút đang bấm
            var form = button.closest("li").find(".wishlist-form"); // Tìm form gần nhất
            var formData = form.serialize(); // Lấy dữ liệu form

            $.ajax({
                url: form.attr("action"),
                type: "POST",
                data: formData,
                success: function(response) {
                    $.notify({
                        icon: "fa fa-check",
                        title: "Sản phẩm đã được thêm vào danh sách yêu thích.",
                    }, {
                        element: "body",
                        type: "Thành công: ",
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        delay: 3000,
                        z_index: 9999,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp"
                        },
                        template: '<div class="alert alert-success" style="background-color:#1abc9c; color:white; border-color:#16a085; padding: 10px; border-radius: 5px;">' +
                            '<strong><i class="fa fa-check"></i> {0}</strong> {1}' +
                            '</div>'
                    });

                    // Đổi màu icon thành đỏ (đã yêu thích)
                    button.find("i").css("color", "red");
                },
                error: function(xhr) {
                    if (xhr.status === 401) {
                        Swal.fire({
                            icon: "error",
                            title: "Lỗi!",
                            text: "Vui lòng đăng nhập.",
                            confirmButtonText: "OK"
                        });
                        return;
                    }
                    $.notify({
                        icon: "<i class='fa fa-exclamation-circle'></i>", // Icon lỗi nổi bật hơn
                        title: "Sản phẩm đã tồn tại ở danh sách yêu thích.", // Màu đỏ dịu hơn
                        message: xhr.responseJSON?.message ||
                            "Có lỗi xảy ra, vui lòng thử lại.",
                    }, {
                        element: "body",
                        type: "Cảnh báo: ",
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        delay: 3000,
                        z_index: 9999,
                        animate: {
                            enter: "animated fadeInDown",
                            exit: "animated fadeOutUp"
                        },
                        template: '<div class="alert alert-danger" style="background-color:#ff6b6b; color:white; border-color:#d64545; padding: 10px; border-radius: 5px;">' +
                            '<strong><i class="fa fa-exclamation-circle"></i> {0}</strong> {1}' +
                            '</div>'
                    });

                }
            });
        });
    });
</script>

</html>

{{-- <script>
 $(".delete-cart-item").click(function () {
    console.log('hi')
    let itemId = $(this).data("id");
    let button = $(this);

    $.ajax({
        url: "/xoa-gio-hang",
        method: "POST",
        data: { id: itemId },
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
        },
        success: function (response) {
            console.log("Response từ server:", response);

            // Xóa sản phẩm khỏi giao diện
            button.closest("li.product-box-contain").remove();

            // Tính lại tổng tiền
            let total = 0;
            let totalItem = response.totalItem;
            $(".cart-list li").each(function () {
                let text = $(this).find("h6").text();
                let matches = text.match(/(\d+)\s*x\s*([\d\.]+)/);

                if (matches) {
                    let soLuong = parseInt(matches[1]);  // Số lượng
                    let giaBan = parseInt(matches[2].replace(/\./g, "")); // Giá (loại bỏ dấu chấm)

                    total += soLuong * giaBan;
                }
            });

            $(".header-wishlist .badge").text(totalItem);
            // Cập nhật tổng tiền
            $(".total-price").text(total.toLocaleString("vi-VN") + " đ");
        },
        error: function (xhr) {
            console.log("Lỗi:", xhr.responseText);
        }
    });
});

</script> --}}
