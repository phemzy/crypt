<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title> CrypToNaira </title>

        <meta name="description" content="Crypto2Naira is a platform dedicated specifically towards the conversion of cryptocurrencies to the Nigerian 'naira'. It achieves that through a recurrent mutual obligation between registered members.">
        <meta name="author" content="Crypto2Naira">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta property="og:url" content="{{ url('/') }}" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Crypto2Naira" />
        <meta property="og:description" content="Crypto2Naira is a platform dedicated specifically towards the conversion of cryptocurrencies to the Nigerian 'naira'. It achieves that through a recurrent mutual obligation between registered members." />
        <meta property="og:image" content="" />

        <!-- Stylesheets -->
        <!-- Web fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

        <link rel="stylesheet" href="{{ URL::to('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">

        <script src="{{ URL::to('js/noty.css') }}"></script>
        <!-- Bootstrap and OneUI CSS framework -->
        <link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" id="css-main" href="{{ URL::to('assets/css/oneui.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
 
        <!-- Page Container -->
        <!--
            Available Classes:

            'enable-cookies'             Remembers active color theme between pages (when set through color theme list)

            'sidebar-l'                  Left Sidebar and right Side Overlay
            'sidebar-r'                  Right Sidebar and left Side Overlay
            'sidebar-mini'               Mini hoverable Sidebar (> 991px)
            'sidebar-o'                  Visible Sidebar by default (> 991px)
            'sidebar-o-xs'               Visible Sidebar by default (< 992px)

            'side-overlay-hover'         Hoverable Side Overlay (> 991px)
            'side-overlay-o'             Visible Side Overlay by default (> 991px)

            'side-scroll'                Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (> 991px)

            'header-navbar-fixed'        Enables fixed header
        -->
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
            <!-- Side Overlay-->
            <!-- END Side Overlay -->

            <!-- Sidebar -->
            <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="side-header side-content bg-white-op">
                            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                            <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times"></i>
                            </button>

                            <a class="h5 text-white" href="/">
                                <img src="{{ asset('img/logo_bg.png') }}" class="img-circle" width="60" alt="">
                            </a>
                        </div>
                        <!-- END Side Header -->

                        <!-- Side Content -->
                        <div class="side-content">
                            <ul class="nav-main">
                                <li>
                                    <a href="/home"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                                </li>
                                <li class="nav-main-heading"><span class="sidebar-mini-hide">Your Account</span></li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-user"></i><span class="sidebar-mini-hide">Profile</span></a>
                                    <ul>
                                        <li>
                                            <a href="{{ route('profile.edit') }}">Edit Profile</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('trading.bank') }}">Edit Trading Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wallet"></i><span class="sidebar-mini-hide">Trading</span></a>
                                    <ul>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#modal-buy">Buy Crypto</a>
                                        </li>
                                        <li>
                                            <a href="" data-toggle="modal" data-target="#modal-sell">Sell Crypto</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-book-open"></i><span class="sidebar-mini-hide">History</span></a>
                                    <ul>
                                        <li>
                                            <a href="{{ route('history.all') }}">All trading history</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('history.buy') }}">Buying history</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('history.sell') }}">Selling history</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="si si-arrow-right"></i><span class="sidebar-mini-hide">Logout</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!-- END Side Content -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="header-navbar" class="content-mini content-mini-full">
                <!-- Header Navigation Right -->
                <ul class="nav-header pull-right">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                                <img src="{{ Auth::user()->profile->profile_pic ? Storage::url(Auth::user()->profile->profile_pic) : asset('assets/img/avatars/avatar10.jpg')  }}" alt="Avatar">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-header">Profile</li>
                                <li>
                                    <a tabindex="-1" href="{{ route('history.all') }}">
                                        <i class="si si-envelope-open pull-right"></i>
                                        <span class="badge badge-primary pull-right"></span>Notifications
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="{{ route('profile.edit') }}">
                                        <i class="si si-user pull-right"></i>
                                        <span class="badge badge-success pull-right"></span>Edit Profile
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="{{ route('trading.bank') }}">
                                        <i class="si si-speedometer pull-right"></i>
                                        <span class="badge badge-success pull-right"></span>Edit Trading Details
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Actions</li>
                                {{-- <li>
                                    <a tabindex="-1" href="base_pages_lock.html">
                                        <i class="si si-lock pull-right"></i>Lock Account
                                    </a>
                                </li> --}}
                                <li>
                                    <a tabindex="-1" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="si si-logout pull-right"></i>Log out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- <li>
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default" data-toggle="layout" data-action="side_overlay_toggle" type="button">
                            <i class="fa fa-tasks"></i>
                        </button>
                    </li> --}}
                </ul>
                <!-- END Header Navigation Right -->

                <!-- Header Navigation Left -->
                <ul class="nav-header pull-left">
                    <li class="hidden-md hidden-lg">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                            <i class="fa fa-navicon"></i>
                        </button>
                    </li>
                    <li class="hidden-xs hidden-sm">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                            <i class="fa fa-ellipsis-v"></i>
                        </button>
                    </li>
                    <li>
                        <!-- Opens the Apps modal found at the bottom of the page, before including JS code -->
                        <button class="btn btn-default pull-right" data-toggle="modal" data-target="#apps-modal" type="button">
                            <i class="si si-grid"></i>
                        </button>
                    </li>
                    <li class="visible-xs">
                        <!-- Toggle class helper (for .js-header-search below), functionality initialized in App() -> uiToggleClass() -->
                        <button class="btn btn-default" data-toggle="class-toggle" data-target=".js-header-search" data-class="header-search-xs-visible" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </li>
                    <li class="js-header-search header-search">
                        <form class="form-horizontal" action="base_pages_search.html" method="post">
                            <div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
                                <input class="form-control" type="text" id="base-material-text" name="base-material-text" placeholder="Search..">
                                <span class="input-group-addon"><i class="si si-magnifier"></i></span>
                            </div>
                        </form>
                    </li>
                </ul>
                <!-- END Header Navigation Left -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            @yield('content')
            <!-- End Main Container -->

        </div>
        <!-- END Page Container -->

        <!-- Apps Modal -->
        <!-- Opens from the button in the header -->
        <div class="modal fade" id="apps-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-sm modal-dialog modal-dialog-top">
                <div class="modal-content">
                    <!-- Apps Block -->
                    <div class="block block-themed block-transparent">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Trade Options</h3>
                        </div>
                        <div class="block-content">
                            <div class="row text-center">
                                <div class="col-xs-6">
                                    <a class="block block-rounded" href="#" data-toggle="modal" data-target="#modal-buy">
                                        <div class="block-content text-white bg-default">
                                            <i class="si si-basket fa-2x"></i>
                                            <div class="font-w600 push-15-t push-15">Buy</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-6">
                                    <a class="block block-rounded" href="#" data-toggle="modal" data-target="#modal-sell">
                                        <div class="block-content text-white bg-modern">
                                            <i class="si si-pin fa-2x"></i>
                                            <div class="font-w600 push-15-t push-15">Sell</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Apps Block -->
                </div>
            </div>
        </div>
        <!-- END Apps Modal -->
        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-sm modal-dialog modal-dialog-top">
                <div class="modal-content">
                    <!-- Apps Block -->
                    <div class="block block-themed block-transparent">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Delete Account ?</h3>
                        </div>
                        <div class="block-content" style="padding-bottom: 30px;">
                            <div class="row text-center">
                                <div class="col-xs-6">
                                    <a href="" class="btn btn-danger btn-rounded">Yes</a>
                                </div>
                                <div class="col-xs-6">
                                    <a href="" class="btn btn-primary btn-rounded" data-dismiss="modal">No</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Apps Block -->
                </div>
            </div>
        </div>
        <!-- END Apps Modal -->

        <!-- Pop In Modal -->
        <div class="modal fade" id="modal-buy" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-popin">
                <div class="modal-content">
                    <div class="block block-themed block-transparent remove-margin-b">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">What do you want to buy ?</h3>
                        </div>
                        <div class="block-content text-center">
                            @foreach($markets as $market)
                            <p>
                                <a href="{{ route('market.buy', $market->abbr_name) }}" class="btn btn-rounded btn-danger">{{$market->name}} ({{$market->abbr_name}})</a>
                            </p>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Pop In Modal -->

         <!-- Pop In Modal -->
        <div class="modal fade" id="modal-sell" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-popin">
                <div class="modal-content">
                    <div class="block block-themed block-transparent remove-margin-b">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">
                                @if(Auth::user()->account->market)
                                    What do you want to sell ?
                                @elseif(Auth::user()->transactions()->where('status', '!=', 'complete')->first())
                                    Almost there...
                                @else
                                    DO YOU HATE SCAMS ?
                                @endif
                            </h3>
                        </div>
                        <div class="block-content text-center">
                            @if(Auth::user()->account->market)
                            <p>
                                <a href="{{ route('market.sell', Auth::user()->account->market->abbr_name) }}" class="btn btn-rounded btn-danger">{{Auth::user()->account->market->name}} ({{Auth::user()->account->market->abbr_name}})</a>
                            </p>
                            @elseif(Auth::user()->transactions()->where('status', '!=', 'complete')->first())
                            <p>
                                Almost there {{Auth::user()->first_name}}, you have a transaction yet to be completed. Make it snappy so you can sell yours. :-)
                            </p>
                            @else
                            <p>
                                WE DO TOO!!!
                            </p>
                            <p>
                                Therefore, we don't allow any form of participation without any initial commitment.
                            </p>
                            <p>
                                Simply visit the crypto market to buy any package of your choice. When that transaction is completed, you will be able to sell double the package you bought. 
                            </p>
                            <p>
                                Just try it once. You'll be glad you did! :)
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Pop In Modal -->


        <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
        <script src="{{ URL::to('assets/js/core/jquery.min.js') }}"></script>
        <script src="{{ URL::to('assets/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ URL::to('assets/js/core/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ URL::to('assets/js/core/jquery.scrollLock.min.js') }}"></script>
        <script src="{{ URL::to('assets/js/core/jquery.appear.min.js') }}"></script>
        <script src="{{ URL::to('assets/js/core/jquery.countTo.min.js') }}"></script>
        <script src="{{ URL::to('assets/js/core/jquery.placeholder.min.js') }}"></script>
        <script src="{{ URL::to('assets/js/core/js.cookie.min.js') }}"></script>
        <script src="{{ URL::to('assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ URL::to('assets/js/app.js') }}"></script>
        <script src="{{ URL::to('js/noty.min.js') }}"></script>
        <script src="{{ URL::to('js/app.js') }}"></script>
        <script>
            @if(session()->has('success'))
                swal({
                    type: 'success',
                    title: "{{ session('success') }}"
                })
            @endif
            @if(session()->has('error'))
                swal({
                    type: 'error',
                    title: "{{ session('error') }}"
                })
            @endif
        </script>

        @yield('scripts')
    </body>
</html>