@extends('layouts.auth')

@section('content')
<div class="push-30-t push-20 animated fadeIn">
    <!-- Register Title -->
    <div class="text-center">
        <img src="img/logo1.png" alt="">
        <p class="text-muted push-15-t">Already have an account? <a href="login">Login</a></p>
    </div>
    <!-- END Register Title -->

    <!-- Register Form -->
    <!-- jQuery Validation (.js-validation-register class is initialized in js/pages/base_pages_register.js) -->
    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
        <register token="{{ csrf_token() }}"></register>
    <!-- END Register Form -->
</div>
@endsection