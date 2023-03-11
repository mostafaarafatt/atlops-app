@extends('dashboard::layouts.default')

@section('title')
    @lang('blogs::blogs.actions.create')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('blogs::blogs.plural'))
        @slot('breadcrumbs', ['dashboard.blogs.create'])

        {{ BsForm::resource('blogs::blogs')->post(route('dashboard.blogs.store'), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('blogs::blogs.actions.create'))

            @include('blogs::blogs.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('blogs::blogs.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
