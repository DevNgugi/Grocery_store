@include('components.navbar')
@include('components.footer')

@yield('navbar')
<div class="container">
    <section class="content-main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Orders
                </div>
            </div>
        </div>
        <div class="content-header">
            <div>
                <h4  class="mt-20 mb-20 content-title card-title">Order List</h4>
            </div>
            
        </div>
        <div class="card mb-4">
            <header class="card-header">
                {{-- <div class="row gx-3">
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
                </div> --}}
            </header>
            <!-- card-header end// -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#ID</th>
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
                                <td>{{$order->total}}</td>
                                <td><span class="badge rounded-pill alert-warning">{{$order->status}}</span></td>
                                <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)
                                    ->format('m/d/Y H:i:s');}}</td>
                                <td class="text-end">
                                    <a href="{{route('invoice' ,$order->id)}} " class="btn btn-sm rounded font-sm">Details</a>
                                    
                                    <!-- dropdown //end -->
                                </td>
                            </tr>
                            @endforeach
                            
                           
                        
                        </tbody>
                    </table>
                </div>
                <!-- table-responsive //end -->
            </div>
            <!-- card-body end// -->
        </div>
        <!-- card end// -->

    </section>
</div>
@yield('footer')


@if (session('success'))
<script>
    toastr["success"](" {{ session('success') }}");
</script>
@endif
@if (session('error'))
<script>
    toastr["error"](" {{ session('error') }}");
</script>
@endif
