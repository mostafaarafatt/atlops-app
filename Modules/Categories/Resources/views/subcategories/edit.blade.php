@extends('dashboard::layouts.default')

@section('title')
    {{ $subcategory->name }}
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $subcategory->name)
        @slot('breadcrumbs', ['dashboard.subcategories.edit', [$category, $subcategory]])

        {{ BsForm::resource('categories::subcategories')->putModel($subcategory, route('dashboard.subcategories.update', [$category, $subcategory]), ['files' => true,'data-parsley-validate']) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('categories::subcategories.actions.edit'))

            @include('categories::subcategories.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('categories::subcategories.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
