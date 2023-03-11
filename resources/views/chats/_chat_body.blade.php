<div class="col-lg-8 chat-body" id="{{ $conversation->id }}">
    <div class="side-menu message-body">
        <div class="tab-content " id="v-pills-tabContent">
            <div class="tab-pane fade show active " id="v-pills-user1" role="tabpanel" aria-labelledby="v-pills-user1-tab">

                <div class="d-flex align-items-center px-4 py-3 receiver-head">
                    <img src="{{ $conversation->receiver?->id == auth()->id() ? $conversation->user?->avatar : $conversation->receiver?->avatar }}"
                        width="60px" height="60px">
                    <div class="mx-2 w-100">
                        <h6 class="my-name text-end">
                            {{ $conversation->receiver?->id == auth()->id() ? $conversation->user?->full_name : $conversation->receiver?->full_name }}
                        </h6>

                    </div>
                </div>
                <div class="message-content pt-4" id="chat_messages">
                    @foreach ($conversation->messages as $message)
                        <div class="cont-messages">
                            @if ($message->sender_id == auth()->id())
                                <div class="sender-msg d-flex align-items-center px-4">
                                    <img src="{{ auth()->user()?->avatar }}" width="60px" height="60px">
                                    @if (!$message->body)
                                        <img src="{{ asset($message->image) }}" width="200px" height="200px">
                                    @else
                                        {{ $message->body }}
                                    @endif
                                </div>
                            @else
                                <div class="messenger-msg d-flex align-items-center px-4">
                                    <img src="{{ $message->user?->avatar }}" width="60px" height="60px">
                                    <p class="mx-2 p-3">

                                        @if (!$message->body)
                                            <img src="{{ asset($message->image) }}" width="200px" height="200px">
                                        @else
                                            {{ $message->body }}
                                        @endif
                                    </p>
                                </div>
                            @endif
                        </div>
                    @endforeach



                </div>

                <div class="custome_image_previw mt-4 w-100 d-none justify-content-center">
                    <img id="image_preview" src="" width="200" height="200">
                </div>
                <p class="d-none text-danger text-center" id="photo_error"></p>
                <div class="write-message d-flex w-100 px-4 align-items-center">
                    <div class="input-send-message">
                        <input id="message_input" onkeydown="enterChat(event)" type="text"
                            class="form-control my-3 py-2" placeholder="اكتب رسالتك"
                            data-chat_id="{{ $conversation->id }}">

                        <div class="cam d-flex align-items-center justify-content-center ">
                            <img src="" id="output" class="d-none" loading="lazy" />

                            <label for="upload-photo"><i class="fa-solid fa-camera fa-lg"></i></label>
                            <input type="file" name="photo" id="upload-photo" accept="image/*"
                                onChange="selectFile(event)" />
                        </div>

                    </div>

                    <button class="mx-2 send" type="button" id="send_message"
                        onclick="sendMessage({{ $conversation->id }})">
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </div>

            </div>

        </div>

    </div>

</div>
