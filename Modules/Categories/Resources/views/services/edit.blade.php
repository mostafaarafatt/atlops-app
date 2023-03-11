@extends('dashboard::layouts.default')

@section('title')
    {{ $service->name }}
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $service->name)
        @slot('breadcrumbs', ['dashboard.services.edit', [$category, $service]])

        {{ BsForm::resource('categories::services')->putModel($service, route('dashboard.services.update', [$category, $service]), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('categories::services.actions.edit'))

            @include('categories::services.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('categories::services.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
