@extends('layouts.admin')
@section('title', 'Category Detail')
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Category Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/category/{{ $category->slug }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <h5>Are you sure to delete this?</h5>
                        <div class="text text-black">Name : {{ $category->name }}</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>Category</h3>
                        <h3><a href="{{ url('admin/category/create') }}"
                                class="btn btn-primary btn btn-sm text-white float-end">Add
                                Category</a></h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>DESCRIPTION</th>
                                <th>STATUS</th>
                                <th>META TITLE</th>
                                <th>META KEYWORD</th>
                                <th>META DESCRIPTION</th>
                                <th>IMAGE</th>
                            </tr>
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>{{ $category->status == 1 ? 'Hidden' : 'Visible' }}</td>
                                <td>{{ $category->meta_title }}</td>
                                <td>{{ $category->meta_keyword }}</td>
                                <td>{{ $category->meta_description }}</td>
                                <td><img src="{{ asset('storage/uploads/category/' . $category->image) }}"></td>
                            </tr>
                        </table>
                        <div class="card-footer">
                            <div class="row">
                                <div class="mr-3">
                                    <a href="{{ url('admin/category/') }}"
                                        class="btn btn-sm btn-success my-1 text-center">Back</a>
                                    <a href="{{ url('admin/category/' . $category->id . '/edit') }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
