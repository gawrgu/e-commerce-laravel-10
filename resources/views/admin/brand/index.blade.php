@extends('layouts.admin')
@section('title', 'Brands')
@section('content')

    @include('admin.brand.modal-form')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>Brands List</h3>
                        <h3><a href="#" class="btn btn-outline-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#addModal">Add Brand</a></h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>CATEGORY</th>
                                    <th>STATUS</th>
                                    <th>UPDATED AT</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($brands as $brand)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>
                                            @if ($brand->categories)
                                                {{ $brand->categories->name }}
                                            @else
                                                No Category Avaible!
                                            @endif
                                        </td>
                                        <td>{{ $brand->status == 1 ? 'Hidden' : 'Visible' }}</td>
                                        <td>{{ $brand->updated_at->diffForHumans() }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                data-bs-target="#updateModal{{ $brand->id }}">Edit</button>
                                            <button data-bs-toggle="modal" data-bs-target="#deleteModal{{ $brand->id }}"
                                                class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    <tr>
                                    @empty
                                    </tr>
                                    <td colspan="5">No Brands Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="mb-3">
                            {{ $brands->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
