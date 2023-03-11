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
                <div class="col-lg-5 col-md-8 form-cont ">
                    <form action="{{ route('set-new-password',['id'=>$id]) }}" method="POST" class="bg-white p-5 login-form form-body">
                      @csrf
                        <h5 class="modal-title w-100 fw-bold mb-2"> كلمة مرور جديدة</h5>
                        <p>الآن يمكنك تعيين كلمة مرور جديدة لك</p>
                        <div class="modal-body ">
                            <div class="mb-3 input-box">
                                <label class="mb-3 fw-bold">كلمة المرور الجديدة</label>
                                <input type="password" name="password" class="form-control id_password" id="password" required>
                                <i class="eye-show fas fa-eye-slash togglePassword" id=""></i>

                            </div>

                            <div class="mb-3 input-box">
                                <label class="mb-3 fw-bold"> تأكيد كلمة المرور الجديدة </label>
                                <input type="password" name="password_confirmation" class="form-control password id_password"
                                    id="confirm_password" placeholder="" required>
                                <i class="eye-show fas fa-eye-slash togglePassword" id=""></i>
                            </div>
                            <span id='message'></span>

                            <input type="text" value="{{ $id }}" name="user_id" hidden>

                        </div>
                        <div class="text-center log m-auto mb-3 mt-4">
                            <button type="submit" id="button" class="btn py-2"> <a  class="text-white"> تفعيل </a>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>


    </section>
    <div class="container">
        <img src="{{ asset('images/Team work-bro.png') }}" width="600px" height="600px" class="team-work">
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/b4c05b8dbd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $('#password, #confirm_password').on('keyup', function() {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#message').html('Matching').css('color', 'green');
                
            } else
                $('#message').html('Not Matching').css('color', 'red');
                //$('#button').prop('disabled', true);
        });
    </script>

</body>

</html>
