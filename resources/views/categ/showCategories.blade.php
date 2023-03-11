<!doctype html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Open+Sans:wght@300;400&display=swap"
        rel="stylesheet">
    <title>Atlob</title>

</head>

<body>
    <!-- start navbar -->
    <nav class=" w-100 shadow sticky-top bg-white">
        <div class="d-flex justify-content-between p-3 align-items-center container ">
            <div>
                <a href="index.html">
                    <img src="images/logo.png" alt="Company Logo" height="48" width="100px">

                </a>
            </div>
            <div>
                <div class="d-flex position-relative align-items-center">

                    <div class="d-flex align-items-center login-button mx-5">
                        <a href="login.html" class="custom-link">تسجيل الدخول <i class="ms-1 gg-chevron-down "></i></a>
                    </div>
                    <div id="subMenu">
                        <span class="hamLine"></span>
                        <span class="hamLine"></span>
                        <span class="hamLine"></span>
                    </div>
                    <div id="fullPageMenu" class="visually-hidden">
                        <div class="anton d-flex align-items-center position-fixed  start-0 blurOverlay">
                            <div class="container">
                                <div class="my-4"><a href="favorites.html" class="custom-link"> <i><i
                                                class="fa-solid fa-heart ms-2 fa-xl"></i></i><span>المفضلة</span></a>
                                </div>
                                <div class="my-4"><a href="blogs.html" class="custom-link"><i
                                            class="fa-solid fa-pen-to-square ms-2 fa-xl"></i>المدونة </a></div>
                                <div class="my-4"><a href="bankAccount.html" class="custom-link"> <i
                                            class="fa-solid fa-money-bill-trend-up ms-2 fa-xl "></i>الحساب البنكى</a>
                                </div>
                                <div class="my-4"><a href="conditions.html" class="custom-link"><i
                                            class="fa-solid fa-file-lines ms-2 fa-xl"></i>
                                        الشروط والاحكام</a></div>

                                <div class="my-4"><a href="aboutUs.html" class="custom-link"><i
                                            class="fa-solid fa-users ms-2 fa-xl"></i>من نحن
                                    </a></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </nav>
    <!-- end navbar -->


    <!-- start categories -->
    <section class="available-categories ">
        <div class="container">
            <h2 class="text-center mt-5 fw-bold">الفئات المتاحة </h2>
            <div class="row text-center ">


                @foreach ($categories as $category)
                    <div class=" col-lg-3 col-md-6 col-sm-6 col-xs-12 mt-4 ">
                        <a href="{{ route('orderDetails', ['id' => $category->id]) }}">
                            <div class="card text-center px-3 py-4 category">
                                <div class="category-img-con d-flex align-items-center justify-content-center m-auto">
                                    <img src="images/{{ $category->category_image }}" class="" width="70px"
                                        height="50px" alt="...">

                                </div>
                                <div class="card-body">
                                    <h5 class="card-text fw-bold">{{ $category->category_name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach





            </div>

        </div>

    </section>
    <!-- end categories -->

    <nav>
        <div class="container">
            <div class="position-fixed text-uppercase  pt-2 start-0 text-center bottom-0 w-100" role=navigation>
                <div class="container">
                    <div class=" p-3 shadow-lg  bottom-navbar">
                        <div class="d-flex align-items-center justify-content-around">
                            <div class="navLink navLinkActive"><a href="{{ url('/') }}">
                                    <div class="mb-2"><i class="fa-solid fa-house-chimney-window fa-xl"></i></div>
                                    <div class=navLabel>الرئيسية</div>
                                </a></div>
                            <div class=navLink><a href="{{ route('login') }}">
                                    <div class="mb-2"><i class="fa-solid fa-cart-shopping fa-xl"></i></div>
                                    <div class=navLabel>طلباتي</div>
                                </a></div>

                            <div class=navLink><a href="{{ route('getAllChats') }}">
                                    <div class="mb-2"><i class="fa-regular fa-message fa-xl"></i></div>
                                    <div class=navLabel>رسائلي</div>
                                </a></div>
                            <div class=navLink><a href="{{ route('login') }}">
                                    <img src="images/user.png" width="40px" height="40">
                                    <div class=navLabel>حسابي</div>
                                </a></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/b4c05b8dbd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/main.js"></script>
    <script></script>

</body>

</html>
