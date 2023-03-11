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
    <section class="vertification py-5 forms">
        <div class="container">
            <h2 class="text-center my-5 text-white ">أطلب
                <br>Atlop

            </h2>
            <div class="row">
                <div class="col-lg-7 col-md-4 empty"></div>
                <div class="col-lg-5 col-md-8 form-cont">
                    <form action="{{ route('check-code', ['id' => $user->id]) }}" method="POST"
                        class="bg-white p-5 form-body code-vertification ">
                        @csrf
                        <h5 class="modal-title w-100 fw-bold mb-4"> كود التفعيل</h5>
                        <p>يرجى إدخال كود التفعيل التي تم إرساله على البريد الالكتروني لتتمكن من استيعاد كلمة المرور
                            لديك</p>

                        <div class="modal-body ">
                            <div class="mb-3">
                                <label class="mb-3 fw-bold"> إدخال كود التفعيل</label>
                                <input type="text" name="code" maxlength="5" class="form-control" id="Username"
                                    required>

                            </div>
                            @if ($errors->has('code'))
                                <div class="alert alert-danger">{{ $errors->first('code') }}</div>
                            @endif
                            @if (session()->has('otp_error'))
                                <div class="alert alert-danger">{{ session()->get('otp_error') }}</div>
                            @endif
                            <div class="mb-2" style="direction: ltr;">
                                <label class="d-flex justify-content-between recode">

                                    <a href="{{ route('send-otp', ['email' => $user->email]) }}"
                                        class="fw-bold forget-password" id="resend-link"
                                        data-original-href="{{ route('send-otp', ['email' => $user->email]) }}">إعادة
                                        إرسال الكود
                                    </a>
                                    <p class="mb-0 timer">00:00</p>
                                </label>
                            </div>
                        </div>
                        <div class="text-center log m-auto mb-3 mt-4">
                            <button type="submit" class="btn py-2"> <a class="text-white"> تأكيد </a> </button>
                        </div>

                        <a href="{{route('forgetPassword')}}" class="fw-bold text-center w-100 d-block"> تغيير البريد
                            الالكتروني</a>

                    </form>
                </div>
            </div>

        </div>


    </section>
    <div class="container">
        <img src="{{ asset('images/Team work-bro.png') }}" width="600px" height="600px" class="team-work">
    </div>


    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/b4c05b8dbd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        var duration = @json($remainingTime);
        var timerElement = document.querySelector('.timer');
        var resendLink = document.querySelector('#resend-link');
        let submitButton = document.querySelector('button[type="submit"]');
        resendLink.href = '#';
        var timer = setInterval(function() {
            var minutes = Math.floor(duration / 60);
            var seconds = duration % 60;
            timerElement.textContent = (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') +
                seconds;
            duration--;
            if (duration < 0) {
                clearInterval(timer);
                timerElement.textContent = 'Time is up!';
                resendLink.href = resendLink.getAttribute('data-original-href');
                submitButton.disabled = true;
            }
        }, 1000);
    </script>

</body>

</html>
