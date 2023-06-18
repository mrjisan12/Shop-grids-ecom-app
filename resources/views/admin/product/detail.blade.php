@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Product Detail Information</h4>
                    <h4 class="text-success text-center">{{session('message')}}</h4>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <tr>
                                        <th>Product Id</th>
                                        <th>{{$product->id}}</th>
                                    </tr>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>{{$product->name}}</th>
                                    </tr>
                                    <tr>
                                        <th>Product Code</th>
                                        <th>{{$product->code}}</th>
                                    </tr>
                                    <tr>
                                        <th>Product Slug</th>
                                        <th>{{$product->slug}}</th>
                                    </tr>
                                    <tr>
                                        <th>Product Category</th>
                                        <th>{{$product->category->name}}</th>
                                    </tr>
                                    <tr>
                                        <th>Product Sub Category</th>
                                        <th>{{$product->subCategory->name}}</th>
                                    </tr>
                                    <tr>
                                        <th>Product Brand</th>
                                        <th>{{$product->brand->name}}</th>
                                    </tr>
                                    <tr>
                                        <th>Product Unit</th>
                                        <th>{{$product->unit->name}}</th>
                                    </tr>
                                    <tr>
                                        <th>Regular Price</th>
                                        <th>{{$product->regular_price}}$</th>
                                    </tr>
                                    <tr>
                                        <th>Selling Price</th>
                                        <th>{{$product->selling_price}}$</th>
                                    </tr>
                                    <tr>
                                        <th>Stock Amount</th>
                                        <th>{{$product->stock_amount}}</th>
                                    </tr>
                                    <tr>
                                        <th>Short Decription</th>
                                        <th>{{$product->short_description}}</th>
                                    </tr>
                                    <tr>
                                        <th>Long Description</th>
                                        <th>{{$product->long_description}}</th>
                                    </tr>
                                    <tr>
                                        <th>Feature Image</th>
                                        <th><img src="{{asset($product->image)}}" alt="" height="100" width="130"></th>
                                    </tr>
                                    <tr>
                                        <th>Other Image</th>
                                        <th>12234</th>
                                    </tr>
                                    <tr>
                                        <th>Hit Count</th>
                                        <th>12234</th>
                                    </tr>
                                    <tr>
                                        <th>Product Id</th>
                                        <th>12234</th>
                                    </tr>
                                    <tr>
                                        <th>Sales Count</th>
                                        <th>12234</th>
                                    </tr>
                                    <tr>
                                        <th>Featured Status</th>
                                        <th>12234</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
            </div>
        </div>
    </div>


@endsection
