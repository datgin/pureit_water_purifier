<body>
    <div class="overlay" id="overlay"></div>
    <div class="popup" id="popup">
        <span class="close-btn" id="closePopup">×</span>
        <div class="popup-content">
            <h2>Nhận tư vấn ngay</h2>
            <form method="POST" id="adviceForm" action="{{ route('send.email') }}">
                @csrf
                <input type="hidden" name="product_id" id="product_id">
                <div>
                    <label>Họ và tên *</label>
                    <input type="text" name="name" placeholder="Họ và tên">
                    <div class="error-message">Vui lòng nhập đầy đủ thông tin.</div>
                </div>
                <div>
                    <label>Số điện thoại *</label>
                    <input type="tel"  name="phone" placeholder="Số điện thoại">
                    <div class="error-message">Vui lòng nhập đầy đủ thông tin.</div>
                </div>
                <div>
                    <label>Email *</label>
                    <input type="email" name="email" placeholder="Email">
                    <div class="error-message">Vui lòng nhập đầy đủ thông tin.</div>
                </div>
                <button type="button" id="submitBtn">Đăng ký</button>
            </form>
            <p>Bằng cách nhấn "Đăng ký" bạn đã đồng ý nhận tư vấn và thông tin từ chúng tôi.</p>
        </div>
    </div>



