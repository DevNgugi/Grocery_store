@include('admin.components.admin-navbar')
@include('admin.components.admin-footer')
@yield('navbar')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Order List</h2>
            <p>Lorem ipsum dolor sit amet.</p>
        </div>
        <div>
            <input type="text" placeholder="Search order ID" class="form-control bg-white">
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Search..." class="form-control">
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                        <option>Show all</option>
                    </select>
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Show 20</option>
                        <option>Show 30</option>
                        <option>Show 40</option>
                    </select>
                </div>
            </div>
        </header>
        <!-- card-header end// -->
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