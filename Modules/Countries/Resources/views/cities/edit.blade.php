@extends('dashboard::layouts.default')

@section('title')
    {{ $city->name }}
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $city->name)
        @slot('breadcrumbs', ['dashboard.countries.cities.edit', $country, $city])

        {{ BsForm::resource('countries::cities')
            ->putModel($city, route('dashboard.countries.cities.update', [$country, $city]),['data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('countries::cities.actions.edit'))

            @include('countries::cities.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('countries::cities.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
