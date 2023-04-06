@extends('layouts.admin')
@section('title', 'Edit Product')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>Edit Product</h3>
                        <h3><a href="{{ route('products') }}" class="btn btn-sm btn-primary float-end">Back</a>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('admin/products/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">Home</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seo-tags" data-bs-toggle="tab" data-bs-target="#seo-tags-pane"
                                    type="button" role="tab" aria-controls="seo-tags-pane" aria-selected="false">Seo
                                    Tags</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="detail" data-bs-toggle="tab" data-bs-target="#detail-pane"
                                    type="button" role="tab" aria-controls="detail-pane"
                                    aria-selected="false">Detail</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="images" data-bs-toggle="tab" data-bs-target="#images-pane"
                                    type="button" role="tab" aria-controls="images-pane"
                                    aria-selected="false">Images</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-pane"
                                    type="button" role="tab" aria-controls="color-pane" aria-selected="false">Product
                                    Color</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option disabled selected>Choose one</option>
                                        @foreach ($categories as $category)
                                            <option {{ $category->id == $product->category_id ? 'selected' : '' }}
                                                value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Name</label>
                                    <input type="text" value="{{ $product->name }}" name="name" id="name"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Brand</label>
                                    <select name="brand" id="brand" class="form-control">
                                        <option disabled selected>Choose one</option>
                                        @foreach ($brands as $brand)
                                            <option {{ $brand->name == $product->brand ? 'selected' : '' }}
                                                value="{{ $brand->name }}">{{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Small Description (500 Word)</label>
                                    <textarea type="text" name="small_description" id="small_description" class="form-control">
                                        {{ $product->small_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea type="text" name="description" id="description" rows="5" class="form-control">
                                        {{ $product->description }}</textarea>
                                    @error('description')
                                        <small class="text text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="seo-tags-pane" role="tabpanel"
                                aria-labelledby="seo-tags" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Meta Title</label>
                                    <input type="text" name="meta_title" value="{{ $product->meta_title }}"
                                        id="meta_title" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Keyword</label>
                                    <textarea type="text" name="meta_keyword" id="meta_keyword" class="form-control">{{ $product->meta_keyword }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Description</label>
                                    <textarea type="text" name="meta_description" id="meta_description" rows="5" class="form-control">{{ $product->meta_description }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="detail-pane" role="tabpanel"
                                aria-labelledby="detail" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label for="">Original Price</label>
                                                <input type="text" name="original_price"
                                                    value="{{ $product->original_price }}" id="original_price"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <div class="my-3">
                                                <label for="">Selling Price</label>
                                                <input type="text" name="selling_price"
                                                    value="{{ $product->selling_price }}" id="selling_price"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <div class="my-3">
                                                <label for="">Quantity</label>
                                                <input type="number" name="quantity" min="0"
                                                    value="{{ $product->quantity }}" id="quantity"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <div class="my-3">
                                                <label for="">Trending</label>
                                                <input type="checkbox" name="trending" id="trending"
                                                    {{ $product->trending == 1 ? 'checked' : '' }} />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <div class="my-3">
                                                <label for="">Featured</label>
                                                <input type="checkbox" name="featured" id="featured"
                                                    {{ $product->featured == 1 ? 'checked' : '' }} />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <div class="my-3">
                                                <label for="">Status</label>
                                                <input type="checkbox" name="status" id="status"
                                                    {{ $product->status == 1 ? 'checked' : '' }} />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel"
                                    aria-labelledby="disabled-tab" tabindex="0">...</div>
                            </div>
                            <div class="tab-pane fade border p-3" id="images-pane" role="tabpanel"
                                aria-labelledby="images" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Images</label>
                                    <input type="file" name="thumbnail[]" id="thumbnail" class="form-control"
                                        multiple>
                                </div>
                                <div class="mb-3">
                                    @if ($product->productImages)
                                        <div class="row">
                                            @foreach ($product->productImages as $image)
                                                <div class="col-md-2">
                                                    <img src="{{ asset('storage/uploads/product/' . $image->image) }}"
                                                        style="width:80px; height:80px;" alt="Img"
                                                        class="me-4 border">
                                                    <a href="{{ url('admin/product-image/' . $image->id . '/delete') }}"
                                                        class="d-block">Remove</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <h5>No image added!</h5>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="color-pane" role="tabpanel"
                                aria-labelledby="color-tab" tabindex="0">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <h3>Add Color Product</h3>
                                        <p>Select Color</p>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        @forelse ($colors as $coloritem)
                                            <div class="col-md-3">
                                                <div class="p-2 border mb-3">
                                                    <input type="checkbox" name="colors[{{ $coloritem->id }}]"
                                                        value="{{ $coloritem->id }}">{{ $coloritem->name }}
                                                    <br>
                                                    Quantity : <input type="number"
                                                        name="colorquantity[{{ $coloritem->id }}]"
                                                        style="width: 70px; border:1px solid">
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                <h5>No Colors Founds.</h5>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Color Name</th>
                                                <th>Quantity</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->productColors as $prodCol)
                                                <tr class="prod-col-tr">
                                                    <td>
                                                        @if ($prodCol->color)
                                                            {{ $prodCol->color->name }}
                                                        @else
                                                            No color found!
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="input-group mb-3" style="width: 150px">
                                                            <input type="number" value="{{ $prodCol->quantity }}"
                                                                class="productColorQuantity form-control form-control-sm">
                                                            <button type="button" value="{{ $prodCol->id }}"
                                                                class="updateProductColorBtn btn btn-sm btn-success text-white">Update</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" value="{{ $prodCol->id }}"
                                                            class="deleteProductColorBtn btn btn-sm btn-danger text-white">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection
    @section('scripts')
        <script>
            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })

                // update
                $(document).on('click', '.updateProductColorBtn', function() {
                    var product_id = "{{ $product->id }}";
                    var prod_color_id = $(this).val();
                    var qty = $(this).closest('.prod-col-tr').find('.productColorQuantity').val();

                    if (qty <= 0) {
                        alert('Quantity is required')
                        return false;
                    }

                    var data = {
                        'product_id': product_id,
                        'qty': qty
                    }

                    $.ajax({
                        type: "POST",
                        url: "/admin/product-color/" + prod_color_id,
                        data: data,
                        success: function(response) {
                            alert(response.message)
                        }
                    });
                });

                // delete
                $(document).on('click', '.deleteProductColorBtn', function() {
                    var prod_color_id = $(this).val();
                    var thisClick = $(this);

                    $.ajax({
                        type: "GET",
                        url: "/admin/product-color/" + prod_color_id,
                        success: function(response) {
                            thisClick.closest('.prod-col-tr').remove();
                            alert(response.message);
                        }
                    });

                });
            });
        </script>
    @endsection
