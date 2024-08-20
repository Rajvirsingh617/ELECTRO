<x-layout title="Add New Product">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 a_tbdr">
                    <h1 class="m-0">Add New Product</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Product Information</h3>
                        </div>
                        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input required type="text" name="product_name" class="form-control" id="product_name" placeholder="">
                                </div>
                                @error('product_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="product_desc">Product Description</label>
                                    <textarea required name="product_desc" class="form-control" id="product_desc" placeholder=""></textarea>
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
                                                    <option value="{{ $unit->id }}"> {{ $unit->unit_name }}</option>
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
                                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
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
                                                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
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
                                            <input id="mrp" required name="mrp" type="number" class="form-control" min="1" max="999999"/>
                                        </div>
                                        @error('mrp')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="sell_price">Sell Price</label>
                                            <input id="sell_price" required name="sell_price" type="number" class="form-control" min="1" max="999999"/>
                                        </div>
                                        @error('sell_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="qty_available">Available Quantity</label>
                                            <input id="qty_available" required name="qty_available" type="number" class="form-control" min="1" max="999999"/>
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
                                            <input type="file" required name="prod_thumbnail_img" class="custom-file-input" id="prod_thumbnail_img" onchange="previewImage('thumbnail_preview', this)">
                                            <label class="custom-file-label" for="prod_thumbnail_img">Choose file</label>
                                        </div>
                                    </div>
                                    <img id="thumbnail_preview" src="#" alt="Thumbnail Preview" style="display: none; margin-top: 10px; max-width: 80px;">
                                </div>
                                @error('prod_thumbnail_img')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="prod_main_img">Product Main Image (720 × 660)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" required name="prod_main_img" class="custom-file-input" id="prod_main_img" onchange="previewImage('main_preview', this)">
                                            <label class="custom-file-label" for="prod_main_img">Choose file</label>
                                        </div>
                                    </div>
                                    <img id="main_preview" src="#" alt="Main Image Preview" style="display: none; margin-top: 10px; max-width: 80px;">
                                </div>
                                @error('prod_main_img')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
