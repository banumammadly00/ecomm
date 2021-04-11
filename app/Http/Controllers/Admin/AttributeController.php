<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attributes;
use App\Http\Requests\AttributeValidationRequest;

class AttributeController extends Controller
{

    public function index()
    {
        return view('admin.attributes.index');
    }


    public function create()
    {
        return view('admin.attributes.create');
    }

    public function store(AttributeValidationRequest $request)
    {
        Attributes::create([
            'name'           => $request->name,
            'slug'           => $request->slug,
            'values'         => $request->values,
            'attribute_type' => $request->attribute_type
        ]);

        return  redirect('admin/attributes')->with('success', 'Attribute was created successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit(Attributes $attribute)
    {
        return view('admin.attributes.edit ', [ 'attribute' => $attribute ]);
    }


    public function update(AttributeValidationRequest $request, Attributes $attribute)
    {
        $attribute->update([
            'name'           => $request->name,
            'slug'           => $request->slug,
            'values'         => $request->values,
            'attribute_type' => $request->attribute_type
        ]);

       return  redirect('admin/attributes')->with('success', 'Attribute was updated successfully');
    }

    public function destroy(Attributes $attribute)
    {
        $attribute->delete();
        return redirect()->back()->with('success', 'Attribute was deleted successfully');
    }

    public  function updatestatus(Attributes $attribute){

        $attribute->update([ 'status' => $attribute->status == 1 ? 0 : 1 ]) ;
        return redirect()->back();

    }
}
