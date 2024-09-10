<x-layout title="Category Information">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Categories</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('category.create') }}" class="btn btn-primary">Add New Category</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Category Name</th>
                                        <th>Description</th>
                                        <th>Picture</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->category_id }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td>
                                                @if(isset($category->picture) && !empty($category->picture))
                                                    <img width="100" src="{{ asset(ltrim($category->picture, '/')) }}" alt="{{ $category->category_name }}">
                                                @else
                                                    &#45; <!-- Display a dash if no image exists -->
                                                @endif
                                            </td>
                                            
                                            <td>
                                                <a href="#" class="btn btn-outline-info rounded-circle">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <form method="POST" action="{{ route('category.destroy', ['category' => $category->category_id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger rounded-circle" onclick="return confirm('Do you really want to delete?')">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
