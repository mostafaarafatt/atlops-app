@extends('frontend.layouts.app')

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide home-slider" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @forelse ($sliders as $slider)
                @if ($loop->first)
                    <div class="carousel-item active">
                        <img src="{{asset($slider->getImage())}}" class="d-block w-100" alt="...">
                    </div>
                @endif
                <div class="carousel-item">
                    <img src="{{asset($slider->getImage())}}" class="d-block w-100" alt="...">
                </div>
            @empty
                <div class="carousel-item active">
                    <img src="{{asset('images/slider.png')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/slider.png')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/slider.png')}}" class="d-block w-100" alt="...">
                </div>
            @endforelse
        </div>
    </div>

    <section class="categories -5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="bg-white p-5 text-center people-category ">
                        <h3 class="mb-4">الأفراد</h3>

                            <a href="{{ route('categoriess') }}" class="">
                                <div class="card text-center px-3 category-offer w-75 m-auto">
                                    <img src="images/order.png" width="100" height="100" class=" m-auto mt-3"
                                        alt="...">
                                    <div class="card-body">
                                        <h4 class="card-text fw-bold">اطلب طلبك</h4>
                                    </div>
                                </div>
                            </a>



                        <a href="{{ route('peopleOrders') }}" class="">
                            <div class="card text-center px-3 category-offer mt-4 w-75 m-auto">
                                <img src="images/gift.png" width="100" height="100" class=" m-auto mt-3"
                                    alt="...">
                                <div class="card-body">
                                    <h4 class="card-text fw-bold"> عرض الطلبات</h4>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="p-5 text-center company-category ">
                        <h3 class="mb-4">الشركات والمؤسسات</h3>
                        @if (auth()?->user()?->type == '1')
                            <a href="{{ route('categoriess') }}" class="">
                                <div class="card text-center px-3 category-offer w-75 m-auto">
                                    <img src="images/order.png" width="100" height="100" class=" m-auto mt-3"
                                        alt="...">
                                    <div class="card-body">
                                        <h4 class="card-text fw-bold">اطلب طلبك</h4>
                                    </div>
                                </div>
                            </a>
                        @else
                            <a href="{{ route('home') }}" class="">
                                <div class="card text-center px-3 category-offer w-75 m-auto">
                                    <img src="images/order.png" width="100" height="100" class=" m-auto mt-3"
                                        alt="...">
                                    <div class="card-body">
                                        <h4 class="card-text fw-bold">اطلب طلبك</h4>
                                    </div>
                                </div>
                            </a>
                        @endif

                        <a href="{{ route('companyOrders') }}" class="">

                            <div class="card text-center px-3 category-offer mt-4 w-75 m-auto">
                                <img src="images/gift.png" width="100" height="100" class=" m-auto mt-3"
                                    alt="...">
                                <div class="card-body">
                                    <h4 class="card-text fw-bold"> عرض الطلبات</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection




@section('scripts')
    @auth
        @include('frontend.general._firebase')

    @endauth
@endsection
