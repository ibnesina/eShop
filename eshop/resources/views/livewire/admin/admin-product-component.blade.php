<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }

        @media (max-width:477px) {
            .vis-mob {
                display: none;
            }
        }
    </style>

    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                All Products
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <a href="{{route('admin.addproduct')}}" class="btn btn-primary pull-right">Add New</a>
                            </div>
                            <div class="col-md-4 vis-mob">
                                <input type="text" class="form-control" placeholder="Search..." wire:model="searchTerm"/>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price ($)</th>
                                    <th>Sale Price ($)</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td><img src="{{asset('asset/product_image')}}/{{$product->image}}" width="60" alt="{{$product->name}}"></td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->stock_status}}</td>
                                        <td>{{$product->regular_price}}</td>
                                        <td>{{$product->sale_price}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.editproduct', ['product_slug'=>$product->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                            <a href="#" onclick="confirm('Are you sure, you want to delete this product?')||event.stopImmediatePropagation()" style="margin-left: 10px;" wire:click.prevent="deleteProduct({{$product->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>