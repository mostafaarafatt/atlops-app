@extends('dashboard::layouts.default')

@section('title')
    @lang('orders::orders.plural')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('orders::orders.plural'))
        @slot('breadcrumbs', ['dashboard.orders.index'])

        @include('orders::orders.partials.filter')

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('orders::orders.actions.list'))

            <thead>
                <tr>
                    <th>@lang('orders::orders.attributes.image')</th>
                    <th>@lang('orders::orders.attributes.name')</th>
                    <th>@lang('orders::orders.attributes.category_id')</th>
                    <th style="width: 160px">...</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td class="d-none d-md-table-cell">
                            <img src="{{ $order->getImage() }}" alt="Product 1" class="mr-2"
                                style="height: 64px;">
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $order->name }}
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $order->type }}
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $order->category()->name }}
                        </td>

                        <td style="width: 160px">
                            @include('orders::orders.partials.actions.show')
                            @include('orders::orders.partials.actions.edit')
                            @include('orders::orders.partials.actions.delete')
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100" class="text-center">@lang('orders::orders.empty')</td>
                    </tr>
                @endforelse

                @if ($orders->hasPages())
                    @slot('footer')
                        {{ $orders->links() }}
                    @endslot
                @endif
            @endcomponent
        @endcomponent
    @endsection
