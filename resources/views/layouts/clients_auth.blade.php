<!DOCTYPE html>
<html>
<head>
    @include('includes.head_default')
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>

@if (trim($__env->yieldContent('content-fluid')))
    <div class="container-fluid">
        @yield('content-fluid')
    </div>
@endif

@if (trim($__env->yieldContent('content')))
    <div class="container">
        @yield('content')
    </div>
@endif

</body>

<script src="{{elixir('js/vendor/jquery.js')}}"></script>
<script src="{{elixir('js/vendor/bootstrap.js')}}"></script>
<script src="{{elixir('js/Config.js')}}"></script>
<script src="{{elixir('js/Utils.js')}}"></script>

@yield('scripts')
</html>
