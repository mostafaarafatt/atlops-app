@extends('dashboard::layouts.default')

@section('title')
    @lang('sliders::sliders.actions.create')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('sliders::sliders.plural'))
        @slot('breadcrumbs', ['dashboard.sliders.create'])

        {{ BsForm::resource('sliders::sliders')->post(route('dashboard.sliders.store'), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('sliders::sliders.actions.create'))

            @include('sliders::sliders.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('sliders::sliders.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
