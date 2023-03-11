@extends('dashboard::layouts.default')

@section('title')
    @lang('categories::subcategories.actions.create')
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('categories::subcategories.plural'))
        @slot('breadcrumbs', ['dashboard.subcategories.create', $category])

        {{ BsForm::resource('categories::subcategories')->post(route('dashboard.subcategories.store',$category), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('categories::subcategories.actions.create'))

            @include('categories::subcategories.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('categories::subcategories.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
