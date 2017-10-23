@extends('layouts.default', ['title' => trans('views.page_titles.login.main')])

@section('content')
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-12 col-xs-12 text-center">
            <img border="0" alt="{{trans('views.basic.logo_alt')}}"
                 src="{{URL::asset('images/logo-tiny.png')}}"
                 class="login-logo">
        </div>
    </div>
    <form method="POST" action="{{ route('auth.login') }}">
        <div class="row top5 login-form">
            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12">
                @include('errors.list')
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <h3>{{trans('views.login.form.email')}}</h3>
                    <input class="form-control" placeholder="{{trans('views.login.form.email_placeholder')}}"
                           name="email" type="text" value="{{ old('email') }}" autofocus required>
                </div>
                <div class="form-group top10">
                    <h3>{{trans('views.login.form.password')}}</h3>
                    <input class="form-control" placeholder="{{trans('views.login.form.password_placeholder')}}"
                           name="password" type="password" value="" autocomplete="off" required>
                </div>
            </div>
        </div>
        <div class="row top5">
            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12 text-center">
                <input type="submit" class="btn btn-success btn-100-width"
                       value="{{trans('views.login.form.submit')}}"/>
            </div>
        </div>
    </form>
    <div class="row top1 register hidden">
        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12 text-center">
            <a href="">{{trans('views.login.register_here')}}</a>
        </div>
    </div>
@endsection



