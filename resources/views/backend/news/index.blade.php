@extends('backend.layouts.master')
@section('title', 'Danh sách bài viết')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Danh sách bài viết</h4>
            <div class="card-tools">
                <a href="{{ route('admin.news.create') }}" class="btn btn-primary btn-sm">Thêm mới bài viết (+)</a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center"><input type="checkbox" id="selectAll" /></th>
                            <th>Ảnh</th>
                            <th>Tiêu đề</th>
                            <th>Đường dẫn</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $item)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" class="row-checkbox" value="{{ $item->id }}" />
                                </td>
                                <td>
                                    @if ($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" width="40" height="50"
                                            alt="{{ $item->title }}" />
                                    @else
                                        <span>Không có ảnh</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.news.edit', $item->id) }}">
                                        <strong class="text-primary">{{ $item->title }}</strong>
                                    </a>
                                </td>
                                <td>
                                    {{-- <a target="_blank" href="{{ route('news.detail', $item->slug) }}">
                                        {{ route('news.detail', $item->slug) }}
                                    </a> --}}
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-danger delete-blog" data-id="{{ $item->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                        @if ($news->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center">Không có bài viết nào.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
    <style>
        .table th,
        .table td {
            vertical-align: middle !important;
            text-align: center;
            padding: 8px 6px;
            font-size: 13px;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
        }

        .table td.text-left {
            text-align: left !important;
        }

        .img-thumbnail {
            width: 100px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            margin: 0 auto;
        }

        .badge {
            padding: 4px 10px;
            font-size: 11px;
            border-radius: 10px;
            font-weight: 500;
        }

        .btn-sm {
            padding: 0.12rem 0.32rem;
            margin: 0 3px;
            border-radius: 7px;
            font-size: 11px;
            min-width: 26px;
            min-height: 26px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        #myTable th,
        #myTable td {
            padding: 8px 6px;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable({
                "pageLength": 5,
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "Tất cả"]
                ],
                "ordering": true,
                "searching": true,
                "responsive": true,
                "order": [
                    [1, 'desc']
                ],
                "columnDefs": [{
                    "targets": [0, 8], // Cột checkbox và action
                    "orderable": false
                }]
            });

            // Xử lý checkbox select all
            $('#selectAll').on('click', function() {
                $('.blog-checkbox').prop('checked', $(this).prop('checked'));
            });

            // Xử lý xóa bài viết
            $('.delete-blog').on('click', function() {
                const id = $(this).data('id');
                Swal.fire({
                    title: 'Bạn có chắc chắn?',
                    text: "Bạn không thể hoàn tác sau khi xóa!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Có, xóa nó!',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Gửi request xóa
                        $.ajax({
                            url: `{{ route('admin.news.delete', ':id') }}`.replace(
                                ':id', id),
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire(
                                        'Đã xóa!',
                                        response.message ||
                                        'Sản phẩm đã được xóa thành công.',
                                        'success'
                                    ).then(() => {
                                        window.location.reload();
                                    });
                                } else {
                                    Swal.fire(
                                        'Lỗi!',
                                        response.message ||
                                        'Có lỗi xảy ra khi xóa bài viết.',
                                        'error'
                                    );
                                }
                            },
                            error: function(xhr) {
                                console.error('Lỗi:', xhr);
                                Swal.fire(
                                    'Lỗi!',
                                    xhr.responseJSON?.message ||
                                    'Có lỗi xảy ra khi xóa bài viết.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
