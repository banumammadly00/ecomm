<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'gallery';


    protected $fillable = [
        'name', 'main', 'product_id'
    ];

    public function gallery_upload($images, $main_image, $product_id)
    {

        foreach ($images as $image) {
            $filename = time() . "-" . $image->getClientOriginalName();

            #File Upload--------------
            $this->file_upload($image, $filename);

            Gallery::create([
                'name'        =>  $filename,
                'main'        =>  $main_image == $image->getClientOriginalName() ? 1 : 0,
                'product_id'  =>  $product_id
            ]);
        }
    }

    public function gallery_delete($images, $main_image, $product_id, $month)
    {

        $deleted_images = explode(",", ($images));
        foreach ($deleted_images as $image) {

            Gallery::where(['name' => $main_image])->update(['main' => 1]);
            Gallery::where(['product_id' => $product_id, 'name' => $image])->delete();


            #Delete Folder-----------------
            $this->file_delete($image, $month);
        }
    }

    public function main_image_update($id, $main_image)
    {
        Gallery::where(['product_id' => $id, 'main' => 1])->update(['main' =>  0]);
        Gallery::where('name', $main_image)->update(['main' => 1]);
    }


    public  function file_upload($images, $filename)
    {
        $file_path = 'images/products/'.date('M');
        $images->storeAs($file_path, $filename, 'public');
    }

    public function file_delete($images, $month)
    {
        $file_path = 'public/images/products/'.date("M", strtotime($month));
        Storage::delete($file_path. '/' . $images);
    }
}
