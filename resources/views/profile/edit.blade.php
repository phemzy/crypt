@extends('layouts.master')

@section('content')

<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content content-boxed">
        <!-- User Header -->
        <div class="block">
            <!-- Basic Info -->
            @include('partials.profile_banner')
            <!-- END Basic Info -->
        </div>
        <!-- END User Header -->

        <!-- Main Content -->
        <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="block">
                <ul class="nav nav-tabs nav-justified push-20" data-toggle="tabs">
                    <li class="active">
                        <a href="#tab-profile-personal"><i class="fa fa-fw fa-pencil"></i> Personal</a>
                    </li>
                    <li>
                        <a href="#tab-profile-privacy"><i class="fa fa-fw fa-lock"></i> Privacy</a>
                    </li>
                </ul>
                <div class="block-content tab-content">
                    <!-- Personal Tab -->
                    <div class="tab-pane fade in active" id="tab-profile-personal">
                        <div class="row items-push">
                            <div class="col-sm-6 col-sm-offset-3 form-horizontal">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="email">Profile Picture</label>
                                        <input class="form-control input-lg" type="file" id="pic" name="pic"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 {{ $errors->first('username') ? 'has-error' : '' }}">
                                        <label for="email">Username</label>
                                        <input class="form-control input-lg" type="text" id="username" name="username" placeholder="Enter your new username..." value="{{Auth::user()->username}}">
                                        @if($errors->first('username'))
                                            <span class="help-block">{{ $errors->first('username') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6 {{ $errors->first('first_name') ? 'has-error' : '' }}">
                                        <label for="firstname">Firstname</label>
                                        <input class="form-control input-lg" type="text" id="firstname" name="first_name" placeholder="Enter your firstname.." value="{{Auth::user()->first_name}}">
                                        @if($errors->first('first_name'))
                                            <span class="help-block">{{ $errors->first('first_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-xs-6 {{ $errors->first('last_name') ? 'has-error' : '' }}">
                                        <label for="lastname">Lastname</label>
                                        <input class="form-control input-lg" type="text" id="lastname" name="last_name" placeholder="Enter your lastname.." value="{{Auth::user()->last_name}}">
                                        @if($errors->first('last_name'))
                                            <span class="help-block">{{ $errors->first('last_name') }}</span>
                                        @endif
                                    </div>
                                </div>
  								<div class="form-group">
                                    <div class="col-xs-12 {{ $errors->first('city') ? 'has-error' : '' }}">
                                        <label for="city">City</label>
                                        <input class="form-control input-lg" type="text" id="city" name="city" placeholder="Enter your City..." value="{{Auth::user()->profile->city}}">
                                        @if($errors->first('city'))
                                            <span class="help-block">{{ $errors->first('city') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 {{ $errors->first('mobile') ? 'has-error' : '' }}">
                                        <label for="mobile">Mobile</label>
                                        <input class="form-control input-lg" type="text" id="mobile" name="number" placeholder="Enter your new mobile..." value="{{Auth::user()->profile->number}}">
                                        @if($errors->first('number'))
                                            <span class="help-block">{{ $errors->first('number') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Personal Tab -->

                    <!-- Privacy Tab -->
                    <div class="tab-pane fade" id="tab-profile-privacy">
                        <div class="row items-push">
                            <div class="col-sm-6 col-sm-offset-3 form-horizontal">
                                {{-- <div class="form-group">
                                    <div class="col-xs-8">
                                        <div class="font-s13 font-w600">Online Status</div>
                                        <div class="font-s13 font-w400 text-muted">Show your status to all</div>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                        <label class="css-input switch switch-sm switch-primary push-10-t">
                                            <input type="checkbox"><span></span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-xs-8">
                                        <div class="font-s13 font-w600">Auto Updates</div>
                                        <div class="font-s13 font-w400 text-muted">Keep up to date</div>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                        <label class="css-input switch switch-sm switch-primary push-10-t">
                                            <input type="checkbox"><span></span>
                                        </label>
                                    </div>
                                </div>
                                <hr> --}}
                                <div class="form-group">
                                    <div class="col-xs-8">
                                        <div class="font-s13 font-w600">Notifications</div>
                                        <div class="font-s13 font-w400 text-muted">Do you need them?</div>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                        <label class="css-input switch switch-sm switch-primary push-10-t">
                                            <input type="checkbox" checked><span></span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-sm-8">
                                        <div class="font-s13 font-w600">API Access</div>
                                        <div class="font-s13 font-w400 text-muted">Enable/Disable access</div>
                                    </div>
                                    <div class="col-sm-4 text-right">
                                        <label class="css-input switch switch-sm switch-primary push-10-t">
                                            <input type="checkbox" checked><span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Privacy Tab -->
                </div>
                <div class="block-content block-content-full bg-gray-lighter text-center">
                    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-check push-5-r"></i> Save Changes</button>
                    <button class="btn btn-sm btn-danger" type="reset"><i class="fa fa-refresh push-5-r"></i> Reset</button>
                </div>
            </div>
        </form>
        <!-- END Main Content -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->



@stop
