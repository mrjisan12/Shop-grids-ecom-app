@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add Product Information</h4>
                    <h4 class="text-success text-center">{{session('message')}}</h4>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Regular Price</th>
                                        <th>Selling Price</th>
                                        <th>Images</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->code}}</td>
                                            <td><b>{{$product->regular_price}}$</b></td>
                                            <td><b>{{$product->selling_price}}$</b></td>
                                            <td><img src="{{asset($product->image)}}" alt="" height="50" width="70"></td>
                                            <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                            <td class="text-center">
                                                <a href="{{route('product.detail', ['id' => $product->id])}}" class="btn btn-info btn-lg" title="View Detail">
                                                    <i class="fa fa-book-open"></i>
                                                </a>
                                                <a href="{{route('product.edit', ['id' => $product->id])}}" class="btn btn-success btn-lg" title="Edit Product">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{route('product.delete', ['id' => $product->id])}}" class="btn btn-danger btn-lg" title="Delete Product" onclick="return confirm('Are You Sure to Delete This?');">
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


@endsection
