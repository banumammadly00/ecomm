@extends('layouts.admin.admin')

@section('content')
    <div class="content">
        <div  class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.products.create')}}" type="submit" class="btn btn-info pull-right">+ New product </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-info">
                            <h4 class="card-title ">List productss</h4>
                        </div>
                    //--------------Success messages------------
                      @include('admin.messages.success')

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>  ID            </th>
                                        <th>  Name          </th>
                                        <th>  SKU Number    </th>
                                        <th>  Amount        </th>
                                        <th>  Count         </th>
                                        <th>  Status        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                            <td> {{ $product->id }}            </td>
                                            <td> {{ $product->name }}          </td>
                                            <td> {{ $product->sku_number }}    </td>
                                            <td> {{ $product->amount }}        </td>
                                            <td> {{ $product->count }}         </td>
                                            <td>
                                               <div class="form-check">
                                                    <label class="form-check-label">
                                                        <a href="{{ route('admin.products.status' , $product->id) }}">
                                                          <input type="submit" name="status" style="display: none" >
                                                          <input class="form-check-input" type="checkbox" {{ $product->status==1 ? 'checked' : ''}} >
                                                          <span class="form-check-sign">   <span class="check"></span></span>
                                                        </a>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="td-actions text-right">
                                                <a type="button" href="{{ route('admin.products.edit', $product->id) }}" rel="tooltip" title="Edit Task" class="btn btn-white btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" rel="tooltip" title="Remove" class="btn btn-white btn-link btn-sm">
                                                    <i class="material-icons">close</i>
                                                </button>
                                              </form>
                                            </td>
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
