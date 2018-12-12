@extends('layouts.app')
@extends('layouts.header')

            @section('content')
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createmodal"><i class="fa  fa-plus-square"></i> Create Product</button>
                                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    @if (\Session::has('info'))
                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        {{ \Session::get('info') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Supplier</th>
                                                <th colspan="3">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($products as $product)
                                            @php
                                                $product_supplier  = App\product::find($product['id'])->supplier()->associate(App\Supplier::find($product['supplier_id']));
                                            @endphp
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$product['product_name']}}</td>
                                                <td>{{$product['product_price']}}</td>
                                                <td>{{$product_supplier->supplier['supplier_name']}}</td>
                                                <td><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editmodal{{$product['id']}}"><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletemodal{{$product['id']}}"><i class="fa fa-trash"></i></button>
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewmodal{{$product['id']}}"><i class="fa fa-search"></i></button>
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

            <!-- modal -->
            @foreach($products as $product)
            <div class="modal fade" id="editmodal{{$product['id']}}" tabindex="-1" role="dialog" aria-labelledby="mediummodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediummodalLabel">Edit Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ action('ProductController@update', $product['id']) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="hidden" name="id" value="{{$product['id']}}">
                                    <input type="text" name="product_name" class="form-control" value="{{$product['product_name']}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <input type="text" name="product_price" class="form-control" value="{{$product['product_price']}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-tags"></i>
                                    </div>
                                    <select type="text" name="categorie_id" class="form-control" required>
                                        <option value="">Select Categorie</option>
                                        @foreach($categories as $categorie)
                                        @if($categorie['id'] == $product['categorie_id'])
                                            @php $selected = 'selected'; @endphp
                                        @else
                                            @php $selected = ''; @endphp
                                        @endif
                                        <option value="{{$categorie['id']}}" {{$selected}}>{{$categorie['categorie_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-gear"></i>
                                    </div>
                                    <select type="text" name="supplier_id" class="form-control" required>
                                        <option value="">Select Supplier</option>
                                        @foreach($suppliers as $supplier)
                                        @if($supplier['id'] == $product['supplier_id'])
                                            @php $selected = 'selected'; @endphp
                                        @else
                                            @php $selected = ''; @endphp
                                        @endif
                                        <option value="{{$supplier['id']}}" {{$selected}}>{{$supplier['supplier_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-table"></i>
                                    </div>
                                    <input type="text" name="product_qty" class="form-control" value="{{$product['product_qty']}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-info"></i>
                                    </div>
                                    <textarea type="text" name="product_info" class="form-control" rows="5" required>{{$product['product_info']}}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="deletemodal{{$product['id']}}" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Delete Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ action('ProductController@destroy', $product['id']) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <div class="input-group">
                                    <p>Are you sure?</p>
                                    <input type="hidden" name="id" value="{{$product['id']}}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Confirm</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="viewmodal{{$product['id']}}" tabindex="-1" role="dialog" aria-labelledby="mediummodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediummodalLabel">View Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="top-campaign">
                                <div class="table-responsive">
                                    <table class="table table-top-campaign">
                                        <tbody>
                                        @php 
                                            $product_categorie = App\product::find($product['id'])->categorie()->associate(App\Categorie::find($product['categorie_id']));
                                            $product_supplier  = App\product::find($product['id'])->supplier()->associate(App\Supplier::find($product['supplier_id']));
                                        @endphp
                                            <tr>
                                                <td>1. Name</td>
                                                <td>{{$product['product_name']}}</td>
                                            </tr>
                                            <tr>
                                                <td>2. Price</td>
                                                <td>{{$product['product_price']}}</td>
                                            </tr>
                                            <tr>
                                                <td>3. Categorie</td>
                                                <td>{{$product_categorie->categorie['categorie_name']}}</td>
                                            </tr>
                                            <tr>
                                                <td>4. Supplier</td>
                                                <td>{{$product_supplier->supplier['supplier_name']}}</td>
                                            </tr>
                                            <tr>
                                                <td>5. Qty</td>
                                                <td>{{$product['product_qty']}}</td>
                                            </tr>
                                            <tr>
                                                <td>6. Information</td>
                                                <td>{{$product['product_info']}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="modal fade" id="createmodal" tabindex="-1" role="dialog" aria-labelledby="mediummodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediummodalLabel">Create Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('product') }}" method="post">
                            @csrf
                            
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" name="product_name" placeholder="Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <input type="text" name="product_price" placeholder="Price" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-tags"></i>
                                        </div>
                                        <select type="text" name="categorie_id" class="form-control" required>
                                            <option value="">Select Categorie</option>
                                            @foreach($categories as $categorie)
                                            <option value="{{$categorie['id']}}">{{$categorie['categorie_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-gear"></i>
                                        </div>
                                        <select type="text" name="supplier_id" class="form-control" required>
                                            <option value="">Select Supplier</option>
                                            @foreach($suppliers as $supplier)
                                            <option value="{{$supplier['id']}}">{{$supplier['supplier_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-table"></i>
                                        </div>
                                        <input type="text" name="product_qty" placeholder="Qty" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <textarea type="text" name="product_info" placeholder="Information" rows="5" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->
            @endsection

