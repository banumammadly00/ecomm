<?php

namespace App\Http\View\Composers;

//use App\Repositories\UserRepository;
use App\Models\Categories;
use Illuminate\View\View;

class CategoryComposer
{

    public function __construct()
    {

    }


    public function compose(View $view)
    {
        $view ->with('categories', Categories::orderBy('id' , 'desc')->paginate(12));
    }
}
