
<x-layout title="Category Information"><!-- I will pass data to the layout compoent using prop/ properties -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 a_tbdr">
                    <h1 class="m-0">Show Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 a_tbdr text-right">
                    <a href="{{route('products.index')}}" class="btn btn-primary">Product list</a>
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
                            <h3 class="card-title">Product Show</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">{{$product->product_name}}</li>
                                <li class="list-group-item">{{$product->product_desc}}</li>
                                <li class="list-group-item">{{$product->brand->brand_name}}</li>
                                <li class="list-group-item"><strong>MRP</strong> - {{$product->mrp}}</li>
                                <li class="list-group-item"><strong>Sell price</strong> -{{$product->sell_price}}</li>
                                <li class="list-group-item"><strong>Available Quantity</strong> -{{$product->qty_available}}</li>
                                <li class="list-group-item"><img src="{{$product->prod_thumbnail_img}}" /></li>
                            </ul>
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