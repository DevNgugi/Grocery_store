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
            <span><i class="fi-rs-user mr-10"></i><span class="text-muted font-lg">No account?  </span> <a href="#loginform" data-bs-toggle="collapse" class="font-lg" aria-expanded="true">Click here to Sign Up</a></span>
        </div>
        <div class="panel-collapse login_form collapse show" id="loginform" style="">
            <div class="panel-body">
                <p class="mb-30 font-sm">If you have shopped with us before, please enter your details below. </p>
                <form method="post">
                    <div class="form-group">
                        <input type="text" name="email" placeholder="Username Or Email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <div class="login_footer form-group">
                        <div class="chek-form">
                            <div class="custome-checkbox">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="remember" value="">
                                <label class="form-check-label" for="remember"><span>Remember me</span></label>
                            </div>
                        </div>
                        <a href="#">Forgot password?</a>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-md" name="login">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@yield('footer')