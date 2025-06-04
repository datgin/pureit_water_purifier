@extends('frontend.master')

@section('content')
    <!-- Banner Section -->
    <section class="category-banner">
        <div class="banner-content">
            <img src="{{asset('frontend/assets/image/banner_category.png')}}" alt="Category Banner" class="w-100" />
        </div>
    </section>

    <section class="product-list container mt-3 mb-5">
        <h2 class="mb-3">{{ $category->name }}</h2>
        <p>Hiển thị tất cả {{ $products->total() }} kết quả</p>

        <div class="row g-4">
            <!-- Product 1 -->
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-6">
                    <x-product-item :product="$product" />
                </div>
            @endforeach

        </div>

        <!-- Pagination -->
        {{ $products->links('vendor.pagination.custom') }}
    </section>
@endsection
