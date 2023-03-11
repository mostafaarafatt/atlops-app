@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ BsForm::text('name')->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3']) }}

@isset($category)
    {{ BsForm::image('image')->collection('images')->files($category->getMediaResource('images'))->notes(trans('accounts::admins.messages.images_note')) }}
@else
    {{ BsForm::image('image')->collection('images')->notes(trans('accounts::admins.messages.images_note')) }}
@endisset
