@extends('layouts.admin')
@section('title', 'Add Category')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>Add Category</h3>
                        <h3><a href="{{ url('admin/category') }}" class="btn btn-primary btn btn-sm text-white float-end">Back
                                Category</a></h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                                @error('name')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="thumbnail">Image</label>
                                <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                @error('thumbnail')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea type="text" name="description" id="description" class="form-control" rows="3"></textarea>
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
                                <input type="text" name="meta_title" id="meta_title" class="form-control">
                                @error('meta_title')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="status">Status</label><br>
                                <input type="checkbox" name="status" id="status">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="meta_keyword">Meta Keyword</label>
                                <textarea type="text" name="meta_keyword" id="meta_keyword" class="form-control" rows="3"></textarea>
                                @error('meta_keyword')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="meta_description">Meta Description</label>
                                <textarea type="text" name="meta_description" id="meta_description" class="form-control" rows="3"></textarea>
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
