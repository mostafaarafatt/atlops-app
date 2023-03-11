@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- @bsMultilangualFormTabs --}}
{{ BsForm::text('name') }}
{{-- {{ BsForm::text('currency') }}
@endBsMultilangualFormTabs
{{ BsForm::text('code')->required('required')->attribute(['data-parsley-minlength' => '2']) }}
{{ BsForm::text('key')->required('required')->attribute(['data-parsley-minlength' => '2']) }} --}}
@isset($country)
    {{ BsForm::image('flag')->collection('flags')->files($country->getMediaResource('flags'))->notes(trans('countries::countries.messages.images_note')) }}
@else
    {{ BsForm::image('flag')->collection('flags')->notes(trans('countries::countries.messages.images_note')) }}
@endisset
{{-- {{ BsForm::radio('is_default') }} --}}

