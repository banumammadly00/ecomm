<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::where('status' , '1')->orderBy('id' , 'desc')->paginate(12);

        return view('admin.categories.index', [
                    'categories' => $categories ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
       Categories::create([
           'name' => $request->name,
           'url'  => $request->url
       ]);

       return  redirect('admin/categories');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
