@extends('layouts.master')

@section('content')

<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content content-boxed">
        <!-- Material Register -->
        <div class="block block-themed col-md-6 col-md-offset-3 col-xs-12">
            <div class="block-header bg-danger">
                <ul class="block-options">
                    <li>
                        <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                    </li>
                </ul>
                <h3 class="block-title">Search Results</h3>
            </div>
            <div class="block-content">
                @forelse ($users as $user)
                    <div class="media">
                      <div class="media-left">
                        <img src="src="{{ $user->profile->profile_pic ? Storage::url($user->profile->profile_pic) : asset('assets/img/avatars/avatar10.jpg') }}"" class="media-object" style="width:60px">
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">{{$user->fullname()}}</h4>
                        <p>{{$user->username}}</p>
                      </div>
                    </div>
                @empty
            
                    <h3 class="text-center" style="margin-bottom: 50px;">
                        No result for your search
                    </h3>

                @endforelse
            </div>
        </div>
        <!-- END Material Register -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->



@stop