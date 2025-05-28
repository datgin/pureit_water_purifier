@extends('backend.layouts.master')

@section('title', 'Danh sách danh mục')

@section('content')
    <div class="row">
        {{-- Danh sách bên trái --}}
        <div class="col-md-9">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Danh sách danh mục</h4>
                    <a href="{{ route('admin.category.trash') }}"
                        class="btn btn-danger text-white d-flex align-items-center gap-2 rounded" title="Thùng rác">
                        <p class="mb-0">Thùng rác</p>
                        <i class="fa-solid fa-trash-can"></i>
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAll" /></th>
                                    <th>STT</th>
                                    <th>Tên danh mục</th>
                                    <th>Slug</th>
                                    <th>Thời gian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                    <tr>
                                        <td><input type="checkbox" class="item-checkbox" /></td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->slug }}</td>
                                        <td>{{ $item->created_at->format('d/m/Y - H:i') }}</td>
                                        <td>
                                            <i class="fa-solid fa-pen m-4 text-primary" style="cursor: pointer"
                                                data-bs-toggle="modal" data-bs-target="#editCategoyModal"
                                                data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                                data-slug="{{ $item->slug }}">
                                            </i>

                                            <i class="fa-solid fa-trash m-4 text-danger" style="cursor: pointer"
                                                onclick="confirmDelete({{ $item->id }}, '{{ $item->name }}')">
                                            </i>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form thêm mới bên phải --}}
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thêm danh mục mới</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên danh mục</label>
                            <input type="text" name="name" id="name" class="form-control">
                            @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-success">Thêm mới <p>{{ session('success') }}</p></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{ session()->flash('success', 'ok') }}
    {{-- @dd(session('success')) --}}
@endsection

<form id="deleteForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

@include('backend.categories.edit');

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    @if (session()->has('success'))
        <script>
            datgin.success("{{ session('success') }}");
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            datgin.error("{{ session('error') }}");
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "pageLength": 5,
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "Tất cả"]
                ],
                "ordering": true,
                "searching": true,
                "responsive": true
            });
        });

        $(document).on('click', '.fa-pen', function() {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const slug = $(this).data('slug');
            $('#edit-id').val(id);
            $('#edit-name').val(name);
            $('#editCategoyFrom').attr('action', `/admin/category/${id}`);
        });
    </script>

    <script src="{{ asset('backend/assets/js/modal_category.js') }}"></script>

    <script>
        function confirmDelete(id, name) {
            if (confirm("Bạn có chắc chắn muốn xóa danh mục: " + name + "?")) {
                const form = document.getElementById('deleteForm');
                form.action = '/admin/category/' + id + '/soft-delete';
                form.submit();
            }
        }
    </script>
@endpush
