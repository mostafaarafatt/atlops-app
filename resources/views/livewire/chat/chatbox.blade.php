<div class="col-lg-8">
    <div class="side-menu message-body">
        <div class="tab-content " id="v-pills-tabContent">

            @if ($selectedConversation)
                <div class="chatbox_header">

                    <div class="d-flex align-items-center px-4 py-3 receiver-head">
                        <img src="{{ asset('Attachments/user/' . $receiverInstance->photo) }}" width="60px"
                            height="60px" style="border-radius: 50%">
                        <div class="mx-2 w-100">
                            <h6 class="my-name text-end">{{ $receiverInstance->firstName }}
                                {{ $receiverInstance->lastName }}</h6>
                        </div>
                    </div>

                </div>

                <div class="chatbox_body" >
                    <div class="message-content pt-4">
                        <div class="cont-messages" id="chat_body">
                            @foreach ($messages as $message)
                                <div wire:key='{{ $message->id }}'
                                    class="{{ auth()->id() == $message->sender_id ? 'sender-msg' : 'messenger-msg' }} d-flex align-items-center px-4">
                                    {{-- <img src="images/publisher.png" width="60px" height="60px"> --}}
                                    <p class="mx-2 p-3">{{ $message->body }}</p>
                                </div>
                                {{-- <div class="messenger-msg d-flex align-items-center px-4">
                                    <img src="images/publisher.png" width="60px" height="60px">
                                    <p class="mx-2 p-3">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة،
                                        لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن</p>
                                </div> --}}
                            @endforeach
                        </div>


                        {{-- @livewire('chat.send-message') --}}

                        <div class="chatbox_footer">
                            <form wire:submit.prevent='sendMessage' action="">
                                <div class="write-message d-flex w-100 px-4 align-items-center">
                                    <div class="input-send-message">
                                        <input wire:model='body' type="text" class="form-control my-3 py-2"
                                            placeholder="اكتب رسالتك ">
                                        <div class="cam d-flex align-items-center justify-content-center ">
                                            <label for="upload-photo"><i class="fa-solid fa-camera fa-lg"></i></label>
                                            <input type="file" name="photo" id="upload-photo" />
                                        </div>
                                        <button class="mice">
                                            <i class="fa-solid fa-microphone fa-lg"></i>
                                        </button>
                                    </div>
                                    <button type="submit" class="mx-2 send">
                                        <i class="fa-solid fa-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- to make load more message when scroll top in conversation --}}
                <script>
                    $('.cont-messages').scroll(function() {
                        var top = $('.cont-messages').scrollTop();
                        if (top == 0) {
                            window.livewire.emit('loadmore');
                        }
                    });
                </script>
            @else
                <div class="fs-4 text-center text-primary mt-5">
                    no conversation selected
                </div>

            @endif


        </div>

    </div>

</div>

<script>
    window.addEventListener('rowChatToBottom', event => {
        $('.cont-messages').scrollTop($('.cont-messages')[0].scrollHeight);
    });
</script>

<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}'
    });
    Pusher.logToConsole = true;
    let authId = @json(auth()->id());
    const chatChannel = pusher.subscribe(`chat.` + '{{ auth()->id() }}');
    chatChannel.bind(`new-message`, function(data) {
        console.log(data);
        if (authId != data.user_id) {
            $('#chat_body').append(`
            <div wire:key=${data.message}
                        class="${ authId == data.user_id ? 'sender-msg' : 'messenger-msg' } d-flex align-items-center px-4">
                <p class="mx-2 p-3">${data.content}</p>
                </div>
            `);
            $("html, #chat_body").animate({
                    scrollTop: $(
                    'html, body').get(0).scrollHeight
                    }, 1000);
        }
    });
</script>
</div>
