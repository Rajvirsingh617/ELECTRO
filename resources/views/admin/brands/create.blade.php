<x-layout>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Brand Form</h1>
                </div>
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
                            <h3 class="card-title">New Brand</h3>
                        </div>
                        <form method="POST" action="{{ route('brands.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="brand_name">Brand Name</label>
                                    <input name="brand_name" value="{{ old('brand_name') }}" type="text" class="form-control" id="brand_name" placeholder="Enter Brand Name">
                                </div>
                                @error('brand_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="brand_logo">Logo (w=120, h=80)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="brand_logo" type="file" class="custom-file-input" id="brand_logo" onchange="previewImage(this)">
                                            <label class="custom-file-label" for="brand_logo">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <img id="logo_preview" src="#" alt="Logo Preview" style="display: none; margin-top: 10px; max-width: 120px; max-height: 80px;">
                                </div>
                                @error('brand_logo')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="seo_meta_title">SEO - Meta Title</label>
                                    <input name="seo_meta_title" value="{{ old('seo_meta_title') }}" type="text" class="form-control" id="seo_meta_title" placeholder="SEO - Meta Title">
                                </div>
                                @error('seo_meta_title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="seo_meta_desc">SEO - Meta Description</label>
                                    <textarea name="seo_meta_desc" class="form-control" id="seo_meta_desc" rows="5" cols="">{{ old('seo_meta_desc') }}</textarea>
                                </div>
                                @error('seo_meta_desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Brand</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('logo_preview');
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
