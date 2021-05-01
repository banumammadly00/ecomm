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
        //______________________Image Store_________________________
        $request->images ?  $this->file_upload($request) : '' ;
        $file_names= array();
        if($request->hasFile('images')) {
         foreach ($request->images as $image){
           $filename = time(). "-" . $image->getClientOriginalName() ;
           if($request->main_image != $image->getClientOriginalName() ) array_push( $file_names, $filename )  ;
         }
         $images = implode("," , $file_names);
        }

        Products::create([
            'name'             => $request->name,
            'sku_number'       => $request->sku_number,
            'amount'           => $request->amount,
            'discount_amount'  => $request->discount_amount,
            'count'            => $request->count,
            'main_image'       => time(). "-" . $request->main_image,
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

    public function update(ProductsValidationRequest $request, Products $product)
    {
        $image_list =explode("," , $product->images);

     //_______________________Image Delete_______________________
        $updated_images = explode("," , ($request->image_list));
        $all_images = $image_list; array_push($all_images, $product->main_image);
        if($all_images != $updated_images) {  $deleted_images = (array_diff($all_images, $updated_images));
                                              $this->delete_file($deleted_images);

                                              $product->main_image = $request->main_image;
                                              array_shift($updated_images);
                                              $image_list = $updated_images; }


     //______________________Main Image Update____________________

       if( in_array($request->main_image, $image_list) ) {
        $filename = strtotime($product->created_at)."-".$request->main_image;
        if($filename != $product->main_image){

          $main_image = $product->main_image;
          array_push( $image_list, $main_image);

          $image_list = array_diff($image_list, array("$request->main_image") );
          $product->main_image = $request->main_image;
      } }


     //____________________New Image Store_______________________
      if($request->hasFile('images')) {
        $this->file_upload($request);
        foreach ($request->images as $image){

        $filename = time(). "-" . $image->getClientOriginalName() ;
        if($request->main_image!= $image->getClientOriginalName() ) {  array_push( $image_list, $filename ); }
        else{
            array_push($image_list, $product->main_image );
            $product->main_image =  $request->main_image ;
          }
        }
      }
       $images = implode("," , $image_list);


             $product->update([
                'name'             => $request->name,
                'sku_number'       => $request->sku_number,
                'amount'           => $request->amount,
                'discount_amount'  => $request->discount_amount,
                'count'            => $request->count,
                'main_image'       => $product->main_image,
                'images'           => $images
             ]);

            return  redirect('admin/products')->with('success', 'Product was updated successfully');

    }

    public function destroy(Products $product)
    {
       //__________________Image Path Delete_________________
        $images = explode("," ,$product->images);
        array_push($images, $product->main_image);
        $this->delete_file($images);

        $product->delete();
        return redirect()->back()->with('success', 'Product was deleted successfully');
    }

    public function delete_file($images){

        foreach($images as $image){ Storage::delete('public/images/'.$image); }
    }


    public  function  file_upload(ProductsValidationRequest $request){

        if($request->hasFile('images')) {
            foreach($request->images as $image){
                $filename = time(). "-". $image->getClientOriginalName() ;
                $image->storeAs('images', $filename, 'public');
            }
      }
    }

    public  function updatestatus(Products $product){

        $product->update([ 'status' => $product->status == 1 ? 0 : 1 ]) ;
        return redirect()->back();

    }
}
