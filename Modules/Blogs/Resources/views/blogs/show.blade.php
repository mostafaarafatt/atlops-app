@extends('dashboard::layouts.default')

@section('title')
    {{ $blog->title }}
@endsection
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $blog->title)
        @slot('breadcrumbs', ['dashboard.blogs.show', $blog])

        <div class="row">
            <div class="col-md-6">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('blogs::blogs.attributes.title')</th>
                            <td>{{ $blog->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('blogs::blogs.attributes.description')</th>
                            <td>{!! $blog->description !!}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('blogs::blogs.attributes.image')</th>
                            <td>
                                <img src="{{ $blog->getImage() }}"
                                     class="img img-size-"
                                     alt="{{ $blog->title }}">
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    @slot('footer')
                        @include('blogs::blogs.partials.actions.edit')
                        @include('blogs::blogs.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>

    @endcomponent
@endsection
