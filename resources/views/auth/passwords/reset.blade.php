@extends('layouts.design')

@section('content')

    <div class="g-bg-color--primary-to-blueviolet-ltr">
        <div class="g-container--sm g-text-center--xs g-padding-y-80--xs g-padding-y-125--xsm">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-xs-12">
                    <form class="g-bg-color--white-opacity-lightest g-box-shadow__blueviolet-v1 g-padding-x-40--xs g-padding-y-60--xs g-radius--4" method="post" action="{{ route('password.request') }}" id="form">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="g-text-center--xs g-margin-b-40--xs">
                            <h3 class="text-uppercase g-font-size-30--xs g-color--white">Reset Password</h3>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                        <div class="g-margin-b-30--xs{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control s-form-v3__input" name="email" placeholder="* Email" value="{{ $email or old('email') }}" required="">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="g-margin-b-30--xs{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control s-form-v3__input" name="password" placeholder="* Password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="g-margin-b-30--xs{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <input type="password" class="form-control s-form-v3__input" name="password_confirmation" placeholder="* Password">
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="g-text-center--xs">
                            <button type="submit" class="text-uppercase btn-block s-btn s-btn--md s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs">Reset Password</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
