<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Julien">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @routes {{--Ziggy routes for js--}}

<!-- Fonts and Styles -->
    @stack('css_before')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" href="{{ mix('css/dashmix.css') }}">

    @stack('css_after')

<!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
                    'csrfToken' => csrf_token(),
            ]) !!}
        ;
    </script>

</head>
<body>
<div id="page-container-front" class="container-fluid p-0 m-0">


    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="">
            <div class="content content-full py-2 px-3">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <!-- START BREADCRUMB -->
                @yield('breadcrumbs')
                <!-- END BREADCRUMB -->
                </div>
            </div>
        </div>
        <!-- END Hero -->
        <div class="content" @yield('background-image')>
            @yield('content')
        </div>
    </main>
    <!-- END Main Container -->

    @stack('js_before')

    <!-- Dashmix Core JS -->
    <script src="{{ mix('js/dashmix.app.js') }}"></script>

    @include('flash')

    <script src="{{ mix('js/default.js') }}"></script>
    <!-- Laravel Scaffolding JS -->
    <script src="{{ mix('js/laravel.app.js') }}"></script>

    <script type="text/javascript">
        Lang.setLocale('{{App::getLocale()}}')
    </script>

    @stack('js_after')

</div>
</body>
</html>