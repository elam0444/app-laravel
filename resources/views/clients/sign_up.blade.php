@extends('layouts.clients_auth')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6 top3 text-center">
            <h2>{{trans('views.sign_up.title')}}</h2>
        </div>
    </div>
    <div class="row">
        <form id="sign-up" class="top1" method="POST" action="{{route('clients.sign_up')}}"
              data-redirect-success="{{route('home')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6 text-center">
                        <div class="top1">
                            <input class="form-control" type="text" title="first-name" name="first_name"
                                   placeholder="{{trans('views.sign_up.form.first_name')}}" required/>
                        </div>
                        <div class="top1">
                            <input class="form-control" type="text" title="last-name" name="last_name"
                                   placeholder="{{trans('views.sign_up.form.last_name')}}" required/>
                        </div>
                        <div class="top1">
                            <input class="form-control" type="text" title="email" name="email"
                                   placeholder="{{trans('views.sign_up.form.email')}}" required/>
                        </div>
                        <div class="top1">
                            <input class="form-control" type="password" title="password" name="password"
                                   placeholder="{{trans('views.sign_up.form.password')}}" required/>
                        </div>
                        <div class="top1">
                            <input class="form-control" type="password" title="password-confirmation"
                                   name="password_confirmation"
                                   placeholder="{{trans('views.sign_up.form.password_confirmation')}}" required/>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row top1">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6 text-center">
                        <input type="submit" class="btn btn-success"
                               value="{{trans('views.sign_up.form.submit')}}"
                               >
                        <div id="alerts-section" class="alert"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
        </form>
    </div>
@endsection

@section('additionalCSS')
@endsection

@section('scripts')
    <script src="{{ elixir('js/SignUp.js') }}"></script>
@endsection
