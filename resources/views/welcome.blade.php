<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="{{ config('app.locale') }}"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="msvalidate.01" content="0B5CD89A38DA7B73FF14CBD6FA0B8C52" />

    <title>Crypto To Naira</title>

    <meta name="description" content="Crypto2Naira is a platform dedicated specifically towards the conversion of cryptocurrencies to the Nigerian 'naira'. It achieves that through a recurrent mutual obligation between registered members.">

    <meta name="description" content="Sell you TBC here on Crypto2Naira. We allow you exchange your TBC for naira all free of charge.">
    <meta name="description" content="Sell your Greycoin GRC on Crypto2Naira without any stress.">

    <meta name="keywords" content="TBC, GRC, Cryptocurrencies, Sell TBC, Sell GRC, Convert TBC to Naira, Convert GRC to naira, Convert cryptocurrency to naira, How to sell TBC in naira, How to convert TBC to  naira, Convert GRC to naira, The Billion Coin, Greycoin, Sell The Billion Coin, Sell Greycoin" />

    <meta name="robots" content="index,follow" />

    <meta name="author" content="Crypto2Naira">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Crypto2Naira" />
    <meta property="og:description" content="Crypto2Naira is a platform dedicated specifically towards the conversion of cryptocurrencies to the Nigerian 'naira'. It achieves that through a recurrent mutual obligation between registered members." />
    <meta property="og:image" content="{{ URL::to('img/logo_big.jpg') }}" />
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/queries.css">
    <link rel="stylesheet" href="css/etline-font.css">
    <link rel="stylesheet" href="bower_components/animate.css/animate.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <link rel="stylesheet" href="{{ URL::to('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
    <style>
        .header-content img{
            max-height: 30px !important;
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }
        .crypto-img {
            max-height: auto;
            max-width: 60px;
            padding-right: 10px;
            border: 5px;
        }
    </style>
</head>
<body id="top">
   <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=131864197384076";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <section class="hero">
        <section class="navigation">
            <header>
                <div class="header-content">
                    <div class="logo"><a href="#"><img src="img/logo_bg.png" alt="Sedna logo"></a></div>
                    <div class="header-nav">
                        <nav>
                            <ul class="primary-nav">
                                <li><a href="#about">About</a></li>
                                <li><a href="#cryptos">Basic Cryptos</a></li>
                                <li><a href="#subscribe">Subscribe</a></li>
                                <li><a href="#how-it-works">Basic Operations</a></li>
                                <li><a href="#testimonials">Testimonials</a></li>
                                <li><a href="{{ route('faq') }}">FAQs</a></li>
                            </ul>
                            

                            
                            <ul class="member-actions">
                                @if(Auth::check())
                                <li><a href="/home" class="login">Dashboard</a></li>
                                <li><a href="{{ route('logout') }}" class="btn-white btn-small" onclick="event.preventDefault(); document.getElementById('logout').submit()">Logout</a>
                                    <form action="{{ route('logout') }}" method="post" id="logout">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                @else
                                <li><a href="login" class="login">Log in</a></li>
                                <li><a href="register" class="btn-white btn-small">Sign up</a></li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                    <div class="navicon">
                        <a class="nav-toggle" href="#"><span></span></a>
                    </div>
                </div>
            </header>
        </section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="hero-content text-center">
                        <h1>Buy, Sell, Grow!</h1>
                        <p class="intro">Introducing <b>“Crypto To Naira”</b>. A platform for buying and selling of cryptocurrencies in <b>NAIRA</b>.</p>
                        <a href="#get-started" class="btn btn-fill btn-large btn-margin-right">Get Started</a> <a href="#how-it-works" class="btn btn-accent btn-large">How it works</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="down-arrow floating-arrow"><a ><i class="fa fa-angle-down"></i></a></div>
    </section>
    <section class="intro section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4 intro-feature">
                    <div class="intro-icon">
                        <span data-icon="&#xe033;" class="icon"></span>
                    </div>
                    <div class="intro-content">
                        <h5>TBC</h5>
                        <p>                            
                            TBC is one of the fastest rising cryptocurrencies in the world and we belive in its potentials and its large market share. We accept the exchange of TBC for naira at its official market price which at the moment is <b>&#8358;{{ number_format(App\Market::where('abbr_name', 'TBC')->first()->naira_value, 2)  }}</b>. Register now and start selling your TBC.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 intro-feature">
                    <div class="intro-icon">
                        <span data-icon="&#xe030;" class="icon"></span>
                    </div>
                    <div class="intro-content">
                        <h5>GRC</h5>
                        <p>GRC (Greycoin) is another cryptocurrency which has its root from a Nigerian wealth generation platform, GiversForum. It is rising fast and has great potentials. The current rate is 1GRC = &#8358;1</p>
                    </div>
                </div>
                <div class="col-md-4 intro-feature">
                    <div class="intro-icon">
                        <span data-icon="&#xe046;" class="icon"></span>
                    </div>
                    <div class="intro-content last">
                        <h5>ASBOLUTELY FREE</h5>
                        <p>No extra charges; No special fee; No incurement; COMPLETELY FREE</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="features section-padding" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-7">
                    <div class="feature-list">
                        <h3 id="about-crypto2naira">About Crypto To Naira</h3>
                        <p>
                            Crypto To Naira is a platform dedicated specifically towards the conversion of cryptocurrencies to the Nigerian 'naira'. It achieves that through a recurrent mutual obligation between registered members.
                        </p>
                        <ul class="features-stack">
                            <li class="feature-item">
                                <div class="feature-icon">
                                    <span class="icon"><i class="fa fa-recycle"></i></span>
                                </div>
                                <div class="feature-content">
                                    <h5>Recurring buying and selling</h5>
                                    <p>Crypto To Naira features a looping buying and selling process which connects all eligible participants and reassures a maximum coverage for everyone.</p>
                                </div>
                            </li>
                            <li class="feature-item">
                                <div class="feature-icon">
                                    <span class="icon"><i class="fa fa-users"></i></span>
                                </div>
                                <div class="feature-content">
                                    <h5>Users First Inclination</h5>
                                    <p>
                                        We painstakingly take account of all site engagements, activities and crypto integrations, allowing a seamless experience for all of our users with their various cryptocurrencies.
                                    </p>
                                </div>
                            </li>
                            <li class="feature-item">
                                <div class="feature-icon">
                                    <span class="icon"><i class="fa fa-lock"></i></span>
                                </div>
                                <div class="feature-content">
                                    <h5>Maximum Security</h5>
                                    <p>Both your cash and your cryptos are 100% secured! You remain incharge of whatever belongs to you. No third party.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="device-showcase">
            <div class="devices">
                <div class="ipad-wrap wp1"></div>                
            </div>
        </div>
        <div class="responsive-feature-img"><img src="img/crypto.png" alt="responsive devices"></div>
    </section>
    <section class="features-extra section-padding" id="cryptos">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="feature-list">
                        <h3>We deal with CRYPTOS!</h3>
                        <p>
                            <img src="img/tbc.png" alt="" class="crypto-img">THE BILLION COIN (TBC)
                        </p>
                        <p>
                            <img src="img/btc.png" alt="" class="crypto-img">BITCOIN (BTC)
                        </p>
                        <p>
                            <img src="img/greycoin.png" alt="" class="crypto-img">GREYCOIN (GRC)
                        </p>
                        <a href="{{ route('faq') }}" class="btn btn-ghost btn-accent btn-small">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="macbook-wrap wp3"></div>
        <div class="responsive-feature-img"><img src="img/logo.png" alt="responsive devices"></div>
    </section>
    <section class="hero-strip section-padding" id="subscribe">
        <div class="container">
            <div class="sign-up col-md-12 text-center">
                <h2>
                Stay updated on our news, market trends and campaigns 
                </h2>
                <p>Enter your email below to subscribe</p>
                <div class="col-md-6 col-md-offset-3">
                    <form class="signup-form" action="{{ route('subscribe') }}" method="POST" role="form">
                        {{ csrf_field() }}
                        <div class="form-input-group{{ $errors->first('name') ? ' has-error' : ''}}" >
                           <input type="text" class="" placeholder="Enter your name" name="name" required>
                           @if($errors->first('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-input-group{{ $errors->first('email') ? ' has-error' : ''}}">
                            <input type="text" class="" name="email" placeholder="Enter your email" required>
                            @if($errors->first('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-fill btn-danger btn-ghost btn-accent btn-large">Subscribe</button>
                    </form>
                </div>
                
                <div class="logo-placeholder floating-logo"><img src="img/logo1.png" alt="Sketch Logo"></div>
            </div>
        </div>
    </section>
    <section class="blog-intro section-padding" id="how-it-works">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>How we run...</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 leftcol">
                    <h5>1. <a href="">Register</a> and Choose your preffered market!</h5>
                    <p>
                        In ten seconds you're up and running. The process is just a cinch! Whether you have bitcoin and you'll like to join the bitcoin market or you have the billion coin (TBC) and you'll like to join the TBC market, or both, it's all a seamless experience for you. 
                    </p>
                    <p>
                        <a href="" class="btn btn-ghost btn-accent">Register</a> now!
                    </p>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 rightcol">
                    <h5>2. Select your preferred package and get started!</h5>
                    <p>Wondering what's next?</p>
                    <p>
                        We allow you buy or sell your cryptos in a procedural process. We have broken down different packages for simplicity and ease of interactivity. Just choose your preferred package and you're good to go. NO worries!
                    </p>
                </div>
                <div class="col-xs-12 text-center">
                    <h3 class="text-center" style="margin-bottom: 10px;">Need more info?</h3>
                    <a href="{{ route('faq') }}" class="btn btn-fill btn-lg btndanger">Click Here</a>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial-slider section-padding text-center" id="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                                
                                <h2>"Never knew how rich I was until I found out Crypto2Naira existed"</h2>
                                <p class="author">Falana Korede, Trader.</p>
                            </li>
                            <li>
                                
                                <h2>"The best platform for selling cryptocurrencies. Keep it up guys"</h2>
                                <p class="author">Ezinne Jane, Student</p>
                            </li>
                            <li>
                                
                                <h2>"Wish I had found out about Crypto2naira earlier; What an amazing service."</h2>
                                <p class="author">Mark Ehis, Business Man</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sign-up section-padding text-center" id="get-started">
        <div class="container">
            <div class="row">
			<iframe width="700" height="315" src="https://www.youtube.com/embed/xcYNJk0bFGw" frameborder="0" allowfullscreen></iframe>
			<br><br>
                <div class="col-md-6 col-md-offset-3">
                    <h3>Get started with Crypto To Naira, absolutely free</h3>
                        <a href="register" class="btn btn-large btn-fill sign-up-btn">Click here to sign up for free</a>
                </div>
            </div>
        </div>
    </section>

    <section class="to-top">
        <div class="container">
            <div class="row">
                <div class="to-top-wrap">
                    <a href="#top" class="top"><i class="fa fa-angle-up"></i></a>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="footer-links">
                        <ul class="footer-group">
                            <li><a href="support/FAQs#contact">Contact Us</a></li>
                            <li><a href="{{ route('faq') }}">FAQs</a></li>
                            @if(Auth::check())
                            <li><a href="/home">Dashboard</a></li>
                            @else
                            <li><a href="login">Log in</a></li>
                            <li><a href="register">Sign up</a></li>
                            @endif
                        </ul>
                        <p>Copyright © 2017 <a href="/">CrypToNaira</a><br>
                    </div>
                </div>
                <div class="social-share">
                    <p>Share CrypToNaira with your friends</p>
                    <div class="fb-share-button" data-href="https://crypto2naira.com" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fcrypto2naira.com%2F&amp;src=sdkpreparse">Share</a></div>
                </div>
            </div>
        </div>
    </footer>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="bower_components/retina.js/dist/retina.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="bower_components/classie/classie.js"></script>
    <script src="bower_components/jquery-waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="{{ URL::to('assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
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
    <script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
    </script>
</body>
</html>