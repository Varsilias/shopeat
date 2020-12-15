<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{asset('img/favicon.png')}}" type="image/gif" sizes="16x16">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loader.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.default.css') }}" rel="stylesheet" id="theme-stylesheet">


</head>
<body>
    <div id="app">
        @include('includes.nav')
    {{-- loader starts --}}
    <div class="container">
        <div class="row loader-container">
            <div class="col-md-12 justify-content-center text-center py-4">
                <div class="loader">
                    <div class="circle"></div>
                    <div class="circle"></div>
                </div>
          </div>
        </div>
    </div>
    {{-- loader ends --}}

        <main>
            <div class="main">
                <div class="container my-2">
                    @include('includes.messages')
                </div>
                @yield('content')
                <div class="container-fluid footer">
                    @yield('footer')
                </div>
            </div>
        </main>
    </div>
<script src="{{ asset('js/loader.js') }}"></script>
<script src="{{ asset('js/all.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>
