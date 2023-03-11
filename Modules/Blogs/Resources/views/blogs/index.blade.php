@extends('dashboard::layouts.default')

@section('title')
    @lang('blogs::blogs.plural')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('blogs::blogs.plural'))
        @slot('breadcrumbs', ['dashboard.blogs.index'])

        @include('blogs::blogs.partials.filter')

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('blogs::blogs.actions.list'))
            @slot('tools')
                @include('blogs::blogs.partials.actions.create')
            @endslot

            <thead>
                <tr>
                    <th>@lang('blogs::blogs.attributes.image')</th>
                    {{-- <th>@lang('blogs::blogs.attributes.title')</th> --}}
                    <th style="width: 160px">...</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $blog)
                    <tr>
                        <td class="d-none d-md-table-cell">
                            <img src="{{ $blog->getImage() }}" alt="Product 1" class="mr-2"
                                style="height: 64px;">
                        </td>
                        {{-- <td class="d-none d-md-table-cell">
                            {{ $blog->title }}
                        </td> --}}

                        <td style="width: 160px">
                            @include('blogs::blogs.partials.actions.show')
                            @include('blogs::blogs.partials.actions.edit')
                            @include('blogs::blogs.partials.actions.delete')
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100" class="text-center">@lang('blogs::blogs.empty')</td>
                    </tr>
                @endforelse

                @if ($blogs->hasPages())
                    @slot('footer')
                        {{ $blogs->links() }}
                    @endslot
                @endif
            @endcomponent
        @endcomponent
    @endsection
