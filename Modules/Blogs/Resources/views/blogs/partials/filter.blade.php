{{ BsForm::resource('blogs::blogs')->get(url()->current()) }}
@component('dashboard::layouts.components.accordion')
    @slot('title', trans('blogs::blogs.actions.filter'))

    <div class="row">
        <div class="col-md-3">
            {{ BsForm::text('title')->value(request('title')) }}
        </div>
        <div class="col-md-3">
            {{ BsForm::text('description')->value(request('description'))->label(trans("blogs::blogs.attributes.description")) }}
        </div>
        <div class="col-md-3">
            {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                ->label(trans('blogs::blogs.perPage')) }}
        </div>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fas fa fa-fw fa-filter"></i>
            @lang('blogs::blogs.actions.filter')
        </button>
    @endslot
@endcomponent
{{ BsForm::close() }}
