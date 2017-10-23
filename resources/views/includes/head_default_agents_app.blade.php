<title>@if(isset($title)){{ trans('views.basic.page_title', ['title' => $title]) }}@else App Test @endif</title>

<meta name="csrf-token" content="<?= csrf_token() ?>">

<link rel="icon" href="{{URL::asset('images/logo-tiny.png')}}?v=2" type="image/x-icon">
<link href="{{ URL::asset('css/vendor/bootstrap.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('css/vendor/font-awesome.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('css/vendor/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
