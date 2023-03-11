@extends('dashboard::layouts.default')

@section('title')
    @lang('orders::orders.actions.create')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('orders::orders.plural'))
        @slot('breadcrumbs', ['dashboard.orders.create'])

        {{ BsForm::resource('orders::orders')->post(route('dashboard.orders.store'), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('orders::orders.actions.create'))

            @include('orders::orders.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('orders::orders.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
