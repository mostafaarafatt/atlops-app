@extends('dashboard::layouts.default')

@section('title')
    {{ $order->name }}
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $order->title)
        @slot('breadcrumbs', ['dashboard.orders.edit', $order])

        {{ BsForm::resource('orders::orders')->putModel($order, route('dashboard.orders.update', $order), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('orders::orders.actions.edit'))

            @include('orders::orders.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('orders::orders.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
