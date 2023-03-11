<div class="sender-msg d-flex align-items-center px-4">
    <img src="{{ auth()->user()?->avatar }}" width="60px">
    <p class="mx-2 p-3">

        @if (!$content)
            <img src="{{ asset($image) }}" width="200px" height="200px">
        @else
            {{ $content }}
        @endif
    </p>
</div>
