@if(auth()->user()->hasPermission('update_sliders'))
    <a href="{{ route('dashboard.sliders.edit', $slider) }}"
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
