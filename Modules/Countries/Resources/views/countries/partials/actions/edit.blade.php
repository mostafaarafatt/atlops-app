@if(auth()->user()->hasPermission('update_countries'))
    <a href="{{ route('dashboard.countries.edit', $country) }}"
       class="btn btn-outline-primary waves-effect waves-light btn-sm">
        <i class="fas fa-edit fa fa-fw"></i>
    </a>

@endcan
