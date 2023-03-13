@extends('frontend.layouts.app')

@section('content')
    <!-- start blogs -->
    <section class="blogs my-5">
        <div class="container">
            <h2 class="fw-bold">المدونة</h2>
            <div class="row">
                @forelse ($blogs as $blog)
                    <a href="blogDetails.html" class="col-lg-4 col-md-6 mb-4">
                        <div class="card blog-card">
                            <img src="images/blog1.png" class="card-img-top" height="270px" alt="...">
                            <div class="card-body pb-4">
                                <div class="d-flex justify-content-between">
                                    <h5> {{ $blog->title }}</h5>
                                    <p class="date">{{ $blog->created_at?->format('Y-m-d') }} <span class="me-1"> في
                                            {{ $blog->created_at?->format('H:i') }}</span></p>

                                </div>

                                <p class="card-text">
                                    {{ $blog->description }}
                                </p>
                            </div>
                        </div>
                    </a>

                @empty
                    <span class="col-lg-4 col-md-6 mb-4 text-center">
                        <div class="card blog-card">
                            <div class="card-body pb-4">
                                <div class="d-flex justify-content-between">
                                    <h5>لا يوجد مدونات</h5>
                                </div>
                            </div>
                        </div>
                    </span>
                @endforelse

            </div>
        </div>
    </section>
@endsection
