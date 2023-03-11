@if(auth()->user()->hasPermission('create_subcategories'))
    <a href="{{ route('dashboard.subcategories.create', $category) }}"
       class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('categories::subcategories.actions.create')
    </a>
@else
    <button
        type="button"
        disabled
        class="btn btn-primary font-weight-bolder">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('categories::subcategories.actions.create')
    </button>
@endif
