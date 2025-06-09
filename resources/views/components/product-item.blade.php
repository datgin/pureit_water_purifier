<a href="{{ route('product', [$product->category->slug, $product->slug]) }}">
    <div class="product-card text-start rounded bg-white shadow-sm p-3">
        @if (isOnSale($product))
            <span
                class="discount-badge position-absolute top-0 start-0 bg-warning text-white rounded-circle d-flex align-items-center justify-content-center">{{ getDiscountPercent($product->price, $product->discount_value) }}%</span>
        @endif

        <img src="{{ $product->image }}" class="product-image mb-3" alt="Product Image" />
        <h6 class="fw-bold product-title">
            {{ $product->name }}
        </h6>
        <div class="price mt-3">
            @if (isOnSale($product))
                <span
                    class="original-price text-muted text-decoration-line-through me-2">{{ formatPrice($product->price) }}
                    đ</span>
                <span class="discounted-price text-primary fw-bold">
                    {{ formatPrice($product->discount_value) }}
                </span>
            @else
                <span class="discounted-price text-primary fw-bold">
                    {{ formatPrice($product->price) }}
                </span>
            @endif
        </div>
        <div class="d-flex flex-column flex-md-row justify-content-between mt-3">
            <a href="{{ route('product', [$product->category->slug, $product->slug]) }}"
                class="btn btn-outline-primary rounded-pill w-100 mb-2 mb-md-0 me-md-2">Chi tiết</a>
            <a href="#" class="btn btn-primary rounded-pill w-100 btn-get-advice" data-id={{ $product->id }}>Mua
                ngay</a>
        </div>

    </div>
</a>
