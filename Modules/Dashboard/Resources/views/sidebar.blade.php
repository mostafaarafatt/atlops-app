@component('dashboard::layouts.components.sidebarItem')
    @slot('url', route('dashboard.home'))
    @slot('name', trans('dashboard::dashboard.home'))
    @slot('icon', 'fas fa-layer-group')
    @slot('routeActive', 'dashboard.home')
@endcomponent
<!-- Admins -->
@include('accounts::admins.sidebar')
<!-- Roles -->
@include('roles::_sidebar')
<!-- Users -->
@include('accounts::users.sidebar')
<!-- orders -->
@include('orders::orders.sidebar')
<!-- categories -->
@include('categories::categories.sidebar')
<!-- countries -->
@include('countries::sidebar')
<!-- sliders -->
@include('sliders::sliders.sidebar')
<!-- blogs -->
@include('blogs::blogs.sidebar')
<!-- pages -->
@include('dashboard::sidebar.pages')
<!-- settings -->
@include('dashboard::sidebar.settings')


