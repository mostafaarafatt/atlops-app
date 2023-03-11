		{{-- <!--Favicon -->
		<link rel="icon" href="{{asset('assets/images/brand/favicon.ico')}}" type="image/x-icon"/>

		<!--Bootstrap css -->
		<link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

		<!-- Style css -->
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/css/dark.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet" />

		<!-- Animate css -->
		<link href="{{asset('assets/css/animated.css')}}" rel="stylesheet" />

		<!--Sidemenu css -->
       <link href="{{asset('assets/css/sidemenu.css')}}" rel="stylesheet">

		<!-- P-scroll bar css-->
		<link href="{{asset('assets/plugins/p-scrollbar/p-scrollbar.css')}}" rel="stylesheet" />

		<!---Icons css-->
		<link href="{{asset('assets/plugins/icons/icons.css')}}" rel="stylesheet" />

		@yield('styles')

	    <!-- Color Skin css -->
		<link id="theme" href="{{asset('assets/colors/color1.css')}}" rel="stylesheet" type="text/css"/>
 --}}


 <!-- App css -->
@if (app()->getLocale() === 'ar')
    <!--Bootstrap css -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.rtl.min.css') }}" rel="stylesheet">

    <!-- Style css -->
    <link href="{{ asset('assets/css/style-ar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dark-ar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/skin-modes-ar.css') }}" rel="stylesheet" />

    <!-- Animate css -->
    <link href="{{ asset('assets/css/animated-ar.css') }}" rel="stylesheet" />

    <!--Sidemenu css -->
    <link href="{{ asset('assets/css/sidemenu-ar.css') }}" rel="stylesheet">
@else
    <!--Bootstrap css -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Style css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!-- Animate css -->
    <link href="{{ asset('assets/css/animated.css') }}" rel="stylesheet" />

    <!--Sidemenu css -->
    <link href="{{ asset('assets/css/sidemenu.css') }}" rel="stylesheet">
@endif
<link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
<style>
body {
    font-family: 'Cairo';font-size: 22px;
}
.side-menu__label{
    margin-right: 10px
}
.side-menu__item{
    margin-right: 5px
}
</style>
