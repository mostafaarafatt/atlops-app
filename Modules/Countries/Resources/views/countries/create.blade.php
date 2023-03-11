@extends('dashboard::layouts.default')

@section('title')
    @lang('countries::countries.actions.create')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('countries::countries.plural'))
        @slot('breadcrumbs', ['dashboard.countries.create'])

        {{ BsForm::resource('countries::countries')->post(route('dashboard.countries.store'), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('countries::countries.actions.create'))

            @include('countries::countries.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('countries::countries.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
