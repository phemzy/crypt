@extends('layouts.admin')
@section('content')

 <!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content content-boxed">
        <!-- All Products -->
        <div class="block">
            <div class="block-header bg-gray-lighter">
                <h1 class="block-title"><span class="text-capitalize"> {{ $status }} {{ $type == 'purchase' ? 'Purchases' : 'Sales' }}</span></h1>
            </div>
            <div class="block-content">
                <table class="table table-borderless table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="">ID</th>
                            <th class="">Market</th>
                            <th>
                                User
                            </th>
                            <th>Package</th>
                            <th class="">Amount</th>
                            <th>Date Created</th>
                            <th>Status</th>
                            @if($status == 'matched' || $status == 'complete')
                                <th>Date Matched</th>
                            	<th>Matcher</th>

                            @endif
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trans as $t)
                        <tr>
                            <td class="text-center">
                                <a class="font-" href="base_pages_ecom_product_edit.html">
                                    <strong>{{ $t->id }}</strong>
                                </a>
                            </td>
                            <td class="">
                                <a href="">{{ $t->market->abbr_name }}</a>
                            </td>
                            <td>
                                <a href="">
                                    {{ $t->user->fullname() }}
                                </a>
                            </td>
                            <td>
                                {{$t->package->name}}
                            </td>
                            <td class="">
                                <strong>&#8358;{{ $t->package->amount }}</strong>
                            </td>
                            <td class="">{{ date('D M jS, Y g:ia', strtotime($t->created_at))  }}</td>
                            <td>
                                <span class="label label-danger">{{ $t->status }}</span>
                            </td>
                            @if($status == 'matched' || $status == 'complete')
                                <td>{{ date('D M jS, Y g:ia', strtotime($t->matched_at ?: $t->updated_at))  }}</td>
                            	<td><button class="btn btn-default" data-toggle="modal" data-target="#{{ $t->transaction_id }}" type="button"> Matched User </button></td>
                            	<div class="modal fade" id="{{ $t->transaction_id }}" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog modal-dialog-popin">
										<div class="modal-content">
											<div class="block block-themed block-transparent remove-margin-b">
												<div class="block-header bg-primary-dark">
													<ul class="block-options">
														<li>
															<button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
														</li>
													</ul>
													<h3 class="block-title">Terms &amp; Conditions</h3>
												</div>
												<div class="block-content">
													<div class="row">
								                        <div class="col-md-6 col-md-offset-3">
								                        	<form class="form-horizontal push-10" onsubmit="return false;">
									                            <div class="form-group">
									                                <div class="col-xs-12">
									                                    <div class="form-material">
									                                        <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->recipient() ?$t->recipient()->fullname() : '' }}">
									                                        <label for="name">Name</label>
									                                    </div>
									                                </div>
									                            </div>
									                            <div class="form-group">
									                                <div class="col-xs-12">
									                                    <div class="form-material">
									                                        <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->recipient() ?$t->recipient()->profile->city : '' }}">
									                                        <label for="name">City</label>
									                                    </div>
									                                </div>
									                            </div>
									                            <div class="form-group">
									                                <div class="col-xs-12">
									                                    <div class="form-material">
									                                        <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->recipient() ?$t->recipient()->profile->number : '' }}">
									                                        <label for="name">Mobile</label>
									                                    </div>
									                                </div>
									                            </div>
									                            <div class="form-group">
									                                <div class="col-xs-12">
									                                    <div class="form-material">
									                                        <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->recipient() ?$t->recipient()->account->bank_name : '' }}">
									                                        <label for="name">Bank Name</label>
									                                    </div>
									                                </div>
									                            </div>
									                            <div class="form-group">
									                                <div class="col-xs-12">
									                                    <div class="form-material">
									                                        <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->recipient() ?$t->recipient()->account->account_name : '' }}">
									                                        <label for="name">Account Name</label>
									                                    </div>
									                                </div>
									                            </div>
									                            <div class="form-group">
									                                <div class="col-xs-12">
									                                    <div class="form-material">
									                                        <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->recipient() ?$t->recipient()->account->account_number : '' }}">
									                                        <label for="name">Account Number</label>
									                                    </div>
									                                </div>
									                            </div>
									                            <div class="form-group">
									                                <div class="col-xs-12">
									                                    <div class="form-material">
									                                        <input class="form-control" type="text" disabled="" id="grc_email" name="name" value="{{ $t->recipient() ?$t->recipient()->profile->grc_email : '' }}">
									                                        <label for="name">GRC Email</label>
									                                    </div>
									                                </div>
									                            </div>
									                            <div class="form-group">
									                                <div class="col-xs-12">
									                                    <div class="form-material">
									                                        <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->recipient() ?$t->recipient()->profile->tbc_wallet_id : '' }}">
									                                        <label for="name">TBC WALLET ID</label>
									                                    </div>
									                                </div>
									                            </div>
									                        </form>
								                        </div>	                        	 
							                        </div>
												</div>
											</div>
											<div class="modal-footer">
												<button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
												<button class="btn btn-sm btn-primary" type="button" data-dismiss="modal"><i class="fa fa-check"></i> Ok</button>
											</div>
										</div>
									</div>
								</div>
                            @endif
                            <td class="">
                                <ul class="" style="list-style-type: none;">
                                    <li class="dropdown">
                                        <button type="button" data-toggle="dropdown" class="btn btn-info"> <span class="caret"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            @if($t->isMatched())
                                            <li>
                                                <a href="{{ route('unmatch', $t->id) }}" onclick="event.preventDefault();document.getElementById('{{ $t->id }}').submit()">Unmatch</a>
                                                <form action="{{ route('unmatch', $t->id) }}" id="{{ $t->id }}" method="post">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>                                                
                                            @endif
                                            <li>
                                                @if($t->hasFailed())
                                                    <a href="">Block Due to Failed</a>
                                                @endif
                                            </li>
                                            <li>
                                            <a href="{{ route('delete.transaction', $t->id) }}">Delete</a>
                                            </li>
                                            <li><a href="">Mail User</a></li>
                                            <li><a href="">View</a></li>
                                            <li><a href="">Confirm Transaction</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav class="text-right">
                    {{ $trans->links() }}
                </nav>
            </div>
        </div>
        <!-- END All Products -->
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