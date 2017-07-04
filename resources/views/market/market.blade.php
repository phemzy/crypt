@extends('layouts.master')

@section('content')

<!-- Main Container -->
<main id="main-container">
    <!-- Page Header -->
    <div class="bg-image overflow-hidden" style="background-image: url('{{ asset("assets/img/photos/photo31@2x.jpg")  }}');">
        <div class="bg-black-op">
            <div class="content content-narrow">
                <div class="block block-transparent">
                    <div class="block-content block-content-full">
                        <h1 class="h1 font-w300 text-white animated fadeInDown push-50-t push-5">{{ $market->abbr_name }} Market</h1>
                        <h2 class="h4 font-w300 text-white-op animated fadeInUp">Welcome, {{ Auth::user()->first_name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content content-narrow">
        <!-- Stats -->
        <div class="row text-uppercase">
            <div class="col-xs-6 col-sm-3">
                <div class="block block-rounded">
                    <div class="block-content block-content-full">
                        <div class="font-s12 font-w700">Members</div>
                        <a class="h2 font-w300 text-primary" href="javascript:void(0)" data-toggle="countTo" data-to="1894"></a>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="block block-rounded">
                    <div class="block-content block-content-full">
                        <div class="font-s12 font-w700">A unit of {{ $market->abbr_name }} is</div>
                        <a class="h2 font-w300 text-primary" href="javascript:void(0)">&#8358; {{number_format($market->naira_value)}}</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="block block-rounded">
                    <div class="block-content block-content-full">
                        <div class="font-s12 font-w700">Earnings</div>
                        <span class="h2 font-w300 text-primary"></span><a class="h2 font-w300 text-primary" href="javascript:void(0)" data-toggle="countTo" data-to="{{$market->earnings}}" data-before="&#8358;"></a>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="block block-rounded">
                    <div class="block-content block-content-full">
                        <div class="font-s12 font-w700">Average Sale</div>
                        <a class="h2 font-w300 text-primary" href="javascript:void(0)">&#8358; {{ $market->average_sale }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Stats -->

        <!-- Dashboard Charts -->
        <div class="row" id="app">
            <div class="col-md-6">
                <div class="block block-rounded block-opt-refresh-icon8">
                    <div class="block-header">
                        <ul class="block-options">
                            <li>
                                <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Earnings in &#8358;</h3>
                    </div>
                    <div class="block-content block-content-full bg-gray-lighter text-center">
                        <!-- Chart.js Charts (initialized in js/pages/base_pages_dashboard_v2.js), for more examples you can check out http://www.chartjs.org/docs/ -->
                        <div style="height: 340px;"><canvas class="js-dash-chartjs-earnings"></canvas></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block block-rounded block-opt-refresh-icon8">
                    <div class="block-header">
                        <ul class="block-options">
                            <li>
                                <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Sales</h3>
                    </div>
                    <div class="block-content block-content-full bg-gray-lighter text-center">
                        <!-- Chart.js Charts (initialized in js/pages/base_pages_dashboard_v2.js), for more examples you can check out http://www.chartjs.org/docs/ -->
                        <div style="height: 340px;"><canvas class="js-dash-chartjs-sales"></canvas></div>
                    </div>
                    {{-- <div class="block-content text-center">
                        <div class="row items-push-2x text-center push-20-t">
                            <div class="col-xs-6 col-lg-3">
                                <div class="push-15"><i class="fa fa-wordpress fa-2x"></i></div>
                                <div class="h5 text-muted">+20% Themes</div>
                            </div>
                            <div class="col-xs-6 col-lg-3">
                                <div class="push-15"><i class="fa fa-font fa-2x"></i></div>
                                <div class="h5 text-muted">+25% Fonts</div>
                            </div>
                            <div class="col-xs-6 col-lg-3">
                                <div class="push-15"><i class="fa fa-archive fa-2x"></i></div>
                                <div class="h5 text-muted">-10% Icons</div>
                            </div>
                            <div class="col-xs-6 col-lg-3">
                                <div class="push-15"><i class="fa fa-paint-brush fa-2x"></i></div>
                                <div class="h5 text-muted">+8% Graphics</div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <hr>
        </div>
        <div class="col-sm-8 col-sm-offset-2" id="app">
            <!-- Converter -->
            <converter crypto="{{ $market->abbr_name }}" naira_value="{{ $market->naira_value }}"></converter>
            <!-- END Converter -->
        </div>
        <!-- END Dashboard Charts -->
        </div>
        <!-- Dashboard Cards -->
        <div class="row block">
            <div class="block-header">
                <h4 class="text-center">Choose a package to buy</h4>
            </div>
            <br>           
            @foreach($packages as $p)
                <div class="col-xs-6 col-lg-3">
                    <div class="block block-rounded block-link-hover3 text-center" href="javascript:void(0)">
                        <div class="block-content block-content-full bg-modern">
                            <p class="h5 text-white">{{ $p->name }}</p>
                            <div class="h2 font-w700 text-white">
                                {{ number_format($p->amount / $market->naira_value, 5) }}
                                {{ $market->abbr_name }}
                            </div>
                            <form action="{{ route('crypto.buy', ['market' => $market->id, 'package' => $p->id]) }}" method="post">
                                {{ csrf_field() }}
                                <input type="submit" class="h5 text-white-op text-uppercase push-5-t btn btn-danger" value="SELECT">
                            </form>
                        </div>
                        <div class="block-content block-content-full block-content-mini">
                            <i class="fa fa-arrow-up text-success"></i> valued at &#8358;<b>{{number_format($p->amount, 2)}}</b>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- END Dashboard Cards -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

@endsection

@section('scripts')
	<!-- Page Plugins -->
    <script src="{{ URL::to('assets/js/plugins/chartjs/Chart.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ URL::to('assets/js/pages/base_pages_dashboard_v2.js') }}"></script>
    <script>
        jQuery(function () {
            // Init page helpers (CountTo plugin)
            App.initHelpers('appear-countTo');
        });
    </script>

@endsection

