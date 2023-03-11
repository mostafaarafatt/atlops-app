@extends('dashboard::layouts.default')

@section('title')
    {{ $service->name }}
@endsection
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $service->name)
        @slot('breadcrumbs', ['dashboard.services.show', [$category, $service]])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-middle">
                        <tbody>
                        <tr>
                            <th width="400">@lang('categories::services.attributes.name')</th>
                            <td>
                                {{ $service->name }}
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    @slot('footer')
                        @include('categories::services.partials.actions.edit')
                        @include('categories::services.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>

    @endcomponent
@endsection
