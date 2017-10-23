<title>@if(isset($title)){{ trans('views.basic.page_title', ['title' => $title]) }}@else App Test @endif</title>

<meta name="csrf-token" content="<?= csrf_token() ?>">

<link rel="icon" href="{{URL::asset('images/logo-tiny.png')}}?v=2" type="image/x-icon">
<link href="{{ URL::asset('css/vendor/bootstrap.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('css/vendor/font-awesome.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('css/vendor/simple-line-icons.css') }}" rel="stylesheet" type="text/css">

@if(env('APP_ENV') == 'production' && isset($withRecordSessions))
    @if($withRecordSessions)
        <script>
            var AUTH_USER_EMAIL = '{{Sentinel::getUser()->getUserLoginName()}}';
        </script>

        <!-- Begin Inspectlet Embed Code -->
        <script type="text/javascript" id="inspectletjs">
            window.__insp = window.__insp || [];
            __insp.push(['wid', 1719533501]);
            __insp.push(['identify', AUTH_USER_EMAIL]);
            (function() {
                function ldinsp(){if(typeof window.__inspld != "undefined") return; window.__inspld = 1; var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js'; var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); };
                setTimeout(ldinsp, 500); document.readyState != "complete" ? (window.attachEvent ? window.attachEvent('onload', ldinsp) : window.addEventListener('load', ldinsp, false)) : ldinsp();
            })();
        </script>
        <!-- End Inspectlet Embed Code -->
    @endif
@endif
