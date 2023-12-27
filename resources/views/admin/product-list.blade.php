@include('admin.components.admin-navbar')
@include('admin.components.admin-footer')
@yield('navbar')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Products List</h2>
           
        </div>
        <div>
          
            <a href="{{route('add-product')}}" class="btn btn-primary btn-sm rounded">Create new</a>
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            {{-- <div class="row align-items-center">
                <div class="col col-check flex-grow-0">
                    
                </div>
                <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                    <select class="form-select">
                        <option selected="">All category</option>
                        <option>Electronics</option>
                        <option>Clothes</option>
                        <option>Automobile</option>
                    </select>
                </div>
                <div class="col-md-2 col-6">
                    <input type="date" value="02.05.2021" class="form-control">
                </div>
                <div class="col-md-2 col-6">
                    <select class="form-select">
                        <option selected="">Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                        <option>Show all</option>
                    </select>
                </div>
            </div> --}}
        </header>
        <!-- card-header end// -->
        <div class="card-body">
            @foreach ($products as $product)
                
            <article class="itemlist">
                <div class="row align-items-center">
                   
                    <div class="col-lg-2 col-sm-4 col-4 flex-grow-1 col-name">
                        <a class="itemside" href="#">
                            <div class="left">
                                <img src="data:image/png;base64,{{$product->url }}" class="img-sm img-thumbnail" alt="Item">

                                {{-- base64 image --}}
                            </div>
                            <div class="info">
                                <h6 class="mb-0">{{$product->title}}</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-price"><span>Kshs {{$product->price}}</span></div>
                    <div class="col-lg-2 col-sm-2 col-4 col-status">
                        <span class="badge rounded-pill alert-success">Active</span>
                    </div>
                    <div class="col-lg-4 col-sm-2 col-4 col-date">
                        <span>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $product->created_at)->format('m/d/Y H:i:s');}}</span>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-action text-end d-flex gap-2">
                        {{-- <a href="#" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a> --}}
                        <form method="POST" action="{{route('deleteproduct',$product->id)}}">
                            @csrf
                        <button class="btn btn-sm font-sm btn-light rounded"> <i class="material-icons md-delete_forever"></i> Delete </button>
                    </form>
                    
                    </div>
                </div>
                <!-- row .// -->
            </article>
            <!-- itemlist  .// -->
            @endforeach
         
        </div>
        <!-- card-body end// -->
    </div>
    <!-- card end// -->
   
</section>

@yield('footer')

@if (session('deleted'))
<script>
    toastr["success"](" {{ session('deleted') }}");
</script>
@endif
