<div class="container">
    <div class="footer-top">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-logo">
                    <img src="{{ showImage($setting->logo_footer) }}" alt="LogoFooter" class="logo_footer" />
                </div>
                <div class="footer-about mt-4">
                    <h6 class="fw-bold">Chúng tôi tự hào là</h6>
                    <p>Thành viên Hiệp hội Chất lượng nước Hoa Kỳ</p>
                    <p>Đạt chuẩn Nước uống đóng chai của Bộ Y tế</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-links">
                    <h5 class="fw-bold mb-3">Địa chỉ Showroom</h5>
                    <ul class="list-unstyled">
                        @php
                            $addresses = json_decode($setting->address, true) ?: [];
                        @endphp
                        @foreach ($addresses as $address)
                            <li class="d-flex align-items-start mb-2">
                                <i class="bi bi-geo-alt me-2 mt-1"></i>
                                <span>{{ $address }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <div class="social-icons mt-3">
                        <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-contact">
                    <h5 class="fw-bold mb-3">Tư vấn và liên hệ</h5>
                    <ul class="list-unstyled">
                        <li>
                            <i class="bi bi-telephone me-2"></i> Tổng đài: {{ $setting->hotline }}
                        </li>
                        <li>
                            <i class="bi bi-tools"></i>Bảo trì: {{ $setting->hotline_baotri }}
                        </li>
                        <li>
                            <i class="bi bi-briefcase"></i>
                            Kinh doanh: {{ $setting->hotline_kinhdoanh }}
                        </li>
                        <li class="mt-3">
                            <i class="bi bi-envelope me-2"></i>
                            {{ $setting->email }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-menu-bottom mt-4 pb-3">
        <ul class="list-inline text-center mb-0">
            <li class="list-inline-item"><a href="#">Trang chủ</a></li>
            @foreach ($productCategories as $category)
                <li class="list-inline-item"><a href="{{ route('product', $category->slug) }}">{{ $category->name }}</a>
                </li>
            @endforeach
            {{-- <li class="list-inline-item"><a href="#">Dịch Vụ</a></li> --}}
            <li class="list-inline-item"><a href="#">Tin tức</a></li>
        </ul>
    </div>
    <div class="footer-bottom pt-3">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <p class="mb-0 copyright">
                    &copy; {{ $setting->footer }}
                </p>
            </div>
        </div>
    </div>
</div>
