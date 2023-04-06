@extends('layouts.admin')
@section('title', 'Edit Category')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>Edit Category</h3>
                        <h3><a href="{{ url('admin/category/') }}"
                                class="btn btn-primary btn btn-sm text-white float-end">Back
                                Category</a></h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/category/' . $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="{{ $category->name }}"
                                    class="form-control">
                                @error('name')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="thumbnail">Image</label>
                                <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                @error('thumbnail')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-3">
                                <img src="{{ asset('storage/' . $category->image) }}" width="60px" height="60px">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea type="text" name="description" id="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                                @error('description')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <h4>Seo Tags</h4>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" value="{{ $category->meta_title }}"
                                    class="form-control">
                                @error('meta_title')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="status">Status</label><br>
                                <input type="checkbox" name="status" id="status"
                                    {{ $category->status == 1 ? 'checked' : '' }}>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="meta_keyword">Meta Keyword</label>
                                <textarea type="text" name="meta_keyword" id="meta_keyword" class="form-control" rows="3">{{ $category->meta_keyword }}</textarea>
                                @error('meta_keyword')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="meta_description">Meta Description</label>
                                <textarea type="text" name="meta_description" id="meta_description" class="form-control" rows="3">{{ $category->meta_description }}</textarea>
                                @error('meta_description')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-outline-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
