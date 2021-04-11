@extends('layouts.admin.admin')

@section('content')
    <div class="content">
        <div  class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.attributes.create')}}" type="submit" class="btn btn-info pull-right">+ New attribute</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-info">
                            <h4 class="card-title ">List attributes</h4>
                        </div>
                    //--------------Success messages------------
                      @include('admin.messages.success')

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>  ID             </th>
                                        <th>  Name           </th>
                                        <th>  Slug           </th>
                                        <th>  Attribute type </th>
                                        <th>  Status         </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($attributes as $attribute)
                                            <tr>
                                            <td> {{ $attribute->id }}             </td>
                                            <td> {{ $attribute->name }}           </td>
                                            <td> {{ $attribute->slug }}           </td>
                                            <td> {{ $attribute->attribute_type }} </td>
                                            <td>
                                               <div class="form-check">
                                                    <label class="form-check-label">
                                                        <a href="{{ route('admin.attribute.status' , $attribute->id) }}">
                                                          <input type="submit" name="status" style="display: none" >
                                                          <input class="form-check-input" type="checkbox" {{ $attribute->status==1 ? 'checked' : ''}} >
                                                          <span class="form-check-sign">   <span class="check"></span></span>
                                                        </a>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="td-actions text-right">
                                                <a type="button" href="{{route('admin.attributes.edit', $attribute->id)}}" rel="tooltip" title="Edit Task" class="btn btn-white btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            <form action="{{route('admin.attributes.destroy', $attribute->id)}}" method="post" enctype="multipart/form-data">
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
