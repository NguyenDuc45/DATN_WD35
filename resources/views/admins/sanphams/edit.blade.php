@extends('layouts.admin')

@section('title')
    Sửa sản phẩm
@endsection
@section('css')
    <!-- Themify icon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">

    <!-- Dropzon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dropzone.css') }}">
    <!-- Feather icon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/remixicon.css') }}">

    <!-- Select2 css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">

    <!-- Bootstrap-tag input css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap-tagsinput.css') }}">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <style>
        /* 1. Di chuyển icon đóng (x) sang phải */
        /* Cố định chiều cao Select2 */
        .select2-container--default .select2-selection--multiple {
            min-height: 38px !important;
            /* Đặt chiều cao tối thiểu */
            height: auto !important;
            display: flex;
            align-items: center;
            /* Căn giữa nội dung */
        }


        /* Định dạng icon đóng */
        .select2-selection__choice__remove {
            /* Đẩy icon sang phải */
            right: 0 !important;
            order: 2;
            /* Đưa icon ra cuối */
            padding: 0 5px;
        }

        .select2-selection__choice__remove>span {
            float: right;
        }

        /* Tắt hover icon đóng */
        .select2-selection__choice__remove:hover {
            background: transparent !important;
            color: inherit !important;
            cursor: pointer;
        }

        /* .select2-container {
        border: 1px solid #ccc !important;
        width: 300px !important;
    } */
        .selection .select2-selection {
            border-radius: 5px !important;
            width: 100%;
        }

        tr {
            padding: 8px;
        }

        .card {
            padding: 50px !important;
        }

        .image-preview {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .image-item {
            position: relative;
            display: inline-block;
        }

        .image-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .remove-image {
            position: absolute;
            top: -5px;
            right: -5px;
            background: red;
            color: white;
            border: none;
            font-size: 16px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            cursor: pointer;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            border: none;
        }


        .custom-file-upload {
    position: relative;
    display: inline-flex;
    align-items: center;
    width: 100%;
    max-width: 150px; /* Thu nhỏ để vừa cột */
    height: 75px;
    background-color: #f1f1f1;
    border: 2px solid #0da487;
    border-radius: 8px;
    cursor: pointer;
    overflow: hidden;
    transition: all 0.3s ease;
}
.custom-file-upload:hover {
    background-color: #e8e8e8;
    border-color: #0b8c72;
}
input[type="file"] {
    display: none;
}
.upload-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 100%;
    background-color: #0da487;
    color: white;
    font-size: 16px;
}
.upload-text {
    flex: 1;
    padding: 0 10px;
    color: #333;
    font-family: Arial, sans-serif;
    font-size: 12px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.preview-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 6px;
    display: none;
}
.select2-container {
            max-width: 100% !important;
        }

        .select2-dropdown {
            max-width: 100% !important;
        }
        .selection{
            width: 100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="col-12">

        <div class="row">
            <div style="min-width: 1200px" class="col-sm-8 m-auto">
                <div style="padding: 100px;" class="card">
                    <div class="mb-3">
                    <a style="float: left" href="{{ route('sanphams.index') }}" class="btn btn-secondary col-1">Trở lại</a>
                    </div>
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Sửa sản phẩm</h5>
                        </div>

                        <form id="mainForm" action="{{ route('sanphams.update', $sanpham->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- Tên sản phẩm --}}
                            <div class="row">
                                <!-- Cột trái -->
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label class="form-label-title">Tên sản phẩm</label>
                                        <input type="text" name="ten_san_pham" class="form-control"
                                            value="{{ $sanpham->ten_san_pham }}">
                                        @error('ten_san_pham')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label-title">Mã sản phẩm</label>
                                        <input type="text" name="ma_san_pham" class="form-control"
                                            value="{{ $sanpham->ma_san_pham }}">
                                        @error('ma_san_pham')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label-title">Giá gốc</label>
                                        <input type="number" name="gia_cu" class="form-control"
                                            value="{{ $sanpham->gia_cu }}">
                                        @error('gia_cu')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label-title">Danh mục</label>
                                        <select class="form-control js-example-basic-single w-100" name="danh_muc_id">
                                            <option disabled selected>Chọn danh mục</option>
                                            @foreach ($danhMucs as $danhMuc)
                                                <option {{ $danhMuc->id == $sanpham->danh_muc_id ? 'selected' : '' }}
                                                    value="{{ $danhMuc->id }}">
                                                    {{ $danhMuc->ten_danh_muc }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('danh_muc_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label-title">Trạng thái</label>
                                        <select name="trang_thai" class="form-control">
                                            <option {{ $sanpham->trang_thai == 1 ? 'selected' : '' }} value="1">Còn
                                                hàng</option>
                                            <option {{ $sanpham->trang_thai == 0 ? 'selected' : '' }} value="0">Hết
                                                hàng</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Cột phải -->
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label class="form-label-title">Hình ảnh</label>
                                        <input style="display: block" type="file" name="hinh_anh" class="form-control">
                                        <img src="{{ Storage::url($sanpham->hinh_anh) }}" width="100">
                                        @error('hinh_anh')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label class="col-sm-3 col-form-label form-label-title">Album ảnh</label>

                                        <input style="display:block" type="file" name="album_anh[]" id="album_anh" class="form-control"
                                            multiple>

                                        <div class="image-preview" id="imagePreview">
                                            @foreach ($sanpham->anhSP as $img)
                                                <div class="image-item" data-id="{{ $img->id }}">
                                                    <img style="width: 100px"
                                                        src="{{ Storage::url($img->link_anh_san_pham) }}" alt="">
                                                    <button type="button" class="remove-image"
                                                        data-id="{{ $img->id }}">&times;</button>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label-title">Mô tả</label>
                                        <textarea id="mo_ta" name="mo_ta" class="form-control">{{ old('mo_ta', $sanpham->mo_ta) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                            <h4 class="mb-3" >Thuộc tính</h4>
                            <div class="mb-3">
                                @foreach ($thuocTinhs as $tt)
                                    <div class="mb-2">
                                        <label>{{ $tt->ten_thuoc_tinh }}</label>

                                        @php
                                            // Ưu tiên lấy từ old input (khi submit lỗi)
                                            if (old("attribute_values.{$tt->id}")) {
                                                $selectedValues = old("attribute_values.{$tt->id}");
                                            } elseif (isset($bienThe)) {
                                                $selectedValues = explode(' - ', $bienThe->ten_bien_the);
                                            } else {
                                                $selectedValues = array_unique(array_merge(...$checkedTT));
                                            }
                                        @endphp

                                        <select name="attribute_values[{{ $tt->id }}][]"
                                            class="form-control select2" multiple
                                            data-placeholder="{{ $tt->ten_thuoc_tinh == 'Size' ? 'Chọn Size' : ($tt->ten_thuoc_tinh == 'Color' ? 'Chọn Color' : 'Chọn ' . $tt->ten_thuoc_tinh) }}">
                                            @foreach ($tt->giaTriThuocTinhs as $value)
                                                <option value="{{ $value->gia_tri }}"
                                                    {{ in_array($value->gia_tri, $selectedValues) ? 'selected' : '' }}>
                                                    {{ $value->gia_tri }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                            </div>
                            </div>

                            <center>
                                <div>
                            {{-- Danh sách biến thể --}}
                                <h4>Danh sách biến thể:</h4> <br>
                                <table style="width: 100%" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 125px">Ảnh</th>
                                            <th style="width: 125px">Thuộc tính</th>
                                            <th style="width: 125px">Giá bán</th>
                                            <th style="width: 125px">Kho hàng</th>
                                            {{-- <th>Hành động</th> --}}
                                        </tr>
                                    </thead>


                                    <tbody id="variantTable">
                                        @php
                                            $uniqueBienThes = $sanpham->bienThes->unique('ten_bien_the');
                                        @endphp
                                        @foreach ($uniqueBienThes as $index => $bienThe)
                                            <tr data-variant="{{ $bienThe->ten_bien_the }}">
                                                {{-- <p>{{ $index }}</p> --}}
                                                <td>
                                                    <label class="custom-file-upload">
                                                        <input type="file" class="file-input-bien-the" accept="image/*" name="anh_bien_the[]"/>
                                                        <div class="upload-icon">
                                                            <i class="fas fa-upload"></i>
                                                        </div>
                                                        <span class="upload-text">Tải ảnh lên</span>
                                                        <img class="preview-image"
                                                            src="{{ $bienThe->anh_bien_the ? Storage::url($bienThe->anh_bien_the) : '' }}"
                                                            alt="Ảnh xem trước"
                                                            style="{{ $bienThe->anh_bien_the ? 'display: block;' : 'display: none;' }}" />
                                                    </label>
                                                    <input type="hidden" name="anh_cu[]" value="{{ $bienThe->anh_bien_the }}">
                                                    @error("anh_bien_the.$index")
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="hidden" name="selected_values[]"
                                                        value="{{ $bienThe->ten_bien_the }}">
                                                    {{ $bienThe->ten_bien_the }}
                                                </td>
                                                <td><input type="number" name="gia_ban[]" value="{{ $bienThe->gia_ban }}"
                                                        class="form-control">
                                                    @error("gia_ban.$index")
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="number" name="so_luong[]" value="{{ $bienThe->so_luong }}"
                                                        class="form-control @error('so_luong.' . $index) is-invalid @enderror">
                                                    @error('so_luong.' . $index)
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>


                                    <!-- Lưu dữ liệu biến thể ban đầu vào hidden input -->
                                    <input type="hidden" id="existingVariantsData" value='@json($uniqueBienThes)'>

                                </table>
                                <input type="hidden" name="deleted_variants" id="deletedVariants" value="{{ old('deleted_variants', '[]') }}">
                                </div>
                            </center>

                            <br>
                            <button type="submit" class="btn btn-primary">Lưu Sản Phẩm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Sidebar js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- bootstrap tag-input js -->
    <script src="{{ asset('assets/js/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>

    <!-- customizer js -->
    <script src="{{ asset('assets/js/customizer.js') }}"></script>

    <!-- Dropzon js -->
    <script src="{{ asset('assets/js/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone/dropzone-script.js') }}"></script>

    <!-- ck editor js -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <!-- select2 js -->
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>/
    <script src="{{ asset('assets/js/select2-custom.js') }}"></script>
@endsection
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    < script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" >
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: function() {
                return $(this).attr('data-placeholder');
            },
            language: {
                noResults: function() {
                    return "Không tìm thấy kết quả";
                }
            },
            allowClear: true
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".select2").select2({
            placeholder: "Chọn một giá trị",
            allowClear: true
        });

        let existingVariants = {}; // Lưu trữ biến thể đã có trước khi chỉnh sửa
        var variants = [];

        let errors = @json($errors->toArray()); // Lỗi từ Form Request
        let oldValues = @json(old()); // Dữ liệu cũ nếu submit lỗi
        let initialVariants = @json($existingVariants ?? []); // Dữ liệu biến thể từ server khi edit

        console.log("Errors:", errors);
        console.log("Old Values:", oldValues);
        console.log("Initial Variants:", initialVariants);

        function restoreOldData() {
            // Nếu có dữ liệu cũ (submit lỗi)
            if (oldValues['selected_values'] && oldValues['selected_values'].length > 0) {
                oldValues['selected_values'].forEach((variantKey, index) => {
                    existingVariants[variantKey] = {
                        gia_ban: oldValues['gia_ban'] ? oldValues['gia_ban'][index] || "" : "",
                        so_luong: oldValues['so_luong'] ? oldValues['so_luong'][index] || "" : "",
                        anh_cu: oldValues['anh_cu'] ? oldValues['anh_cu'][index] || "" : ""
                    };
                });
            }
            // Nếu không có oldValues nhưng có dữ liệu từ server (edit)
            else if (initialVariants.length > 0) {
                initialVariants.forEach(variant => {
                    existingVariants[variant.key] = {
                        gia_ban: variant.gia_ban || "",
                        so_luong: variant.so_luong || "",
                        anh_cu: variant.anh_cu || ""
                    };
                });
            }
            // Nếu không có dữ liệu từ PHP, lấy từ HTML có sẵn
            else {
                $("#variantTable tr").each(function() {
                    let variantKey = $(this).data("variant");
                    if (variantKey) {
                        existingVariants[variantKey] = {
                            gia_ban: $(this).find("input[name='gia_ban[]']").val() || "",
                            so_luong: $(this).find("input[name='so_luong[]']").val() || "",
                            anh_cu: $(this).find("input[name='anh_cu[]']").val() || ""
                        };
                    }
                });
            }

            console.log("Existing Variants after restore:", existingVariants);
        }


        restoreOldData();
        generateVariants();

        function generateVariants() {
            selectedValues = {};

            $("select[name^='attribute_values']").each(function() {
                let attributeId = $(this).attr("name").match(/\d+/)[0];
                let values = $(this).val() || [];
                if (values.length > 0) {
                    selectedValues[attributeId] = values;
                }
            });

            variants = cartesianProduct(Object.values(selectedValues));
            let newVariants = {};

            if (Object.keys(selectedValues).length === 0 || variants.length === 0) {
                $("#variantTable").empty();
                return;
            }

            $("#variantTable").closest("table").show();

            variants.forEach(variant => {
                let variantKey = variant.join(" - ");
                if (existingVariants[variantKey]) {
                    newVariants[variantKey] = existingVariants[variantKey]; // Giữ lại dữ liệu cũ
                } else {
                    newVariants[variantKey] = {
                        gia_ban: "",
                        so_luong: "",
                        anh_cu: ""
                    };
                }
            });

            existingVariants = newVariants;
            console.log("Existing Variants after generating:", existingVariants);
            renderVariantTable();
        }

        function attachPreviewEvents() {
            document.querySelectorAll('.file-input-bien-the').forEach((fileInput) => {
                fileInput.addEventListener('change', function() {
                    const file = this.files[0];
                    const previewImage = this.closest('.custom-file-upload').querySelector('.preview-image');
                    const uploadText = this.closest('.custom-file-upload').querySelector('.upload-text');
                    const uploadIcon = this.closest('.custom-file-upload').querySelector('.upload-icon');

                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewImage.src = e.target.result;
                            previewImage.style.display = 'block';
                            uploadText.style.opacity = '0';
                            uploadIcon.style.opacity = '0';
                        };
                        reader.readAsDataURL(file);
                    } else {
                        // Nếu không chọn file mới, giữ nguyên ảnh cũ (nếu có)
                        if (!previewImage.src) {
                            previewImage.style.display = 'none';
                            uploadText.style.opacity = '1';
                            uploadIcon.style.opacity = '1';
                        }
                    }
                });
            });
        }

        // Gọi hàm attachPreviewEvents khi trang tải lần đầu
        document.addEventListener("DOMContentLoaded", function() {
            attachPreviewEvents();
        });

        function renderVariantTable() {
            $("#variantTable").empty();

            if (Object.keys(existingVariants).length === 0) {
                return;
            }

            Object.keys(existingVariants).forEach((variantKey, index) => {
                let data = existingVariants[variantKey];
                let error_gia_ban = errors[`gia_ban.${index}`] ?
                    `<p class="text-danger">${errors[`gia_ban.${index}`][0]}</p>` : '';
                let error_so_luong = errors[`so_luong.${index}`] ?
                    `<p class="text-danger">${errors[`so_luong.${index}`][0]}</p>` : '';

                let row = `<tr data-variant="${variantKey}">
                <td>
                <label class="custom-file-upload">
                    <input type="file" class="file-input-bien-the" accept="image/*" name="anh_bien_the[]"/>
                    <div class="upload-icon">
                        <i class="fas fa-upload"></i>
                    </div>
                    <span class="upload-text">Tải ảnh lên</span>
                    <img class="preview-image"
                         src="${data.anh_cu ? '/storage/' + data.anh_cu : ''}"
                         alt="Ảnh xem trước"
                         style="${data.anh_cu ? 'display: block;' : 'display: none;'}" />
                </label>
                <input type="hidden" name="anh_cu[]" value="${data.anh_cu}">
                </td>
                <td><input type="hidden" name="selected_values[]" value="${variantKey}">${variantKey}</td>

                <td>
                    <input type="number" name="gia_ban[]" value="${data.gia_ban}" class="form-control">
                    ${error_gia_ban}
                </td>
                <td>
                    <input type="number" name="so_luong[]" value="${data.so_luong}" class="form-control">
                    ${error_so_luong}
                </td>
            </tr>`;

                $("#variantTable").append(row);
            });
            attachPreviewEvents();
        }

        function cartesianProduct(arr) {
            return arr.reduce((a, b) => a.flatMap(d => b.map(e => [d, e].flat())), [
                []
            ]);
        }

        $(".select2").on("change", function() {
            generateVariants();
        });

        renderVariantTable();

        $("#mainForm").submit(function(e) {
            if (variants.length === 0) {
                e.preventDefault(); // Ngăn không cho submit nếu chưa có biến thể

                Swal.fire({
                    icon: "warning",
                    title: "Bạn chưa thêm biến thể!",
                    text: "Vui lòng thêm ít nhất một biến thể.",
                    confirmButtonText: "OK"
                });
            }
        });

//         function attachPreviewEvents() {
//     document.querySelectorAll('.file-input-bien-the').forEach((fileInput) => {
//         fileInput.addEventListener('change', function() {
//             const file = this.files[0];
//             const previewImage = this.closest('.custom-file-upload').querySelector('.preview-image');
//             const uploadText = this.closest('.custom-file-upload').querySelector('.upload-text');
//             const uploadIcon = this.closest('.custom-file-upload').querySelector('.upload-icon');

//             if (file) {
//                 const reader = new FileReader();
//                 reader.onload = function(e) {
//                     previewImage.src = e.target.result;
//                     previewImage.style.display = 'block';
//                     uploadText.style.opacity = '0';
//                     uploadIcon.style.opacity = '0';
//                 };
//                 reader.readAsDataURL(file);
//             } else {
//                 previewImage.style.display = 'none';
//                 uploadText.style.opacity = '1';
//                 uploadIcon.style.opacity = '1';
//             }
//         });
//     });
// }

// // Gọi hàm attachPreviewEvents khi trang tải lần đầu
// document.addEventListener("DOMContentLoaded", function() {
//     attachPreviewEvents();
// });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const MAX_FILES = 6;
        let fileList = []; // Danh sách file mới
        let previewContainer = document.getElementById("imagePreview");
        let fileInput = document.getElementById("album_anh");
        let deletedImages = []; // Danh sách ảnh bị xóa

        let deletedImagesInput = document.createElement("input");
        deletedImagesInput.type = "hidden";
        deletedImagesInput.name = "deleted_images";
        previewContainer.appendChild(deletedImagesInput);

        // XÓA ẢNH
        previewContainer.addEventListener("click", function(e) {
            if (e.target.classList.contains("remove-image")) {
                let imgWrapper = e.target.closest(".image-item");
                let imageId = e.target.getAttribute("data-id");

                if (imageId) {
                    deletedImages.push(imageId);
                    deletedImagesInput.value = JSON.stringify(deletedImages);
                } else {
                    let fileIndex = parseInt(imgWrapper.getAttribute("data-file-index"));
                    if (!isNaN(fileIndex)) {
                        fileList.splice(fileIndex, 1);
                        updateFileInput();
                    }
                }

                imgWrapper.remove();
                updateFileLimit();
            }
        });

        // CHỌN ẢNH MỚI
        fileInput.addEventListener("change", function(event) {
            let currentCount = document.querySelectorAll(".image-item").length;
            let newFiles = Array.from(event.target.files);
            let remainingSlots = MAX_FILES - currentCount;

            // Nếu chọn quá số lượng cho phép
            if (newFiles.length > remainingSlots) {
                Swal.fire({
                    icon: "error",
                    title: "Quá số lượng!",
                    text: `Bạn chỉ có thể thêm tối đa ${remainingSlots} ảnh nữa.`,
                    confirmButtonColor: "#007bff"
                });
                fileInput.value = ""; // Reset input nhưng KHÔNG làm mất ảnh đã chọn trước
                return; // Dừng xử lý, KHÔNG thêm bất kỳ ảnh nào
            }

            // Thêm file mới vào danh sách
            let startIndex = fileList.length;
            fileList = [...fileList, ...newFiles];
            updateFileInput();
            renderNewFiles(newFiles, startIndex);
        });

        function updateFileInput() {
            let dataTransfer = new DataTransfer();
            fileList.forEach(file => dataTransfer.items.add(file));
            fileInput.files = dataTransfer.files;

            // Debug
            console.log("Files in input:", Array.from(fileInput.files).map(f => f.name));
        }

        function renderNewFiles(files, startIndex = 0) {
            // Xóa các preview ảnh mới cũ (không có data-id)
            document.querySelectorAll('.image-item:not([data-id])').forEach(el => el.remove());

            // Render lại toàn bộ ảnh mới từ fileList
            fileList.forEach((file, index) => {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let imgWrapper = document.createElement("div");
                    imgWrapper.classList.add("image-item");
                    imgWrapper.setAttribute("data-file-index", index);

                    let img = document.createElement("img");
                    img.src = e.target.result;
                    img.style.width = "100px";

                    let removeBtn = document.createElement("button");
                    removeBtn.innerHTML = "&times;";
                    removeBtn.classList.add("remove-image");

                    imgWrapper.appendChild(img);
                    imgWrapper.appendChild(removeBtn);
                    previewContainer.appendChild(imgWrapper);
                };
                reader.readAsDataURL(file);
            });

            updateFileLimit();
        }

        function updateFileLimit() {
            let totalImages = document.querySelectorAll(".image-item").length;
            fileInput.disabled = (totalImages >= MAX_FILES);

            // Đảm bảo không thể chọn thêm khi đủ 6 ảnh
            if (totalImages >= MAX_FILES) {
                fileInput.value = "";
            }
        }

        updateFileLimit();
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (document.querySelector('#mo_ta')) {
            ClassicEditor
                .create(document.querySelector('#mo_ta'), {
                    language: 'vi',
                    removePlugins: ['SpellChecker'],
                    toolbar: [
                        'heading', '|', 'bold', 'italic', 'underline', '|',
                        'link', 'blockQuote', '|', 'bulletedList', 'numberedList', '|',
                        'undo', 'redo'
                    ]
                })
                .then(editor => {
                    window.editorMoTa = editor;
                    editor.model.document.on('change:data', () => {
                        document.querySelector('textarea[name="mo_ta"]').value = editor.getData();
                    });
                })
                .catch(error => {
                    console.error('Lỗi CKEditor (Mô tả):', error);
                });
        }
    });
</script>
