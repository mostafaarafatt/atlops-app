@extends('frontend.layouts.app')

@section('content')
    <!-- start blogs -->
    <section class="bank-account w-100 about-us ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="bg-white mt-5 p-4 about-us-details wow fadeIn" data-wow-duration="0.7s" data-wow-delay="0.2s">
                        <h2 class="mb-3"> من نحن</h2>
                        <p class="about-us-desc">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                            مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                            الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة
                            عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي
                            المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم
                            الموقع. ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد
                            النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم
                            فيظهر بشكل لا يليق. هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ،
                            غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً هذا النص هو مثال لنص يمكن
                            أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا
                            النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. إذا كنت تحتاج
                            إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما
                            ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى
                            كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة
                            على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص
                            بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق هذا النص يمكن أن يتم تركيبه
                            على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال
                            نصاً بديلاً ومؤقتاً هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</p>
                        <div class="about-us-contact text-center">
                            <h5 class="mb-3">تواصل معنا</h5>
                            <div class="d-flex  justify-content-between form-check w-75 m-auto contact-type">
                                <div>

                                    <i class="fa-solid fa-phone-volume mx-2 phone-icon"></i>

                                    <input class="form-check-label mx-2 " id="myMobile" style="direction: ltr;" readonly
                                        for="mobile" value="050 3222 1199 221">

                                </div>
                                <div class="copy">
                                    <button onclick="myFunction()" class="copy-btn">
                                        <i class="fa-regular fa-copy text-secondary"></i>
                                    </button>
                                    <span class="copyText">نسخ</span>
                                </div>

                            </div>
                            <div class="social-media d-flex justify-content-center my-4">
                                <div class="facebook mx-2">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </div>
                                <div class="insta mx-2">
                                    <i class="fa-brands fa-instagram"></i>
                                </div>
                                <div class="youtube  mx-2">
                                    <i class="fa-brands fa-youtube"></i>
                                </div>
                                <div class="snap mx-2">
                                    <i class="fa-brands fa-snapchat"></i>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
