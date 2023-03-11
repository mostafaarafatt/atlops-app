@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ BsForm::text('title')->attribute(['data-parsley-maxlength' => '191','data-parsley-minlength' => '3']) }}

{{ BsForm::textarea('description')->rows(3)->attribute('class','form-control textarea')->attribute(['data-parsley-minlength' => '3']) }}

@isset($order)
    {{ BsForm::image('image')->collection('orders')->files($order->getMediaResource('orders'))->notes(trans('orders::orders.messages.images_note')) }}
@else
    {{ BsForm::image('image')->collection('orders')->notes(trans('orders::orders.messages.images_note')) }}
@endisset
