@include('components.navbar')
@include('components.footer')

@yield('navbar')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <div class=" container mb-80 mt-50 ">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Checkout</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are <span class="text-brand">{{$cart->count()}}</span> products in your cart</h6>
                </div>
            </div>
        </div>
        <div class="row border">
           
            <div class="col-lg-12 mx-auto">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order</h4>
                        <h6 class="text-muted">Subtotal</h6>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                        <table class="table no-border">
                            <tbody>
                            @foreach ($cart as $item)
                                    
                                <tr>
                                    <td class="image product-thumbnail"><img src="data:image/png;base64,{{$item->getProductRelation->url}}" alt="#"></td>
                                    <td>
                                        <h6 class="w-160 mb-5"><a href="shop-product-full.html" class="text-heading">{{$item->getProductRelation->title}} </a></h6>
                                        
                                    </td>
                                    <td>
                                        <h6 class="text-muted pl-20 pr-20">Kshs {{$item->getProductRelation->price}} x {{$item->quantity}}</h6>
                                    </td>
                                    <td>
                                        <h4 class="text-brand">Kshs {{$item->getProductRelation->price * $item->quantity}}</h4>
                                    </td>
                                </tr>

                                @endforeach

                               
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="payment ml-30">
                    <h4 class="mb-30">Payment</h4>
                    <div class="payment_option">
                        
                        <div class="custome-">
                            <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4" checked="">
                            <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
                        </div>
                        
                    </div>
                    <form method="POST" action="{{route('createOrder')}}">
                    @csrf
                        <button type="submit" class="btn btn-sm btn-fill-out btn-block mt-30">Place an Order<i class="fi-rs-sign-out ml-15"></i></button>
                </form>
                </div>
            </div>
        </div>
    </div>
</main>
@yield('footer')