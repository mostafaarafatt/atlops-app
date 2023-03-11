@extends('dashboard::layouts.default')

@section('title')
    {{ $slider->title }}
@endsection
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $slider->title)
        @slot('breadcrumbs', ['dashboard.sliders.show', $slider])

        <div class="row">
            <div class="col-md-6">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-middle">
                        <tbody>
                        {{-- <tr>
                            <th width="200">@lang('sliders::sliders.attributes.title')</th>
                            <td>{{ $slider->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('sliders::sliders.attributes.sub_title')</th>
                            <td>{{ $slider->sub_title }}</td>
                        </tr> --}}
                        <tr>
                            <th width="200">@lang('sliders::sliders.attributes.image')</th>
                            <td>
                                <img src="{{ $slider->getImage() }}"
                                     class="img img-size-"
                                     alt="{{ $slider->title }}">
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    @slot('footer')
                        @include('sliders::sliders.partials.actions.edit')
                        @include('sliders::sliders.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>

    @endcomponent
@endsection
