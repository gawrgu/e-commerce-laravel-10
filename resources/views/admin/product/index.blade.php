@extends('layouts.admin')
@section('title', 'Products')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>List Product</h3>
                        <h3><a href="{{ route('create-product') }}" class="btn btn-sm btn-primary float-end">Add Product</a>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        @if ($product->categories)
                                            {{ $product->categories->name }}
                                        @else
                                            No Category
                                        @endif
                                    </td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->status == 1 ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ route('edit-product', $product->id) }}"
                                            class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ url('admin/product/' . $product->id . '/delete') }}"
                                            onclick="return confirm('Are you sure to delete this product?')"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7"> No products avaible!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="my-3">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
