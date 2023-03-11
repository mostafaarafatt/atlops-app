@if(auth()->user()->hasPermission('create_sliders'))
    <a href="{{ route('dashboard.sliders.create') }}"
       class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('sliders::sliders.actions.create')
    </a>
@else
    <button
        type="button"
        disabled
        class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('sliders::sliders.actions.create')
    </button>
@endif
