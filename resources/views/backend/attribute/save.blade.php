@extends('backend.layouts.master')

@section('title', 'Danh sách thuộc tính')

@section('content')


    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('admin') }}" class="mb-0 d-inline-block lh-1 text-uppercase">
                        Tổng quan
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.attributes.index') }}" class="mb-0 d-inline-block lh-1 text-uppercase">
                        thuộc tính
                    </a>
                </li>
                <li class="breadcrumb-item active text-uppercase" aria-current="page">
                    @if (!empty($attribute))
                        cập nhật thuộc tính - {{ $attribute->name }}
                    @else
                        thêm mới thuộc tính
                    @endif
                </li>
            </ol>
        </nav>
    </div>



    <form action="" method="post" id="myForm">
        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="name" class="form-label">Tên thuộc tính</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ optional($attribute)->name }}" placeholder="Nhập tên thuộc tính">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug"
                                    value="{{ optional($attribute)->slug }}" placeholder="Nhập slug">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex align-content-center justify-content-between">
                        <h4 class="card-title fs-6 fw-bold">Giá trị thuộc tính</h4>
                        <button type="button" class="btn btn-success btn-sm mt-2" id="add-value-row">
                            <i class="ti ti-plus"></i> Thêm giá trị
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="attribute-values-table">
                                <thead>
                                    <tr>
                                        <th width="80">STT</th>
                                        <th>Tên giá trị</th>
                                        <th width="150">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attribute->values ?? [] as $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <input type="text" class="form-control"
                                                    name="values[{{ $value->id }}]" value="{{ $value->value }}"
                                                    placeholder="Nhập tên giá trị">
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-danger btn-sm delete-row">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title fs-6 fw-bold">Xuất bản</h4>
                    </div>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary btn-sm fs-6 me-2">
                            <svg class="icon icon-left svg-icon-ti-ti-device-floppy" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                <path d="M14 4l0 4l-6 0l0 -4"></path>
                            </svg>
                            Lưu</button>

                        <a href="{{ route('admin.attributes.index') }}" class="btn btn-sm btn-light fs-6 border">
                            <svg class="icon icon-left svg-icon-ti-ti-refresh" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                            </svg>
                            Quay lại</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title fs-6 fw-bold required">Trạng thái
                        </h4>
                    </div>
                    <div class="card-body">
                        <select name="status" class="form-select form-control" id="status">
                            <option value="1" @selected($attribute->status ?? '')>Xuất bản </option>
                            <option value="0" @selected(optional($attribute)->status === false)>Chưa xuất bản</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection


@push('scripts')
    <script>
        $(function() {
            autoGenerateSlug('#name', '#slug')

            // Add new row
            $('#add-value-row').click(function() {
                const rowCount = $('#attribute-values-table tbody tr').length;
                const newRow = `
                    <tr>
                        <td>${rowCount + 1}</td>
                        <td>
                            <input type="text" class="form-control" name="new_values[]" placeholder="Nhập tên giá trị">
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger btn-sm delete-row">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                `;
                $('#attribute-values-table tbody').append(newRow);
            });

            // Delete row
            $(document).on('click', '.delete-row', function() {
                $(this).closest('tr').remove();
                // Update row numbers
                $('#attribute-values-table tbody tr').each(function(index) {
                    $(this).find('td:first').text(index + 1);
                });
            });

            $('#myForm').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                let id = {{ isset($attribute) ? $attribute->id : 'null' }};

                let url = id ? `/admin/attributes/${id}` : '/admin/attributes';

                if (id) {
                    formData.append('_method', 'PUT');
                }

                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        window.location.href = "/admin/attributes";
                    },
                    error: function(xhr) {
                        datgin.error(xhr.responseJSON?.message || 'Đã xảy ra lỗi.');
                    }
                });
            })
        });
    </script>
@endpush

@push('styles')
@endpush
