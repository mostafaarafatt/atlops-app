@extends('frontend.layouts.app')

@include('frontend.orders.detailAndEndedOrders', [
    'buttonName' => 'تواصل',
    'modelId' => 'contactType',
    'order' => $order,
    'comments' => $comments,
])


@section('scripts')
    {{-- script for show part of replying to comments --}}
    <script>
        function comment($comment_id) {
            event.preventDefault();
            comment_id = $comment_id;
            //console.log(comment_id);
            $('#comment-' + comment_id).toggle("slide");
        }
    </script>

    <script>
        function myFunction() {
            // Get the text field
            var copyMobile = document.getElementById("myMobile");

            copyMobile.select();
            copyMobile.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyMobile.value);


            document.querySelector(".copyText").innerHTML = "تم النسخ";

        }
    </script>

    {{-- script for comments --}}
    <script>
        function makeOrderComment() {
            event.preventDefault();
            const CSRF_TOKEN = $('meta[name="csrf_token"]').attr('cnotent');
            $.ajax({
                url: "{{ route('order.comment') }}",
                type: 'post',
                data: $('#form').serialize(),
                success: function(data) {
                    // console.log(data);
                    var img = "{{ asset('Attachments/user') }}" + "/" + data.user.photo;
                    var name = data.user.name;
                    var comment = data.comment.comment;
                    var created_at = data.comment.created_at;
                    var comment_id = data.comment.id;
                    var auth_photo = data.auth_photo;
                    var auth_img = "{{ asset('Attachments/user/') }}" + "/" + auth_photo;
                    console.log(auth_img);
                    var element = `<div
                                class=" d-flex align-items-center justify-content-between position-relative comment mb-3 w-100">
                                <div class="main  d-flex  w-100">
                                    <a href="">
                                        <img src="${img}"
                                            width="50" height="50">
                                    </a>
                                    <div class="me-2 w-100 ">
                                        <h6>${name}</h6>

                                        <div class=" d-flex align-items-center justify-content-between ">
                                            <p> ${comment} </p>
                                            <p class="date">
                                                تم النشر في  ${created_at}
                                            </p>
                                        </div>

                                        <div onclick="comment(${comment_id})" id="${comment_id}"
                                            class="d-flex align-items-center reply-comment">
                                            <i class="fa-solid fa-reply"></i>
                                            <h6 class=mx-2>رد</h6>
                                        </div>

                                        <div class="menu" id="comment-${comment_id}"
                                            style="display: none;">
                                            <form id="${comment_id}" action=""

                                                class="send-comment d-flex align-items-center justify-content-between bg-white mb-3">
                                                <div class=" d-flex align-items-center comment position-relative">

                                                    <a href="">
                                                        <img src="${auth_img}"
                                                            class="rounded-circle" width="40px" height="40px">
                                                    </a>

                                                    <input type="text" name="comment"
                                                        class="form-control mx-2 ps-5" placeholder="اكتب تعليقك هنا"
                                                        aria-describedby="">

                                                    <input type="text" name="comment_id"
                                                        value="${comment_id}" hidden>

                                                    <input type="text" name="user_id"
                                                        value="" hidden>

                                                    <div
                                                        class="cam d-flex align-items-center justify-content-center ">
                                                        <label for="upload-photo"><i
                                                                class="fa-solid fa-camera fa-xl"></i></label>
                                                        <input type="file" name="photo" id="upload-photo"
                                                            class="d-none">
                                                    </div>

                                                </div>
                                                <div class="contact  d-flex align-items-center ">
                                                    <!-- Button trigger modal -->
                                                    <button class="btn px-2">
                                                        إرسال
                                                    </button>

                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>`;

                    $("#content").append(element);
                },
            })
        }
    </script>

    {{-- script for reply comment --}}
    <script>
        function replyComment($comment_id) {
            event.preventDefault();
            const CSRF_TOKEN = $('meta[name="csrf_token"]').attr('cnotent');
            comment_id = $comment_id;
            console.log(comment_id);

            $.ajax({
                url: "/api/order/replyComment",
                type: "post",
                data: $('#replyForm-' + comment_id).serialize(),
                success: function(data) {
                    //console.log(data.user);
                    var img = "{{ asset('Attachments/user') }}" + "/" + data.user.photo;
                    var name = data.user.firstName;
                    console.log(img);
                    var element = `<div class="mt-3 d-flex  w-100">
                                                        <a href="">
                                                            <img src="${img}"
                                                                width="50" height="50" style="border-radius: 50%;">
                                                        </a>
                                                        <div class="me-2 w-100 ">
                                                            <h6>${name}</h6>

                                                            <div
                                                                class=" d-flex align-items-center justify-content-between ">
                                                                <p>${data.comment.comment}</p>
                                                                <p class="date">
                                                                    تم النشر في ${data.comment.created_at}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>`;
                    $('#content_reply-' + comment_id).append(element);
                    // $('#content_reply-' + comment_id).toggle("slide");
                    $('#reply_button-' + comment_id).hide();
                    $('#comment-' + comment_id).hide();
                }

            });
        }
    </script>
@endsection
