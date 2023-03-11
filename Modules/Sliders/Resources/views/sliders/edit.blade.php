@extends('dashboard::layouts.default')

@section('title')
    {{ $slider->name }}
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $slider->title)
        @slot('breadcrumbs', ['dashboard.sliders.edit', $slider])

        {{ BsForm::resource('sliders::sliders')->putModel($slider, route('dashboard.sliders.update', $slider), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('sliders::sliders.actions.edit'))

            @include('sliders::sliders.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('sliders::sliders.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
