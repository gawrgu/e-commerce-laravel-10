@extends('layouts.admin')
@section('title', 'Category')
@section('content')


    <!-- Modal -->
    @foreach ($categories as $category)
        <div class="modal fade" id="deleteModal{{ $category->slug }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
    @endforeach

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
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NAME</th>
                                <th>STATUS</th>
                                <th>IMAGE</th>
                                <th>CREATED</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->status == 1 ? 'Hidden' : 'Visible' }}</td>
                                    <td><img src="{{ asset('storage/' . $category->image) }}"></td>
                                    <td>{{ $category->created_at->format('d F, Y') }}</td>
                                    <td>
                                        <a href="{{ url('admin/category/' . $category->slug) }}"
                                            class="btn btn-sm btn-primary">Detail</a>
                                        <a href="{{ url('admin/category/' . $category->id . '/edit') }}"
                                            class="btn btn-sm btn-success">Edit</a>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $category->slug }}">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mb-3">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
