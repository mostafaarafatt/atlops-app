<div class="row">
    <div class="col-12">
        {{ BsForm::text('address_details')->required()->attribute(['data-parsley-maxlength' => '255', 'data-parsley-minlength' => '3'])->value($item->address->address_details ?? "")->label(trans('countries::cities.address')) }}
    </div>
</div>
<div class="row">
    <div class="col-6">
        <select2 
            name="country_id" 
            label="{{ __('countries::countries.singular') }}" 
            remote-url="{{ route('countries.select') }}"
            @isset($item) 
            value="{{ $item->address()->orderBy('id', 'desc')->first()->country_id ?? old('country_id') }}" @endisset
            :required="true">
        </select2>
    </div>

    <div class="col-6">
        <select2 name="city_id" label="{{ __('countries::cities.singular') }}" remote-url="{{ route('cities.select') }}"
            @isset($item)
            value="{{ $item->address()->orderBy('id', 'desc')->first()->city_id ?? old('city_id') }}" @endisset
            :required="true">
        </select2>
    </div>
</div>
