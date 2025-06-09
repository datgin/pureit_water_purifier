<div class="product-card text-start rounded bg-white shadow-sm p-3 d-flex flex-column h-100 position-relative">

    @if (isOnSale($product))
        <span class="discount-badge position-absolute top-0 start-0 bg-warning text-white rounded-circle d-flex align-items-center justify-content-center">
            {{ getDiscountPercent($product->price, $product->discount_value) }}%
        </span>
    @endif

    <a href="{{ route('product', [$product->category->slug, $product->slug]) }}">
        <img src="{{ $product->image }}" class="product-image mb-2" alt="Product Image">
    </a>

    <div class="flex-grow-1 d-flex flex-column">
        <h6 class="fw-bold product-title mb-1">
            <a href="{{ route('product', [$product->category->slug, $product->slug]) }}" class="text-dark text-decoration-none">
                {{ $product->name }}
            </a>
        </h6>

        <div class="price mb-2">
            <span class="discounted-price text-primary fw-bold">
                {{ formatPrice($product->discount_value ?? $product->price) }}
            </span>
        </div>

        <div class="mt-auto d-flex flex-column flex-md-row justify-content-between">
            <a href="{{ route('product', [$product->category->slug, $product->slug]) }}"
                class="btn btn-outline-primary rounded-pill w-100 mb-2 mb-md-0 me-md-2">Chi tiết</a>
            <a href="#" class="btn btn-primary rounded-pill w-100 btn-get-advice" data-id="{{ $product->id }}">
                Mua ngay
            </a>
        </div>
    </div>
</div>
