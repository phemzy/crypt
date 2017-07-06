@extends('layouts.design')

@section('content')

        <!--========== PROMO BLOCK ==========-->
        <div class="s-promo-block-v1 g-bg-color--primary-to-blueviolet-ltr g-fullheight--md">
            <div class="container g-ver-center--md g-padding-y-100--xs">
                <div class="row g-hor-centered-row--md g-margin-t-30--xs g-margin-t-20--sm">
                    <div class="col-lg-6 col-sm-6 g-hor-centered-row__col g-text-center--xs g-text-left--md g-margin-b-60--xs g-margin-b-0--md">
                        <div class="s-promo-block-v1__square-effect g-margin-b-60--xs text-center">
                            <h1 class="g-font-size-32--xs g-font-size-45--sm g-font-size-50--lg g-color--white">Nigeria's Topmost<br>Crypto Exchanger</h1>
                            <p class="g-font-size-20--xs g-font-size-26--md g-color--white g-margin-b-0--xs">TBC | GRC | BTC</p>
                        </div>
                        <span class="g-display-block--xs g-display-inline-block--lg g-margin-b-10--xs g-margin-b-10--lg">
                            @if(Auth::check())
                            <a href="{{ route('home') }}" class="s-btn s-btn--xs s-btn--white-brd g-padding-x-30--xs g-radius--50">
                                <span class="s-btn__element--left">
                                    <i class="g-font-size-32--xs ti-user"></i>
                                </span>
                                <span class="s-btn__element--right g-padding-x-10--xs">
                                    <span class="g-display-block--xs g-font-size-11--xs">Hello, {{ Auth::user()->first_name }}</span>
                                    <span class="g-font-size-16--xs">Visit Dashboard</span>
                                </span>
                            </a>
                            @else
                            <a href="{{ route('login') }}" class="s-btn s-btn--xs s-btn--white-brd g-padding-x-30--xs g-radius--50">
                                <span class="s-btn__element--left">
                                    <i class="g-font-size-32--xs ti-user"></i>
                                </span>
                                <span class="s-btn__element--right g-padding-x-10--xs">
                                    <span class="g-display-block--xs g-font-size-11--xs">Have an account?</span>
                                    <span class="g-font-size-16--xs">Login</span>
                                </span>
                            </a>
                            @endif
                        </span>
                        <span class="g-padding-x-0--xs g-padding-x-10--lg">
                            <a href="https://julyflashsales.crypto2naira.com" class="s-btn s-btn--xs s-btn--white-brd g-padding-x-30--xs g-radius--50">
                                <span class="s-btn__element--left">
                                    <i class="g-font-size-32--xs ti-shopping-cart-full"></i>
                                </span>
                                <span class="s-btn__element--right g-padding-x-10--xs">
                                    <span class="g-display-block--xs g-font-size-11--xs">Flash sale is here!</span>
                                    <span class="g-font-size-16--xs">Go to the store!</span>
                                </span>
                            </a>
                        </span>
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-4 col-sm-4 g-hor-centered-row__col">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                            <form class="center-block g-width-350--xs g-bg-color--white-opacity-lightest g-box-shadow__blueviolet-v1 g-padding-x-40--xs g-padding-y-60--xs g-radius--4" method="post" action="{{ route('register.user') }}">
                            {{ csrf_field() }}
                                <div class="g-text-center--xs g-margin-b-40--xs">
                                    <h2 class="g-font-size-30--xs g-color--white">Signup for Free</h2>
                                </div>
                                <div class="g-margin-b-30--xs{{ $errors->first('email') ? ' has-error' : '' }}">
                                    <input type="email" class="form-control s-form-v3__input" placeholder="* Email" name="email" value="{{ old('email') }}">
                                    @if($errors->first('email'))
                                        <span class="help-block">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="g-margin-b-30--xs{{ $errors->first('username') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control s-form-v3__input" placeholder="* Username" name="username" value="{{ old('username') }}">
                                    @if($errors->first('username'))
                                        <span class="help-block">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                                <div class="g-margin-b-30--xs{{ $errors->first('password') ? ' has-error' : '' }}">
                                    <input type="password" class="form-control s-form-v3__input" placeholder="* Password" name="password">
                                    @if($errors->first('password'))
                                        <span class="help-block">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="g-text-center--xs">
                                    <button type="submit" class="text-uppercase btn-block s-btn s-btn--md s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs">Signup</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--========== END PROMO BLOCK ==========-->

        <!--========== PAGE CONTENT ==========-->
        <!-- Mockup -->
        <div id="js__scroll-to-section" class="container g-padding-y-80--xs g-padding-y-125--xsm">
            <div class="row g-hor-centered-row--md g-row-col--5 g-margin-b-80--xs g-margin-b-100--md">
                <div class="col-sm-5 g-hor-centered-row__col">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">About</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--sm g-margin-b-25--xs">Crypto2Naira</h2>
                    <p class="g-font-size-18--sm">Crypto To Naira is a platform dedicated specifically towards the conversion of cryptocurrencies to the Nigerian 'naira'. It achieves that through a recurrent mutual obligation between registered members.</p>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-5 g-hor-centered-row__col">
                    <img class="img-responsive" src="{{ URL::to('images/market.jpeg') }}" alt="Mockup Image">
                </div>
            </div>
            <div class="row g-hor-centered-row--md g-row-col--5">
                <div class="col-sm-5 col-sm-push-7 g-hor-centered-row__col">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Smooth and Easy</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--sm g-margin-b-25--xs">Recurring buying and selling</h2>
                    <p class="g-font-size-18--sm">Crypto To Naira features a looping buying and selling process which connects all eligible participants and reassures a maximum coverage for everyone.</p>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-5 col-sm-pull-7 g-hor-centered-row__col g-text-left--xs g-text-right--md">
                    <img class="img-responsive" src="{{ URL::to('images/ex.jpeg') }}" alt="Mockup Image">
                </div>
            </div>
        </div>
        <!-- End Mockup -->

        <!-- Video -->
        <section class="s-video__bg" data-vidbg-bg="mp4: include/media/mp4_video.mp4, webm: include/media/webm_video.webm, poster: include/media/fallback.jpg" data-vidbg-options="loop: true, muted: true, overlay: false">
            <div class="container g-position--overlay g-text-center--xs">
                <div class="g-padding-y-50--xs g-margin-t-50--xs g-margin-t-100--sm g-margin-b-100--xs g-margin-b-250--md">
                    <h2 class="g-font-size-36--xs g-font-size-50--sm g-font-size-60--md g-color--white">Raising Billionaires,</h2>
                    <h2 class="g-font-size-36--xs g-font-size-50--sm g-font-size-60--md g-color--white">With Cryptocurrencies.</h2>
                </div>
            </div>
        </section>
        <!-- End Video -->
        
        <!-- Mockup -->
        <div class="container g-margin-t-o-100--xs g-margin-t-o-230--md">
            <div class="center-block s-mockup-v1">
                <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                    <img class="img-responsive" src="{{ URL::to('images/saved.png') }}" alt="Mockup Image">
                </div>
            </div>
        </div>
        <!-- End Mockup -->

{{--         <!-- Portfolio -->
        <div class="container g-padding-y-80--xs g-padding-y-125--xsm">
            <div class="row g-margin-b-30--xs">
                <div class="col-sm-4">
                    <div class="g-margin-t-20--md g-margin-b-40--xs">
                        <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Branding Work</p>
                        <h2 class="g-font-size-32--xs g-font-size-36--md">Projects</h2>
                        <p>We are masters of most current technologies.<br>Check us out and enjoy things that we know we're good at.</p>
                    </div>
                </div>

                <div class="col-sm-8">
                    <!-- Portfolio Gallery -->
                    <div id="js__grid-portfolio-gallery" class="s-portfolio__paginations-v1 cbp">
                        @foreach($ps as $p)
                        <!-- Item -->
                        <div class="s-portfolio__item cbp-item logos">
                            <div class="s-portfolio__img-effect">
                                <img src="{{ URL::to('asset/img/970x647/07.jpg') }}" alt="Portfolio Image">
                            </div>
                            <div class="s-portfolio__caption-hover--cc">
                                <div class="g-margin-b-25--xs">
                                    <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">Portfolio Item</h4>
                                    <p class="g-color--white-opacity">by KeenThemes Inc.</p>
                                </div>
                                <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                                    <li>
                                        <a href="img/970x647/07.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle" data-title="Portfolio Item <br/> by KeenThemes Inc.">
                                            <i class="ti-fullscreen"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                            <i class="ti-link"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- End Portfolio Gallery -->
                </div>
            </div>
        </div>
        <!-- End Portfolio -->
 --}}
        <!-- Plan -->
        <div class="g-bg-color--sky-light">
            <div class="container g-padding-y-80--xs g-padding-y-125--xsm">
                <div class="g-text-center--xs g-margin-b-80--xs">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">How does it work?</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--md">Just three (3) Steps</h2>
                </div>

                <div class="row g-row-col--5">
                    <!-- Plan -->
                    <div class="col-md-4 g-margin-b-10--xs g-margin-b-0--lg">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                            <div class="s-plan-v1 g-text-center--xs g-bg-color--white g-padding-y-100--xs">1
                                <i class="g-display-block--xs g-font-size-40--xs g-color--primary g-margin-b-30--xs ti-archive"></i>
                                <h3 class="g-font-size-18--xs g-color--primary g-margin-b-30--xs">Register</h3>
                                <ul class="list-unstyled g-ul-li-tb-5--xs g-margin-b-40--xs">
                                    <li><i class="g-font-size-13--xs g-color--primary g-margin-r-10--xs ti-check"></i>It takes only 5 seconds to register.</li>
                                    <li><i class="g-font-size-13--xs g-color--primary g-margin-r-10--xs ti-check"></i> And that is all you need!</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Plan -->

                    <!-- Plan -->
                    <div class="col-md-4 g-margin-b-10--xs g-margin-b-0--lg">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".2s">
                            <div class="s-plan-v1 g-text-center--xs g-bg-color--white g-padding-y-100--xs">2
                                <i class="g-display-block--xs g-font-size-40--xs g-color--primary g-margin-b-30--xs ti-package"></i>
                                <h3 class="g-font-size-18--xs g-color--primary g-margin-b-30--xs">Buy</h3>
                                <ul class="list-unstyled g-ul-li-tb-5--xs g-margin-b-40--xs">
                                    <li><i class="g-font-size-13--xs g-color--primary g-margin-r-10--xs ti-check"></i> Visit your preferred market.</li>
                                    <li><i class="g-font-size-13--xs g-color--primary g-margin-r-10--xs ti-check"></i> Buy any package of your choice.</li>
                                    <li><i class="g-font-size-13--xs g-color--primary g-margin-r-10--xs ti-check"></i> Then get ready for the big one!</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Plan -->
                    
                    <!-- Plan -->
                    <div class="col-md-4">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".3s">
                            <div class="s-plan-v1 g-text-center--xs g-bg-color--white g-padding-y-100--xs">3
                                <i class="g-display-block--xs g-font-size-40--xs g-color--primary g-margin-b-30--xs ti-gift"></i>
                                <h3 class="g-font-size-18--xs g-color--primary g-margin-b-30--xs">Sell and Sell</h3>
                                <ul class="list-unstyled g-ul-li-tb-5--xs g-margin-b-40--xs">
                                    <li><i class="g-font-size-13--xs g-color--primary g-margin-r-10--xs ti-check"></i> Done buying? </li>
                                    <li><i class="g-font-size-13--xs g-color--primary g-margin-r-10--xs ti-check"></i> Sell double of whatever you buy.</li>
                                    <li><i class="g-font-size-13--xs g-color--primary g-margin-r-10--xs ti-check"></i> Quick, Easy, Hassle-free.</li>
                                    <li><i class="g-font-size-13--xs g-color--primary g-margin-r-10--xs ti-check"></i> 24/7 Customer Support</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Plan -->
                </div>
            </div>
        </div>
        <!-- End Plan -->

        <!-- Subscribe -->
        <div class="g-bg-color--primary-to-blueviolet-ltr">
            <div class="g-container--sm g-text-center--xs g-padding-y-80--xs g-padding-y-125--xsm">
                <div class="g-margin-b-60--xs">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--white-opacity g-letter-spacing--2 g-margin-b-25--xs">Subscribe</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--md g-letter-spacing--1 g-color--white">Join Over 1000+ People</h2>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <form class="input-group" method="post" action="{{ route('subscribe') }}">
                            {{ csrf_field() }}
                            <input type="email" class="form-control s-form-v1__input g-radius--left-50" name="email" placeholder="Enter your email">
                            <span class="input-group-btn">
                                <button type="submit" class="s-btn s-btn-icon--md s-btn-icon--white-brd s-btn--white-brd g-radius--right-50"><i class="ti-arrow-right"></i></button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Subscribe -->

        <!-- Testimonials -->
        <div class="g-hor-divider__dashed--sky-light g-padding-y-80--xs g-padding-y-125--xsm">
            <div class="container g-text-center--xs">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-50--xs">Testimonials</p>
                <div class="s-swiper js__swiper-testimonials">
                    <!-- Swiper Wrapper -->
                    <div class="swiper-wrapper g-margin-b-50--xs">
                        @foreach($ts as $p)
                        <div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
                            <div class="g-padding-x-20--xs g-padding-x-50--lg">
                                <img class="g-width-70--xs g-height-70--xs g-hor-border-4__solid--white g-box-shadow__dark-lightest-v4 g-radius--circle g-margin-b-30--xs" src="{{$p->user->profile->profile_pic? Storage::url($p->user->profile->profile_pic) : URL::to('assets/img/avatars/avatar1.jpg')}}" alt="Image">
                                <div class="g-margin-b-40--xs">
                                    <p class="g-font-size-22--xs g-font-size-28--sm g-color--heading"><i>" {{ $p->testimony }} "</i></p>
                                </div>
                                <div class="center-block g-hor-divider__solid--heading-light g-width-100--xs g-margin-b-30--xs"></div>
                                <h4 class="g-font-size-15--xs g-font-size-18--sm g-color--primary g-margin-b-5--xs">{{ $p->user->fullname() }}</h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- End Swipper Wrapper -->

                    <!-- Arrows -->
                    <div class="g-font-size-22--xs g-color--heading js__swiper-fraction"></div>
                    <a href="javascript:void(0);" class="g-display-none--xs g-display-inline-block--sm s-swiper__arrow-v1--right s-icon s-icon--md s-icon--primary-brd g-radius--circle ti-angle-right js__swiper-btn--next"></a>
                    <a href="javascript:void(0);" class="g-display-none--xs g-display-inline-block--sm s-swiper__arrow-v1--left s-icon s-icon--md s-icon--primary-brd g-radius--circle ti-angle-left js__swiper-btn--prev"></a>
                    <!-- End Arrows -->
                </div>
            </div>
        </div>
        <!-- End Testimonials -->

@stop