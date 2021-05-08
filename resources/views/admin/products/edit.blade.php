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
                            <h4 class="card-title"> <a href="{{ route('admin.products.create')}}" type="submit" >Add new product </a></h4>
                        </div>
                     {{-- --------------Errors------------ --}}
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
                                            <label class="bmd-label-floating">Price </label>
                                            <input type="text" name="price" class="form-control" value="{{ $product->price }} " >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Discount Price</label>
                                            <input type="text" name="discount_price" class="form-control" value="{{ $product->discount_price}} " >
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
                                                    {{-- __________________Existing Images________________ --}}
                                                    <input type="hidden" name="deleted_images" style="display:none" value="">
                                                    <ul class="thumb-Images" id="imgList">
                                                    @foreach($images as $image)
                                                    <li name="li">
                                                     <div class="img-wrap" > <span class="close" id="close_image">&times;</span>
                                                     <div class="form-check" style="margin-top: -28px;">
                                                     <label class="form-check-label">
                                                     <input class="form-check-input" type="checkbox" name="main_image" id="check" {{ $image->main == 1 ? 'checked' : '' }} value="{{ $image->name}}">
                                                     <span class="form-check-sign" style="left: 44px; top: 45px;">
                                                     <span class="check" style="border-color: #ddd; border-radius: 15px; background: #dddddd78;"></span></span></label> </div>
                                                     <img class="thumb" src="{{ asset('storage/images/products/'.$month.'/'. $image->name)}}" data-id="{{$image->name}}">
                                                    </div>
                                                    </li>
                                                    @endforeach
                                                 </ul>
                                                 <output id="Filelist"></output>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info pull-right">Edit Product</button>
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
