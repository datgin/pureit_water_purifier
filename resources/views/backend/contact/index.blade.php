@extends('backend.layouts.master')

@section('title', 'Danh sách danh mục')

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
                    danh sách tư vấn
                </li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Danh sách cần tư vấn</h4>
            <input type="text" class="form-control w-25" name=email value="{{ config('mail.to') }}" id="mailInput">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll" /></th>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Sản phẩm</th>
                            <th>Thời gian</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.16.1/sweetalert2.min.css') }}">
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.16.1/sweetalert2.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            const api = '{{ route('admin.contacts.index') }}'

            const columns = [{
                    data: "checkbox",
                    name: "checkbox",
                    orderable: false,
                    searchable: false,
                    width: "5px",
                    className: "text-center"
                },
                {
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                    orderable: false,
                    searchable: false,
                    width: "5px",
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'product',
                    name: 'product',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    searchable: false,
                    className: "text-center",
                },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false,
                    className: "text-center"
                },
            ];

            dataTables(api, columns, 'Contact', 6)

            handleDestroy('Contact')


        });

        document.getElementById('mailInput').addEventListener('keyup', function(e) {
            if (e.key === 'Enter') {
                const email = this.value;

                fetch('{{ route('admin.update-mail-env') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            email
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        alert(data.message);
                    })
                    .catch(err => console.error('Lỗi:', err));
            }
        });
    </script>
@endpush
