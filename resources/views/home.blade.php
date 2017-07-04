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
            <div class="row">
                <div class="col-sm-5 col-sm-push-7 col-lg-4 col-lg-push-8">
                    <!-- Follow -->
                    {{-- <div class="block">
                        <div class="block-content block-content-full text-center">
                            <button class="btn btn-sm btn-default"><i class="fa fa-fw fa-plus text-success"></i> Follow</button>
                            <button class="btn btn-sm btn-default"><i class="fa fa-fw fa-inbox text-info"></i> Send Message</button>
                        </div>
                    </div> --}}
                    <!-- END Follow -->

                    <!-- About -->
                    {{-- <div class="block">
                        <div class="block-content">
                            <p>Hi there, welcome to my profile!</p>
                            <p></p>
                        </div>
                    </div> --}}
                    <!-- END About -->

                    <!-- Followers -->
                    <div class="block block-opt-refresh-icon6">
                        <div class="block-header">
                            <ul class="block-options">
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title"><i class="fa fa-fw fa-share-alt"></i> Followers</h3>
                        </div>
                        <div class="block-content">
                            <ul class="nav-users push">
                                <li>Your followers appear here</li>
                                {{-- <li>
                                    <a href="base_pages_profile.html">
                                        <img class="img-avatar" src="assets/img/avatars/avatar1.jpg" alt="">
                                        <i class="fa fa-circle text-danger"></i> Laura Bell
                                        <div class="font-w400 text-muted"><small>Photographer</small></div>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    <!-- END Followers -->

                    <!-- Products -->
                    <div class="block block-opt-refresh-icon6">
                        <div class="block-header">
                            <ul class="block-options">
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title"><i class="fa fa-fw fa-bar-chart"></i> Your markets</h3>
                        </div>
                        <div class="block-content">
                            <ul class="list list-simple list-li-clearfix">
                                @foreach($user_markets as $market)
                                    <li>
                                        <a class="item item-rounded pull-left push-10-r bg-info" href="javascript:void(0)">
                                            <i class="si si-rocket text-white-op"></i>
                                        </a>
                                        <h5 class="push-10-t">{{$market->abbr_name}}</h5>
                                        <div class="font-s13">{{$market->name}}</div>
                                        <a class="btn btn-sm btn-danger btn-xs" href="javascript:void(0)" onclick="event.preventDefault();joinMarket({{$market->id}})" id="{{ $market->id }}">{{ Auth::user()->hasJoined($market) ? 'Leave' : 'JOIN' }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- END Products -->

                    <!-- Ratings -->
                    <div class="block block-opt-refresh-icon6">
                        <div class="block-header">
                            <ul class="block-options">
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title"><i class="fa fa-fw fa-star"></i> Ratings</h3>
                        </div>
                        <div class="block-content">
                            <ul class="list list-simple">
                                <li>When anyone rates you, the rating will appear here. Make your trading transactions easy and smooth to get good ratings</li>
                                {{-- <li>
                                    <div class="push-5 clearfix">
                                        <div class="text-warning pull-right">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a class="font-w600" href="base_pages_profile.html">Ethan Howard</a>
                                        <span class="text-muted">(5/5)</span>
                                    </div>
                                    <div class="font-s13">Working great in all my devices, quality and quantity in a great package! Thank you!</div>
                                </li> --}}
                            </ul>
                            {{-- <div class="text-center push">
                                <small><a href="javascript:void(0)">Read More..</a></small>
                            </div> --}}
                        </div>
                    </div>
                    <!-- END Ratings -->
                </div>
                <div class="col-sm-7 col-sm-pull-5 col-lg-8 col-lg-pull-4">
                    <!-- Timeline -->
                    <div class="block block-opt-refresh-icon6">
                        <div class="block-header">
                            <ul class="block-options">
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title"><i class="fa fa-newspaper-o"></i> Updates</h3>
                        </div>
                        <div class="block-content" style="padding-bottom: 50px">
                            @if(count($transactions) <= 0)
                            <h4 class="text-center">All your transactional details and market updates will appear here. <br> <small>
                                Get your account rolling!
                            </small></h4>
                                @if(Auth::user()->profile->tbc_wallet_id == null || Auth::user()->profile->account_number == null)
                                    <h5 class="text-center">
                                        Some of your trading details are not filled. Like your bank account details and TBC wallet ID. You need these for complete transaction. Click <a href="{{ route('trading.bank') }}" class="btn-link">HERE</a> to edit them.
                                    </h5>
                                @endif
                            @else

                                <div class="block block-themed">
                                    <div class="block-header bg-danger">
                                    </div>
                                    <div class="block-content">

                                        @if(Auth::user()->profile->tbc_wallet_id == null || Auth::user()->profile->account_number == null)

                                            <h5 class="text-center">
                                                Some of your trading details are not filled. Like your bank account details and TBC wallet ID. You need these for complete transaction. Click <a href="{{ route('trading.bank') }}">HERE</a> to edit them.
                                            </h5>
                                            <br><hr>
                                        @endif
                                        
                                        <ul class="list list-timeline pull-t">
                                            @foreach($transactions as $t)
                                            <!-- Photo Notification -->
                                            @include('partials.item')
                                            <!-- END Photo Notification -->
                                            @endforeach
                                        </ul>

                                        {{ $transactions->links() }}
                                    </div>
                                </div>
                            @endif
                            <!-- Generic Notification -->
                            {{-- <div class="block block-transparent pull-r-l">
                                <div class="block-header bg-gray-lighter">
                                    <ul class="block-options">
                                        <li>
                                            <span><em class="text-muted">4 hrs ago</em></span>
                                        </li>
                                        <li>
                                            <span><i class="fa fa-briefcase text-modern"></i></span>
                                        </li>
                                    </ul>
                                    <h3 class="block-title">3 New Products were added!</h3>
                                </div>
                                <div class="block-content block-content-full">
                                    <a class="item item-rounded push-10-r bg-info" data-toggle="tooltip" title="MyPanel" href="javascript:void(0)">
                                        <i class="si si-rocket text-white-op"></i>
                                    </a>
                                    <a class="item item-rounded push-10-r bg-amethyst" data-toggle="tooltip" title="Project Time" href="javascript:void(0)">
                                        <i class="si si-calendar text-white-op"></i>
                                    </a>
                                    <a class="item item-rounded push-10-r bg-city" data-toggle="tooltip" title="iDashboard" href="javascript:void(0)">
                                        <i class="si si-speedometer text-white-op"></i>
                                    </a>
                                </div>
                            </div> --}}
                            <!-- END Generic Notification -->

                            <!-- Twitter Notification -->
                            {{-- <div class="block block-transparent pull-r-l">
                                <div class="block-header bg-gray-lighter">
                                    <ul class="block-options">
                                        <li>
                                            <span><em class="text-muted">12 hrs ago</em></span>
                                        </li>
                                        <li>
                                            <span><i class="fa fa-twitter text-info"></i></span>
                                        </li>
                                    </ul>
                                    <h3 class="block-title">+ 1150 Followers</h3>
                                </div>
                                <div class="block-content">
                                    <p class="font-s13">You’re getting more and more followers, keep it up!</p>
                                </div>
                            </div> --}}
                            <!-- END Twitter Notification -->
                        </div>
                    </div>
                    <!-- END Timeline -->
                </div>
            </div>
            <!-- END Main Content -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@stop

@section('scripts')
    <script>
        joinMarket = function (market){
            $.ajax({
                url: '/market/' + market + '/join',
                type: 'post',
                dataType: 'json',
                data: {
                    id: market,
                    _token: document.head.querySelector('meta[name="csrf-token"]').content,
                },
                success: function(resp){
                    if(resp == 'true'){
                        document.getElementById(market).innerHTML = 'Leave'
                    }
                    else 
                        document.getElementById(market).innerHTML = 'JOIN'
                    
                },
            })
        }
    </script>
@stop