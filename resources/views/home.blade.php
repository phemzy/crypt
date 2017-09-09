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
                            </ul>
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
                                @if((Auth::user()->profile->tbc_wallet_id == null ) || (Auth::user()->profile->account_number == null))
                                    <h5 class="text-center">
                                        Some of your trading details are not filled. Like your bank account details and TBC wallet ID. You need these for complete transaction. Click <a href="{{ route('trading.bank') }}" class="btn-link">HERE</a> to edit them.
                                    </h5>
                                @endif
                            @else

                                <div class="block block-themed">
                                    <div class="block-header bg-danger">
                                    </div>
                                    <div class="block-content">
                                        
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