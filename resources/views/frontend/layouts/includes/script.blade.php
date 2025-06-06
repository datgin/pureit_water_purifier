 <script src="{{ asset('global/js/jquery-3.6.0.min.js') }}"></script>

 <script src="{{ asset('global/js/bootstrap.bundle.min.js') }}"></script>

 <script src="{{ asset('global/js/swiper-bundle.min.js') }}"></script>

 <script src="{{ asset('frontend/assets/js/aos.js') }}"></script>

 <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
 <script src="{{ asset('frontend/assets/js/popup.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 @stack('scripts')

 <script>
     const scrollTopBtn = document.getElementById("scrollTopBtn");

     // Hiện nút khi cuộn xuống
     window.onscroll = function() {
         if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
             scrollTopBtn.style.display = "flex";
         } else {
             scrollTopBtn.style.display = "none";
         }
     };

     // Cuộn lên đầu trang khi click
     scrollTopBtn.addEventListener("click", function() {
         window.scrollTo({
             top: 0,
             behavior: "smooth"
         });
     });
 </script>
