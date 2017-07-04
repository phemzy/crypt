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
                                @foreach($tbc_buy as $t)
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
                        <h3 class="text-left">Sellers <span class="badge">{{ $tbc_sell->count() }}</span></h3>
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
                                @foreach($tbc_sell as $t)
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