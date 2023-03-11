@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="accordion" id="accordionExample">

    <div class="card">
        <div class="card-header" id="heading1">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                    data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                    # {{__("Banck Account Page")}}
                </button>
            </h2>
        </div>

        <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        {{ BsForm::text('bank_name')->value(Settings::get('bank_name'))->label(__('Bank Name')) }}
                    </div>
                    <div class="col-6">
                        {{ BsForm::text('iban')->value(Settings::get('iban'))->label(__('IBAN')) }}
                    </div>
                    <div class="col-12">
                        {{ BsForm::textarea('bank_content')->rows(3)
                        ->attribute('class','form-control textarea')
                        ->value(Settings::get('bank_content'))
                        ->attribute(['data-parsley-minlength' => '3'])
                        ->label(__("Bank Account Page Content")) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="heading2">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                    data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                    # {{__("Terms and Conditions Page")}}
                </button>
            </h2>
        </div>

        <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionExample">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        {{ BsForm::textarea('terms_content')->rows(3)
                        ->attribute('class','form-control textarea')
                        ->value(Settings::get('terms_content'))
                        ->attribute(['data-parsley-minlength' => '3'])
                        ->label(__("Terms and Conditions Page Content")) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="heading3">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                    data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                    # {{__("About us Page")}}
                </button>
            </h2>
        </div>

        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        {{ BsForm::textarea('aboutus_content')->rows(3)
                        ->attribute('class','form-control textarea')
                        ->value(Settings::get('aboutus_content'))
                        ->attribute(['data-parsley-minlength' => '3'])
                        ->label(__("About us Page Content")) }}
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
