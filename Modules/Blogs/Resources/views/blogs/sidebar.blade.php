@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['permission' => 'read_blogs'])
    @slot('url', route('dashboard.blogs.index'))
    @slot('name', trans('blogs::blogs.plural'))
    @slot('isActive', request()->routeIs('*blogs*'))
    @slot('icon', 'fas fa-edit')
    @slot('tree', [
        [
            'name' => trans('blogs::blogs.actions.list'),
            'url' => route('dashboard.blogs.index'),
            'can' => ['permission' => 'read_blogs'],
            'isActive' => request()->routeIs('*blogs.index'),
            'module' => 'Blogs',
        ],
        [
            'name' => trans('blogs::blogs.actions.create'),
            'url' => route('dashboard.blogs.create'),
            'can' => ['permission' => 'create_blogs'],
            'isActive' => request()->routeIs('*blogs.create'),
            'module' => 'Blogs',
        ],
    ])
@endcomponent
