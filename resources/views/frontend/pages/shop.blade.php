@extends('frontend.master')

@section('content')
    <!-- Banner Section -->
    <section class="category-banner">
        <div class="banner-content">
            <img src="./assets/image/b6df7eede994ed1377548649c671f4a4-1.png" alt="Category Banner" class="w-100" />
        </div>
    </section>

    <section class="product-list container mt-3">
        <h2 class="mb-3">Máy lọc nước</h2>
        <p>Hiển thị tất cả 10 kết quả</p>

        <div class="row g-4">
            <!-- Product 1 -->
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="product-card text-start rounded bg-white shadow-sm p-3">
                        <span
                            class="discount-badge position-absolute top-0 start-0 bg-warning text-white rounded-circle d-flex align-items-center justify-content-center">36%</span>
                        <img src="{{$product->image}}" class="product-image mb-3"
                            alt="Product Image" />
                        <h6 class="fw-bold product-title">{{$product->name}}</h6>
                        <div class="price mt-3">
                            <span class="original-price text-muted text-decoration-line-through me-2">{{number_format($product->price, 0, ',', '.')}} đ</span>
                            <span class="discounted-price text-primary fw-bold">{{number_format($product->discount_value, 0, ',', '.')}} đ</span>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{route('detail', $product->slug)}}" class="btn btn-outline-primary rounded-pill flex-grow-1 me-2">Chi tiết</a>
                            <a href="#" class="btn btn-primary rounded-pill flex-grow-1">Mua ngay</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- Pagination -->
        <nav class="mt-5" aria-label="Page navigation">
            <ul class="pagination justify-content-center gap-1">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Trước</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Sau</a>
                </li>
            </ul>
        </nav>
    </section>
@endsection
