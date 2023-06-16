@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">All Sub-category Information</h4>
                    <h4 class="text-success text-center">{{session('message')}}</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>SL No</th>
                                                <th>Category Name</th>
                                                <th>Sub Category Name</th>
                                                <th>Description</th>
                                                <th>Images</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($sub_categories as $sub_category)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$sub_category->category->name}}</td>
                                                <td>{{$sub_category->name}}</td>
                                                <td>{{$sub_category->description}}</td>
                                                <td><img src="{{asset($sub_category->image)}}" alt="" height="50" width="90"></td>
                                                <td>{{$sub_category->status}}</td>
                                                <td>
                                                    <a href="{{route('sub-category.edit',  ['id' => $sub_category->id])}}" class="btn btn-success btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{route('sub-category.delete',  ['id' => $sub_category->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure to Delete This?');">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                </div>
            </div>
        </div>
    </div>


@endsection
