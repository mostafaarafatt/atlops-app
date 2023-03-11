<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if (trim($__env->yieldContent('template_title'))) @yield('template_title')
        | @endif {{ trans('installer::installer.title') }}</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ app_favicon() }}" type="image/png">

    <link href="{{ asset('css/installer.css') }}" rel="stylesheet">
    @stack('css')
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div class="master">
    <div class="box">
        <div class="header">
            <h1 class="header__title">@yield('title')</h1>
        </div>
        <ul class="step">
            <li class="step__divider"></li>
            <li class="step__item {{ isActive('installer.final') }}">
                <i class="step__icon fa fa-server" aria-hidden="true" title="Finish Installation"></i>
            </li>
            <li class="step__divider"></li>
            <li class="step__item {{ isActive('installer.environment')}} {{ isActive('installer.environmentWizard')}} {{ isActive('installer.environmentClassic')}}">
                @if(Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') )
                    <a href="{{ route('installer.environment') }}">
                        <i class="step__icon fa fa-cog" aria-hidden="true" title="Settings"></i>
                    </a>
                @else
                    <i class="step__icon fa fa-cog" aria-hidden="true" title="Settings"></i>
                @endif
            </li>
            <li class="step__divider"></li>
            <li class="step__item {{ isActive('installer.permissions') }}">
                @if(Request::is('install/permissions') || Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') )
                    <a href="{{ route('installer.permissions') }}">
                        <i class="step__icon fa fa-key" aria-hidden="true" title="Permissions"></i>
                    </a>
                @else
                    <i class="step__icon fa fa-key" aria-hidden="true" title="Permissions"></i>
                @endif
            </li>
            <li class="step__divider"></li>
            <li class="step__item {{ isActive('installer.requirements') }}">
                @if(Request::is('install') || Request::is('install/requirements') || Request::is('install/permissions') || Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') )
                    <a href="{{ route('installer.requirements') }}">
                        <i class="step__icon fa fa-list" aria-hidden="true" title="Server Requirements"></i>
                    </a>
                @else
                    <i class="step__icon fa fa-list" aria-hidden="true" title="Server Requirements"></i>
                @endif
            </li>
            <li class="step__divider"></li>
            <li class="step__item {{ isActive('installer.welcome') }}">
                @if(Request::is('install') || Request::is('install/requirements') || Request::is('install/permissions') || Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') )
                    <a href="{{ route('installer.welcome') }}">
                        <i class="step__icon fa fa-home" aria-hidden="true" title="Start"></i>
                    </a>
                @else
                    <i class="step__icon fa fa-home" aria-hidden="true" title="Start"></i>
                @endif
            </li>
            <li class="step__divider"></li>
        </ul>
        <div class="main">
            @if (session('message'))
                <p class="alert text-center">
                    <strong>
                        @if(is_array(session('message')))
                            {{ session('message')['message'] }}
                        @else
                            {{ session('message') }}
                        @endif
                    </strong>
                </p>
            @endif
            @if(session()->has('errors') || (!empty($errors) && count($errors)))
                <div class="alert alert-danger" id="error_alert">
                    <button type="button" class="close" id="close_alert" data-dismiss="alert" aria-hidden="true">
                        <i class="fa fa-close" aria-hidden="true"></i>
                    </button>
                    <h4>
                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                        {{ trans('installer::installer.forms.errorTitle') }}
                    </h4>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('container')
        </div>
    </div>
</div>
<!-- App js -->
<script src="{{ asset('js/installer.js')}}"></script>
@yield('scripts')
<script type="text/javascript">
    var x = document.getElementById('error_alert');
    var y = document.getElementById('close_alert');
    y.onclick = function () {
        x.style.display = "none";
    };
</script>
</body>

</html>
