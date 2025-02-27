@include('admin.components.admin-navbar')
@include('admin.components.admin-footer')
@yield('navbar')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Order detail</h2>
            <p>Details for Order ID: {{$invoice->id}}</p>
        </div>
    </div>
    <div class="card">
        <header class="card-header">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 mb-lg-0 mb-15">
                    <span> <i class="material-icons md-calendar_today"></i> <b>{{\Carbon\Carbon::parse($invoice->created_at)->dayName;}} {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $invoice->created_at)
                        ->format('m/d/Y H:i:s');}}</b> </span> <br>
                    <small class="text-muted">Order ID: {{$invoice->id}}</small>
                </div>
                <div class="col-lg-6 col-md-6 ms-auto text-md-end">
                    <form method="POST" action="{{route('update-order',$invoice->id)}}">

                    <select name="status" class="form-select d-inline-block mb-lg-0 mr-5 mw-200">
                        <option>Change status</option>
                        <option>Pending</option>
                        <option>Delivered</option>
          
                    </select>
                        @csrf
                    <button type="submit" class="btn btn-sm btn-primary" >Save</button>
                </form>
                </div>
            </div>
        </header>
        <!-- card-header end// -->
        <div class="card-body">
            <div class="row mb-50 mt-20 order-info-wrap">
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-person"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">Customer</h6>
                            <p class="mb-1">
                                {{$invoice->user->name}} <br>
                                {{$invoice->user->email}} <br>
                                {{$invoice->user->phone}}
                            </p>
                            
                        </div>
                    </article>
                </div>
                <!-- col// -->
                <div class="col-md-4">
                    
                </div>
                <!-- col// -->
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-place"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">Deliver to</h6>
                            <p class="mb-1">
                                {{$invoice->user->address}} <br>{{$invoice->user->town}}<br>
                        
                            </p>
                        
                        </div>
                    </article>
                </div>
                <!-- col// -->
            </div>
            <!-- row // -->
            <div class="row">
                <div class="col-lg-7">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                
                                <tr>
                                    <th width="40%">Product</th>
                                    <th width="20%">Unit Price</th>
                                    <th width="20%">Quantity</th>
                                    <th width="20%" class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (json_decode($invoice->item_names) as $item)
                                <tr>
                                    <td>
                                        <a class="itemside" href="#">
                                            {{-- <div class="left">
                                                <img src="{{asset('assets/imgs/items/1.jpg')}}" width="40" height="40" class="img-xs" alt="Item">
                                            </div> --}}
                                            <div class="info">{{$item}}</div>
                                        </a>
                                    </td>
                                    <td>Kshs {{json_decode($invoice->item_prices)[$loop->index]}}</td>
                                    <td>{{json_decode($invoice->item_quantities)[$loop->index]}}</td>
                                    <td class="text-end">Kshs {{json_decode($invoice->item_totals)[$loop->index]}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- table-responsive// -->
                </div>
                <!-- col// -->
            
                <!-- col// -->
            </div>
        </div>
        <!-- card-body end// -->
    </div>
    <!-- card end// -->
</section>
@yield('footer')

@if (session('success'))
<script>
    toastr["success"](" {{ session('success') }}");
</script>
@endif
@if (session('error'))
<script>
    toastr["success"](" {{ session('error') }}");
</script>
@endif