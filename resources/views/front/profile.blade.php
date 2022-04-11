@extends('front.parent')


@section('css')
    <link rel="shortcut icon" href="{{ asset('profile/assets/img/favicon.ico') }}" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('profile/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font-Awesome CSS -->
    <link href="{{ asset('profile/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- helper class css -->
    <link href="{{ asset('profile/assets/css/helper.min.css') }}" rel="stylesheet">
    <!-- Plugins CSS -->
    <link href="{{ asset('profile/assets/css/plugins.css') }}" rel="stylesheet">
    <!-- Main Style CSS -->
    <link href="{{ asset('profile/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('profile/assets/css/skin-default.css') }}" rel="stylesheet" id="galio-skin">
@endsection


@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <div class="my-account-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="#dashboad" class="active" data-toggle="tab"><i
                                            class="fa fa-dashboard"></i>
                                        Dashboard</a>
                                    <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                    <a href="#download" data-toggle="tab"><i class="fa fa-cloud-download"></i> Download</a>
                                    <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Payment
                                        Method</a>
                                    <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> change
                                        password</a>
                                    <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account
                                        Details</a>
                                    <a href="{{ route('front.logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->
                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Dashboard</h3>
                                            <div class="welcome">
                                                <p>Hello, <strong>Alex Tuntuni</strong> (If Not <strong>Tuntuni !</strong><a
                                                        href="login-register.html" class="logout"> Logout</a>)</p>
                                            </div>
                                            <p class="mb-0">From your account dashboard. you can easily check &
                                                view your recent orders, manage your shipping and billing addresses and edit
                                                your password and account details.</p>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="orders" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Orders</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            {{-- <th>Total</th> --}}
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($orders as $order)
                                                            <tr>
                                                                <td>{{ $order->id }}</td>
                                                                <td>{{ $order->created_at }}</td>
                                                                <td>{{ $order->status }}</td>
                                                                {{-- <td>{{ $order->total }}</td> --}}
                                                                <td><a href="cart.html" class="check-btn sqr-btn ">View</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="download" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Downloads</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Date</th>
                                                            <th>Expire</th>
                                                            <th>Download</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Haven - Free Real Estate PSD Template</td>
                                                            <td>Aug 22, 2018</td>
                                                            <td>Yes</td>
                                                            <td><a href="#" class="check-btn sqr-btn "><i
                                                                        class="fa fa-cloud-download"></i> Download File</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>HasTech - Profolio Business Template</td>
                                                            <td>Sep 12, 2018</td>
                                                            <td>Never</td>
                                                            <td><a href="#" class="check-btn sqr-btn "><i
                                                                        class="fa fa-cloud-download"></i> Download File</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Payment Method</h3>
                                            <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                        <form action="{{ route('change.password') }}" method="post">
                                            @csrf
                                            @method('put')
                                            <fieldset>
                                                <legend>Password change</legend>
                                                <div class="single-input-item">
                                                    <label for="current-pwd" class="required">Current
                                                        Password</label>
                                                    <input type="password" id="current-pwd" name="current_password"
                                                        placeholder="Current Password" />
                                                </div>
                                                <div class="row">
                                                    <div class="single-input-item">
                                                        <label for="new-pwd" class="required">New
                                                            Password</label>
                                                        <input type="password" id="new-pwd" name="New_Password"
                                                            placeholder="New Password" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="single-input-item">
                                                        <label for="confirm-pwd" class="required">Confirm
                                                            Password</label>
                                                        <input type="password" id="confirm-pwd"
                                                            name="New_Password_confirmation"
                                                            placeholder="Confirm Password" />
                                                    </div>
                                                </div>
                                    </div>
                                    </fieldset>
                                    <div class="single-input-item">
                                        <button type="submit" class="check-btn sqr-btn ">Save Changes</button>
                                    </div>
                                </div>
                                </form>
                                {{-- <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Billing Address</h3>
                                            <address>
                                                <p><strong>Alex Tuntuni</strong></p>
                                                <p>1355 Market St, Suite 900 <br>
                                                    San Francisco, CA 94103
                                                </p>
                                                <p>Mobile: (123) 456-7890</p>
                                            </address>
                                            <a href="#" class="check-btn sqr-btn "><i class="fa fa-edit"></i> Edit
                                                Address</a>
                                        </div>
                                    </div> --}}
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Account Details</h3>
                                        @foreach ($customers as $customer)
                                            <div class="account-details-form">
                                                <form action="#">
                                                    <div class="row">
                                                        {{-- <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="first-name" class="required">First
                                                                Name</label>
                                                            <input type="text" id="first-name" placeholder="First Name" />
                                                        </div>
                                                    </div> --}}
                                                        <div class="form-group col-md-6"><label
                                                                for="checkout-first-name">First
                                                                Name</label>
                                                            <input type="text" class="form-control"
                                                                id="checkout-first-name" placeholder="First Name"
                                                                name="first_name" value="{{ $customer->first_name }}">
                                                        </div>

                                                        <div class="form-group col-md-6"><label
                                                                for="checkout-last-name">Last Name</label>
                                                            <input type="text" class="form-control" name="last_name"
                                                                value="{{ $customer->last_name }}"
                                                                id=" checkout-last-name" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="country">Country</label>
                                                        <select class="custom-select" id="country" name="country_id">
                                                            <option value="">select</option>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->id }}"
                                                                    {{ $customer->country_id == $country->id ? 'selected' : '' }}>
                                                                    {{ $country->name }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="checkout-street-address">Street Address</label>
                                                        <input type="text" class="form-control"
                                                            id="checkout-street-address" placeholder="Street Address"
                                                            name="address" value="{{ $customer->address }}">
                                                    </div>

                                                    <div class="form-group"><label for="checkout-city">Town /
                                                            City</label> <input type="text" class="form-control"
                                                            id="checkout-city" name="city"
                                                            value="{{ $customer->address }}" placeholder="City"></div>

                                                    <div class="form-group"><label for="checkout-postcode">Postcode /
                                                            ZIP</label> <input type="text" class="form-control"
                                                            id="checkout-postcode" placeholder="Postcode" name="postcode"
                                                            value="{{ $customer->postcod }}"></div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6"><label for="checkout-email">Email
                                                                address</label>
                                                            <input type="email" class="form-control" id="checkout-email"
                                                                placeholder="Email address" name="email"
                                                                value="{{ $customer->email }}">
                                                        </div>
                                                        <div class="form-group col-md-6"><label
                                                                for="checkout-phone">Phone</label> <input type="text"
                                                                class="form-control" id="checkout-phone" name="phone"
                                                                value="{{ $customer->phone }}" placeholder="Phone">
                                                        </div>
                                                    </div>

                                                    {{-- <div class="single-input-item">
                                                        <label for="email" class="required">Email Addres</label>
                                                        <input type="email" id="email" placeholder="Email Address" />
                                                    </div> --}}
                                                    {{-- <fieldset>
                                                        <legend>Password change</legend>
                                                        <div class="single-input-item">
                                                            <label for="current-pwd" class="required">Current
                                                                Password</label>
                                                            <input type="password" id="current-pwd"
                                                                placeholder="Current Password" />
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="new-pwd" class="required">New
                                                                        Password</label>
                                                                    <input type="password" id="new-pwd"
                                                                        placeholder="New Password" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="confirm-pwd" class="required">Confirm
                                                                        Password</label>
                                                                    <input type="password" id="confirm-pwd"
                                                                        placeholder="Confirm Password" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="single-input-item">
                                                        <button class="check-btn sqr-btn ">Save Changes</button>
                                                    </div> --}}
                                                </form>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                            </div>
                        </div>
                        <!-- My Account Tab Content End -->
                    </div>
                </div>
                <!-- My Account Page End -->
            </div>
        </div>
    </div>
    </div>
    <!-- my account wrapper end -->
    <!-- brand area start -->
    <div class="brand-area pt-34 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title mb-30">
                        <div class="title-icon">
                            <i class="fa fa-crop"></i>
                        </div>
                        <h3>Popular Brand</h3>
                    </div>
                    <!-- section title end -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="brand-active slick-padding slick-arrow-style">
                        <div class="brand-item text-center">
                            <a href="#"><img src="assets/img/brand/br1.png" alt=""></a>
                        </div>
                        <div class="brand-item text-center">
                            <a href="#"><img src="assets/img/brand/br2.png" alt=""></a>
                        </div>
                        <div class="brand-item text-center">
                            <a href="#"><img src="assets/img/brand/br3.png" alt=""></a>
                        </div>
                        <div class="brand-item text-center">
                            <a href="#"><img src="assets/img/brand/br4.png" alt=""></a>
                        </div>
                        <div class="brand-item text-center">
                            <a href="#"><img src="assets/img/brand/br5.png" alt=""></a>
                        </div>
                        <div class="brand-item text-center">
                            <a href="#"><img src="assets/img/brand/br6.png" alt=""></a>
                        </div>
                        <div class="brand-item text-center">
                            <a href="#"><img src="assets/img/brand/br4.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Scroll to Top End -->
    <!--All jQuery, Third Party Plugins & Activation (main.js) Files-->
    <script src="{{ asset('profile/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <!-- Jquery Min Js -->
    <script src="{{ asset('profile/assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <!-- Popper Min Js -->
    <script src="{{ asset('profile/assets/js/vendor/popper.min.j') }}s"></script>
    <!-- Bootstrap Min Js -->
    <script src="{{ asset('profile/assets/js/vendor/bootstrap.min.js') }}"></script>
    <!-- Plugins Js-->
    <script src="{{ asset('profile/assets/js/plugins.js') }}"></script>
    <!-- Ajax Mail Js -->
    <script src="{{ asset('profile/assets/js/ajax-mail.js') }}"></script>
    <!-- Active Js -->
    <script src="{{ asset('profile/assets/js/main.js') }}"></script>
    <!-- Switcher JS [Please Remove this when Choose your Final Projct] -->
    <script src="{{ asset('profile/assets/js/switcher.js') }}"></script>
@endsection
