@include('components.navbar')
@include('components.footer')

@yield('navbar')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Shop</a>
                 {{ $product->name }}
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="product-detail accordion-detail">
                    <div class="row mb-50 mt-30">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider slick-initialized slick-slider">
                                    <div class="slick-list draggable">
                                        <div class="slick-track"
                                            style="opacity: 1; width: 5025px; transform: translate3d(-335px, 0px, 0px);">
                                            <figure class="border-radius-10 slick-slide slick-cloned"
                                                data-slick-index="-1" id="" aria-hidden="true" tabindex="-1"
                                                style="width: 335px;">
                                            </figure>
                                            <figure class="border-radius-10 slick-slide slick-current slick-active"
                                                data-slick-index="0" aria-hidden="false" tabindex="0"
                                                style="width: 335px;">
                                                <img width="335px" src="data:image/png;base64,{{$product->url}}" alt="product image">
                                            </figure>
                                            
                                     
                                        </div>
                                    </div>

                                </div>
                                <!-- THUMBNAILS -->
                           
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                <h2 class="title-detail">{{$product->name}}</h2>
                                <div class="product-detail-rating">

                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price text-brand">Kshs {{$product->price}}</span>

                                    </div>
                                </div>
                                <div class="short-desc mb-30">
                                    <p class="font-lg">{{$product->description}}</p>
                                </div>

                                <div class="detail-extralink mb-50">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <input type="text" name="quantity" class="qty-val" value="1"
                                            min="1">
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="product-extra-link2">
                                        <button onclick="addtocart({{$product->id}})" type="submit" class="button button-add-to-cart"><i
                                                class="fi-rs-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>

                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                  

                </div>
            </div>
        </div>
    </div>
</main>
@yield('footer')
