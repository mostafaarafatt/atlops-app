@if(auth()->user()->hasPermission('update_blogs'))
    <a href="{{ route('dashboard.blogs.edit', $blog) }}"
       class="btn btn-outline-primary waves-effect waves-light btn-sm">
        <i class="fas fa-edit fa fa-fw"></i>
    </a>
@else
    <button
        type="button"
        disabled
        class="btn btn-outline-primary waves-effect waves-light btn-sm">
        <i class="fas fa-edit fa fa-fw"></i>
    </button>
@endcan
