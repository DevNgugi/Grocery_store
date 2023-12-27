@section('navbar')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Farmers Finest Centre</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/plugins/slider-range.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/main.css?v=5.6') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
            integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
            crossorigin="anonymous" />
    </head>

    <body>

        <header class="header-area header-style-1 header-style-5 header-height-2">

            <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
                <div class="container">
                    <div class="header-wrap">
                        <div class="logo logo-width-1">
                            <a href="{{ route('home') }}"><img src="{{ asset('assets/imgs/theme/logo.svg') }}"
                                    alt="logo" /></a>
                        </div>
                        <div class="header-right">
                            <div class="search-style-2">
                                <form onsubmit="event.preventDefault();  return filterSearch();">
                                    @csrf
                                    <select id="search-category" name="category" class="select-active">
                                        <option value="">All Categories</option>
                                        {{-- get categories from session GLobal variable middleware --}}
                                        @foreach ($navbar_categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    <input id="search-keywords" name="keywords" type="text" placeholder="Search for items..." />
                                    {{-- filter form --}}

                                </form>
                            </div>
                            <div class="header-action-right">
                                <div class="header-action-2">

                                    <div class="header-action-icon-2">
                                        <a class="mini-cart-icon" href="{{ route('cart') }}">
                                            <img src="{{ asset('assets/imgs/theme/icons/icon-cart.svg') }}" />
                                            <span class="pro-count blue">0</span>
                                        </a>
                                        <a href="{{ route('cart') }}"><span class="lable">Cart</span></a>

                                    </div>
                                    <div class="header-action-icon-2">
                                        <a href="#">
                                            <img class="svgInject"
                                                src="{{ asset('assets/imgs/theme/icons/icon-user.svg') }}" />
                                        </a>
                                        <a href="#"><span class="lable ml-0">Account</span></a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="{{route('profile.edit')}}"><i class="fi fi-rs-user mr-10"></i>Update Profile</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('orders') }}"><i
                                                            class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a>
                                                </li>
                                                <li>
                                                </li>
                                                <li>
                                                    <form id="signout" action="{{route('logout')}}" method="POST">
                                                    @csrf
                                                    <a onclick="document.getElementById('signout').submit();"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                                </form>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-bottom header-bottom-bg-color sticky-bar">
                <div class="container">
                    <div class="header-wrap header-space-between position-relative">
                        <div class="logo logo-width-1 d-block d-lg-none">
                            <a href="#"><img src="{{ asset('assets/imgs/theme/logo.svg') }}" alt="logo" /></a>
                        </div>

                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                        <div class="header-action-right d-block d-lg-none">
                            <div class="header-action-2">

                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{ route('cart') }}">
                                        <img src="{{ asset('assets/imgs/theme/icons/icon-cart.svg') }}" />
                                        <span class="pro-count white">0</span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="mobile-header-active mobile-header-wrapper-style">
            <div class="mobile-header-wrapper-inner">
                <div class="mobile-header-top">
                    <div class="mobile-header-logo">
                        <a href="#"><img src="{{ asset('assets/imgs/theme/logo.svg') }}" alt="logo" /></a>
                    </div>
                    <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                        <button class="close-style search-close">
                            <i class="icon-top"></i>
                            <i class="icon-bottom"></i>
                        </button>
                    </div>
                </div>
                <div class="mobile-header-content-area">
                    <div class="mobile-search search-style-3 mobile-header-border">
                        <form action="#">
                            <input type="text" placeholder="Search for items…" />
                            <button type="submit"><i class="fi-rs-search"></i></button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!--End header-->
    @stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    // document on ready
    $(document).ready(function() {
        // filter search
    //    get  price_to
        var price_to = document.getElementById('slider-range-value2').innerHTML;
        console.log(price_to);

    });
    
function filterSearch() {
        var keywords = document.getElementById('search-keywords').value;
        // search-category
        var category = document.getElementById('search-category').value;
        var price_from = document.getElementById('slider-range-value1').innerHTML;
        var price_to = document.getElementById('slider-range-value2').innerHTML;
        // get value of search input
     

        // get value of elements in a class  and store in array
        var checked_categories = [];
        var checkboxes = document.getElementsByClassName('category-input');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                checked_categories.push(checkboxes[i].value);
            }
        }

        var checked_categories=JSON.stringify(checked_categories);



        $.ajax({
            url: "{{ route('filter') }}",
            type: "POST",
            data: {
                keywords: keywords,
                category: category,
                price_from: price_from,
                price_to: price_to,
                checked_categories: checked_categories,
                _token: "{{ csrf_token() }}",
            },
            success: function(response) {
                // console.log(response);
                // hide slider-banner
                document.getElementById('slider-banner').style.display = 'none';
                // change search-title innerhtml
                document.getElementById('search-title').innerHTML = 'Search Results ...';
                // use template literal to display products
                document.getElementById('all-products').innerHTML=''
                var products_html = '';
               
                for (var i = 0; i < response.length; i++) {
                    products_html += `
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 " >
                                            <div class="product-cart-wrap mb-30">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                            <img class="default-img" src="data:image/png;base64,${response[i].url}" alt="">
                                                    </div>
                                                    
                                                    <div
                                                        class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="sale">Sale</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                      
                                                    </div>
                                                    <h2><a
                                                            href="#">${response[i].title}</a>
                                                    </h2>
                                                    <div class="product-rate-cover">

                                                    </div>
                                                    <div>
                                                        <span class="font-small text-muted">By <a
                                                                href="#">Admin</a></span>
                                                    </div>
                                                    <div class="product-card-bottom">
                                                        <div class="product-price">
                                                            <span>Kshs ${response[i].price}</span>

                                                        </div>
                                                        <div class="add-cart">
                                                            <button onclick="addtocart(${response[i].id})" id="add-cart" style="color: #3BB77E; border:none;"  class="add"><i class="fi-rs-shopping-cart mr-5"></i>Add </button>
                                                        
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    `;
                    // append the above in all-products
                  
                    document.getElementById('all-products').innerHTML = products_html;
                }

            },

            error: function(response) {
                console.log(response.error);
            },
        });

    }

    
</script>
   