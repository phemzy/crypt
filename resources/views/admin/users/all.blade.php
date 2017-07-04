@extends('layouts.admin')

@section('content')

 <!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content content-boxed">
        <!-- Header Tiles -->
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <a class="block block-link-hover3 text-center" href="">
                    <div class="block-content block-content-full">
                        <div class="h1 font-w700 text-success"><i class="fa fa-check"> {{ App\User::count() }}</i></div>
                    </div>
                    <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">All Users </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
                <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="h1 font-w700 text-danger" data-toggle="countTo" data-to="15"><i class="fa fa-times"> {{ $users->where('blocked', true)->count() }}</i></div>
                    </div>
                    <div class="block-content block-content-full block-content-mini bg-gray-lighter text-danger font-w600">Blocked Users</div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
                <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="h1 font-w700 text-info" data-toggle="countTo" data-to="100"><i class="fa fa-pencil"> {{ $users->where('complete', false)->count() }}</i></div>
                    </div>
                    <div class="block-content block-content-full block-content-mini bg-gray-lighter text-info font-w600">Incomlete Profiles</div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
                <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="h1 font-w700" data-toggle="countTo" data-to="8750"><i class="fa fa-flash"> {{ count($inactive) }}</i></div>
                    </div>
                    <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Inactive Users</div>
                </a>
            </div>
        </div>
        <!-- END Header Tiles -->

        <!-- All Products -->
        <div class="block">
            <div class="block-header bg-gray-lighter">
                <ul class="block-options">
                    @if($type == 'inactive')
                        <a href="{{ route('inactive.mail.all') }}" class="btn btn-primary">Mail All</a>
                    @endif
                </ul>
                <h3 class="block-title">{{$type}} Users</h3>
            </div>
            <div class="block-content">
                <table class="table table-borderless table-responsive table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="">User ID</th>
                            <th><span class="fa fa-user"></span></th>
                            <th class="">Name</th>
                            <th>
                                Email
                            </th>
                            <th>Username</th>
                            <th class="">Date Joined</th>
                            <th>Transactions</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td class="text-center">
                                <a class="font-" href="base_pages_ecom_product_edit.html">
                                    <strong>{{ $user->id }}</strong>
                                </a>
                            </td>
                            <td class="">
                                <img class="img-avatar" src="{{$user->profile->profile_pic ? Storage::url($user->profile->profile_pic) : asset('assets/img/avatars/avatar10.jpg') }}" alt="">
                            </td>
                            <td>
                                <a href="">
                                    {{ $user->fullname() }}
                                </a>
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td class="">
                                {{$user->username}}
                            </td>
                            <td class="">{{ date("D jS M, Y", strtotime($user->created_at)) }}</td>
                            <td>{{ count($user->transactions) }}</td>
                            <td>
                                <span class="label label-primary">
                                    @if($user->hasCompletedProfile() && ($user->isBlocked() == false))
                                        Active
                                    @elseif(!$user->hasCompletedProfile() && ($user->isBlocked() == false))
                                        Incomplete Profile
                                    @else
                                        Blocked                                   
                                    @endif
                                </span>
                            </td>
                            
                            <td class="">
                                <ul class="" style="list-style-type: none;">
                                    <li class="dropdown">
                                        <button type="button" data-toggle="dropdown" class="btn btn-info"> <span class="caret"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-right">

                                            <li>
                                               <a href="{{ route('user.block', $user->id) }}">{{ $user->isBlocked() ? 'Unblock' : 'Block' }}</a>
                                            </li>
                                            <li>
                                            <a href="">Delete</a>
                                            </li>
                                            <li><a href="">Mail User</a></li>
                                            <li><a href="">View Profile</a></li>
                                            <li><a href="">View Transactions</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav class="text-right">
                    @if(count($users))
                    {{ $users->links() }}
                    @endif
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