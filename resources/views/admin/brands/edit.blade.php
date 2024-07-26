<x-layout>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Brand Form</h1>
                </div>
                <!-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div> -->
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"> 
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Brand</h3>
                        </div>
                        <form method="POST" action="{{route('brands.update',['brand'=> $brand->id])}}"enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="brand_name">Brand Name</label>
                                    <input name="brand_name" value="{{old('brand_name', $brand->brand_name)}}" type="text" class="form-control" id="brand_name"
                                        placeholder="Enter Brand Name">
                                </div>
                                @error('brand_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                
                                <div class="form-group">
                                    <label for="exampleInputFile">Logo(w=120 , h=80)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="brand_logo" type="file" class="custom-file-input" id="brand_logo">
                                            <label class="custom-file-label" for="brand_logo">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <img id="preview" src="{{$brand->brand_logo}}" alt="your image" />  
                                </div>
                                @error('brand_logo')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="seo_meta_title">SEO - Meta Title</label>
                                    <input name="seo_meta_title" value="{{old('seo_meta_title', $brand->seo_meta_title)}}" type="text" class="form-control" id="seo_meta_title"
                                        placeholder="SEO - Meta Title">
                                </div>
                                @error('seo_meta_title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="seo_meta_desc">SEO - Meta Description</label>
                                    <textarea name="seo_meta_desc" class="form-control" id="seo_meta_desc" rows="5" cols="">{{old('seo_meta_desc', $brand->seo_meta_desc)}}</textarea>
                                </div>
                                @error('seo_meta_desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Brand</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>