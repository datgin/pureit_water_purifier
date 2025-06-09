<div class="offcanvas-header">
    <h5 class="offcanvas-title">Menu</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
</div>
<div class="offcanvas-body">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link fw-bold text-dark" href="{{ route('home') }}">Trang chủ</a>
        </li>
        @foreach ($productCategories as $category)
            <li class="nav-item">
                <a class="nav-link fw-bold" href="{{ route('product', $category->slug) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
        <li class="nav-item">
            <a class="nav-link fw-bold text-dark" href="{{route('news')}}">Tin tức</a>
        </li>
    </ul>
</div>
