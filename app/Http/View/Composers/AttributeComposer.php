<?php

namespace App\Http\View\Composers;

//use App\Repositories\UserRepository;
use App\Models\Attributes;
use Illuminate\View\View;

class AttributeComposer
{

    public function __construct()
    {

    }


    public function compose(View $view)
    {
        $view ->with('attributes', Attributes::orderBy('id' , 'desc')->paginate(12));
    }
}
