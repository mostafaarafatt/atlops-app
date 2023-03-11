@extends('dashboard::layouts.default')

@section('title')
    {{ $user->name }}
@endsection

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $user->name)
        @slot('breadcrumbs', ['dashboard.users.show', $user])

        @component('dashboard::layouts.components.box')
            @slot('bodyClass', 'p-0')

            <table class="table table-middle">
                <tbody>
                <tr>
                    <th width="200">@lang('accounts::user.attributes.name')</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('accounts::user.attributes.email')</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('accounts::user.attributes.phone')</th>
                    <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('accounts::user.attributes.type')</th>
                    <td>{{ $user->user_type->type }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('accounts::user.attributes.can_access')</th>
                    <td>@include('accounts::users.partials.flags.can_access')</td>
                </tr>
                @if ($user->can_access)
                    <tr>
                        <th width="200">@lang('accounts::user.attributes.username')</th>
                        <td>{{ $user->username }}</td>
                    </tr>
                @endif

                <tr>
                    <th width="200">@lang('accounts::user.attributes.avatar')</th>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-70 symbol-sm flex-shrink-0">
                                <img class="" src="{{ $user->getAvatar() }}" alt="{{ $user->name }}"
                                     width="200">
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

            @slot('footer')
                @include('accounts::users.partials.actions.impersonate')
                @include('accounts::users.partials.actions.edit')
                @include('accounts::users.partials.actions.delete')
                {{-- @include('accounts::users.partials.actions.block') --}}
            @endslot
        @endcomponent

    @endcomponent
@endsection
