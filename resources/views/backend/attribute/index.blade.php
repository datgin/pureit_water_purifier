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
                <li class="breadcrumb-item active text-uppercase" aria-current="page">
                    thuộc tính
                </li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h4 class="card-title">
                Danh sách thuộc tính
            </h4>
            <a href="{{ route('admin.attributes.save') }}" class="btn btn-primary btn-sm">Thêm mới (+)</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="display" style="width:100%">
                    <thead>
                        <th><input type="checkbox" id="selectAll" /></th>
                        <th>STT</th>
                        <th>Tên thuộc tính</th>
                        <th>Terms</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.16.1/sweetalert2.min.js') }}"></script>

    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    @include('backend.attribute.columns')

    <script>
        $(document).ready(function() {

            const api = '{{ route('admin.attributes.index') }}'

            dataTables(api, columns, 'Attribute', 4)

            handleDestroy('Attribute')

            initStatusToggle({
                model: 'Attribute'
            });

        })
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.16.1/sweetalert2.min.css') }}">
@endpush
