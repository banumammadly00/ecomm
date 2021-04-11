@extends('layouts.admin.admin')

@section('content')
    <div class="content">
        <div  class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.attributes.index') }}" type="submit" class="btn btn-info pull-right">List attributes</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">Add new attribute</h4>
                        </div>
                     //--------------Errors------------
                        @include('admin.messages.errors')

                        <div class="card-body">
                            <form action="{{route('admin.attributes.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Attribute name</label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name')}} " >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Attribute slug</label>
                                            <input type="text" name="slug" class="form-control" value="{{ old('slug')}} " >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Attribute type</label>
                                            <input type="text" name="attribute_type" class="form-control" value="{{ old('attribute_type')}} " >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Attribute values</label>
                                            <input type="text" name="values" class="form-control" value="{{ old('values')}} " >
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info pull-right">Create</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
