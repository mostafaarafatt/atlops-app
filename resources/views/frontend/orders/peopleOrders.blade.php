@extends('frontend.layouts.app')

@section('head_script')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dselect.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
@endsection

@section('content')
    <section class="mt-5">
        <div class="container">
            <div class="owl-carousel owl-theme owl-categories">

                @foreach ($categoris as $category)
                    <a onclick="refreshOrder({{ $category->id }})">
                        <div class="categories-item">
                            <img src="{{ $category->getImage() }}" alt="categories" width="70px"
                                height="25px">
                            <p> {{ $category->name }} </p>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </section>


    <section class="orders">
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <div class="filter-sidebar wow fadeInRight h-100 bg-white" data-wow-duration="0.72s"
                        data-wow-delay="0.7s">
                        <button type="button" id="sidebarCollapse" class="btn btn-secondary">
                            <i class="fas fa-align-left"></i>
                            <span class="text-center"> الفلترة </span>
                        </button>
                        <nav id="sidebar">
                            <div class="sidebar-header d-flex align-items-center justify-content-center py-3">
                                <i class="fa-solid fa-filter mx-2"></i>

                                <h6 class="text-center text-white m-0">الفلترة</h6>
                            </div>
                            <form action="">
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-starts">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                                aria-controls="panelsStayOpen-collapseOne">
                                                القسم الرئيسي
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="panelsStayOpen-starts">
                                            <div class="accordion-body">

                                                @foreach ($categoris as $category)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="star1"
                                                            onclick="refreshOrder({{ $category->id }})"1qw>
                                                        <label class="form-check-label" for="star1">
                                                            {{ $category->name }} </label>
                                                    </div>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-sizes">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree"
                                                aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                                القسم الفرعي
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="panelsStayOpen-sizes">
                                            <div class="accordion-body">

                                                @foreach ($subcategoris as $subcategory)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="secondary-service" id="secondary-service1">
                                                        <label class="form-check-label" for="secondary-service1">
                                                            {{ $subcategory->subcategory_name }} </label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-color">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive"
                                                aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                                                خدمات اضافية
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse"
                                            aria-labelledby="panelsStayOpen-color">
                                            <div class="accordion-body">

                                                @foreach ($services as $service)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="size4">
                                                        <label class="form-check-label" for="size4">
                                                            {{ $service->service_name }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </form>
                        </nav>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row ">
                        <div class="col-md-4 mb-3">

                            <select id="SortOrder" name="SortOrder" class="form-select">
                                <option value="" selected disabled>التصنيف</option>
                                <option value="1">الأحدث</option>
                                <option value="2">الأقدم</option>
                            </select>

                        </div>


                        <div class="col-md-4 mb-3" hidden>
                            <select name="country" class="form-select" onclick="console.log($(this).val())"
                                onchange="console.log('change is firing')" id="city-search">
                                <option value="" disabled selected>المدينة </option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-3" hidden>
                            <select name="country-search" class="form-select" id="country-search">
                                <option value="" selected>الدولة</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <select name="Section" id="Section" class="form-select" id="city-search">
                                <option value="" selected disabled>الدولة</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3 ">
                            <select id="product" name="product" class="form-select" id="country-search">
                                <option value="" selected disabled>المدينة</option>
                            </select>
                        </div>

                    </div>

                    <div id="content">
                        @foreach ($user_orders as $order)
                            <div class="col-md-12 my-2">
                                <div class="card mb-3 order-card">
                                    <div class="row g-0">
                                        <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                                            <a href="{{ route('orderdetails', ['id' => $order->id]) }}">
                                                <img src='{{ $order->getImage() }}'
                                                    class=" rounded-circle img-fluid img-fluid" alt="..."
                                                    width="120px" height="120px">
                                            </a>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <a href="{{ route('orderdetails', ['id' => $order->id]) }}">
                                                        <h5 id="orderName" class="card-title"> {{ $order->name }}
                                                        </h5>
                                                    </a>

                                                    @if ($order->getfav(auth()->user()->id, $order->id))
                                                        <a href="" id="addWish" class="like"
                                                            onclick="addtowishlist({{ $order->id }},{{ auth()->user()->id }})">
                                                            <i class="fas fa-heart fa-2xl"
                                                                id="wishlist-{{ $order->id }}"></i>
                                                        </a>
                                                    @else
                                                        <a href="" id="addWish" class="like"
                                                            onclick="addtowishlist({{ $order->id }},{{ auth()->user()->id }})">
                                                            <i class="far fa-heart fa-2xl"
                                                                id="wishlist-{{ $order->id }}"></i>
                                                        </a>
                                                    @endif

                                                </div>
                                                <small class="text-secondary fw-bold">{{ $order->country_name }} ,
                                                    {{ $order->town_name }}</small>
                                                <p class="text-dark">{{ $order->description }}</p>
                                                <div class="d-flex justify-content-between more-details">
                                                    <p class="price fw-bold">السعر المتوقع: {{ $order->expected_start_price }} ألف -
                                                        {{ $order->expected_end_price }} ألف</p>
                                                    <strong class="text-secondary">تم النشر فى
                                                        {{ $order->created_at }}</strong>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        var cat_id = 0;
        var sort_id = 0;
        var country_id = 0;
        $(document).ready(function() {
            cat_id = 0;
            sort_id = 0;
            country_id = 0;
            console.log(cat_id);
        });
    </script>

    <script>
        dselect(document.querySelector('#city-search'), {
            search: true
        })
        dselect(document.querySelector('#country-search'), {
            search: true
        })
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        })
    </script>

    {{-- script for countries and towns --}}
    <script>
        $(document).ready(function() {
            $('select[name="Section"]').on('change', function() {
                var SectionId = $(this).val();
                console.log(SectionId);
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('country') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="product"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="product"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

    {{-- script to add and remove order to wishlist --}}
    <script>
        function addtowishlist($order_id, $user_id) {
            event.preventDefault();
            const CSRF_TOKEN = $('meta[name="csrf_token"]').attr('cnotent');
            var love_order;
            order_id = $order_id;
            // console.log(order_id);
            user_id = $user_id;

            // function to get the value of love_order of specific order and then check it
            $.ajax({
                url: "/api/order/getlovedorder",
                type: "post",
                data: {
                    CSRF_TOKEN,
                    'order_id': $order_id,
                    'user_id': $user_id
                },
                success: function(response) {
                    callback(response);
                    //alert(response);
                }
            });

            function callback(response) {
                love_order = response;
                //console.log(love_order);

                if (love_order == "0") {
                    $('#wishlist-' + order_id).removeClass("far fa-heart fa-2xl").addClass("fas fa-heart fa-2xl");
                    $.ajax({
                        url: "/api/order/addtowishlist",
                        type: 'post',
                        data: {
                            CSRF_TOKEN,
                            'order_id': $order_id,
                            'user_id': $user_id
                        },
                        success: function(data) {
                           // alert('تم اضافه المنتج الى المفضلة')
                        }
                    })

                } else {
                    $('#wishlist-' + order_id).removeClass("fas fa-heart fa-2xl").addClass("far fa-heart fa-2xl");
                    $.ajax({
                        url: "/api/order/removefromwishlist",
                        type: 'post',
                        data: {
                            CSRF_TOKEN,
                            'order_id': $order_id,
                            'user_id': $user_id
                        },
                        success: function(data) {
                           // alert('تم حذف المنتج من المفضلة')
                        }
                    })
                }
            }
        }
    </script>

    {{-- script for filter orders --}}
    <script>
        function refreshOrder($category_id) {
            event.preventDefault();
            const CSRF_TOKEN = $('meta[name="csrf_token"]').attr('cnotent');
            cat_id = $category_id;
            //console.log(cat_id);
            $.ajax({

                url: "/api/order/sort",
                type: 'post',
                data: {
                    CSRF_TOKEN,
                    'category_id': $category_id
                },
                success: function(data) {
                    $("#content").empty();
                    data.forEach(element => {
                        console.log(element);
                        var img = "{{ asset('') }}" + element.photo_path + element.photo_name[0];
                        var route = window.location.origin + '/orderdetails/' + element.id;
                        console.log(route);
                        var ele = `
                        <div class="col-md-12 my-2">
                            <div class="card mb-3 order-card">
                                <div class="row g-0">
                                    <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                                        <a href="${route}">
                                            <img src=${img}
                                                class=" rounded-circle img-fluid img-fluid" alt="..." width="120px"
                                                height="120px">
                                        </a>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="${route}">
                                                    <h5 id="orderName" class="card-title"> ${element.orderName} </h5>
                                                </a>
                                                <button>
                                                    <i class="fa-solid fa-heart fa-2xl"></i>
                                                </button>

                                            </div>
                                            <small class="text-secondary fw-bold">${element.country_name} , ${element.town_name}</small>
                                            <p class="text-dark">${element.orderDescription}</p>
                                            <div class="d-flex justify-content-between more-details">
                                                <p class="price fw-bold">السعر المتوقع: ${element.startPrice} ألف -
                                                    ${element.endPrice} ألف</p>
                                                <strong class="text-secondary">تم النشر فى ${element.date}</strong>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;

                        $("#content").append(ele);
                    });

                },
            })
        }
    </script>

    {{-- الاحدث والاقدم --}}
    <script>
        $(document).ready(function() {
            $('#SortOrder').on('change', function() {
                var SortValue = $('#SortOrder').val();
                sort_id = SortValue;
                console.log(SortValue);
                if (SortValue) {
                    $.ajax({
                        url: "/api/order/arrange",
                        type: "post",
                        dataType: "json",
                        data: {
                            'value': SortValue,
                            'category_id': cat_id,
                        },
                        success: function(data) {
                            $("#content").empty();
                            data.forEach(element => {
                                console.log(element);
                                var img = "{{ asset('') }}" + element.photo_path +
                                    element.photo_name[0];
                                var route = window.location.origin + '/orderdetails/' +
                                    element.id;
                                console.log(route);
                                var ele = `
                        <div class="col-md-12 my-2">
                            <div class="card mb-3 order-card">
                                <div class="row g-0">
                                    <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                                        <a href="${route}">
                                            <img src=${img}
                                                class=" rounded-circle img-fluid img-fluid" alt="..." width="120px"
                                                height="120px">
                                        </a>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="${route}">
                                                    <h5 id="orderName" class="card-title"> ${element.orderName} </h5>
                                                </a>
                                                <button>
                                                    <i class="fa-solid fa-heart fa-2xl"></i>
                                                </button>

                                            </div>
                                            <small class="text-secondary fw-bold">${element.country_name} , ${element.town_name}</small>
                                            <p class="text-dark">${element.orderDescription}</p>
                                            <div class="d-flex justify-content-between more-details">
                                                <p class="price fw-bold">السعر المتوقع: ${element.startPrice} ألف -
                                                    ${element.endPrice} ألف</p>
                                                <strong class="text-secondary">تم النشر فى ${element.date}</strong>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;

                                $("#content").append(ele);
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

    {{-- script for filter orders using countries --}}
    <script>
        $(document).ready(function() {
            $('#Section').on('change', function() {
                var country = $('#Section').val();
                country_id = country;
                console.log(country);
                if (country) {
                    $.ajax({
                        url: "/api/order/country",
                        type: "post",
                        dataType: "json",
                        data: {
                            'value': country,
                            'category_id': cat_id,
                            'sort_id': sort_id
                        },
                        success: function(data) {
                            $("#content").empty();
                            data.forEach(element => {
                                console.log(element);
                                var img = "{{ asset('') }}" + element.photo_path +
                                    element.photo_name[0];
                                var route = window.location.origin + '/orderdetails/' +
                                    element.id;
                                console.log(route);
                                var ele = `
                        <div class="col-md-12 my-2">
                            <div class="card mb-3 order-card">
                                <div class="row g-0">
                                    <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                                        <a href="${route}">
                                            <img src=${img}
                                                class=" rounded-circle img-fluid img-fluid" alt="..." width="120px"
                                                height="120px">
                                        </a>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="${route}">
                                                    <h5 id="orderName" class="card-title"> ${element.orderName} </h5>
                                                </a>
                                                <button>
                                                    <i class="fa-solid fa-heart fa-2xl"></i>
                                                </button>

                                            </div>
                                            <small class="text-secondary fw-bold">${element.country_name} , ${element.town_name}</small>
                                            <p class="text-dark">${element.orderDescription}</p>
                                            <div class="d-flex justify-content-between more-details">
                                                <p class="price fw-bold">السعر المتوقع: ${element.startPrice} ألف -
                                                    ${element.endPrice} ألف</p>
                                                <strong class="text-secondary">تم النشر فى ${element.date}</strong>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;

                                $("#content").append(ele);
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

    {{-- script for filter orders using towns --}}
    <script>
        $(document).ready(function() {
            $('#product').on('change', function() {
                var town = $('#product').val();
                console.log(town);
                if (town) {
                    $.ajax({
                        url: "/api/order/town",
                        type: "post",
                        dataType: "json",
                        data: {
                            'value': town,
                            'category_id': cat_id,
                            'sort_id': sort_id,
                            'country_id': country_id
                        },
                        success: function(data) {
                            $("#content").empty();
                            data.forEach(element => {
                                console.log(element);
                                var img = "{{ asset('') }}" + element.photo_path +
                                    element.photo_name[0];
                                var route = window.location.origin + '/orderdetails/' +
                                    element.id;
                                console.log(route);
                                var ele = `
                        <div class="col-md-12 my-2">
                            <div class="card mb-3 order-card">
                                <div class="row g-0">
                                    <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                                        <a href="${route}">
                                            <img src=${img}
                                                class=" rounded-circle img-fluid img-fluid" alt="..." width="120px"
                                                height="120px">
                                        </a>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="${route}">
                                                    <h5 id="orderName" class="card-title"> ${element.orderName} </h5>
                                                </a>
                                                <button>
                                                    <i class="fa-solid fa-heart fa-2xl"></i>
                                                </button>

                                            </div>
                                            <small class="text-secondary fw-bold">${element.country_name} , ${element.town_name}</small>
                                            <p class="text-dark">${element.orderDescription}</p>
                                            <div class="d-flex justify-content-between more-details">
                                                <p class="price fw-bold">السعر المتوقع: ${element.startPrice} ألف -
                                                    ${element.endPrice} ألف</p>
                                                <strong class="text-secondary">تم النشر فى ${element.date}</strong>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;

                                $("#content").append(ele);
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
