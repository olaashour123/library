@extends('front.parent')

@section('content')
    <!-- desktop site__header / end -->
    <!-- site__body -->
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
                            <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>Shopping Cart</h1>
                </div>
            </div>
        </div>
        <div class="cart block">
            <div class="container">
                <table class="cart__table cart-table">
                    <thead class="cart-table__head">

                        <tr class="cart-table__row">
                            <th class="cart-table__column cart-table__column--image">Image</th>
                            <th class="cart-table__column cart-table__column--product">Product</th>
                            <th class="cart-table__column cart-table__column--price">Price</th>
                            <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                            <th class="cart-table__column cart-table__column--total">Total</th>
                            <th class="cart-table__column cart-table__column--remove"></th>
                        </tr>
                    </thead>
                    <tbody class="cart-table__body">
                        @foreach($cart as $item)
                            <tr class="cart-table__row">
                                <td class="cart-table__column cart-table__column--image"><a href="#"><img
                                            src="{{ url(Storage::url($item->image)) }}" alt=""></a></td>
                                <td class="cart-table__column cart-table__column--product">
                                    <a href="#" class="cart-table__product-name">{{ $item->name }}</a>
                                    <ul class="cart-table__options">
                                        <li>Color: Yellow</li>
                                        <li>Material: Aluminium</li>
                                    </ul>
                                </td>
                                <td class="cart-table__column cart-table__column--price" data-title="Price">
                                    ${{ $item->price }}</td>
                                <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                    <div class="input-number">
                                        <input class="form-control input-number__input" type="number" min="1" value="2">
                                        <div class="input-number__add"></div>
                                        <div class="input-number__sub"></div>
                                    </div>
                                </td>
                                <td class="cart-table__column cart-table__column--total" data-title="Total">$1,398.00</td>
                                <td class="cart-table__column cart-table__column--remove">
                                    <button type="button" class="btn btn-light btn-sm btn-svg-icon">
                                        <svg width="12px" height="12px">
                                            <use xlink:href="images/sprite.svg#cross-12"></use>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            {{-- <tr class="cart-table__row">
                                <td class="cart-table__column cart-table__column--image"><a href="#"><img
                                            src="images/products/product-2.jpg" alt=""></a></td>
                                <td class="cart-table__column cart-table__column--product"><a href="#"
                                        class="cart-table__product-name">Undefined Tool IRadix DPS3000SY 2700 watts</a></td>
                                <td class="cart-table__column cart-table__column--price" data-title="Price">
                                    ${{ $book->price }}</td>
                                <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                    <div class="input-number">
                                        <input class="form-control input-number__input" type="number" min="1" value="1">
                                        <div class="input-number__add"></div>
                                        <div class="input-number__sub"></div>
                                    </div>
                                </td>
                                <td class="cart-table__column cart-table__column--total" data-title="Total">$849.00</td>
                                <td class="cart-table__column cart-table__column--remove">
                                    <button type="button" class="btn btn-light btn-sm btn-svg-icon">
                                        <svg width="12px" height="12px">
                                            <use xlink:href="images/sprite.svg#cross-12"></use>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <tr class="cart-table__row">
                                <td class="cart-table__column cart-table__column--image"><a href="#"><img
                                            src="images/products/product-5.jpg" alt=""></a></td>
                                <td class="cart-table__column cart-table__column--product">
                                    <a href="#" class="cart-table__product-name">Brandix Router Power Tool 2017ERXPK</a>
                                    <ul class="cart-table__options">
                                        <li>Color: True Red</li>
                                    </ul>
                                </td>
                                <td class="cart-table__column cart-table__column--price" data-title="Price">$1,210.00</td>
                                <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                    <div class="input-number">
                                        <input class="form-control input-number__input" type="number" min="1" value="3">
                                        <div class="input-number__add"></div>
                                        <div class="input-number__sub"></div>
                                    </div>
                                </td>
                                <td class="cart-table__column cart-table__column--total" data-title="Total">$3,630.00</td>
                                <td class="cart-table__column cart-table__column--remove">
                                    <button type="button" class="btn btn-light btn-sm btn-svg-icon">
                                        <svg width="12px" height="12px">
                                            <use xlink:href="images/sprite.svg#cross-12"></use>
                                        </svg>
                                    </button>
                                </td>
                            </tr> --}}
                        @endforeach
                    </tbody>
                </table>
                <div class="cart__actions">
                    <form class="cart__coupon-form"><label for="input-coupon-code" class="sr-only">Password</label>
                        <input type="text" class="form-control" id="input-coupon-code" placeholder="Coupon Code"> <button
                            type="submit" class="btn btn-primary">Apply Coupon</button>
                    </form>
                    <div class="cart__buttons"><a href="index.html" class="btn btn-light">Continue Shopping</a> <a
                            href="#" class="btn btn-primary cart__update-button">Update Cart</a></div>
                </div>
                <div class="row justify-content-end pt-5">
                    <div class="col-12 col-md-7 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Cart Totals</h3>
                                <table class="cart__totals">
                                    <thead class="cart__totals-header">
                                        <tr>
                                            <th>Subtotal</th>
                                            <td>$5,877.00</td>
                                        </tr>
                                    </thead>
                                    <tbody class="cart__totals-body">
                                        <tr>
                                            <th>Shipping</th>
                                            <td>
                                                $25.00
                                                <div class="cart__calc-shipping"><a href="#">Calculate Shipping</a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tax</th>
                                            <td>$0.00</td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="cart__totals-footer">
                                        <tr>
                                            <th>Total</th>
                                            <td>$5,902.00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <a class="btn btn-primary btn-xl btn-block cart__checkout-button"
                                    href="checkout.html">Proceed to checkout</a>
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
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">About Us</a>
                                    </li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Delivery
                                            Information</a></li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Privacy
                                            Policy</a></li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Brands</a></li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Contact Us</a>
                                    </li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Returns</a></li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Site Map</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2">
                            <div class="site-footer__widget footer-links">
                                <h5 class="footer-links__title">My Account</h5>
                                <ul class="footer-links__list">
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Store
                                            Location</a></li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Order
                                            History</a></li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Wish List</a>
                                    </li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Newsletter</a>
                                    </li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Specials</a>
                                    </li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Gift
                                            Certificates</a></li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Affiliate</a>
                                    </li>
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
