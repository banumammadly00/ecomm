<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Gallery;
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


    public function store(ProductsValidationRequest $request, Gallery $gallery)
    {

      $product = Products::create([
            'name'             => $request->name,
            'sku_number'       => $request->sku_number,
            'price'            => $request->price,
            'discount_price'   => $request->discount_price,
            'count'            => $request->count
        ]);

        if($request->hasFile('images'))  $gallery->gallery_upload($request->images, $request->main_image, $product->id);

        return  redirect('admin/products')->with('success', 'Product was created successfully');

    }

    public function show($id)
    {
        //
    }

    public function edit(Products $product)
    {
        $images = Gallery::where('product_id', $product->id)->get();

        return view('admin.products.edit', ['product' => $product,
                                            'images'  => $images,
                                            'month'   => date('M', strtotime($product->created_at)) ]);

    }

    public function update(ProductsValidationRequest $request, Products $product, Gallery $gallery)
    {
    #Image Delete_______________________
    $gallery->gallery_delete($request->deleted_images, $request->main_image, $product->id, $product->created_at);

    #Main Image Update____________________
    $gallery->main_image_update($product->id, $request->main_image);

    #New Image Store_______________________
    if($request->hasFile('images')) $gallery->gallery_upload($request->images, $request->main_image, $product->id);

       $product->update([
          'name'             => $request->name,
          'sku_number'       => $request->sku_number,
          'price'            => $request->price,
          'discount_price'   => $request->discount_price,
          'count'            => $request->count,
      ]);

      return  redirect('admin/products')->with('success', 'Product was updated successfully');
    }

    public function destroy(Products $product, Gallery $gallery)
    {
       #Image Delete_________________
       $images = Gallery::where('product_id', $product->id)->get();
       foreach($images as $image){ $gallery->file_delete($image->name, $product->created_at); $image->delete(); }

       $product->delete();
       return redirect()->back()->with('success', 'Product was deleted successfully');
    }


    public  function updatestatus(Products $product){

        $product->update([ 'status' => $product->status == 1 ? 0 : 1 ]) ;
        return redirect()->back();

    }
}
