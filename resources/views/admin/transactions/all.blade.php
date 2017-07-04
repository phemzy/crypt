@extends('layouts.admin')

@section('content')

 <!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content content-boxed">
        <!-- Header Tiles -->
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <a class="block block-link-hover3 text-center" href="base_pages_ecom_product_edit.html">
                    <div class="block-content block-content-full">
                        <div class="h1 font-w700 text-success"><i class="fa fa-check"> {{ $trans->where('status', 'complete')->count() }}</i></div>
                    </div>
                    <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Completed </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
                <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="h1 font-w700 text-danger" data-toggle="countTo" data-to="15"><i class="fa fa-times"> {{ $trans->where('status', 'failed')->count() }}</i></div>
                    </div>
                    <div class="block-content block-content-full block-content-mini bg-gray-lighter text-danger font-w600">Failed</div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
                <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="h1 font-w700 text-info" data-toggle="countTo" data-to="100"><i class="fa fa-pencil"> {{ $trans->where('status', 'pending')->count() }}</i></div>
                    </div>
                    <div class="block-content block-content-full block-content-mini bg-gray-lighter text-info font-w600">Pending</div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
                <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="h1 font-w700" data-toggle="countTo" data-to="8750"><i class="fa fa-flash"> {{ $trans->where('status', 'matched')->count() }}</i></div>
                    </div>
                    <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Matched</div>
                </a>
            </div>
        </div>
        <!-- END Header Tiles -->

        <!-- All Products -->
        <div class="block">
            <div class="block-header bg-gray-lighter">
                <ul class="block-options">
                    <li class="dropdown">
                        <button type="button" data-toggle="dropdown">Filter <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">90</span>New</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">15</span>Out of Stock</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">8750</span>All</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <h3 class="block-title">All {{ $type == 'purchase' ? 'Purchases' : 'Sales' }}</h3>
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
                            <td class="">{{ date('Y/m/d', strtotime($t->created_at)) }}</td>
                            <td>
                                <span class="label label-danger">{{ $t->status }}</span>
                            </td>
                            
                            <td class="">
                                <ul class="" style="list-style-type: none;">
                                    <li class="dropdown">
                                        <button type="button" data-toggle="dropdown" class="btn btn-info"> <span class="caret"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                @if($t->isMatched())
                                                    <a href="">Unmatch</a>
                                                @else
                                                    <a href="">Match</a>
                                                @endif
                                            </li>
                                            <li>
                                                <a href="">Reset</a>
                                            </li>
                                            <li>
                                            <a href="">Delete</a>
                                            </li>
                                            <li><a href="">Mail User</a></li>
                                            <li><a href="">View</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav class="text-right">
                    <ul class="pagination pagination-sm">
                        <li class="active">
                            <a href="javascript:void(0)">1</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">2</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">3</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">4</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">5</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-angle-right"></i></a>
                        </li>
                    </ul>
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