@extends('frontend.master')
@section('content')
    <!-- Blog Topics Section -->
    <section class="blog-topics container">
        <h2 class="mb-4">Chủ đề</h2>
        <div class="topic-list d-flex gap-4 mb-3">
            @foreach ($blogCategories as $blog)
                <a href="{{ route('news', ['slug' => $blog->slug]) }}" class="topic-item">
                    {{ $blog->name }}
                </a>
            @endforeach


        </div>

        <!-- Blog Posts Section -->
        <div class="blog-posts row g-4">
            @foreach ($news as $new)
                <!-- Blog Post Card 1 -->
                <div class="col-md-4 col-sm-6">
                    <div class="blog-card card h-100 shadow-sm">
                        <img src="{{ $new->image }}" class="card-img-top" alt="Blog Post Image" />
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $new->title }}</h5>
                            <p class="card-text text-muted mb-3">Ngày đăng:
                                {{ \Carbon\Carbon::parse($new->posted_at)->format('d/m/Y') }}</p>

                            <p class="card-text">
                               {{$new->short_description}}
                            </p>
                            <a href="{{route('detail', $new->slug)}}" class="mt-auto text-primary fw-bold">Đọc tiếp <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Add more blog post cards as needed -->
        </div>

        <!-- Pagination -->
        <nav class="mt-5" aria-label="Page navigation">
            <ul class="pagination justify-content-center gap-1">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Trước</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Sau</a>
                </li>
            </ul>
        </nav>
    </section>
@endsection
