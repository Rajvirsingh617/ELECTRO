<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;

// class ChildClass extends ParentClass {}
// Single inheritance
// This is an example of a single inheritance
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the category for db
        //1. Querybuilder
        //2. Eloquent ORM (object returned mapper)
                  // ClassName::method
        $categories = Category::all();
        // dd($categories);
            
        // Then pass the category to view

        //return is the last statement for every function
        return view('admin.category.index', ['categories' =>$categories]);    //admin/category/index.blade.php
        // return 'index';//
    }

    /**
     * Show the form for creating a new resource.
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.category.create');//admin/category/create.blade
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
                            'category_name'=>'required|unique:categories',
                            'description'=>'',
                            'cat_image' => 'mimes:jpg,jpeg,png|max:2084',// 2048kb = 2mb
                          ]); //PHP Associative Array
      
        
        // dd($request->file('cat_image'));
        $file = $request->file('cat_image');
        $dst='';                  
        if($file){
            $path = $file->store('public/cat_images');
            //The file is comming
            // Extract the filename from the path
            $filename = basename($path);
            $dst='/storage/cat_images/'.$filename;

        $data = $request->only('category_name','description');
        // ClassName::method();
        $data['picture']=$dst;

        Category::create($data);

        return back()->with('success', 'category created successfully');
        return redirect('/admin/category/create');
        //dd($request->all());

        //I want to store incomming data to categories table

        //1. QueryBUilder
        //2 Eleqoent ORM (Best Way) // 
        // Model file
        return 'store';
     }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
           //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //Brand::
        // $dst='/storage/brand_images/'.$filename;
        //$brand->brand_logo contain the url
        // Get the filename from the brand's logo URL
        $filename = basename($category->picture);

        // Define the storage path for the logo
        $storagePath = 'public/cat_images/' . $filename;
        //dd($storagePath);

        // Check if the file exists and delete it
        if (Storage::exists($storagePath)) {
            Storage::delete($storagePath);
        }
        $category->delete();

        return back();
    }
}
