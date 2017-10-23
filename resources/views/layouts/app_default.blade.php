<!DOCTYPE html>
<html>
<head>
    @include('includes.head_default', ['withRecordSessions' => true])
    @yield('additionalCSS')
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ elixir('css/vendor/magnific-popup.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
@yield('header')

<main id="main-content" class="@if(isset($gradient))gradient @endif">
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

    @if (trim($__env->yieldContent('content-lg')))
        <div class="content-lg">
            @yield('content-lg')
        </div>
    @endif

    @if (trim($__env->yieldContent('content-fluid-no-padding')))
        <div class="container-fluid-no-padding">
            @yield('content-fluid-no-padding')
        </div>
    @endif
</main>

@yield('footer')
</body>

<script src="{{elixir('js/vendor/jquery.js')}}"></script>
<script src="{{elixir('js/vendor/jquery-ui.js')}}"></script>
<script src="{{elixir('js/vendor/bootstrap.js')}}"></script>
<script src="{{elixir('js/vendor/magnific-popup.js')}}"></script>
<script src="{{elixir('js/Config.js')}}"></script>
<script src="{{elixir('js/Utils.js')}}"></script>

<script>
    /*** Handle jQuery plugin naming conflict between jQuery UI and Bootstrap ***/
    $.widget.bridge('uibutton', $.ui.button);
    $.widget.bridge('uitooltip', $.ui.tooltip);
    $('#flash-overlay-modal').modal();
</script>

@yield('scripts')
</html>
