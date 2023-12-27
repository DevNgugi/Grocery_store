
@include('admin.components.admin-navbar')
@include('admin.components.admin-footer')
@yield('navbar')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Dashboard</h2>
            <p>Grocery Store Activity Summary</p>
        </div>
       
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-primary-light">
                        <i class="text-info material-icons md-shopping_basket"></i>
                    </span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Products in Store</h6>
                        <span>{{$total_products}}</span>
                        <span class="text-sm"> In stock Products only</span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success material-icons md-local_shipping"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Pending Orders</h6>
                    <span>{{$total_pending}}</span>
                        <span class="text-sm"> Including orders in transit </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning material-icons md-qr_code"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Completed Orders</h6>
                        <span>{{$total_delivered}}</span>
                        <span class="text-sm"> Paid and delivered </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-info-light">

                        <i class="text-primary material-icons md-monetization_on"></i>

                    </span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Total Sales</h6>
                        <span>Kshs {{$total_sales}} </span>
                        <span class="text-sm"> An addition of all products sold</span>
                    </div>
                </article>
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <header class="card-header">
            <h4 class="card-title">Latest orders</h4>
           
        </header>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                            <th scope="col" class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            
                            <td>{{$order->id}}</td>
                            <td><b>{{$order->user->name}}</b></td>
                            <td>{{$order->user->email}}</td>
                            <td>Kshs {{$order->total}}</td>
                            <td><span class="badge rounded-pill alert-warning">{{$order->status}}</span></td>
                            <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)
                                ->format('m/d/Y H:i:s');}}</td>
                            <td class="text-end">
                                <a href="{{route('order-detail',$order->id)}}" class="btn btn-md rounded font-sm">Detail</a>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</section>

@yield('footer')