@extends('layouts.admin.admin')

@section('content')
    <div class="content">
        <div  class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.categories.index') }}" type="submit" class="btn btn-info pull-right">List categories</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">Add new category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Category name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Category url</label>
                                            <input type="text" name="url" class="form-control">
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
