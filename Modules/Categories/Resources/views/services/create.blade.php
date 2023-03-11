@extends('dashboard::layouts.default')

@section('title')
    @lang('categories::services.actions.create')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('categories::services.plural'))
        @slot('breadcrumbs', ['dashboard.services.create', $category])

        {{ BsForm::resource('categories::services')->post(route('dashboard.services.store',$category), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('categories::services.actions.create'))

            @include('categories::services.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('categories::services.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
