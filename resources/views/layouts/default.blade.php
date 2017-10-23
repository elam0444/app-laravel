<!DOCTYPE html>
<html>
    <head>
        @include('includes.head_default', ['title' => !empty($title) ? $title : null, 'withRecordSessions' => false])
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        @yield('header')
        @yield('sub_header')

        <div class="container">
            @yield('content')
        </div>

        @yield('footer')
    </body>

    <script src="{{elixir('js/vendor/jquery.js')}}"></script>
    <script src="{{elixir('js/vendor/jquery-ui.js')}}"></script>
    <script src="{{elixir('js/vendor/bootstrap.js')}}"></script>
    <script src="{{elixir('js/vendor/magnific-popup.js')}}"></script>
    <script src="{{elixir('js/Config.js')}}"></script>
    <script src="{{elixir('js/Utils.js')}}"></script>

</html>