@extends('layouts.master')

@section('content')
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
    <div class="content content-narrow" id="app">
		<div class="row">
			<div class="col-md-4">
                <div class="block">
                    <ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="active">
                            <a href="#btabs-animated-slideleft-home">{{$market->abbr_name}} Balance</a>
                        </li>
                        <li class="pull-right">
                            <a href="#btabs-animated-slideleft-settings" data-toggle="modal" data-target="#modal-buy"><i class="si si-action-redo"></i></a>
                        </li>
                    </ul>
                    <div class="block-content text-center block-content-full tab-content">
                        <div class="tab-pane fade fade-left in active" id="btabs-animated-slideleft-home">
                            <h4 class="font-w300 push-15">
                            	{{ ($a->loop == 1 || $a->loop ==2) && $a->package != null ? number_format(($a->package->amount * $a->loop) / $market->naira_value , $market->abbr_name == 'TBC' ? 5 : 2) : 0 }} {{ $market->abbr_name }}
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="block">
                	@if(($a->loop == 2 || $a->loop == 1) && $a->package != null)
	                	<div class="block-content block-content-full text-center">
	                        <i class="si si-check fa-4x text-success"></i>
	                        <div class="font-w600 push-15-t">You have {{ $a->loop }} {{ str_plural('package', $a->loop) }} to sell.</div>
	                    </div>
	                @else
	                	<div class="block-content block-content-full text-center">
	                        <i class="si si-ban fa-4x text-danger"></i>
	                        <div class="font-w600 push-15-t">Nothing to Sell</div>
	                    </div>		                
	                @endif
                </div>
			</div>
			<div class="col-sm-8">
				<converter crypto="{{ $market->abbr_name }}" naira_value="{{ $market->naira_value }}"></converter>
				@if(($a->loop == 2 || $a->loop == 1) && $a->package != null)
					@for($i = 1; $i <= $a->loop; $i++)
						<div class="col-xs-6">
		                    <div class="block block-rounded block-link-hover3 text-center" href="javascript:void(0)">
		                        <div class="block-content block-content-full bg-modern">
		                            <p class="h5 text-white">{{ $a->package->name }}</p>
		                            <div class="h2 font-w700 text-white">

		                                {{ number_format($a->package->amount / $market->naira_value, $market->abbr_name == 'TBC' ? 5 : 2) }}
		                                {{ $market->abbr_name }}
		                            </div>
		                            <form action="{{ route('crypto.sell', ['market' => $market->id]) }}" method="post">
		                                {{ csrf_field() }}
		                                <input type="submit" class="h5 text-white-op text-uppercase push-5-t btn btn-danger" value="SELL">
		                            </form>
		                        </div>
		                        <div class="block-content block-content-full block-content-mini">
		                            <i class="fa fa-arrow-up text-success"></i> valued at &#8358;<b>{{number_format($a->package->amount, 2)}}</b>
		                        </div>
		                    </div>
		                </div>
					@endfor
				@endif
			</div>
		</div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
@stop

@section('scripts')
	<script src="{{ URL::to('assets/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ URL::to('assets/js/pages/base_forms_wizard.js') }}"></script>

@stop