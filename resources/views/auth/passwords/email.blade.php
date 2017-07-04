@extends('layouts.auth')

@section('content')

<div class="push-30-t push-20 animated fadeIn">
    <!-- Reminder Title -->
    <div class="text-center">
        <img src="{{ asset('img/logo1.png') }}" alt="">
        <p class="text-muted push-15-t">Don’t worry, we’ll send a reset link to you.</p>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <!-- END Reminder Title -->

    <!-- Reminder Form -->
    <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/base_pages_reminder.js) -->
    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
    <form class="js-validation-reminder form-horizontal push-30-t" action="{{ route('password.email') }}" method="post">
        <div class="form-group">
            <div class="col-xs-12">
                <div class="form-material form-material-primary floating {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input class="form-control" type="email" id="reminder-email" name="email" value="{{ old('email') }}" required>
                    <label for="reminder-email">Enter Your Email</label>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <button class="btn btn-sm btn-block btn-primary" type="submit">Reset Password</button>
            </div>
        </div>
        {{ csrf_field() }}
    </form>
    <!-- END Reminder Form -->

    <!-- Extra Links -->
    <div class="text-center push-50-t">
        <a href="/login">Login?</a>
    </div>
    <!-- END Extra Links -->
</div>

@endsection