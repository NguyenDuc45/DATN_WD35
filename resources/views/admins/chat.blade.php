@extends('layouts.admin')

@section('title')
    Chat với người dùng
@endsection

@section('css')

<style>
    /* Modal phóng to ảnh */
    .image-zoom-modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        justify-content: center;
        align-items: center;
    }
    
    /* Nội dung ảnh trong modal */
    .image-zoom-content {
        width: 600px; /* Kích thước cố định cho chiều rộng */
        height: 600px; /* Kích thước cố định cho chiều cao */
        max-width: 90%; /* Giới hạn tối đa để phù hợp với màn hình nhỏ */
        max-height: 90%; /* Giới hạn tối đa để phù hợp với màn hình nhỏ */
        object-fit: contain; /* Giữ tỷ lệ ảnh, không bị méo */
        border-radius: 8px;
    }
    
    /* Nút đóng modal */
    .close-zoom-modal {
        position: absolute;
        top: 20px;
        right: 30px;
        color: white;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
    }
    </style>
    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/remixicon.css') }}">

    <!-- Data Table css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">

    <!-- Themify icon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">

    <!-- Feather icon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    {{-- <style>
        /* Giảm khoảng cách giữa tin nhắn và thời gian */
        .small-time {
            font-size: 0.8em;
            margin-top: -5px;
            display: inline-block;
            color: #888;
        }

        /* Nếu cần căn chỉnh thêm, bạn có thể thêm các thuộc tính khác */
    </style> --}}

@endsection

@section('content')
    <div class="col-sm-12">
        <!-- Modal phóng to ảnh -->
<div id="imageZoomModal" class="image-zoom-modal">
    <span class="close-zoom-modal">&times;</span>
    <img class="image-zoom-content" id="zoomedImage">
</div>
        <div class="row">
            <!-- Sidebar Danh sách người đã chat -->
            <div class="col-md-3 border-end" id="user-list" style="height: 500px; overflow-y: auto;">
                <h5 class="mb-4">Người đã chat</h5>
                <ul class="list-group" id="chat-users"></ul>
            </div>

            <!-- Khung chat chính -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header" id="chat-header">Chọn một người để bắt đầu chat</div>
                    <div class="card-body" id="chat-box" style="height: 400px; overflow-y: auto; background: #f9f9f9;">
                    </div>
                    <div class="card-footer">
                        <!-- Thêm thông báo lỗi ở đây -->
                        <div id="error-message" class="alert alert-danger mt-3" style="display: none;"></div>
                        <form id="chat-form" enctype="multipart/form-data">
                            <input type="hidden" id="receiver_id">
                            <div class="input-group">
                                <input type="text" id="noi-dung" class="form-control" placeholder="Nhập tin nhắn..."
                                    autocomplete="off">
                                <input type="file" id="image" accept="image/*,video/*" class="form-control"
                                    style="max-width: 180px;">

                                <button type="submit" class="btn btn-primary">Gửi</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let user_id = {{ Auth::user()->id }};
        let receiver_id = null;
        let currentChannel = null; // Biến để theo dõi kênh hiện tại

        // Hàm cập nhật danh sách người dùng và số tin nhắn chưa đọc
        //  function updateUserList() {
        //     fetch('/admin/chat-users', {
        //         headers: {
        //             'Cache-Control': 'no-cache' // Chống cache để lấy dữ liệu mới nhất
        //         }
        //     })
        //         .then(response => response.json())
        //         .then(users => {
        //             console.log('Updated user list:', users);
        //             let userList = document.getElementById("chat-users");
        //             userList.innerHTML = '';
        //             users.forEach(user => {
        //                 let li = document.createElement("li");
        //                 li.classList.add("list-group-item", "user-item");
        //                 li.dataset.id = user.id;
        //                 li.innerHTML = `${user.username} ${user.unread_count > 0 ? `<span class="badge bg-danger">${user.unread_count}</span>` : ''}`;
        //                 li.addEventListener("click", () => loadChat(user.id, user.username));
        //                 userList.appendChild(li);
        //             });
        //         })
        //         .catch(error => console.error("Lỗi khi cập nhật danh sách người dùng:", error));
        // }

        function updateUserList() {
            fetch('/admin/chat-users', {
                headers: {
                    'Cache-Control': 'no-cache' // Chống cache để lấy dữ liệu mới nhất
                }
            })
                .then(response => response.json())
                .then(users => {
                    console.log('Updated user list:', users);
                    let userList = document.getElementById("chat-users");
                    userList.innerHTML = '';
                    users.forEach(user => {
                        let li = document.createElement("li");
                        li.classList.add("list-group-item", "user-item");
                        li.dataset.id = user.id;
                        li.innerHTML = `${user.username} ${user.unread_count > 0 ? `<span class="badge bg-danger">${user.unread_count}</span>` : ''}`;
                        li.addEventListener("click", () => loadChat(user.id, user.username));
                        userList.appendChild(li);
                        // Log thêm thời gian tin nhắn mới nhất để kiểm tra
                        console.log(`User: ${user.username}, Latest message time: ${user.latest_message_time || 'N/A'}`);
                    });
                })
                .catch(error => console.error("Lỗi khi cập nhật danh sách người dùng:", error));
        }

        // Gọi updateUserList khi trang được tải
        document.addEventListener("DOMContentLoaded", function () {
            updateUserList();
        });

        // Gọi updateUserList khi trang được tải
        document.addEventListener("DOMContentLoaded", function () {
            updateUserList();
        });

        function loadChat(nguoi_nhan_id, ten_nguoi_nhan) {
            receiver_id = nguoi_nhan_id;
            document.getElementById("chat-header").innerText = "Chat với " + ten_nguoi_nhan;
            document.getElementById("receiver_id").value = nguoi_nhan_id;

            // Hủy kênh hiện tại (nếu có)
            if (currentChannel) {
                pusher.unsubscribe(currentChannel);
                console.log(`Unsubscribed from channel: ${currentChannel}`);
            }

            // Đăng ký kênh mới
            currentChannel = `chat.${nguoi_nhan_id}`;
            bindChannel(user_id, nguoi_nhan_id);

            // Gọi API để đánh dấu tin nhắn là đã đọc
            fetch(`/mark-as-read/${nguoi_nhan_id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Content-Type': 'application/json'
                }
            })
                .then(response => response.json())
                .then(data => {
                    console.log("Mark as read response:", data);
                    updateUserList();
                })
                .catch(error => console.error("Lỗi khi đánh dấu tin nhắn là đã đọc:", error));

            // Tải tin nhắn
            fetch(`/messages/${nguoi_nhan_id}`, {
                headers: {
                    'Cache-Control': 'no-cache'
                }
            })
                .then(response => response.json())
                .then(messages => {
                    let chatBox = document.getElementById("chat-box");
                    chatBox.innerHTML = "";
                    messages.forEach(chat => {
                        appendMessage(chat, nguoi_nhan_id);
                    });
                    chatBox.scrollTop = chatBox.scrollHeight;
                })
                .catch(error => console.error("Lỗi khi tải tin nhắn:", error));
        }

        function appendMessage(chat, nguoi_gui_id) {
            let chatBox = document.getElementById("chat-box");

            // Kiểm tra tin nhắn trùng lặp dựa trên created_at
            let existingMessages = chatBox.querySelectorAll(`div[data-created-at="${chat.created_at}"]`);
            if (existingMessages.length > 0) {
                console.log(`Tin nhắn trùng lặp, bỏ qua: ${chat.noi_dung}`);
                return;
            }

            // Sửa logic căn chỉnh: so sánh với user_id (Admin) thay vì nguoi_gui_id
            let align = chat.nguoi_gui_id === user_id ? "text-end" : "text-start";
            let wrapper = document.createElement("div");
            wrapper.classList.add("m-2", align);
            wrapper.setAttribute("data-created-at", chat.created_at);

            let content = `<strong>${chat.nguoi_gui_id === user_id ? "Admin" : chat.ten_nguoi_gui}:</strong>`;
            if (chat.noi_dung) {
                content += `${chat.noi_dung}`;
            }

            if (chat.hinh_anh) {
        let fileUrl = chat.hinh_anh;
        const extension = fileUrl.split('.').pop().toLowerCase();
        if (['jpg', 'jpeg', 'png', 'gif', 'webp', 'jfif'].includes(extension)) {
            // Thêm lớp zoomable-image cho ảnh
            content += `<div><img class="zoomable-image" src="${fileUrl}" alt="Ảnh" style="max-width: 200px; border-radius: 8px; margin-top: 5px; cursor: pointer;"></div>`;
        } else if (['mp4', 'webm', 'ogg'].includes(extension)) {
            content += `
                <div>
                    <video controls style="max-width: 300px; border-radius: 8px; margin-top: 5px;">
                        <source src="${fileUrl}" type="video/${extension}">
                        Trình duyệt không hỗ trợ video.
                    </video>
                </div>`;
        }
    }

            const timeSent = new Date(chat.created_at);
            const timeString = timeSent.toLocaleString('vi-VN', {
                weekday: 'short',
                year: 'numeric',
                month: 'numeric',
                day: 'numeric',
                hour: 'numeric',
                minute: 'numeric',
            });
            content += `<div><small class="text-muted" style="font-size: 0.8em; margin-top: 5px;">${timeString}</small></div>`;

            wrapper.innerHTML = content;
            chatBox.appendChild(wrapper);
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        document.getElementById("chat-form").addEventListener("submit", function (e) {
            e.preventDefault();

            let formData = new FormData();
            formData.append('nguoi_gui_id', user_id);
            formData.append('nguoi_nhan_id', receiver_id);
            formData.append('noi_dung', document.getElementById("noi-dung").value);
            formData.append('channel', receiver_id);

            let imageInput = document.getElementById("image");
            if (imageInput.files.length > 0) {
                formData.append('media', imageInput.files[0]);
            }

            let file = imageInput.files.length > 0 ? imageInput.files[0] : null;
            let noiDung = document.getElementById("noi-dung").value.trim();

            if (!noiDung && !file) {
                document.getElementById("error-message").style.display = "block";
                document.getElementById("error-message").innerHTML = "Vui lòng gửi tin nhắn hoặc hình ảnh/video!";
                return;
            }

            if (file) {
                const validImageTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/jfif'];
                const validVideoTypes = ['video/mp4', 'video/webm', 'video/ogg'];
                if (!validImageTypes.includes(file.type) && !validVideoTypes.includes(file.type)) {
                    document.getElementById("error-message").style.display = "block";
                    document.getElementById("error-message").innerHTML = "Định dạng file không hợp lệ! Chỉ hỗ trợ hình ảnh (JPG, JPEG, PNG, GIF, WEBP) và video (MP4, WEBM, OGG).";
                    return;
                }
                if (file.type.startsWith("video/") && file.size > 20 * 1024 * 1024) {
                    document.getElementById("error-message").style.display = "block";
                    document.getElementById("error-message").innerHTML = "Video không được vượt quá 20MB!";
                    return;
                }
            }

            document.getElementById("error-message").style.display = "none";

            fetch('/send-chat', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    document.getElementById("noi-dung").value = "";
                    document.getElementById("image").value = "";
                    updateUserList();
                })
                .catch(error => console.error("Lỗi:", error));
        });

        // Kết nối Pusher
        Pusher.logToConsole = true;
        var pusher = new Pusher("0ca5e8c271c25e1264d2", {
            cluster: "ap1"
        });

        // Lắng nghe tin nhắn mới trên kênh của admin
        var adminChannel = pusher.subscribe("chat." + user_id);
        adminChannel.bind("send-chat", function (data) {
            console.log("Received new message on admin channel:", data);
            const chat = data.chat;

            // Hiển thị tin nhắn nếu nó thuộc về cuộc trò chuyện hiện tại
            if (chat.nguoi_gui_id === receiver_id) {
                appendMessage(chat, chat.nguoi_gui_id);

                // Đánh dấu tin nhắn là đã đọc nếu đang ở trong khung chat
                fetch(`/mark-as-read/${receiver_id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        'Content-Type': 'application/json'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log("Mark as read response:", data);
                        updateUserList(); // Cập nhật danh sách người dùng để làm mới unread_count
                    })
                    .catch(error => console.error("Lỗi khi đánh dấu tin nhắn là đã đọc:", error));
            } else {
                // Cập nhật danh sách người dùng nếu tin nhắn từ người khác
                updateUserList();
            }
        });

        function bindChannel(nguoi_gui_id, nguoi_nhan_id) {
            var channel = pusher.subscribe("chat." + nguoi_nhan_id);
            console.log(`Subscribed to channel: chat.${nguoi_nhan_id}`);

            channel.bind("send-chat", function (data) {
                console.log("Received new message on user channel:", data);
                const chat = data.chat;

                // Hiển thị tin nhắn nếu nó thuộc về cuộc trò chuyện hiện tại
                if (chat.nguoi_gui_id === receiver_id || chat.nguoi_nhan_id === receiver_id) {
                    appendMessage(chat, chat.nguoi_gui_id);

                    // Đánh dấu tin nhắn là đã đọc nếu đang ở trong khung chat
                    fetch(`/mark-as-read/${receiver_id}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            'Content-Type': 'application/json'
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log("Mark as read response:", data);
                            updateUserList(); // Cập nhật danh sách người dùng để làm mới unread_count
                        })
                        .catch(error => console.error("Lỗi khi đánh dấu tin nhắn là đã đọc:", error));
                }

                // Cập nhật danh sách người dùng
                updateUserList();
            });
        }


        // Xử lý phóng to ảnh khi nhấn
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('zoomable-image')) {
        const modal = document.getElementById('imageZoomModal');
        const zoomedImage = document.getElementById('zoomedImage');
        zoomedImage.src = e.target.src; // Gán nguồn ảnh vào modal
        modal.style.display = 'flex'; // Hiển thị modal
    }
});

// Đóng modal khi nhấn nút đóng hoặc bên ngoài ảnh
document.addEventListener('click', function (e) {
    const modal = document.getElementById('imageZoomModal');
    if (e.target.classList.contains('close-zoom-modal') || e.target === modal) {
        modal.style.display = 'none'; // Ẩn modal
    }
});
    </script>

    <!-- customizer js -->
    <script src="{{ asset('assets/js/customizer.js') }}"></script>

    <!-- Sidebar js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- Plugins JS -->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>

    <!-- Data table js -->
    <script src="{{ asset('assets/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/js/custom-data-table.js') }}"></script>

    <!-- all checkbox select js -->
    <script src="{{ asset('assets/js/checkbox-all-check.js') }}"></script>
@endsection