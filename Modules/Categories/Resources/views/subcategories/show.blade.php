@extends('dashboard::layouts.default')

@section('title')
    {{ $subcategory->name }}
@endsection
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $subcategory->name)
        @slot('breadcrumbs', ['dashboard.subcategories.show', [$category, $subcategory]])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-middle">
                        <tbody>
                        <tr>
                            <th width="400">@lang('categories::subcategories.attributes.name')</th>
                            <td>
                                {{ $subcategory->name }}
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    @slot('footer')
                        @include('categories::subcategories.partials.actions.edit')
                        @include('categories::subcategories.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>

    @endcomponent
@endsection
