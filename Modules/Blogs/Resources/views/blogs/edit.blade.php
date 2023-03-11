@extends('dashboard::layouts.default')

@section('title')
    {{ $blog->name }}
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $blog->title)
        @slot('breadcrumbs', ['dashboard.blogs.edit', $blog])

        {{ BsForm::resource('blogs::blogs')->putModel($blog, route('dashboard.blogs.update', $blog), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('blogs::blogs.actions.edit'))

            @include('blogs::blogs.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('blogs::blogs.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
