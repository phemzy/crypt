@extends('layouts.admin')

@section('content')

 <!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content content-boxed">
        <div class="block block-bordered">
            <div class="block-header bg-gray-lighter">
                <ul class="block-options">
                    <li>
                        <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                    </li>
                </ul>
                <h3 class="block-title">Send Mail</h3>
            </div>
            <div class="block-content">
                <form class="form-horizontal push-10-t push-10" action="{{ route('inactive.mail.send') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="mega-firstname">From</label>
                                    <input class="form-control input-lg" type="text" id="mega-firstname" name="email" value="@crypto2naira.com">
                                </div>
                                <div class="col-xs-6">
                                    <label for="mega-lastname">Name</label>
                                    <input class="form-control input-lg" type="text" id="mega-lastname" name="name" placeholder="Enter your Name..">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            {{-- <div class="form-group">
                                <div class="col-xs-12">
                                    <label for="mega-lastname">Username</label>
                                    <input class="form-control input-lg" type="text" id="mega-username" name="mega-username" placeholder="Enter your username..">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <label for="mega-bio">Message</label>
                                    <textarea class="form-control input-lg" id="mega-bio" name="message" rows="22" placeholder="Enter the message.."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            {{-- <div class="form-group">
                                <div class="col-xs-12">
                                    <label for="mega-city">Where do you live?</label>
                                    <input class="form-control input-lg" type="text" id="mega-city" name="mega-city" placeholder="Enter your location..">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <label for="mega-skills">Skills</label>
                                    <select class="form-control" id="mega-skills" name="mega-skills" size="7" multiple>
                                        <option value="1">HTML</option>
                                        <option value="2">CSS</option>
                                        <option value="3">JavaScript</option>
                                        <option value="4">PHP</option>
                                        <option value="5">Ruby</option>
                                        <option value="6">Photoshop</option>
                                        <option value="7">Illustrator</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="mega-age">Age</label>
                                    <input class="form-control input-lg" type="text" id="mega-age" name="mega-age" placeholder="Enter your age..">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12">Gender</label>
                                <div class="col-xs-12">
                                    <label class="css-input css-radio css-radio-warning push-10-r">
                                        <input type="radio" name="mega-gender-group"><span></span> Female
                                    </label>
                                    <label class="css-input css-radio css-radio-warning">
                                        <input type="radio" name="mega-gender-group"><span></span> Male
                                    </label>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-warning" type="submit"><i class="fa fa-check push-5-r"></i>Send Mail</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

@stop

@section('scripts')
<script>
    jQuery(function () {
        // Init page helpers (Appear + CountTo plugins)
        App.initHelpers(['appear', 'appear-countTo']);
    });
</script>

@stop