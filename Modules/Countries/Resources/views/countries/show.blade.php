@extends('dashboard::layouts.default')

@section('title')
    {{ $country->name }}
@endsection
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $country->name)
        @slot('breadcrumbs', ['dashboard.countries.show', $country])

        <div class="row">
            <div class="col-md-6">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('countries::countries.attributes.name')</th>
                            <td>{{ $country->name }}</td>
                        </tr>
                        {{-- <tr>
                            <th width="200">@lang('countries::countries.attributes.currency')</th>
                            <td>{{ $country->currency }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('countries::countries.attributes.code')</th>
                            <td>{{ $country->code }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('countries::countries.attributes.key')</th>
                            <td>{{ $country->key }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('countries::countries.attributes.is_default')</th>
                            <td>@include('countries::countries.partials.flags.default')</td>
                        </tr> --}}
                        <tr>
                            <th width="200">@lang('countries::countries.attributes.flag')</th>
                            <td>
                                <img src="{{ $country->getFlag() }}"
                                     class="img img-size-"
                                     alt="{{ $country->name }}">
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    @slot('footer')
                        @include('countries::countries.partials.actions.edit')
                        @include('countries::countries.partials.actions.delete')
                    @endslot
                @endcomponent

                @include('countries::cities.create')
            </div>
            <div class="col-md-6">
                @include('countries::cities.index')
            </div>
        </div>

    @endcomponent
@endsection
