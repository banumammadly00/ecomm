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
                     {{-- --------------Errors------------ --}}
                        @include('admin.messages.errors')

                        <div class="card-body">
                            <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data" id="img-upload-form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Product name</label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name')}} " >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">SKU Number</label>
                                            <input type="text" name="sku_number" class="form-control" value="{{ old('sku_number')}} " >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Price </label>
                                            <input type="text" name="price" class="form-control" value="{{ old('price')}} " >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Discount Price</label>
                                            <input type="text" name="discount_price" class="form-control" value="{{ old('discount_price')}} " >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Count</label>
                                            <input type="text" name="count" class="form-control" value="{{ old('count')}} " >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group bmd-form-group">
                                        <label class="form-control" for="files" style="cursor: pointer;">Upload Image <i class="fa fa-image icon-image"></i></label>
                                        <input type="file" name="images[]" id="files" multiple accept="image/*">
                                        <output class="output-background " id="Filelist"></output>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info pull-right">+Add new product</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
