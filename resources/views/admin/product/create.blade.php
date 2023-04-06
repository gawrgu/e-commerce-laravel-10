@extends('layouts.admin')
@section('title', 'Add Product')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>Add Product</h3>
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
                    <form action="{{ route('save-product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">Home</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seotags-tab" data-bs-toggle="tab"
                                    data-bs-target="#seotags-pane" type="button" role="tab"
                                    aria-controls="seotags-pane" aria-selected="false">Seo
                                    Tags</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail-pane"
                                    type="button" role="tab" aria-controls="detail-pane"
                                    aria-selected="false">Detail</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-pane"
                                    type="button" role="tab" aria-controls="image-pane" aria-selected="false">Product
                                    Images</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-pane"
                                    type="button" role="tab" aria-controls="color-pane" aria-selected="false">Product
                                    Color</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="my-3">
                                    <label for="">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Brand</label>
                                    <select name="brand" id="brand" class="form-control">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Small Description (500 Word)</label>
                                    <textarea type="text" name="small_description" id="small_description" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea type="text" name="description" id="description" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="seotags-pane" role="tabpanel" aria-labelledby="seotags-tab"
                                tabindex="0">
                                <div class="my-3">
                                    <label for="">Meta Title</label>
                                    <input type="text" name="meta_title" id="meta_title" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Keyword</label>
                                    <textarea type="text" name="meta_keyword" id="meta_keyword" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Description</label>
                                    <textarea type="text" name="meta_description" id="meta_description" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="detail-pane" role="tabpanel" aria-labelledby="detail-tab"
                                tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <div class="my-3">
                                                <label for="">Original Price</label>
                                                <input type="text" name="original_price" id="original_price"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <div class="my-3">
                                                <label for="">Selling Price</label>
                                                <input type="text" name="selling_price" id="selling_price"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <div class="my-3">
                                                <label for="">Quantity</label>
                                                <input type="number" min="0" name="quantity" id="quantity"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <div class="my-3">
                                                <label for="">Trending</label>
                                                <input type="checkbox" name="trending" id="trending" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <div class="my-3">
                                                <label for="">Featured</label>
                                                <input type="checkbox" name="featured" id="featured" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <div class="my-3">
                                                <label for="">Status</label>
                                                <input type="checkbox" name="status" id="status" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel"
                                    aria-labelledby="disabled-tab" tabindex="0">...</div>
                            </div>
                            <div class="tab-pane fade" id="image-pane" role="tabpanel" aria-labelledby="image-tab"
                                tabindex="0">
                                <div class="my-3">
                                    <label for="">Product Images</label>
                                    <input type="file" name="thumbnail[]" id="thumbnail" class="form-control"
                                        multiple>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="color-pane" role="tabpanel" aria-labelledby="color-tab"
                                tabindex="0">
                                <div class="my-3">
                                    <div class="mb-3">
                                        <h5>Color Product</h5>
                                    </div>
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
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection
