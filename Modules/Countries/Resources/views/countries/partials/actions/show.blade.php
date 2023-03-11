@if(auth()->user()->hasPermission('show_countries'))
    <a href="{{ route('dashboard.countries.show', $country) }}"
       class="btn btn-outline-warning waves-effect waves-light btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>

@endcan
