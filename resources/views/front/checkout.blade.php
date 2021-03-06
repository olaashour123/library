@extends('front.parent')

@section('content')
    <!-- desktop site__header / end -->
    <!-- site__body -->

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
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
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>Checkout</h1>
                </div>
            </div>
        </div>
        <div class="checkout block">
            <form class="ps-checkout__form" action="{{ route('checkout.store') }}" method="post">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="alert alert-lg alert-primary">Returning customer? <a href="#">Click here to
                                    login</a>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-7">
                            <div class="card mb-lg-0">
                                <div class="card-body">
                                    <h3 class="card-title">Billing details</h3>
                                    <div class="form-row">
                                        <div class="form-group col-md-6"><label for="checkout-first-name">First Name</label>
                                            <input type="text" class="form-control" id="checkout-first-name"
                                                placeholder="First Name" name="first_name"
                                                value="{{ old('first_name') }}">
                                        </div>
                                        {{-- <div class="form-group col-md-6">
                                        <label for="checkout-Email">Email</label>
                                         <input type="email" class="form-control" id="checkout-phone" placeholder="Email"
                                            name="email" value="{{ old('email', $customerId->email) }}>
                                                    </div> --}}
                                        <div class="form-group col-md-6"><label for="checkout-last-name">Last Name</label>
                                            <input type="text" class="form-control" name="last_name"
                                                value="{{ old('last_name') }}" id=" checkout-last-name"
                                                placeholder="Last Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select class="custom-select" id="country" name="country_id">
                                            <option value="">select</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- <div class="form-group"><label for="checkout-company-name">Company Name <span
                                                class="text-muted">(Optional)</span></label> <input type="text"
                                            class="form-control" id="checkout-company-name" placeholder="Company Name">
                                    </div> --}}

                                    {{-- <div class="form-group form-group--inline">
                                        <label>Country<span>*</span>
                                        </label>
                                        <select name="shipping[country_code]" id="country_code">
                                            <option value="">Select Country</option>
                                            @foreach (Symfony\Component\Intl\Countries::getNames() as $code => $name)
                                                @if ($code == 'IL')
                                                    @continue
                                                @endif
                                                <option value="{{ $code }}"
                                                    @if (old('country', $customerId->country) == $code) selected @endif>{{ $name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div> --}}


                                    {{-- <div class="form-group form-group--inline">
                                        <label>Country<span>*</span>
                                        </label>
                                        <select class="form-control" name="billing_country">
                                            @foreach ($countries as $code => $name)
                                                <option value="{{ $code }}"
                                                    @if ($code == old('country')) selected @endif>{{ $name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    {{-- <div class=" form-group">
                                        <label for="checkout-country">Country</label>
                                        <input type="text" class="form-control" id="checkout-street-address"
                                            placeholder="Street Address" name="country" value="{{ old('country') }}">
                                        {{-- <select id="checkout-country" class="form-control">
                                            <option>Select a country...</option>
                                            <option>United States</option>
                                            <option>Russia</option>
                                            <option>Italy</option>
                                            <option>France</option>
                                            <option>Ukraine</option>
                                            <option>Germany</option>
                                            <option>Australia</option>
                                        </select>
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="checkout-street-address">Street Address</label>
                                        <input type="text" class="form-control" id="checkout-street-address"
                                            placeholder="Street Address" name="address" value="{{ old('address') }}">
                                    </div>

                                    <div class="form-group"><label for="checkout-city">Town / City</label> <input
                                            type="text" class="form-control" id="checkout-city" name="city"
                                            value="{{ old('city') }}" placeholder="City"></div>

                                    <div class="form-group"><label for="checkout-postcode">Postcode / ZIP</label> <input
                                            type="text" class="form-control" id="checkout-postcode" placeholder="Postcode"
                                            name="postcode" value="{{ old('postcode') }}"></div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6"><label for="checkout-email">Email address</label>
                                            <input type="email" class="form-control" id="checkout-email"
                                                placeholder="Email address" name="email" value="{{ old('email') }}">
                                        </div>
                                        <div class="form-group col-md-6"><label for="checkout-phone">Phone</label> <input
                                                type="text" class="form-control" id="checkout-phone" name="phone"
                                                value="{{ old('phone') }}" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <span class="form-check-input input-check">
                                                <span class="input-check__body">
                                                    <input class="input-check__input" type="checkbox"
                                                        id="checkout-create-account"> <span class="input-check__box"></span>
                                                    <svg class="input-check__icon" width="9px" height="7px">
                                                        <use xlink:href="images/sprite.svg#check-9x7"></use>
                                                    </svg>
                                                </span>
                                            </span>
                                            <label class="form-check-label" for="checkout-create-account">Create an
                                                account?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-divider"></div>
                                <div class="card-body">
                                    <h3 class="card-title">Shipping Details</h3>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <span class="form-check-input input-check">
                                                <span class="input-check__body">
                                                    <input class="input-check__input" type="checkbox"
                                                        id="checkout-different-address"> <span
                                                        class="input-check__box"></span>
                                                    <svg class="input-check__icon" width="9px" height="7px">
                                                        <use xlink:href="images/sprite.svg#check-9x7"></use>
                                                    </svg>
                                                </span>
                                            </span>
                                            <label class="form-check-label" for="checkout-different-address">Ship to a
                                                different
                                                address?</label>
                                        </div>
                                    </div>
                                    <div class="form-group"><label for="checkout-comment">Order notes <span
                                                class="text-muted">(Optional)</span></label>
                                        <textarea id="checkout-comment" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <h3 class="card-title">Your Order</h3>
                                    <table class="checkout__totals">
                                        <thead class="checkout__totals-header">
                                            <tr>
                                                <th>Product</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="checkout__totals-products">
                                            @foreach ($cart as $item)
                                                <tr>
                                                    <td>{{ $item->book->name }} x{{ $item->quantity }}</td>
                                                    <td>{{ $item->total }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tbody class="checkout__totals-subtotals">
                                            {{-- <tr>
                                                <th>Subtotal</th>
                                                <td> ${{ $cart->sum('total') }}</td>
                                            </tr> --}}
                                            {{-- <tr>
                                                <th>Store Credit</th>
                                                <td>$-20.00</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <td>$25.00</td>
                                            </tr> --}}
                                        </tbody>
                                        <tfoot class="checkout__totals-footer">
                                            <tr>
                                                <th>Total</th>
                                                <td>${{ $cart->sum('total') }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="payment-methods">
                                        <ul class="payment-methods__list">
                                            <li class="payment-methods__item payment-methods__item--active">
                                                <label class="payment-methods__item-header"><span
                                                        class="payment-methods__item-radio input-radio"><span
                                                            class="input-radio__body"><input class="input-radio__input"
                                                                name="checkout_payment_method" type="radio"
                                                                checked="checked">
                                                            <span class="input-radio__circle"></span> </span></span><span
                                                        class="payment-methods__item-title">Direct bank
                                                        transfer</span></label>
                                                <div class="payment-methods__item-container">
                                                    <div class="payment-methods__item-description text-muted">Make your
                                                        payment
                                                        directly into our bank account. Please use your Order ID as the
                                                        payment
                                                        reference. Your order will not be shipped until the funds have
                                                        cleared
                                                        in our account.</div>
                                                </div>
                                            </li>
                                            <li class="payment-methods__item">
                                                <label class="payment-methods__item-header"><span
                                                        class="payment-methods__item-radio input-radio"><span
                                                            class="input-radio__body"><input class="input-radio__input"
                                                                name="checkout_payment_method" type="radio"> <span
                                                                class="input-radio__circle"></span> </span></span><span
                                                        class="payment-methods__item-title">Check payments</span></label>
                                                <div class="payment-methods__item-container">
                                                    <div class="payment-methods__item-description text-muted">Please send a
                                                        check to Store Name, Store Street, Store Town, Store State / County,
                                                        Store Postcode.</div>
                                                </div>
                                            </li>
                                            <li class="payment-methods__item">
                                                <label class="payment-methods__item-header"><span
                                                        class="payment-methods__item-radio input-radio"><span
                                                            class="input-radio__body"><input class="input-radio__input"
                                                                name="checkout_payment_method" type="radio"> <span
                                                                class="input-radio__circle"></span> </span></span><span
                                                        class="payment-methods__item-title">Cash on delivery</span></label>
                                                <div class="payment-methods__item-container">
                                                    <div class="payment-methods__item-description text-muted">Pay with cash
                                                        upon delivery.</div>
                                                </div>
                                            </li>
                                            <li class="payment-methods__item">
                                                <label class="payment-methods__item-header"><span
                                                        class="payment-methods__item-radio input-radio"><span
                                                            class="input-radio__body"><input class="input-radio__input"
                                                                name="checkout_payment_method" type="radio"> <span
                                                                class="input-radio__circle"></span> </span></span><span
                                                        class="payment-methods__item-title">PayPal</span></label>
                                                <div class="payment-methods__item-container">
                                                    <div class="payment-methods__item-description text-muted">Pay via
                                                        PayPal;
                                                        you can pay with your credit card if you don???t have a PayPal
                                                        account.
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="checkout__agree form-group">
                                        <div class="form-check">
                                            <span class="form-check-input input-check">
                                                <span class="input-check__body">
                                                    <input class="input-check__input" type="checkbox" id="checkout-terms">
                                                    <span class="input-check__box"></span>
                                                    <svg class="input-check__icon" width="9px" height="7px">
                                                        <use xlink:href="images/sprite.svg#check-9x7"></use>
                                                    </svg>
                                                </span>
                                            </span>
                                            <label class="form-check-label" for="checkout-terms">I have read and agree to
                                                the
                                                website <a target="_blank" href="terms-and-conditions.html">terms and
                                                    conditions</a>*</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-xl btn-block">Place Order</button>
                                </div>
                            </div>
                        </div>

            </form>
        </div>
    </div>
    </div>
    </div>
    <!-- site__body / end -->
    <!-- site__footer -->

    <!-- site__footer / end -->
    </div>
    <!-- site / end -->
    </body>

    </html>
@endsection
