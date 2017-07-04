@extends('layouts.master')

@section('content')

<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content content-boxed">
        <!-- Material Register -->
        <div class="block block-themed col-md-6 col-md-offset-3 col-xs-12">
            <div class="block-header bg-primary">
                <ul class="block-options">
                    <li>
                        <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                    </li>
                </ul>
                <h3 class="block-title">Bank Details</h3>
            </div>
            <div class="block-content">
                <form class="form-horizontal push-10-t push-10" action="{{ route('trading.bank.save') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->first('bank_name') ? 'has-error' : '' }}">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" type="text" id="bank_name" name="bank_name" placeholder="Enter your bank name.." value="{{ Auth::user()->account->bank_name }}">
                                <label for="bank_name">Bank Name</label>
                                @if($errors->first('bank_name'))
                                    <span class="help-block">{{ $errors->first('bank_name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->first('account_name') ? 'has-error' : '' }}">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" type="text" id="account_name" name="account_name" placeholder="Enter your account name.." value="{{ Auth::user()->account->account_name }}">
                                <label for="account_name">Account Name</label>
                                @if($errors->first('account_name'))
                                    <span class="help-block">{{ $errors->first('account_name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 {{ $errors->first('account_number') ? 'has-error' : '' }}">
                            <div class="form-material">
                                <input class="form-control" type="text" id="account_number" name="account_number" placeholder="Enter your account number.."  value="{{ Auth::user()->account->account_number }}">
                                <label for="account_number">Account Number</label>
                                @if($errors->first('account_number'))
                                    <span class="help-block">{{ $errors->first('account_number') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-plus push-5-r"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Material Register -->
        <div class="block block-themed col-md-6 col-md-offset-3 col-xs-12">
            <div class="block-header bg-danger">
                <ul class="block-options">
                    <li>
                        <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                    </li>
                </ul>
                <h3 class="block-title">TBC Wallet ID</h3>
            </div>
            <div class="block-content">
                <form class="form-horizontal push-10-t push-10" action="{{ route('trading.tbc.save') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-xs-12 {{ $errors->first('tbc_wallet_id') ? 'has-error' : '' }}">
                            <div class="form-material">
                                <input class="form-control" type="text" id="tbc_wallet_id" name="tbc_wallet_id" placeholder="Enter your TBC Wallet ID.."  value="{{ Auth::user()->profile->tbc_wallet_id }}">
                                <label for="tbc_wallet_id">Account Number</label>
                                @if($errors->first('tbc_wallet_id'))
                                    <span class="help-block">{{ $errors->first('tbc_wallet_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-plus push-5-r"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Material Register -->

         <div class="block block-themed col-md-6 col-md-offset-3 col-xs-12">
            <div class="block-header bg-primary">
                <ul class="block-options">
                    <li>
                        <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                    </li>
                </ul>
                <h3 class="block-title">GRC Email</h3>
            </div>
            <div class="block-content">
                <form class="form-horizontal push-10-t push-10" action="{{ route('trading.grc.save') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-xs-12 {{ $errors->first('grc_email') ? 'has-error' : '' }}">
                            <div class="form-material">
                                <input class="form-control" type="text" id="grc_email" name="grc_email" placeholder="Enter your GRC email.."  value="{{ Auth::user()->profile->grc_email }}">
                                <label for="grc_email">Account Number</label>
                                @if($errors->first('grc_email'))
                                    <span class="help-block">{{ $errors->first('grc_email') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-plus push-5-r"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Material Register -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->



@stop