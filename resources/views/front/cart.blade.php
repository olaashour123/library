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
                            <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>Shopping Cart</h1>
                </div>
            </div>
        </div>

        <form action="{{ route('update') }}" method="post">
            @csrf
            @method('put')

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

                            @foreach ($cart as $item)
                                <tr class="cart-table__row">
                                    <td class="cart-table__column cart-table__column--image"><a href="#"><img
                                                src="{{ url(Storage::url($item->book->image)) }}" alt=""></a></td>
                                    <td class="cart-table__column cart-table__column--product">
                                        <a href="#" class="cart-table__product-name">{{ $item->book->name }}</a>
                                        <ul class="cart-table__options">
                                            <li>Color: Yellow</li>
                                            <li>Material: Aluminium</li>
                                        </ul>
                                    </td>
                                    <td class="cart-table__column cart-table__column--price" data-title="Price">
                                        ${{ $item->book->price }}</td>
                                    <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                        <div class="input-number">
                                            <input class="form-control input-number__input" type="number"
                                                name="quantity[{{ $item->id }}]" min="1"
                                                value="{{ $item->quantity }}">
                                            <div class="input-number__add"></div>
                                            <div class="input-number__sub"></div>
                                        </div>
                                    </td>
                                    <td class="cart-table__column cart-table__column--total" data-title="Total">
                                        ${{ $item->total }}
                                    </td>
                                    <td class="cart-table__column cart-table__column--remove">
                                        <a href="{{ route('destroy', $item->id) }}"
                                            class="btn btn-light btn-sm btn-svg-icon">
                                            <svg width="12px" height="12px">
                                                <use xlink:href="{{ asset('front/images/sprite.svg#cross-12') }}"></use>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="cart__actions">
                        <form class="cart__coupon-form"><label for="input-coupon-code"
                                class="sr-only">Password</label>
                            <input type="text" class="form-control" id="input-coupon-code" placeholder="Coupon Code">
                            <button type="submit" class="btn btn-primary">Apply Coupon</button>
                        </form>

                        <div class="cart__buttons">
                            <button href="{{ route('front.home') }}" class="btn btn-light">Continue Shopping</button>
                            <button type="submit" class="btn btn-primary btn-lg">Update Cart</button>


                        </div>
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
                                                    <div class="cart__calc-shipping"><a href="#">Calculate Shipping</a>
                                                    </div>
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
                                        href="{{ route('checkout') }}">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- site__body / end -->

    </div>
    <!-- site / end -->
    </body>

    </html>
@endsection
