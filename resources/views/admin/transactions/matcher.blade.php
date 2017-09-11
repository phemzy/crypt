@extends('layouts.admin')
@section('content')

 <!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content content-boxed">
        <!-- All Products -->
        <div class="block">
            <div class="block-header bg-gray-lighter">
                <h1 class="block-title"><span class="text-capitalize"> 
                TBC MARKET MATCHER</span></h1>
            </div>
            <div class="block-content">
                <form action="{{ route('match') }}" method="post">
                    <input type="hidden" name="market" value="TBC">
                    {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-block">MATCH</button>
                <hr>
                <div>
                    <select name="matching-type" id="" class="form-control">
                        <option value="">Select matching type</option>
                        <option value="seller-2-1">2 Seller to 1 buyer</option>
                        <option value="1-1" selected="">1 Buyer to 1 Seller</option>
                    </select>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="text-left">Buyers <span class="badge">{{ $tbc_buy->count() }}</span></h3>
                        <table class="table table-borderless table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>
                                        User
                                    </th>
                                    <th class="">Amount</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tbc_buy as $t)
                                    <tr>
                                        <td>
                                            <input type="radio" name="buyer" value="{{ $t->id }}">
                                        </td>
                                        <td><a href="" data-toggle="modal" data-target="#{{ $t->id }}" type="button">{{$t->user->fullname()}}</a>
                                        </td>
                                        <div class="modal fade" id="{{ $t->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-popin">
                                                <div class="modal-content">
                                                    <div class="block block-themed block-transparent remove-margin-b">
                                                        <div class="block-header bg-primary-dark">
                                                            <ul class="block-options">
                                                                <li>
                                                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                                </li>
                                                            </ul>
                                                            <h3 class="block-title">User details</h3>
                                                        </div>
                                                        <div class="block-content">
                                                            <div class="row">
                                                                <div class="col-md-6 col-md-offset-3">
                                                                    <form class="form-horizontal push-10" onsubmit="return false;">
                                                                        <div class="form-group">
                                                                            <div class="col-xs-12">
                                                                                <div class="form-material">
                                                                                    <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->user->fullname() }}">
                                                                                    <label for="name">Name</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-xs-12">
                                                                                <div class="form-material">
                                                                                    <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->user->profile->city }}">
                                                                                    <label for="name">City</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-xs-12">
                                                                                <div class="form-material">
                                                                                    <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->user->profile->number }}">
                                                                                    <label for="name">Mobile</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-xs-12">
                                                                                <div class="form-material">
                                                                                    <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->user->account->bank_name }}">
                                                                                    <label for="name">Bank Name</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-xs-12">
                                                                                <div class="form-material">
                                                                                    <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->user->account->account_name  }}">
                                                                                    <label for="name">Account Name</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-xs-12">
                                                                                <div class="form-material">
                                                                                    <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->user->account->account_number }}">
                                                                                    <label for="name">Account Number</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <div class="col-xs-12">
                                                                                <div class="form-material">
                                                                                    <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->user->profile->tbc_wallet_id }}">
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
                                        <td>{{ $t->package->amount }}</td>
                                        <td>{{ $t->created_at->diffForHumans() }}</td>
                                        @if($t->package_id != 5)
                                        <td>
                                            <a href="{{ route('transaction.split', [$t->id, $t->type]) }}" class="btn btn-info btn-sm btn-circle">
                                                Split
                                            </a>
                                            @if($t->package_id == 3)
                                                <a href="{{ route('transaction.split.three', [$t->id, $t->type]) }}" class="btn btn-info btn-sm btn-circle">
                                                    Split 3
                                                </a>
                                            @elseif($t->package_id == 4)
                                            
                                                <a href="{{ route('transaction.split.two',[ $t->id, $t->type]) }}" class="btn btn-info btn-sm btn-circle">
                                                    Split 2
                                                </a>

                                            @endif
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h3 class="text-left">Sellers <span class="badge">{{ $tbc_sell->count() }}</span></h3>
                        <table class="table table-responsive table-borderless table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>
                                        User
                                    </th>
                                    <th class="">Amount</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                    <th>Meta</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tbc_sell as $t)
                                    <tr>
                                        <td>
                                            <input type="radio" name="seller" value="{{ $t->id }}">
                                        </td>
                                        <td><a href="" data-toggle="modal" data-target="#{{ $t->id }}" type="button">{{$t->user->fullname()}}</a></td>
                                        <td>{{ $t->package->amount }}</td>
                                        <td>{{ $t->created_at->diffForHumans() }}</td>
                                        <td>
                                        @if($t->package_id != 5)
                                            <a href="{{ route('transaction.split', [$t->id, $t->type]) }}" class="btn btn-info btn-sm btn-circle">
                                                Split
                                            </a>
                                            @if($t->package_id == 3)
                                                <a href="{{ route('transaction.split.three', [$t->id, $t->type]) }}" class="btn btn-info btn-sm btn-circle">
                                                    Split 3
                                                </a>
                                            @elseif($t->package_id == 4)
                                            
                                                <a href="{{ route('transaction.split.two',[ $t->id, $t->type]) }}" class="btn btn-info btn-sm btn-circle">
                                                    Split 2
                                                </a>

                                            @endif
                                        @endif
                                        </td>
                                        <td>
                                            {{ $t->user->transactions->where('type', 'sell')->where('status', 'pending')->count() }}
                                        </td>
                                        <div class="modal fade" id="{{ $t->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-popin">
                                                <div class="modal-content">
                                                    <div class="block block-themed block-transparent remove-margin-b">
                                                        <div class="block-header bg-primary-dark">
                                                            <ul class="block-options">
                                                                <li>
                                                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                                </li>
                                                            </ul>
                                                            <h3 class="block-title">User details</h3>
                                                        </div>
                                                        <div class="block-content">
                                                            <div class="row">
                                                                <div class="col-md-6 col-md-offset-3">
                                                                    <form class="form-horizontal push-10" onsubmit="return false;">
                                                                        <div class="form-group">
                                                                            <div class="col-xs-12">
                                                                                <div class="form-material">
                                                                                    <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->user->fullname() }}">
                                                                                    <label for="name">Name</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-xs-12">
                                                                                <div class="form-material">
                                                                                    <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->user->profile->city }}">
                                                                                    <label for="name">City</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-xs-12">
                                                                                <div class="form-material">
                                                                                    <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->user->profile->number }}">
                                                                                    <label for="name">Mobile</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-xs-12">
                                                                                <div class="form-material">
                                                                                    <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->user->account->bank_name }}">
                                                                                    <label for="name">Bank Name</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-xs-12">
                                                                                <div class="form-material">
                                                                                    <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->user->account->account_name  }}">
                                                                                    <label for="name">Account Name</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-xs-12">
                                                                                <div class="form-material">
                                                                                    <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->user->account->account_number }}">
                                                                                    <label for="name">Account Number</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <div class="col-xs-12">
                                                                                <div class="form-material">
                                                                                    <input class="form-control" type="text" disabled="" id="name" name="name" value="{{ $t->user->profile->tbc_wallet_id }}">
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="block">
            <div class="block-header bg-gray-lighter">
                <h1 class="block-title"><span class="text-capitalize"> 
                GRC MARKET MATCHER</span></h1>
            </div>
            <div class="block-content">
                <form action="{{ route('match') }}" method="post">
                    <input type="hidden" name="market" value="GRC">
                    {{ csrf_field() }}
                <button type="submit" class="btn btn-info btn-block">MATCH</button>
                <hr>
                <div>
                    <select name="matching-type" id="" class="form-control">
                        <option value="">Select matching type</option>
                        <option value="seller-2-1">2 Seller to 1 buyer</option>
                        <option value="1-1" selected="">1 Buyer to 1 Seller</option>
                    </select>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="text-left">Buyers <span class="badge">{{ $grc_buy->count() }}</span></h3>
                        <table class="table table-borderless table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="text-center" style="">ID</th>
                                    <th>
                                        User
                                    </th>
                                    <th>Package</th>
                                    <th class="">Amount</th>
                                    <th>Date Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($grc_buy as $t)
                                    <tr>
                                        <td>
                                            <input type="radio" name="buyer" value="{{ $t->id }}">
                                        </td>
                                        <td>{{ $t->id }}</td>
                                        <td>{{ $t->user->fullname() }}</td>
                                        <td>{{ $t->package->name }}</td>
                                        <td>{{ $t->package->amount }}</td>
                                        <td>{{ $t->created_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h3 class="text-left">Sellers <span class="badge">{{ $grc_sell->count() }}</span></h3>
                        <table class="table table-borderless table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="text-center" style="">ID</th>
                                    <th>
                                        User
                                    </th>
                                    <th>Package</th>
                                    <th class="">Amount</th>
                                    <th>Date Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($grc_sell as $t)
                                    <tr>
                                        <td>
                                            <input type="radio" name="seller" value="{{ $t->id }}">
                                        </td>
                                        <td>{{ $t->id }}</td>
                                        <td>{{ $t->user->fullname() }}</td>
                                        <td>{{ $t->package->name }}</td>
                                        <td>{{ $t->package->amount }}</td>
                                        <td>{{ $t->created_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </form>
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