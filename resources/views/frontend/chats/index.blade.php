@extends('frontend.layouts.app')

@section('content')
    <section class="messages mt-5">
        <div class="container">

            <h3 class="head-message fw-bold">الرسائل</h3>

            <div class="row" id="chat_container">

                <!-- chat list -->
                <div class="col-lg-4">
                    <div class="bg-white py-3 side-menu">
                        <div class="d-flex  px-4 ">
                            <img src="{{ auth()->user()?->avatar }}" width="60px" height="60px">
                            <div class="mx-2">
                                <h6 class="my-name"> {{ auth()?->user()?->full_name }}</h6>
                                <div class="d-flex align-items-center">
                                    <span class="dot"></span>
                                    <p class="status mx-2 mb-0">نشط الآن</p>

                                </div>
                            </div>
                        </div>

                        <div class="search  px-4 ">
                            <input type="text" class="form-control my-3 py-2" placeholder="ابحث عن محادثة الان">
                            <button>
                                <i class="fa-solid fa-magnifying-glass fa-xl"></i>
                            </button>

                        </div>

                        <div class="d-flex align-items-start contacts">

                            <div class="nav flex-column nav-pills w-100" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                @foreach ($allChats as $chat)
                                    <button onclick="showChat({{ $chat->id }})" class="nav-link active mb-2"
                                        id="v-pills-user1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-user1"
                                        type="button" role="tab" aria-controls="v-pills-user1" aria-selected="true">
                                        <div class="d-flex ">
                                            <img src="{{ $chat->receiver?->id == auth()->id() ? $chat->user?->avatar : $chat->receiver?->avatar }}"
                                                width="60px" height="60px">
                                            <div class="mx-2 w-100">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="my-name text-end">
                                                        {{ $chat->receiver?->id == auth()->id() ? $chat->user?->full_name : $chat->receiver?->full_name }}
                                                    </h6>
                                                    <span class=" time text-dark">
                                                        {{ $chat?->last_time_message?->shortAbsoluteDiffForHumans() }}
                                                    </span>
                                                </div>
                                                <p class="view-message text-dark mb-0">
                                                    {{ $chat?->last_message?->body ?? 'لديك صورة' }}
                                                </p>

                                            </div>
                                        </div>
                                    </button>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection

@section('scripts')
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        function enterChat(e) {
            if (e.keyCode == 13) {
                sendMessage(e.target.dataset.chat_id);
            }
        }

        function showChat(chat_id) {
            let url = `{{ route('chats.show', ':id') }}`;
            url = url.replace(':id', chat_id);
            let chatElement = document.getElementById(chat_id);
            let chatBodies = document.getElementsByClassName('chat-body');
            for (let i = 0; i < chatBodies.length; i++) {
                if (chatBodies[i].id != chat_id) {

                    chatBodies[i].remove();
                }
            }

            if (!chatElement) {
                //add spinner
                $('#chat_container').append(`<div class="spinner-border col-lg-8 chat-body m-auto" id="spinner" role="status">
                        <span class="sr-only">Loading...</span>
                        </div>`);
                $.ajax({
                    url: url,
                    method: "GET",
                    success: function(data) {
                        //remove spinner
                        $('#spinner').remove();
                        $('#chat_container').append(data.chatHtml);
                    }
                });
                const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
                    cluster: '{{ env('PUSHER_APP_CLUSTER') }}'
                });
                Pusher.logToConsole = true;

                let authId = @json(auth()->id());
                const chatChannel = pusher.subscribe(`chat.` + chat_id);
                chatChannel.bind(`new-message`, function(data) {
                    console.log(data);
                    if (data.user_id != authId) {
                        if (!data.content) {
                            $('#chat_messages').append(`
                            <div class="messenger-msg d-flex align-items-center px-4">
                                    <img src="${data.sender_avatar}" width="60px" height="60px">
                                    <p class="mx-2 p-3">
                                        <img src="${data.image}" width="200px" height="200px">
                                    </p>
                                </div>
                            `);
                        } else {
                            $('#chat_messages').append(`
                            <div class="messenger-msg d-flex align-items-center px-4">
                                    <img src="${data.sender_avatar}" width="60px" height="60px">
                                    <p class="mx-2 p-3">
                                       ${data.content}
                                    </p>
                                </div>
                        `);
                        }

                        $("html, #chat_messages").animate({
                            scrollTop: $(
                                'html, body').get(0).scrollHeight
                        }, 1000);
                    }

                });
            }
        }

        function selectFile(e) {
            let selectedFile = e.target.files[0];
            let fileSrc = window.URL.createObjectURL(selectedFile);
            let imagePreviewWrapper = document.querySelector(".custome_image_previw");
            if (fileSrc) {
                imagePreviewWrapper.classList.add("d-flex");
                imagePreviewWrapper.classList.remove("d-none");
            } else {
                imagePreviewWrapper.classList.add("d-none");
                imagePreviewWrapper.classList.remove("d-flex");
            }
            let imagePreviwEle = document.getElementById("image_preview");
            imagePreviwEle.src = fileSrc;

        };

        function sendMessage(chat_id) {
            let content = $('#message_input').val();
            let imageFile = $('#upload-photo')[0].files[0];
            let formdata = new FormData();
            if (imageFile) {
                formdata.append('image', imageFile);
            }
            formdata.append('content', content);
            let url = `{{ route('chats.send', ':id') }}`;
            url = url.replace(':id', chat_id);
            if (!content && !imageFile) {
                return;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                method: "POST",
                data: formdata,
                contentType: false,
                processData: false,

                success: function(data) {
                    let imagePreviewWrapper = document.querySelector(".custome_image_previw");
                    imagePreviewWrapper.classList.remove("d-flex");
                    imagePreviewWrapper.classList.add("d-none");

                    $('#upload-photo').val(null);

                    $('#message_input').val('');
                    $('#chat_messages').append(data.messageHtml);
                    $("html, #chat_messages").animate({
                        scrollTop: $(
                            'html, body').get(0).scrollHeight
                    }, 1000);
                },
                error: function(error) {
                    let errorMessage = error.responseJSON.message;
                    $('#photo_error').removeClass('d-none');
                    $('#photo_error').html(errorMessage);

                }
            });
        }
    </script>
@endsection
