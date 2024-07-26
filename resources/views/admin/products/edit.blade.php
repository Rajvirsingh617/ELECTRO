<x-layout title=""><!-- I will pass data to the layout compoent using prop/ properties -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 a_tbdr">
                    <h1 class="m-0">Edit Product</h1>
                </div>
                <!-- <div class="col-sm-6 a_tbdr text-right">
                    <a href="{{route('category.create')}}" class="btn btn-primary">Add New Category</a>
                </div> -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                     @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Product Information</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input required type="text" name="product_name" value="{{old('product_name',$product->product_name)}}" class="form-control" id="product_name" placeholder="">
                                </div>
                                @error('product_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="product_desc">Product Description</label>
                                    <textarea required name="product_desc" class="form-control" id="product_desc" placeholder="">{{old('product_desc',$product->product_desc)}}</textarea>
                                </div>
                                @error('product_desc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="unit_id">Unit</label>
                                            <select required name="unit_id" id="unit_id" class="select2" style="width: 100%;">
                                                @foreach($units as $unit)
                                                    <option value="{{$unit->id}}" {{ ($product->unit_id==$unit->id)?'selected':''}} >{{$unit->unit_name}}</option>
                                                @endforeach
                                            </select>
                                        </div> 
                                        @error('unit_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Brand</label>
                                            
                                            <select required name="brand_id" class="select2" style="width: 100%;">
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}" {{ ($product->brand_id==$brand->id)?'selected':''}} >{{$brand->brand_name}}</option>
                                                @endforeach
                                            </select>
                                        </div> 
                                        @error('brand_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select required name="category_id" class="select2" style="width: 100%;">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->category_id}}" {{ ($product->category_id==$category->category_id)?'selected':''}} >{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="mrp">MRP</label>
                                            <input id="mrp" required name="mrp" value="{{old('mrp',$product->mrp)}}" type="number" class="form-control" min="0" />
                                        </div>
                                        @error('mrp')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="sell_price">Sell Price</label>
                                            <input id="sell_price" required name="sell_price" value="{{old('sell_price',$product->sell_price)}}" type="number" min="0" class="form-control"/>
                                        </div>
                                        @error('sell_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="qty_available">Available Quantity</label>
                                            <input id="qty_available" required name="qty_available" value="{{old('qty_available',$product->qty_available)}}" type="number" class="form-control" min="1"/>
                                        </div>
                                        @error('qty_available')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="prod_thumbnail_img">Product Thumbnail (212 × 200)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="prod_thumbnail_img" class="custom-file-input" id="prod_thumbnail_img" onchange="previewImage('thumbnail_preview', this)">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <img id="thumbnail_preview" src="{{$product->prod_thumbnail_img}}" />
                                </div>
                                @error('prod_thumbnail_img')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="prod_main_img">Product Main Image (720 × 660)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="prod_main_img" class="custom-file-input" id="prod_main_img" onchange="previewImage('main_preview', this)">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <img id="main_preview" src="{{$product->prod_main_img}}" />
                                </div>
                                @error('prod_main_img')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function previewImage(previewId, input) {
            const preview = document.getElementById(previewId);
            const file = input.files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                preview.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                preview.style.display = 'none';
            }
        }
    </script>
</x-layout>