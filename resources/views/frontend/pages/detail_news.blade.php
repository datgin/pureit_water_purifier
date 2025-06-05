@extends('frontend.master')
@section('content')
    <section class="blog-detail container mt-4">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <article>
                    <h1 class="blog-detail-title mb-3">{{ $news->title }}</h1>
                    <p class="text-muted mb-4">Ngày đăng: {{ \Carbon\Carbon::parse($news->posted_at)->format('d/m/Y') }}</p>

                    <img src="{{ $news->image }}" alt="Featured Image" class="img-fluid mb-4 rounded">

                    <div class="blog-content">
                        <p>{{ $news->short_description }}</p>

                        <p>{!! $news->content !!}</p>


                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Related Posts Section -->
    <section class="related-posts container mt-5 mb-5">
        <h2 class="mb-4 text-center">Bài viết liên quan</h2>
        <div class="swiper relatedPostsSwiper">
            <div class="swiper-wrapper">
                <!-- Related Post Card 1 -->
                @foreach ($relatedNews as $news)
                    <div class="swiper-slide">
                        <div class="blog-card card h-100 shadow-sm">
                            <img src="{{ $news->image }}" class="card-img-top" alt="Related Post Image">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">{{ $news->title }}</h5>
                                <p class="card-text text-muted mb-3">Ngày đăng:
                                    {{ \Carbon\Carbon::parse($news->posted_at)->format('d/m/Y') }}</p>
                                <p class="card-text">{{ Str::words($news->short_description, '15') }}</p>
                                <a href="{{ route('detail', $news->slug) }}" class="mt-auto text-primary fw-bold">Đọc tiếp
                                    <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Add more related post cards as needed -->
            </div>

            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>

            <!-- Add Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
@endsection
