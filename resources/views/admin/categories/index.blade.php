@extends('layouts.admin.admin')

@section('content')
    <div class="content">
        <div  class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.categories.create') }}" type="submit" class="btn btn-info pull-right">New category</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-info">
                            <h4 class="card-title ">List categories</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th> ID</th>
                                        <th> Name </th>
                                        <th>Slug</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                            <td> {{ $category->id }} </td>
                                            <td> {{ $category->name }} </td>
                                            <td> {{ $category->url }} </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
