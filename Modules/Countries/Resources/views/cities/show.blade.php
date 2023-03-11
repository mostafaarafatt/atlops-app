@extends('dashboard::layouts.default')

@section('title')
    {{ $city->name }}
@endsection
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $city->name)
        @slot('breadcrumbs', ['dashboard.countries.show', $country])

        <div class="row">
            <div class="col-md-6">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('countries::cities.attributes.name')</th>
                            <td>{{ $city->name }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('countries::countries.attributes.name')</th>
                            <td>{{ $city->country->name }}</td>
                        </tr>
                        </tbody>
                    </table>

                    @slot('footer')
                        @include('countries::cities.partials.actions.edit')
                        @include('countries::cities.partials.actions.delete')
                    @endslot
                @endcomponent

                {{-- @include('countries::regions.create') --}}
            </div>
            <div class="col-md-6">
                {{-- @include('countries::regions.index') --}}
            </div>
        </div>

    @endcomponent
@endsection
