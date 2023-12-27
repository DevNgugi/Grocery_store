@include('admin.components.admin-navbar')
@include('admin.components.admin-footer')
@yield('navbar')

<section class="content-main">
    <form enctype="multipart/form-data" action="{{route('newproduct')}}" method="POST">
   @csrf
   
        <div class="row">
        <div class="col-9">
            <div class="content-header">
                <h2 class="content-title">Add New Product</h2>
                <div>
                    <button type="submit" class="btn btn-md rounded font-sm hover-up">Publish</button>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-4">
                        <label for="product_title" class="form-label">Product title</label>
                        <input type="text" name="title" placeholder="Type here" class="form-control" id="product_title">
                    </div>
                    
                
                </div>
            </div>
            <!-- card end// -->
            <div class="card mb-4">
                <div class="card-body">
                    <div>
                        <label class="form-label">Description</label>
                        <textarea name="description" placeholder="Type here" class="form-control" rows="4"></textarea>
                    </div>
                </div>
            </div>
            <!-- card end// -->
            <div class="card mb-4">
                <div class="card-body">
                    <div>
                        <label class="form-label">Images</label>
                        <input name="url" class="form-control" type="file">
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div>
                        <label class="form-label">Categories</label>
                        <select style="width: 100%; border:2px solid #f4f5f9" class="js-example-basic-multiple " name="categories[]" multiple="multiple">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                                
                            @endforeach
                          </select>
                    </div>
                </div>
            </div>
            <!-- card end// -->
        </div>
        <div class="col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-4">
                        <label class="form-label">Price</label>
                        <input name="price" type="text" placeholder="Type here" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="1">In stock</option>
                            <option value="0">Out of Stock</option>
                        </select>
                    </div>
                
                   
                </div>
            </div>
            <!-- card end// -->
        </div>
    </div>
</form>
</section>

@yield('footer')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@if (session('product_added'))
<script>
    toastr["success"](" {{ session('product_added') }}");
</script>
@endif
@if (session('product_not_added'))
<script>
    toastr["error"](" {{ session('product_not_added') }}");
</script>
@endif