@extends('layouts.admin')
@section('title', 'Color')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>List Color</h3>
                        <h3><a href="{{ route('create-color') }}" class="btn btn-primary btn btn-sm text-white float-end">Add
                                Color</a></h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NAME</th>
                                <th>COLOR CODE</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($colors as $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->code }}</td>
                                    <td>{{ $value->status == 1 ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/colors/' . $value->id . '/edit') }}"
                                            class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ url('admin/delete-color/' . $value->id) }}"
                                            onclick="return confirm('are you sure to delete this?')"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Colors</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mb-3">
                        {{ $colors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
