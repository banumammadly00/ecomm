<?php

namespace App\Http\View\Composers;

//use App\Repositories\UserRepository;
use App\Models\Products;
use Illuminate\View\View;

class ProductsComposer
{

    public function __construct()
    {

    }


    public function compose(View $view)
    {
        $view ->with('products', Products::orderBy('id' , 'desc')->paginate(12));
    }
}
