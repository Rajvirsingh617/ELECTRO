    
<x-layout title="Category Information"><!-- I will pass data to the layout compoent using prop/ properties -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 a_tbdr">
                    <h1 class="m-0">All Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 a_tbdr text-right">
                    <a href="{{route('products.create')}}" class="btn btn-primary">Add New Product</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- <pre>
                                {{-- {{var_dump($products)}} --}}
                            </pre> -->
                            
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Product Name</th>
                                        <th>Description</th>
                                        <th>Brand</th>  
                                        <th>CategoryName</th>
                                        <th>Product Thumbnail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{$product->product_id}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{$product->product_desc}}</td>
                                            <td>{{$product->brand_name}}</td>
                                            <td>{{$product->category_name}}</td>
                                            <td>
                                                <img src="{{$product->prod_thumbnail_img}}" />
                                            </td>
                                            <td>
                                                <a href="/admin/products/{{$product->product_id}}" class="btn btn-outline-info rounded-circle btn-sm">
                                                    <i class="fa-regular fa-eye"></i>   
                                                </a>
                                                <a href="#" class="btn btn-outline-info rounded-circle btn-sm">
                                                    <i class="fa-regular fa-pen-to-square"></i>   
                                                </a>
                                                <form method="POST" action="#">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-outline-danger rounded-circle btn-sm" onclick="return confirm('Do you really want to delete?')">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td> 
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>    
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</x-layout>