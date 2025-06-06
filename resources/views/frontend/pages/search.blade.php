@extends('frontend.master')

@section('content')
    <!-- Banner Section -->
    @isset($category)
        <section class="category-banner">
            <div class="banner-content">
                <img src="{{ showImage($category->banner) }}" alt="Category Banner" class="w-100" />
            </div>
        </section>
    @endisset


    <section class="product-list container mt-3 mb-5">
        <h2 class="mb-3">Kết quả tìm kiếm : {{ $keyword }}</h2>
        @if ($products->total() > 0)
            <p>Hiển thị tất cả {{ $products->total() }} kết quả</p>

            <div class="row g-4">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4 col-6">
                        <x-product-item :product="$product" />
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            {{ $products->appends(['s' => $keyword])->links('vendor.pagination.custom') }}
        @else
            <p>It seems we can't find what you're looking for.</p>
        @endif

    </section>
@endsection
