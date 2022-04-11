@extends('front.parent')

@section('content')
    <!-- desktop site__header / end -->
    <!-- site__body -->

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <!-- quickview-modal -->
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content"></div>
        </div>
    </div>
    <!-- quickview-modal / end -->
    <!-- mobilemenu -->
    <div class="mobilemenu">
        <div class="mobilemenu__backdrop"></div>
        <div class="mobilemenu__body">
            <div class="mobilemenu__header">
                <div class="mobilemenu__title">Menu</div>
                <button type="button" class="mobilemenu__close">
                    <svg width="20px" height="20px">
                        <use xlink:href="images/sprite.svg#cross-20"></use>
                    </svg>
                </button>
            </div>
            <div class="mobilemenu__content">
                <ul class="mobile-links mobile-links--level--0" data-collapse
                    data-collapse-opened-class="mobile-links__item--open">
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="index.html" class="mobile-links__item-link">Home</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="index.html"
                                            class="mobile-links__item-link">Home 1</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="index-2.html"
                                            class="mobile-links__item-link">Home 2</a></div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="#" class="mobile-links__item-link">Categories</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="#" class="mobile-links__item-link">Power Tools</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content>
                                        <ul class="mobile-links mobile-links--level--2">
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="#"
                                                        class="mobile-links__item-link">Engravers</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="#"
                                                        class="mobile-links__item-link">Wrenches</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="#"
                                                        class="mobile-links__item-link">Wall Chaser</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="#"
                                                        class="mobile-links__item-link">Pneumatic Tools</a></div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="#" class="mobile-links__item-link">Machine Tools</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content>
                                        <ul class="mobile-links mobile-links--level--2">
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="#"
                                                        class="mobile-links__item-link">Thread Cutting</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="#"
                                                        class="mobile-links__item-link">Chip Blowers</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="#"
                                                        class="mobile-links__item-link">Sharpening Machines</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="#"
                                                        class="mobile-links__item-link">Pipe Cutters</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="#"
                                                        class="mobile-links__item-link">Slotting machines</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="#"
                                                        class="mobile-links__item-link">Lathes</a></div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">Shop</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">Shop
                                            Grid</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content>
                                        <ul class="mobile-links mobile-links--level--2">
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a
                                                        href="shop-grid-3-columns-sidebar.html"
                                                        class="mobile-links__item-link">3 Columns Sidebar</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a
                                                        href="shop-grid-4-columns-full.html"
                                                        class="mobile-links__item-link">4 Columns Full</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a
                                                        href="shop-grid-5-columns-full.html"
                                                        class="mobile-links__item-link">5 Columns Full</a></div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="shop-list.html"
                                            class="mobile-links__item-link">Shop List</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="shop-right-sidebar.html"
                                            class="mobile-links__item-link">Shop Right Sidebar</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="product.html" class="mobile-links__item-link">Product</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content>
                                        <ul class="mobile-links mobile-links--level--2">
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="product.html"
                                                        class="mobile-links__item-link">Product</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="product-alt.html"
                                                        class="mobile-links__item-link">Product Alt</a></div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title"><a href="product-sidebar.html"
                                                        class="mobile-links__item-link">Product Sidebar</a></div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="cart.html"
                                            class="mobile-links__item-link">Cart</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="checkout.html"
                                            class="mobile-links__item-link">Checkout</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="wishlist.html"
                                            class="mobile-links__item-link">Wishlist</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="compare.html"
                                            class="mobile-links__item-link">Compare</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="account.html"
                                            class="mobile-links__item-link">My Account</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="track-order.html"
                                            class="mobile-links__item-link">Track Order</a></div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="blog-classic.html" class="mobile-links__item-link">Blog</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="blog-classic.html"
                                            class="mobile-links__item-link">Blog Classic</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="blog-grid.html"
                                            class="mobile-links__item-link">Blog Grid</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="blog-list.html"
                                            class="mobile-links__item-link">Blog List</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="blog-left-sidebar.html"
                                            class="mobile-links__item-link">Blog Left Sidebar</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="post.html"
                                            class="mobile-links__item-link">Post Page</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="post-without-sidebar.html"
                                            class="mobile-links__item-link">Post Without Sidebar</a></div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="#" class="mobile-links__item-link">Pages</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="about-us.html"
                                            class="mobile-links__item-link">About Us</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="contact-us.html"
                                            class="mobile-links__item-link">Contact Us</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="contact-us-alt.html"
                                            class="mobile-links__item-link">Contact Us Alt</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="404.html"
                                            class="mobile-links__item-link">404</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="terms-and-conditions.html"
                                            class="mobile-links__item-link">Terms And Conditions</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="faq.html"
                                            class="mobile-links__item-link">FAQ</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="components.html"
                                            class="mobile-links__item-link">Components</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="typography.html"
                                            class="mobile-links__item-link">Typography</a></div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a data-collapse-trigger class="mobile-links__item-link">Currency</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">€
                                            Euro</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">£
                                            Pound Sterling</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">$ US
                                            Dollar</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">₽
                                            Russian Ruble</a></div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a data-collapse-trigger class="mobile-links__item-link">Language</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="#"
                                            class="mobile-links__item-link">English</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="#"
                                            class="mobile-links__item-link">French</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="#"
                                            class="mobile-links__item-link">German</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="#"
                                            class="mobile-links__item-link">Russian</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="#"
                                            class="mobile-links__item-link">Italian</a></div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- mobilemenu / end -->
    <!-- site -->

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
                            <li class="breadcrumb-item active" aria-current="page">Wish List</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>Wish List</h1>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="container">
                <table class="wishlist">
                    <thead class="wishlist__head">
                        <tr class="wishlist__row">
                            <th class="wishlist__column wishlist__column--image">Image</th>
                            <th class="wishlist__column wishlist__column--product">BooK</th>
                            <th class="wishlist__column wishlist__column--stock"> Status</th>
                            <th class="wishlist__column wishlist__column--price">Price</th>
                            <th class="wishlist__column wishlist__column--tocart"></th>
                            <th class="wishlist__column wishlist__column--remove"></th>
                        </tr>
                    </thead>

                    <tbody class="wishlist__body">

                        @foreach ($wishlist as $wish)
                            <tr class="wishlist__row">
                                <td class="wishlist__column wishlist__column--image"><a href="#"><img
                                            src="{{ url(Storage::url($wish->image)) }}" alt=""></a></td>
                                <td class="wishlist__column wishlist__column--product">
                                    <a href="#" class="wishlist__product-name">{{ $wish->name }}</a>
                                </td>
                                <td class="wishlist__column wishlist__column--stock">
                                    <div class="badge badge-success">In Stock</div>
                                </td>
                                <td class="wishlist__column wishlist__column--price"> ${{ $wish->price }}</td>


                                <td class="wishlist__column wishlist__column--tocart">
                                    <form class="product__options" action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="text" value="{{ $wish->id }}" name="book_id" hidden>
                                        <input type="text" value="1" name="quantity" hidden>
                                        <button type="submit" class="btn btn-primary btn-sm">Add To Cart</button>

                                    </form>
                                </td>



                                <td class="wishlist__column wishlist__column--remove">
                                    <button type="button" class="btn btn-light btn-sm btn-svg-icon">
                                        <svg width="12px" height="12px">
                                            <use xlink:href="images/sprite.svg#cross-12"></use>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
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
                    <div class="site-footer__copyright"></div>
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
