@extends('layouts.default', ['title' => trans('views.page_titles.login.main')])

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
            @if (Route::has('auth.login'))
                @auth
                <a href="{{ url('/home') }}">{{trans('views.home.home')}}</a>
            @else
                @if(Sentinel::getUser())
                    <a href="{{ route('auth.logout') }}">{{trans('views.home.logout')}}</a>
                @else
                    <a href="{{ route('auth.login') }}">{{trans('views.home.login')}}</a>
                @endif
                @endauth
            @endif
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">

            <div class="content">
                <div class="title m-b-md">
                    @if (!empty($user))
                        {{ trans('views.home.welcome') . ' ' . $user->first_name . ' ' . $user->last_name }}
                    @else
                        {{ trans('views.home.please_login')}}
                    @endif
                </div>

                <div class="links">
                    @if (!empty($user))
                        <a href="{{ route('user.details', [$user->getHashedId()]) }}">Profile</a> |
                    @endif
                    <a href="https://github.com/elam0444/test-laravel">GitHub</a> |
                    <a href="https://elam0444.wixsite.com/1234">About Me</a>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection