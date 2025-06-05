$(function () {
    AOS.init({
        once: true, // Tất cả hiệu ứng chỉ chạy 1 lần
        offset: 120,
    });

    if (window.innerWidth < 768) {
        document
            .querySelectorAll("[data-aos='fade-left'], [data-aos='fade-right']")
            .forEach((el) => {
                el.setAttribute("data-aos", "fade-up");
            });
    }

    // Khi click vào icon search
    $(".bi-search").on("click", function () {
        $("#searchOverlay").addClass("active");
        $("#searchInput").focus();
    });

    // Khi click vào nút close
    $(".closeSearch").on("click", function () {
        $("#searchOverlay").removeClass("active");
    });

    // Optional: Nhấn ESC để thoát
    $(document).on("keydown", function (e) {
        if (e.key === "Escape") {
            $("#searchOverlay").removeClass("active");
        }
    });

    const swiper = new Swiper(".mySwiper", {
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    });

    // const productSwiper = new Swiper(".productSwiper", {
    //     slidesPerView: 1,
    //     spaceBetween: 20,
    //     loop: true,
    //     pagination: {
    //         el: ".swiper-pagination",
    //         clickable: true,
    //     },
    //     navigation: {
    //         nextEl: ".product-swiper-next",
    //         prevEl: ".product-swiper-prev",
    //     },
    //     autoplay: {
    //         delay: 3000,
    //         disableOnInteraction: false,
    //     },
    //     breakpoints: {
    //         768: {
    //             slidesPerView: 2,
    //         },
    //         992: {
    //             slidesPerView: 3,
    //         },
    //         1200: {
    //             slidesPerView: 4,
    //         },
    //     },
    // });

    const testimonialSwiper = new Swiper(".testimonialSwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
            el: ".testimonial-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 5000, // Slower autoplay for testimonials
            disableOnInteraction: false,
        },
    });

    // Blog Topic Click Handler
    $(".blog-topics .topic-item").on("click", function (e) {
        e.preventDefault(); // Prevent default link behavior

        // Remove active class from all topic items
        $(".blog-topics .topic-item").removeClass("active");

        // Add active class to the clicked topic item
        $(this).addClass("active");

        // Optional: Add a simple fade effect to the blog posts section
        $(".blog-posts").fadeOut(300, function () {
            // In a real scenario, you would load new content here
            $(".blog-posts").fadeIn(300);
        });
    });

    const relatedPostsSwiper = new Swiper(".relatedPostsSwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: ".related-posts .swiper-button-next",
            prevEl: ".related-posts .swiper-button-prev",
        },
        pagination: {
            el: ".related-posts .swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
        },
    });

    // Product Detail Swipers
    const productThumbSwiper = new Swiper(".productThumbSwiper", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        breakpoints: {
            768: {
                slidesPerView: 4,
            },
            576: {
                slidesPerView: 3,
            },
            0: {
                slidesPerView: 3,
            },
        },
    });

    const productMainSwiper = new Swiper(".productMainSwiper", {
        spaceBetween: 10,
        loop: true,
        thumbs: {
            swiper: productThumbSwiper,
        },
    });

    const recommendedProductsSwiper = new Swiper(".recommendedProductsSwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: ".recommended-products .swiper-button-next",
            prevEl: ".recommended-products .swiper-button-prev",
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            },
        },
    });
});
