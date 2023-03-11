<!doctype html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Open+Sans:wght@300;400&display=swap"
        rel="stylesheet">
    <title>Atlob</title>

</head>

<body class="body-forms">
    <section class="login py-5 forms">
        <div class="container">
            <h2 class="text-center my-5 text-white ">أطلب
                <br>Atlop

            </h2>
            <div class="row">
                <div class="col-lg-7 col-md-4 empty"></div>
                <div class="col-lg-5 col-md-8 form-cont">
                    <form method="POST" action="{{ route('send-otp') }}" class="bg-white p-5 form-body">
                        @csrf
                        <h5 class="modal-title w-100 fw-bold mb-4"> نسيت كلمة المرور</h5>
                        <p>يرجى إدخال البريد الالكتروني لتتمكن من استيعاد كلمة المرور لديك</p>

                        <div class="modal-body ">
                            <div class="mb-3">
                                <label class="mb-3 fw-bold">البريد الالكتروني</label>
                                <input type="email" name="email" class="form-control" id="Username">
                            </div>
                            @if ($errors->has('email'))
                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                            @endif
                            @if (session()->has('error_otp_mail'))
                                <div class="alert alert-danger">{{session()->get('error_otp_mail')}}</div>
                            @endif

                        </div>

                        <div class="text-center log m-auto mb-3 mt-4">
                            <button type="submit" class="btn py-2"> <a class="text-white"> ارسال </a> </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>


    </section>
    <div class="container">
        <img src="images/Team work-bro.png" width="600px" height="600px" class="team-work">
    </div>


    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/b4c05b8dbd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>


</body>

</html>
