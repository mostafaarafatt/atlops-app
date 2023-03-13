{{ BsForm::resource('orders::orders')->get(url()->current()) }}
@component('dashboard::layouts.components.accordion')
    @slot('title', trans('orders::orders.actions.filter'))

    <div class="row">
        <div class="col-md-3">
            {{ BsForm::text('name')->value(request('name')) }}
        </div>
        <div class="col-md-3">
            {{ BsForm::text('description')->value(request('description'))->label(trans("orders::orders.attributes.description")) }}
        </div>
        <div class="col-md-3">
            {{ BsForm::text('phone')->value(request('phone'))->label(trans("orders::orders.attributes.phone")) }}
        </div>
        <div class="col-md-3">
            {{ BsForm::select('type')->options([
                'company' => __('company'),
                'individual' => __('individual')
            ])
            ->placeholder(__('Select one'))
            ->label(trans("orders::orders.attributes.type")) }}
        </div>
        <div class="col-md-3">
            {{ BsForm::select('status')->options([
                0 => __('active'),
                1 => __('completed')
            ])
            ->placeholder(__('Select one'))
            ->label(trans("orders::orders.attributes.status")) }}
        </div>
        <div class="col-md-3">
            {{ BsForm::select('category')->options($categories)
            ->placeholder(__('Select one'))
            ->label(trans("orders::orders.attributes.category_id")) }}
        </div>
        <div class="col-md-3">
            {{ BsForm::select('country')->options($countries)
            ->placeholder(__('Select one'))
            ->label(trans("orders::orders.attributes.country_id")) }}
        </div>
        <div class="col-md-3">
            {{ BsForm::number('perPage')
                ->value(request('perPage', 15))
                ->min(1)
                ->label(trans('orders::orders.perPage')) }}
        </div>
    </div>

    @slot('footer')
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fas fa fa-fw fa-filter"></i>
            @lang('orders::orders.actions.filter')
        </button>
    @endslot
@endcomponent
{{ BsForm::close() }}
