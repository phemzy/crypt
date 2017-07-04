@extends('layouts.master')

@section('content')

<main id="main-container">
	<div class="content content-boxed">
		<div class="block">
			<div class="block-content text-center block-content-full">
				<h3>Markets you might like to join..</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				@foreach($markets as $market)
					<div class="block">		            
			           {{--  <img class="img-responsive" src="{{ asset('assets/img/photos/photo8.jpg') }}" alt=""> --}}
			            <div class="block-content block-content-full" >
			                <h3 class="h4 push-10">{{ $market->abbr_name }} MARKET</h3>
			                <p class="text-gray-dark">{{ $market->description }}</p>
			                <a class="btn btn-sm btn-default" href="javascript:void(0)" onclick="event.preventDefault();joinMarket({{$market->id}})" id="{{ $market->id }}">{{ Auth::user()->hasJoined($market) ? 'JOINED' : 'JOIN' }}</a>
			            </div>
			        </div>
		        @endforeach

		        <a href="/home" class="text-center btn btn-success btn-rounded btn-block" style="margin-bottom: 100px;">Proceed to DASHBOARD</a>
			</div>
		</div>
		
	</div>
</main>

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
						document.getElementById(market).innerHTML = 'JOINED'
					}
					else 
						document.getElementById(market).innerHTML = 'JOIN'
					
				},
			})
		}
	</script>
@stop