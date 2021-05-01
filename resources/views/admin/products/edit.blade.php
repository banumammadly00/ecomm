@extends('layouts.admin.admin')

@section('content')
    <div class="content">
        <div  class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.products.index') }}" type="submit" class="btn btn-info pull-right">List products</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">Add new product</h4>
                        </div>
                     //--------------Errors------------
                        @include('admin.messages.errors')

                        <div class="card-body">
                            <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data" id="img-upload-form">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Product name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $product->name }}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">SKU Number</label>
                                            <input type="text" name="sku_number" class="form-control" value="{{ $product->sku_number }} " >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Amount </label>
                                            <input type="text" name="amount" class="form-control" value="{{ $product->amount }} " >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Discount Amount</label>
                                            <input type="text" name="discount_amount" class="form-control" value="{{ $product->discount_amount }} " >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Count</label>
                                            <input type="text" name="count" class="form-control" value="{{ $product->count }}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group bmd-form-group">
                                          <label class="form-control" for="files" style="cursor: pointer;">Upload Image <i class="fa fa-image icon-image"></i></label>
                                            <input type="file" name="images[]" id="files" multiple accept="image/*">
                                              <div class="output-background">
                                                <div id="existing-images">
                                                    <input type="hidden" id="existingImages" name="image_list" value="{{ $product->main_image }},{{ $product->images }}">
                                                </div>
                                                 <output id="Filelist-list"></output>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info pull-right">Edit</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <script src="{{ asset('admin/js/file-upload-edit.js') }}"></script> --}}
    </div>
@endsection
