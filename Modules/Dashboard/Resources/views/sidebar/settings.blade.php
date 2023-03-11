@component('dashboard::layouts.components.sidebarItem')
    @slot('can', [
        'permission' => 'read_settings',
        'read_countries',
        'read_roles',
        'read_users',
        ])
        @slot('name', trans('settings::settings.plural'))
        @slot('isActive', request()->routeIs('*settings*'))
            @slot('icon', 'fas fa-cogs')
            @php(
    $trees = [
        // settings main
        [
            'name' => trans('settings::settings.tabs.main'),
            'url' => route('dashboard.settings.index', ['tab' => 'main']),
            'can' => ['permission' => 'read_settings'],
            'isActive' => request()->routeIs('*settings*') && request('tab') == 'main',
            'module' => 'Settings',
            'icon' => 'fas fa-cog',
        ],
        // settings contacts
        [
            'name' => trans('settings::settings.tabs.contacts'),
            'url' => route('dashboard.settings.index', ['tab' => 'contacts']),
            'can' => ['permission' => 'read_settings'],
            'isActive' => request()->routeIs('*settings*') && request('tab') == 'contacts',
            'module' => 'Settings',
            'icon' => 'fas fa-address-card',
        ],
        // settings social
        [
            'name' => trans('settings::settings.tabs.social'),
            'url' => route('dashboard.settings.index', ['tab' => 'social']),
            'can' => ['permission' => 'read_settings'],
            'isActive' => request()->routeIs('*settings*') && request('tab') == 'social',
            'module' => 'Settings',
            'icon' => 'fab fa-facebook',
        ],
    ]
)
            @slot('tree', $trees)
        @endcomponent
