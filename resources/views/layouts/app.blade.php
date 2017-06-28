<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

<!--including head partial-->
    @include('inc.head')

</head>

<body>
    <div id="app">

    <!--including navigation partial-->
        @include('inc.navigation')

        @yield('start')
            
        <div class="container">
        <!--alerting messages for successful actions-->
            @include('inc.messages')

        <!--adding a main elements for every page and a frame for the content-->
            @yield('content')
            
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
