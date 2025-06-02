<!-- Fonts and icons -->
<script src="{{ asset('backend/assets/js/plugin/webfont/webfont.min.js') }}"></script>
<script>
    WebFont.load({
        google: {
            families: ["Public Sans:300,400,500,600,700"]
        },
        custom: {
            families: [
                "Font Awesome 5 Solid",
                "Font Awesome 5 Regular",
                "Font Awesome 5 Brands",
                "simple-line-icons",
            ],
            urls: ["{{ asset('backend/assets/css/fonts.min.css') }}"],
        },
        active: function() {
            sessionStorage.fonts = true;
        },
    });
</script>
<!--   Core JS Files   -->

<script src="{{ asset('backend/assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/core/bootstrap.min.js') }}"></script>


<!-- Toastr JS -->
<script src="{{ asset('global/js/toastr.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('backend/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('backend/assets/js/plugin/chart.js/chart.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('backend/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Circle -->
<script src="{{ asset('backend/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('backend/assets/js/plugin/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('backend/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- jQuery Vector Maps -->
<script src="{{ asset('backend/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>

<script src="{{ asset('backend/assets/js/plugin/jsvectormap/world.js') }}"></script>

<!-- Kaiadmin JS -->
<script src="{{ asset('backend/assets/js/kaiadmin.min.js') }}"></script>

<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<script src="{{ asset('backend/assets/js/setting-demo.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Lấy tất cả các menu con (các thẻ <a> bên trong .nav-item)
        let currentMenuItem = document.querySelector(".nav-item .active");

        if (currentMenuItem) {
            // Tìm phần tử cha có class "has-children"
            let parentCollapse = currentMenuItem.closest(".collapse");

            if (parentCollapse) {
                // Mở menu cha bằng cách thêm class "show"
                parentCollapse.classList.add("show");

                // Mở mũi tên caret nếu có
                let parentNavItem = parentCollapse.closest(".nav-item");
                if (parentNavItem) {
                    parentNavItem.querySelector("[data-bs-toggle='collapse']")?.classList.remove("collapsed");
                }
            }
        }
    });
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    const dataTables = (api, columns, model, indexOrder = 0) => {

        let params = localStorage.getItem("params") || null; // Lấy giá trị của 'params'

        if (params && window.location.href !== "{{ env('APP_URL') }}/admin/product") {
            localStorage.removeItem("params"); // Xóa params khỏi localStorage
        }

        const table = $('#myTable').DataTable({ // Định nghĩa biến table
            processing: true,
            serverSide: true,
            ajax: {
                url: api,
                data: function(d) {
                    d.startDate = $('#startDate').val() || null;
                    d.endDate = $('#endDate').val() || null;
                }
            },
            columns: columns,
            "createdRow": function(row, data, dataIndex) {
                $(row).attr('data-id', data.id); // Gán data-id bằng giá trị id của sản phẩm
            },
            order: [indexOrder, 'desc'],
        });

        $(document).on('click', '#cancelEditBtn', function() {
            // Đóng form mà không lưu thay đổi
            let tr = $(this).closest('tr');
            let row = table.row(tr);
            row.child.hide();
        });

        $(document).on('submit', '#editProductForm', function(e) {
            e.preventDefault();

            let formDataArray = new FormData(this)

            let tr = $(this).closest('tr');
            let row = table.row(tr);
            let productData = row.data();

            formDataArray.append('id', productData.id);

            $.ajax({
                url: '',
                type: 'POST',
                data: formDataArray,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        table.draw();
                    } else {
                        alert(response.message)
                    }
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });

        });


        table.on('requestChild.dt', function(e, row) {
            row.child(format(row.data())).show();
        });

        table.on('click', 'td.dt-control', function(e) {
            let tr = e.target.closest('tr');
            let row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
            } else {
                // Open this row
                row.child(format(row.data())).show();
            }
        });

        function updateOrderInDatabase(order, model) {
            $.ajax({
                url: '',
                method: 'POST',
                data: {
                    order: order,
                    model: model,
                },
                success: function(response) {
                    console.log('Cập nhật thứ tự thành công');
                },
                error: function(error) {
                    console.log('Có lỗi xảy ra:', error);
                }
            });
        }


        $('label[for="dt-length-0"]').remove();

        const targetDiv = $('.dt-length');

        let _html = `
        <div id="actionDiv" style="display: none;">
            <button id="applyAction" class="btn btn-outline-danger btn-sm">Xóa</button>
        </div>
    `;

        targetDiv.after(_html);

        // if (filterDate) {
        //     const lengthContainer = document.querySelector('.dt-length');

        //     if (lengthContainer) {
        //         // Tạo input filter
        //         const filterHtml = `
        //             <div class="date-filter ml-2 d-flex align-items-center">
        //                 <input type="date" id="startDate" class="form-control d-inline-block w-auto" placeholder="Start Date">
        //                 <input type="date" id="endDate" class="form-control d-inline-block w-auto ms-2" placeholder="End Date">
        //                 <button id="filterBtn" class="btn btn-primary ms-2 btn-sm"><i class="fa-solid fa-filter"></i></button>
        //                 <button id="resetBtn" class="btn btn-secondary ms-2 btn-sm">Reset</button>
        //             </div>
        //         `;

        //         // Thêm sau `.dt-length`
        //         lengthContainer.insertAdjacentHTML('afterend', filterHtml);

        //         $('#filterBtn').on('click', function() {
        //             const startDate = $('#startDate').val();
        //             const endDate = $('#endDate').val();

        //             if (startDate && endDate && endDate < startDate) {
        //                 alert('Ngày kết thúc không thể nhỏ hơn ngày bắt đầu!');
        //                 return;
        //             }

        //             // Nếu cả hai trường rỗng, không làm gì cả
        //             if (!startDate && !endDate) {
        //                 alert('Vui lòng nhập Start Date và End Date để lọc!');
        //                 return;
        //             }

        //             table.draw();
        //         });

        //         $('#resetBtn').on('click', function() {
        //             if ($('#startDate').val() || $('#endDate').val()) {
        //                 $('#startDate').val('');
        //                 $('#endDate').val('');
        //                 table.draw();
        //             }
        //         });
        //     }
        // }

        $('#selectAll').on('click', function() {
            const isChecked = $(this).prop('checked');
            $('.select-item').prop('checked', isChecked);
            toggleActionDiv();
        });

        $('#myTable tbody').on('click', '.select-item', function() {
            const allChecked = $('#myTable tbody .select-item').length === $(
                '#myTable tbody .select-item:checked').length;

            $('#selectAll').prop('checked', allChecked);
            toggleActionDiv();
        });

        $('#applyAction').on('click', function() {

            Swal.fire({
                title: "Bạn có chắc chắn?",
                text: "Hành động này không thể hoàn tác!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Vâng, thay đổi!",
                cancelButtonText: "Hủy"
            }).then((result) => {
                if (result.isConfirmed) {
                    const selectedIds = $('.select-item:checked').map(function() {
                        return $(this).val();
                    }).get();

                    $.ajax({
                        url: "/admin/handle-bulk-action",
                        method: 'POST',
                        data: {
                            ids: selectedIds,
                            model: model,
                            type: 'delete'
                        },
                        success: function(response) {
                            datgin.success(response.message)
                            table.ajax.reload();
                            $('#selectAll').prop('checked', false);
                            $('#actionDiv').hide();
                        },
                        error: function(xhr) {
                            datgin.error(xhr.responseJson.message ||
                                'Đã lỗi xảy ra, vui lòng thử lại sau!')
                        }
                    });
                }
            });
        });
    };

    function toggleActionDiv() {

        if ($('.select-item:checked').length > 0) {
            $('#actionDiv').show();
        } else {
            $('#actionDiv').hide();
        }
    }

    const handleDestroy = (model) => {
        $(document).on('click', '.btn-delete', function() {
            const id = $(this).data('id');

            Swal.fire({
                title: "Bạn có chắc chắn?",
                text: "Hành động này không thể hoàn tác!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Vâng, xóa ngay!",
                cancelButtonText: "Hủy"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/handle-bulk-action',
                        type: 'POST',
                        data: {
                            type: 'delete',
                            model,
                            ids: id
                        },
                        success: function(res) {
                            $('#myTable').DataTable().ajax.reload();
                            datgin.success(res.message)
                        },
                        error: function(xhr) {
                            datgin.error(xhr.responseJSON.message ||
                                'Đã có lỗi xảy ra, vui lòng thử lại sau!')
                        }
                    });
                }
            });
        });
    }

    const formatDataInput = function(input) {
        let $input = $(`#${input}`);

        // Hàm format số theo định dạng tiền tệ Việt Nam
        function formatNumber(value) {
            return Number(value).toLocaleString("vi-VN");
        }

        // Format ngay khi trang load nếu có giá trị
        let initialValue = $input.val().replace(/\./g, "");
        if (!isNaN(initialValue) && initialValue !== "") {
            $input.val(formatNumber(initialValue));
        }

        // Lắng nghe sự kiện nhập liệu
        $input.on('input', function() {
            let value = $(this).val().replace(/\./g, ""); // Xóa dấu chấm cũ
            if (!isNaN(value)) {
                $(this).val(formatNumber(value)); // Format lại số
            } else {
                $(this).val($(this).val().slice(0, -1)); // Xóa ký tự không hợp lệ
            }

            // Cập nhật giá trị vào input ẩn nếu cần
            console.log(`name=[${input.slice(5)}]`);
            console.log(value.replace(/\./g, ""));


            $(`input[name=${input.slice(5)}]`).val(value.replace(/\./g, ""));
        });
    };

    const previewImage = function(event, imgId) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function() {
            const imgElement = document.getElementById(imgId);
            imgElement.src = reader.result;
        }
        if (file) {
            reader.readAsDataURL(file);
        }
    }

    function updateCharCount(inputSelector, maxLength) {
        // Tìm label có 'for' tương ứng với inputSelector
        const labelSelector = $('label[for="' + inputSelector.substring(1) + '"]');

        // Tạo thẻ charCountSelector và thêm vào sau label
        const charCountSelector = $("<small></small>")
            .addClass("char-count")
            .css({
                position: "absolute",
                right: "1.2rem",
                top: "1rem",
            })
            .insertAfter(labelSelector);

        // Đặt maxlength ban đầu cho phần tử input/textarea
        $(inputSelector).attr("maxlength", maxLength);

        // Hàm cập nhật số ký tự
        $(inputSelector).on("input", function() {
            var currentLength = $(this).val().length;
            charCountSelector.text(currentLength + "/" + maxLength);

            // Kiểm tra khi đã đạt maxLength, ngừng nhập
            if (currentLength >= maxLength) {
                $(this).attr("maxlength", maxLength); // Ngừng cho phép nhập thêm ký tự
            }
        });

        // Cập nhật số ký tự ban đầu khi trang tải
        var initialLength = $(inputSelector).val().length;
        charCountSelector.text(initialLength + "/" + maxLength);
    }

    function autoGenerateSlug(fromSelector, toSelector) {
        $(fromSelector).on("input", function() {
            const text = $(this).val();
            const slug = text
                .toLowerCase()
                .normalize("NFD")
                .replace(/[\u0300-\u036f]/g, "")
                .replace(/đ/g, "d")
                .replace(/Đ/g, "d")
                .replace(/[^a-z0-9 -]/g, "")
                .replace(/\s+/g, "-")
                .replace(/-+/g, "-")
                .replace(/^-|-$/g, "")
                .trim();

            $(toSelector).val(slug).trigger("input"); // ✅ cập nhật rồi trigger input để char count update
        });
    }

    function formatCurrency(amount) {
        if (isNaN(amount)) return '₫0';
        return '₫' + Number(amount).toLocaleString('vi-VN');
    }

    function initStatusToggle({
        model,
        successCallback = null,
        errorCallback = null,
    }) {
        $(document).on('change', '.switch input[type="checkbox"]', function() {
            const checkbox = $(this);
            const newChecked = checkbox.prop('checked');
            const id = checkbox.closest('.switch').data('id');

            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Hành động này không thể hoàn tác!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Vâng, thay đổi!",
                cancelButtonText: "Hủy"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/handle-bulk-action',
                        type: 'POST',
                        data: {
                            model: model,
                            type: 'change-status',
                            ids: id
                        },
                        success: function(res) {
                            datgin.success(res.message);
                            if (typeof successCallback === 'function') successCallback(res,
                                id, newChecked);
                        },
                        error: function(xhr) {
                            checkbox.prop('checked', !newChecked); // Quay về nếu lỗi
                            datgin.error(
                                xhr.responseJSON?.message ||
                                'Đã có lỗi xảy ra, vui lòng thử lại sau!'
                            );
                            if (typeof errorCallback === 'function') errorCallback(xhr, id,
                                newChecked);
                        }
                    });
                } else {
                    checkbox.prop('checked', !newChecked);
                }
            });
        });
    }

    function formatCurrencyVND(number) {
        number = number.toString().replace(/\D/g, '');
        if (!number) return '';
        return number.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    $(document).on('input', '.format-currency', function() {
        const input = $(this);
        const raw = input.val().replace(/\D/g, '');
        const formatted = formatCurrencyVND(raw);
        input.val(formatted);
    });

    $('.format-currency').each(function() {
        const input = $(this);
        const raw = input.val().replace(/\D/g, '');
        const formatted = formatCurrencyVND(raw);
        input.val(formatted);
    });
</script>
@include('backend/includes/toastr')

@stack('scripts')
