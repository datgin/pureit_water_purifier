@extends('backend.layouts.master')
@section('title', 'Thêm mới sản phẩm')

@section('content')
    <div class="card">
        <div class="card-header  d-flex justify-content-between align-items-center">
            <h3 class="card-title m-0">Cấu hình SEO</h3>
            <a href="{{ route('admin.config.index') }}">Cấu hình công ty</a>
        </div>
    </div>

    <div class="card-body" style="background: #ffffff !important;">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <form action="{{ route('admin.config.seo') }}" method="post" enctype="multipart/form-data"
                                id="myForm">
                                @csrf
                                <div class="tab-pane fade show active" aria-labelledby="info-tab">
                                    <div class="row">

                                        <div class="form-group mb-3">
                                            <label for="title_seo" class="form-label">Tiêu đề seo</label>
                                            <input type="text" value="{{ $config->title_seo }}" placeholder="Tiêu đề seo"
                                                id="title_seo" name="title_seo" class="form-control">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="description_seo" class="form-label">Mô tả seo</label>
                                            <textarea name="description_seo" id="description_seo" cols="30" rows="4" class="form-control ckeditor"
                                                placeholder="Mô tả seo">{{ $config->description_seo }}</textarea>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="keyword_seo" class="form-label">Từ khóa seo</label>
                                            <input id="keyword_seo" class="form-control" value="{{ $config->keyword_seo }}" name="keyword_seo">
                                        </div>



                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" />
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script>
    const BASE_URL = "{{ url('/') }}";
</script>
<script src="{{ asset('ckfinder_php_3.7.0/ckfinder/ckfinder.js') }}"></script>
    <script>
        $(document).ready(function() {

            var input = document.querySelector('#keyword_seo');
            var tagify = new Tagify(input, {
                maxTags: 10,
                placeholder: "Nhập từ khóa...",
            });


            ckeditor('description_seo')
        });
    </script>
@endpush
