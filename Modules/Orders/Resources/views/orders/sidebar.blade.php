@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['permission' => 'read_orders'])
    @slot('url', route('dashboard.orders.index'))
    @slot('name', trans('orders::orders.plural'))
    @slot('isActive', request()->routeIs('*orders*'))
    @slot('icon', 'fas fa-bullhorn')
    @slot('tree', [
        [
            'name' => trans('orders::orders.actions.list'),
            'url' => route('dashboard.orders.index'),
            'can' => ['permission' => 'read_orders'],
            'isActive' => request()->routeIs('*orders.index'),
            'module' => 'Orders',
        ]
    ])
@endcomponent
