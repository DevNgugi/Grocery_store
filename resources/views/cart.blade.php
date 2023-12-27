@include('components.navbar')
@include('components.footer')
    
@yield('navbar')


<main class="main ">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Cart
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Your Cart</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are <span class="text-brand">{{ $cart->count() }}</span> products in
                        your cart</h6>
                    @if ($cart->count() > 0)
                        <h6 class="text-body">

                            <form method="POST" action="{{ route('clearCart') }}">
                                @csrf
                                {{-- <i class="fi-rs-trash mr-5"></i> --}}
                                <button class="btn btn-sm" type="submit">Clear Cart</button>
                            </form>

                        </h6>
                    @endif

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">

                        <tbody class="">
                            @foreach ($cart as $item)
                                <tr class="pt-30">

                                    <td class="image product-thumbnail pt-40">
                                        <img
                                        src="data:image/png;base64,{{$item->getProductRelation->url}}" alt="#"></td>
                                    <td class="product-des product-name">
                                        <h6 class="mb-5"><a class="product-name mb-10 text-heading"
                                                href="#">{{ $item->getProductRelation->title }}</a>
                                        </h6>

                                    </td>
                                    <td class="price" data-title="Price">
                                        <h4 class="text-body ">Kshs {{ $item->getProductRelation->price }} </h4>
                                    </td>
                                    <td class="text-center detail-info" data-title="Stock">
                                        <div class="detail-extralink mr-15">
                                            <div class="detail-qty border radius">
                                                <a onclick="reduceQuantity({{ 'product' . $item->id }},{{ 'qty' . $item->id }},{{ $item->getProductRelation->price }})"
                                                    href="#" class="qty-down"><i
                                                        class="fi-rs-angle-small-down"></i></a>
                                                <span id="{{ 'qty' . $item->id }}" class="qty-val" data-represents="{{$item->id}}">1</span>
                                                <a onclick="addQuantity({{ 'product' . $item->id }},{{ 'qty' . $item->id }},{{ $item->getProductRelation->price }})"
                                                    href="#" class="qty-up"><i
                                                        class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <h4 id="{{ 'product' . $item->id }}" class="text-brand item-price">
                                            {{ $item->getProductRelation->price }}</h4>
                                    </td>
                                    <td class="action text-center" data-title="Remove"><a href="#"
                                            class="text-body"><i class="fi-rs-trash"></i></a></td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="cart-action d-flex justify-content-between">
                    <a class="btn" onclick="history.back()"><i class="fi-rs-arrow-left mr-10"></i>Continue
                        Shopping</a>

                    <a onclick="location.reload()" class="btn   mr-10 mb-sm-15"><i
                            class="fi-rs-refresh mr-10"></i>Update Cart</a>
                </div>

            </div>

            @if (count($cart) > 0)
                <div class="col-lg-4">
                    <div class="border p-md-4 cart-totals ml-30">
                        <div class="table-responsive">
                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Subtotal</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end" id="subtotal"></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Shipping</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h5 class="text-heading text-end">Free </h5>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Total</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end" id="total"></h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button  onclick="updateCart()" class="btn mb-20 w-100">Proceed To CheckOut<i
                                class="fi-rs-sign-out ml-15"></i></button>
                    </div>
                </div>
            @endif

        </div>
    </div>
</main>
@yield('footer')
@if (session('success'))
    <script>
        toastr["success"](" {{ session('success') }}");
    </script>
@endif


{{--  --}}
<script>
    getTotal()
    function addQuantity(id, qty, price) {
        if (parseInt(qty.innerHTML) > 0) {
         
            qty.innerHTML = parseInt(qty.innerHTML) + 1;
            var current = id.innerHTML;
            var total = parseInt(current) + parseInt(price);

            id.innerHTML = total;
            getTotal();
        }
    }

    function reduceQuantity(id, qty, price) {
        if (parseInt(qty.innerHTML) > 1) {
            qty.innerHTML = parseInt(qty.innerHTML) - 1;
            var current = id.innerHTML;
            var total = parseInt(current) - parseInt(price);
            id.innerHTML = total;
            getTotal();

        }
    }

    // get subtotal
    function getTotal(){
        // get all values from class item-price  
    
        var total = 0;
        var subtotal = 0;
        var items = document.getElementsByClassName('item-price');
        for (var i = 0; i < items.length; i++) {
            total += parseInt(items[i].innerHTML);
        }
        subtotal = total;
        document.getElementById('subtotal').innerHTML = subtotal;
        document.getElementById('total').innerHTML = total;
    }


    function updateCart() {
        var qty = document.getElementsByClassName('qty-val');
       
        for (var i = 0; i < qty.length; i++) {
            
            var id = qty[i].getAttribute('data-represents');
            var quantity = qty[i].innerHTML;
            var index = i;
            var length = qty.length-1;
            $.ajax({
            type: "POST",
            url: "{{ route('updateCart') }}",
            data: {
                id: id,
                index:index,
                length:length,
                quantity: quantity,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
            //    last iteration
                
                    if (response.success) {
                        console.log(response.index, response.length);
                        if(response.index == response.length){
                            toastr["success"](response.success);
                            setTimeout(() => {
                            window.location.href = "{{ route('checkout') }}";
                                
                            }, 2000);
                        }
                } else {
                    toastr["error"](response.error);
                }
                
            },
            error: function(response) {
                console.log(response);
            }
        });//end ajax
        }// end for loop
       
       
    }
</script>
