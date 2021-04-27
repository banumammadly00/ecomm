<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductsValidationRequest;


class ProductsController extends Controller
{

    public function index()
    {
        return view('admin.products.index');
    }


    public function create()
    {
        return view('admin.products.create');
    }


    public function store(ProductsValidationRequest $request)
    {
        //-------------------Image Store----------------
        $request->images ?  $this->file_upload($request) : '' ;
        $file_names= array();
        if($request->hasFile('images')) {
         foreach ($request->images as $key => $image){
           $filename = time(). ".". $image->getClientOriginalName() ;
           array_push( $file_names, $filename )  ;
         }
         $images = implode(", " , $file_names);
        }
         //---------------------------------------------------------

        Products::create([
            'name'             => $request->name,
            'sku_number'       => $request->sku_number,
            'amount'           => $request->amount,
            'discount_amount'  => $request->discount_amount,
            'count'            => $request->count,
            'main_image'       => $request->main_image,
            'images'           => $images
        ]);

       return  redirect('admin/products')->with('success', 'Product was created successfully');

    }

    public function show($id)
    {
        //
    }

    public function edit(Products $product)
    {
        return view('admin.products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public  function  file_upload(ProductsValidationRequest $request){

        if($request->hasFile('images')) {

            foreach($request->images as $image){

                $filename = time(). ".". $image->getClientOriginalName() ;
                $image->storeAs('images', $filename, 'public');
            }
      }
    }

    public  function updatestatus(Products $product){

        $product->update([ 'status' => $product->status == 1 ? 0 : 1 ]) ;
        return redirect()->back();

    }
}
