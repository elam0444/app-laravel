@extends('layouts.app_default', ['title' => trans('views.page_titles.login.main')])

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
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <div>
                <button type="button" class="btn btn-info" id="stop">
                    <span class="stop-watch"></span>
                </button>
            </div>
        </div>
    </div>

    <div class="content">
        <form id="profile" class="form-horizontal campaign-setup">
            <div class="row">
                <div class="form-group">
                    <label for="first-name" class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">
                        First Name
                    </label>
                    <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
                        <input type="text" class="form-control" id="first-name" name="first_name"
                               @if(!empty($user))value="{{ $user->first_name }}"@endif
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="last-name" class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">
                        Last Name
                    </label>
                    <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
                        <input type="text" class="form-control" id="last-name" name="last_name"
                               @if(!empty($user))value="{{ $user->last_name }}"@endif
                        >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <button type="button" class="btn btn-success" id="save-profile"
                            data-url="{{ route("user.details.update", [$user->getHashedId()]) }}">
                        UPDATE
                    </button>
                </div>
            </div>

            <div class="alert" id="alert">
            </div>
        </form>

    </div>

@endsection

@section('scripts')
    <script src="{{ elixir('js/UserProfile.js') }}"></script>
@endsection