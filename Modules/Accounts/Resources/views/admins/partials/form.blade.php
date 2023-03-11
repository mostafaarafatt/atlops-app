@include('dashboard::errors')
{{ BsForm::text('name')->required()->attribute(['data-parsley-maxlength' => '191','data-parsley-minlength' => '3']) }}
{{ BsForm::email('email')->required()->attribute(['data-parsley-type' => 'email','data-parsley-minlength' => '3']) }}
{{ BsForm::password('password') }}
{{ BsForm::password('password_confirmation') }}

<input type="hidden" name="role_id" value="1">

@if(\Module::collections()->has('Roles'))
    <select2 name="role_id"
            label="@lang('roles::roles.singular')"
            remote-url="{{ route('roles.select') }}"
            @isset($admin)
            value="{{ $admin->roles()->orderBy('id','desc')->first()->id ?? old('role_id') }}"
            @endisset
            :required="true"
    ></select2>
@endif

@isset($admin)
    {{ BsForm::image('avatar')->collection('avatars')->files($admin->getMediaResource('avatars'))->notes(trans('accounts::admins.messages.images_note')) }}
@else
    {{ BsForm::image('avatar')->collection('avatars')->notes(trans('accounts::admins.messages.images_note')) }}
@endisset
