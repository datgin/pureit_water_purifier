<nav class="navbar fixed-header px-4 py-2">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <!-- Mobile menu icon -->
        <button class="btn p-0 border-0 bg-transparent mobile-only" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#mobileMenu">
            <i class="bi bi-list fs-3"></i>
        </button>

        <!-- Logo center -->
        <a href="#" class="navbar-brand mx-auto mobile-only">
            <img src="./assets/image/logo.png" alt="Logo" class="logo" />
        </a>

        <!-- Desktop logo left -->
        <a href="#" class="navbar-brand desktop-only">
            <img src="./assets/image/logo.png" alt="Logo" class="logo" />
        </a>

        <!-- Desktop menu -->
        <div class="desktop-only">
            <ul class="navbar-nav flex-row">
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="#gioi-thieu">Về Pureit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="#">Máy lọc nước</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="#">Lõi lọc thay thế</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="#">Dịch Vụ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="#">Tin tức</a>
                </li>
            </ul>
        </div>

        <!-- Chỉ hiển thị trên desktop -->
        <div class="d-flex align-items-center gap-2">
            <div class="desktop-only d-flex align-items-center gap-2">
                <a href="tel:1900633463" class="btn btn-outline-call d-flex align-items-center">
                    <i class="bi bi-telephone me-2"></i>1900 633 463
                </a>
                <a href="#" class="btn btn-advice">NHẬN TƯ VẤN NGAY</a>
            </div>
            <!-- Icon tìm kiếm luôn hiển thị -->
            <button type="button" class="text-dark fs-4 border rounded-circle search-icon">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </div>
</nav>
