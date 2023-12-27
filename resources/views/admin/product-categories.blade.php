@include('admin.components.admin-navbar')
@include('admin.components.admin-footer')
@yield('navbar')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Categories</h2>
            <p>Add, edit or delete a category</p>
        </div>
        
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{route('addcategory')}}" method="POST"  >
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="mb-4">
                            <label for="product_name" class="form-label">Title</label>
                            <input name="title"  type="text" placeholder="Type here" class="form-control" id="title">
                        </div>
                       
                       
                        <div class="mb-4">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="description" placeholder="Type here" class="form-control"></textarea>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">Create/Update category</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    
                                <tr class="cursor-pointer" onclick="edit({{$category->id}})">
                                    
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->title}}</td>
                                    <td>{{$category->description}}</td>
                                    <td class="text-end">
                                        <form method="POST" action="{{route('deletecategory')}}">
                                            @csrf
                                            <input name="id" type="hidden" value="{{$category->id}}">
                                           
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        
                                        </form>
                                        
                                    </td>
                                @endforeach

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- .col// -->
            </div>
            <!-- .row // -->
        </div>
        <!-- card body .// -->
    </div>
    <!-- card .// -->
</section>
@yield('footer')
@if (session('status'))
<script>
    toastr["success"](" {{ session('status') }}");
</script>
@endif
@if (session('deleted'))
<script>
    toastr["success"](" {{ session('deleted') }}");
</script>
@endif

<script>
   function edit(id){
    $.ajax({
        url: "{{route('getcategory')}}",
        type: "POST",
        data: {
            id: id,
            _token: "{{ csrf_token() }}",
        },
        success: function (response) {
            $('#id').val(response[0].id);
            $('#title').val(response[0].title);
            $('#description').val(response[0].description);
        },
        error: function (response) {
            console.log(response);
        },
    });

    
   }

  
</script>