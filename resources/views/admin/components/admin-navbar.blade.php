@section('navbar')
    
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> Dashboard</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
    
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link href="{{asset('admin/assets/css/main.css?v=1.1')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    </head>

    <body>
        <div class="screen-overlay"></div>
        <aside class="navbar-aside" id="offcanvas_aside">
            <div class="aside-top">
                <a href="{{route('dashboard')}}" class="brand-wrap">
                    <img src="{{asset('assets/imgs/theme/logo.svg')}}" class="logo" alt=" Dashboard" />
                </a>
                <div>
                    <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i></button>
                </div>
            </div>
            <nav>
                <ul class="menu-aside">
                    <li class="menu-item active">
                        <a class="menu-link" href="{{route('dashboard')}}">
                            <i class="icon material-icons md-home"></i>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
                    <li class="menu-item has-submenu">
                        <a class="menu-link" href="{{route('product-list')}}">
                            <i class="icon material-icons md-shopping_bag"></i>
                            <span class="text">Products</span>
                        </a>
                        <div class="submenu">
                            <a href="{{route('product-list')}}">Product List</a>
                            <a href="{{route('add-product')}}">Add Product</a>
                            <a href="{{route('product-categories')}}">Categories</a>
                        </div>
                    </li>
                    <li class="menu-item has-submenu">
                        <a class="menu-link" href="page-orders-1.html">
                            <i class="icon material-icons md-shopping_cart"></i>
                            <span class="text">Orders</span>
                        </a>
                        <div class="submenu">
                            <a href="{{route('orders-list')}}">Order list</a>
                        </div>
                    </li>

                </ul>
                
                <br />
                <br />
            </nav>
        </aside>
        <main class="main-wrap">
            <header class="main-header navbar">
                <div class="col-search">
                    <form class="searchform">
                        <div class="input-group">
                            <input list="search_terms" type="text" class="form-control" placeholder="Search term" />
                            <button class="btn btn-light bg" type="button"><i class="material-icons md-search"></i></button>
                        </div>
                        <datalist id="search_terms">
                            <option value="Products"></option>
                            <option value="New orders"></option>
                        </datalist>
                    </form>
                </div>
                <div class="col-nav">
                    <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"><i class="material-icons md-apps"></i></button>
                    <ul class="nav">
                       
                        
                        
                        <li class="dropdown nav-item">
                            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="{{asset('admin/assets/imgs/people/placeholder.jpg')}}" alt="User" /></a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                                <a class="dropdown-item" href="{{route('profile.edit')}}"><i class="material-icons md-perm_identity"></i>Edit Profile</a>
                         
                                <div class="dropdown-divider"></div>
                                <a onclick="document.getElementById('admsignout').submit();" class="dropdown-item text-danger" href="#"><i class="material-icons md-exit_to_app"></i>Logout</a>

                                <form id="admsignout" action="{{route('logout')}}" method="POST">
                                    @csrf

                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>

@stop