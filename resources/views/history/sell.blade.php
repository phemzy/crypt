@extends('layouts.master')

@section('content')

<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content content-boxed">
        <!-- Material Register -->
        <div class="block block-themed col-md-10 col-md-offset-1 col-xs-12">
            <!-- Icon Based -->
            <h2 class="content-heading">Sellings Transactions History</h2>
            <div class="block block-themed">
                <div class="block-header bg-primary">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                        </li>
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                        <li>
                            <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Sellings</h3>
                </div>
                <div class="block-content">
                    <ul class="list list-timeline pull-t">
                       @foreach($transactions as $t)
                            @include('partials.item')
                        {{ $transactions->links() }}
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- END Icon Based -->
        </div>
        <!-- END Material Register -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->



@stop