@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['permission' => 'read_sliders'])
    @slot('url', route('dashboard.sliders.index'))
    @slot('name', trans('sliders::sliders.plural'))
    @slot('isActive', request()->routeIs('*sliders*'))
    @slot('icon', 'fas fa-image')
    @slot('tree', [
        [
            'name' => trans('sliders::sliders.actions.list'),
            'url' => route('dashboard.sliders.index'),
            'can' => ['permission' => 'read_sliders'],
            'isActive' => request()->routeIs('*sliders.index'),
            'module' => 'Sliders',
        ],
        [
            'name' => trans('sliders::sliders.actions.create'),
            'url' => route('dashboard.sliders.create'),
            'can' => ['permission' => 'create_sliders'],
            'isActive' => request()->routeIs('*sliders.create'),
            'module' => 'Sliders',
        ],
    ])
@endcomponent
