@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- @bsMultilangualFormTabs
{{ BsForm::text('title')->attribute(['data-parsley-maxlength' => '191','data-parsley-minlength' => '3']) }}
{{ BsForm::text('sub_title')->attribute(['data-parsley-maxlength' => '191','data-parsley-minlength' => '3']) }}
@endBsMultilangualFormTabs --}}
@isset($slider)
    {{ BsForm::image('image')->collection('sliders')->files($slider->getMediaResource('sliders'))->notes(trans('sliders::sliders.messages.images_note')) }}
@else
    {{ BsForm::image('image')->collection('sliders')->notes(trans('sliders::sliders.messages.images_note')) }}
@endisset

{{-- @include('dashboard::seo.inputs') --}}
