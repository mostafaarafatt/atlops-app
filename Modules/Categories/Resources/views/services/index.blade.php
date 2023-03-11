@component('dashboard::layouts.components.table-box')
    @slot('title', trans('categories::services.plural'))
    @slot('tools')
        @include('categories::services.partials.actions.create')
    @endslot

    <thead>
        <tr>
            <th>@lang('categories::services.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
    </thead>
    <tbody>
        @forelse($services as $service)
            <tr>
                <td>
                    {{ $service->name }}
                </td>
                <td style="width: 160px">
                    @include('categories::services.partials.actions.show')
                    @include('categories::services.partials.actions.edit')
                    @include('categories::services.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('categories::services.empty')</td>
            </tr>
        @endforelse

        @if ($services->hasPages())
            @slot('footer')
                {{ $services->links() }}
            @endslot
        @endif
    @endcomponent
