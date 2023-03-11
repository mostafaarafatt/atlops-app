@extends('dashboard::layouts.default')

@section('title')
    {{ $order->title }}
@endsection
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $order->title)
        @slot('breadcrumbs', ['dashboard.orders.show', $order])

        <div class="row">
            <div class="col-md-6">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('orders::orders.attributes.name')</th>
                            <td>{{ $order->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('orders::orders.attributes.description')</th>
                            <td>{!! $order->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('orders::orders.attributes.category_id')</th>
                            <td>{{ $order->category->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('orders::orders.attributes.sub_category_id')</th>
                            <td>{{ $order->sub_category->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('orders::orders.attributes.service_id')</th>
                            <td>{{ $order->servicw->name }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('orders::orders.attributes.image')</th>
                            <td>
                                <img src="{{ $order->getImage() }}"
                                     class="img img-size-"
                                     alt="{{ $order->title }}">
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    @slot('footer')
                        @include('orders::orders.partials.actions.edit')
                        @include('orders::orders.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>

    @endcomponent
@endsection
