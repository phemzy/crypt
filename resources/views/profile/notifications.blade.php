@extends('layouts.master')

@section('content')
	<main id="main-container">
		<div class="">
			<div class="content content-boxed">
				<div class="">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<!-- Activity Timeline -->
		                <h2 class="content-heading">Activity Timeline</h2>
		                <div class="block">
		                    <div class="block-content">
		                        <ul class="list list-activity push">
		                            <li>
		                                <i class="si si-wallet text-success"></i>
		                                <div class="font-w600">New sale ($15)</div>
		                                <div><a href="javascript:void(0)">Admin Template</a></div>
		                                <div><small class="text-muted">3 min ago</small></div>
		                            </li>
		                            <li>
		                                <i class="si si-pencil text-info"></i>
		                                <div class="font-w600">You edited the file</div>
		                                <div><a href="javascript:void(0)"><i class="fa fa-file-text-o"></i> Documentation.doc</a></div>
		                                <div><small class="text-muted">15 min ago</small></div>
		                            </li>
		                            <li>
		                                <i class="si si-plus text-success"></i>
		                                <div class="font-w600">New user</div>
		                                <div><a href="javascript:void(0)">StudioWeb - View Profile</a></div>
		                                <div><small class="text-muted">2 hours ago</small></div>
		                            </li>
		                            <li>
		                                <i class="si si-close text-danger"></i>
		                                <div class="font-w600">Project deleted</div>
		                                <div><a href="javascript:void(0)">Line Icon Set</a></div>
		                                <div><small class="text-muted">4 hours ago</small></div>
		                            </li>
		                            <li>
		                                <i class="si si-wrench text-warning"></i>
		                                <div class="font-w600">Core v2.5 is available</div>
		                                <div><a href="javascript:void(0)">Update now</a></div>
		                                <div><small class="text-muted">6 hours ago</small></div>
		                            </li>
		                        </ul>
		                    </div>
		                </div>
		                <!-- END Activity Timeline -->
					</div>
				</div>
			</div>
		</div>
	</main>
@stop