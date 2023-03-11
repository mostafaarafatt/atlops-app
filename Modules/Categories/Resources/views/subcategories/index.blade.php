@component('dashboard::layouts.components.table-box')
    @slot('title', trans('categories::subcategories.plural'))
    @slot('tools')
        @include('categories::subcategories.partials.actions.create')
    @endslot

    <thead>
        <tr>
            <th>@lang('categories::subcategories.attributes.name')</th>
            <th style="width: 160px">...</th>
        </tr>
    </thead>
    <tbody>
        @forelse($subcategories as $subcategory)
            <tr>
                <td>
                    {{ $subcategory->name }}
                </td>
                <td style="width: 160px">
                    @include('categories::subcategories.partials.actions.show')
                    @include('categories::subcategories.partials.actions.edit')
                    @include('categories::subcategories.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('categories::subcategories.empty')</td>
            </tr>
        @endforelse

        @if ($subcategories->hasPages())
            @slot('footer')
                {{ $subcategories->links() }}
            @endslot
        @endif
    @endcomponent
