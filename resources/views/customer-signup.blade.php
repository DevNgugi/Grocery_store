{{-- @include('components.navbar') --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Grocery Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.svg" />
    <!-- Template CSS -->
    {{-- <link rel="stylesheet" href="assets/css/plugins/animate.min.css" /> --}}
    <link rel="stylesheet" href="assets/css/main.css?v=5.6" />
</head>

<body>
    @include('components.footer')

    {{-- @yield('navbar')
 --}}

    <main>
       
        <div class="col-lg-6 mb-sm-15 mb-lg-0 mb-md-3 mx-auto mt-10">
            <div class="toggle_info">
                <h3 class="heading-2 p-1 text-center">Create account</h3>
                
            </div>
            <div class="panel-collapse login_form collapse show" id="loginform" style="">
                <div class="panel-body">
                    <form method="post">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="fname" placeholder="First name *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="lname" placeholder="Last name *">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="billing_address" required="" placeholder="Address *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" name="billing_address2" required=""
                                    placeholder="Address line2">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="zipcode" placeholder="Postcode / ZIP *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="phone" placeholder="Phone *">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="cname" placeholder="Company Name">
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="email" placeholder="Email address *">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="createaccount">
                                    <label class="form-check-label label_info" data-bs-toggle="collapse"
                                        href="#collapsePassword" data-target="#collapsePassword"
                                        aria-controls="collapsePassword" for="createaccount"><span>Create an
                                            account?</span></label>
                                </div>
                            </div>
                        </div>
                        <div id="collapsePassword" class="form-group create-account collapse in">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input required="" type="password" placeholder="Password" name="password">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="mb-30 mt-10 cart-action d-flex justify-content-between">
                <a class="btn "><i class="fi-rs-arrow-left mr-10"></i>Continue Shopping</a>
                <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-refresh mr-10"></i>Save details</a>

            </div>
        </div>
    </main>

    @yield('footer')
