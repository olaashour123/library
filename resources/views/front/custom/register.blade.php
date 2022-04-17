@extends('front.parent')

@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Breadcrumb</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">My Account</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>My Account</h1>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="container">
                <div class="row">
                    {{-- <div class="col-md-6 d-flex">
                        <div class="card flex-grow-1 mb-md-0">
                            <div class="card-body">
                                <h3 class="card-title">Login</h3>
                                <form>
                                    <div class="form-group"><label>Email address</label> <input type="email"
                                            class="form-control" placeholder="Enter email"></div>
                                    <div class="form-group"><label>Password</label> <input type="password"
                                            class="form-control" placeholder="Password"> <small
                                            class="form-text text-muted"><a href="#">Forgotten Password</a></small></div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <span class="form-check-input input-check">
                                                <span class="input-check__body">
                                                    <input class="input-check__input" type="checkbox" id="login-remember">
                                                    <span class="input-check__box"></span>
                                                    <svg class="input-check__icon" width="9px" height="7px">
                                                        <use xlink:href="images/sprite.svg#check-9x7"></use>
                                                    </svg>
                                                </span>
                                            </span>
                                            <label class="form-check-label" for="login-remember">Remember Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Login</button>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-md-6 d-flex mt-4 mt-md-0">
                        <div class="card flex-grow-1 mb-0">
                            <div class="card-body">
                                <h3 class="card-title">Register</h3>
                                <form action="{{ route('front.register') }}" method="post">
                                    @csrf
                                    <div class="form-group"><label>firstName</label> <input type="text"
                                            class="form-control" placeholder="Enter firstName" name='first_name'></div>
                                    <div class="form-group"><label>LastName</label> <input type="text"
                                            class="form-control" placeholder="Enter LastName" name='last_name'></div>
                                    <div class="form-group"><label>Email address</label> <input type="email"
                                            class="form-control" placeholder="Enter email" name='email'></div>
                                    <div class="form-group"><label>Password</label> <input type="password"
                                            class="form-control" placeholder="Password" name="password"></div>
                                    <div class="form-group"><label>Repeat Password</label> <input type="password"
                                            class="form-control" placeholder="Password" name="confirm_password"></div>

                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select class="custom-select" id="country" name="country_id">
                                            <option value="">select</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="checkout-street-address">Street Address</label>
                                        <input type="text" class="form-control" id="checkout-street-address"
                                            placeholder="Street Address" name="address">
                                    </div>

                                    <div class="form-group"><label for="checkout-city">Town / City</label> <input
                                            type="text" class="form-control" id="checkout-city" name="city"
                                            placeholder="City"></div>

                                    <div class="form-group"><label for="checkout-postcode">Postcode / ZIP</label> <input
                                            type="text" class="form-control" id="checkout-postcode" placeholder="Postcode"
                                            name="postcode"></div>

                                    <div class="form-group col-md-6"><label for="checkout-phone">Phone</label> <input
                                            type="text" class="form-control" id="checkout-phone" name="phone"
                                            placeholder="Phone">
                                    </div>
                            </div>


                            <button type="submit" class="btn btn-primary mt-4">Register</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- site__body / end -->
    <!-- site__footer -->
    <footer class="site__footer">
        <div class="site-footer">
            <div class="container">
                <div class="site-footer__widgets">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="site-footer__widget footer-contacts">
                                <h5 class="footer-contacts__title">Contact Us</h5>
                                <div class="footer-contacts__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Integer in feugiat lorem. Pellentque ac placerat tellus.</div>
                                <ul class="footer-contacts__contacts">
                                    <li><i class="footer-contacts__icon fas fa-globe-americas"></i> 715 Fake Street, New
                                        York 10021 USA</li>
                                    <li><i class="footer-contacts__icon far fa-envelope"></i> stroyka@example.com</li>
                                    <li><i class="footer-contacts__icon fas fa-mobile-alt"></i> (800) 060-0730, (800)
                                        060-0730</li>
                                    <li><i class="footer-contacts__icon far fa-clock"></i> Mon-Sat 10:00pm - 7:00pm</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2">
                            <div class="site-footer__widget footer-links">
                                <h5 class="footer-links__title">Information</h5>
                                <ul class="footer-links__list">
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">About Us</a></li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Delivery
                                            Information</a></li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Privacy Policy</a>
                                    </li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Brands</a></li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Contact Us</a>
                                    </li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Returns</a></li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Site Map</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2">
                            <div class="site-footer__widget footer-links">
                                <h5 class="footer-links__title">My Account</h5>
                                <ul class="footer-links__list">
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Store Location</a>
                                    </li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Order History</a>
                                    </li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Wish List</a></li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Newsletter</a>
                                    </li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Specials</a></li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Gift
                                            Certificates</a></li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Affiliate</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="site-footer__widget footer-newsletter">
                                <h5 class="footer-newsletter__title">Newsletter</h5>
                                <div class="footer-newsletter__text">Praesent pellentesque volutpat ex, vitae auctor lorem
                                    pulvinar mollis felis at lacinia.</div>
                                <form action="#" class="footer-newsletter__form"><label class="sr-only"
                                        for="footer-newsletter-address">Email Address</label> <input type="text"
                                        class="footer-newsletter__form-input form-control" id="footer-newsletter-address"
                                        placeholder="Email Address..."> <button
                                        class="footer-newsletter__form-button btn btn-primary">Subscribe</button></form>
                                <div class="footer-newsletter__text footer-newsletter__text--social">Follow us on social
                                    networks</div>
                                <ul class="footer-newsletter__social-links">
                                    <li class="footer-newsletter__social-link footer-newsletter__social-link--facebook"><a
                                            href="https://themeforest.net/user/kos9" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li class="footer-newsletter__social-link footer-newsletter__social-link--twitter"><a
                                            href="https://themeforest.net/user/kos9" target="_blank"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li class="footer-newsletter__social-link footer-newsletter__social-link--youtube"><a
                                            href="https://themeforest.net/user/kos9" target="_blank"><i
                                                class="fab fa-youtube"></i></a></li>
                                    <li class="footer-newsletter__social-link footer-newsletter__social-link--instagram"><a
                                            href="https://themeforest.net/user/kos9" target="_blank"><i
                                                class="fab fa-instagram"></i></a></li>
                                    <li class="footer-newsletter__social-link footer-newsletter__social-link--rss"><a
                                            href="https://themeforest.net/user/kos9" target="_blank"><i
                                                class="fas fa-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="site-footer__bottom">
                    <div class="site-footer__copyright"><a target="_blank" href="https://www.templateshub.net">Templates
                            Hub</a></div>
                    <div class="site-footer__payments"><img src="images/payments.png" alt=""></div>
                </div>
            </div>
        </div>
    </footer>
    <!-- site__footer / end -->
    </div>
    <!-- site / end -->
    </body>

    </html>




@endsection
