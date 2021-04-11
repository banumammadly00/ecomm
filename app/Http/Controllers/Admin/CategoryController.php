<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Http\Requests\CategoryValidationRequest;

class CategoryController extends Controller
{

    public function index()
    {
         return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(CategoryValidationRequest $request)
    {
       Categories::create([
           'name' => $request->name,
           'slug'  => $request->slug
       ]);

       return  redirect('admin/categories')->with('success', 'Category was created successfully');
    }

    public function show($id)
    {
        //
    }


    public function edit(Categories $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }


    public function update(CategoryValidationRequest $request, Categories $category)
    {
        $category->update([
            'name' => $request->name,
            'slug'  => $request->slug
        ]);

       return  redirect('admin/categories')->with('success', 'Category was updated successfully');
    }


    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect()->back()->with('success', 'Category was deleted successfully');
    }

    public  function updatestatus(Categories $category){

        $category->update([ 'status' => $category->status == 1 ? 0 : 1 ]) ;
        return redirect()->back();

    }
}
