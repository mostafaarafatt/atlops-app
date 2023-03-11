@if(auth()->user()->hasPermission('create_blogs'))
    <a href="{{ route('dashboard.blogs.create') }}"
       class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('blogs::blogs.actions.create')
    </a>
@else
    <button
        type="button"
        disabled
        class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('blogs::blogs.actions.create')
    </button>
@endif
