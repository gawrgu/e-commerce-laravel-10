@extends('layouts.admin')
@section('title', 'Admin')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>Admin</h3>
                        <h3><a href="{{ route('create-user') }}" class="btn btn-sm btn-primary float-end">Add User</a>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if ($item->role_as == 0)
                                            <label class="badge btn-primary">User</label>
                                        @elseif ($item->role_as == 1)
                                            <label class="badge btn-success">Admin</label>
                                        @else
                                            <label class="badge btn-danger">None</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/users/' . $item->id) . '/edit' }}"
                                            class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ url('admin/users/' . $item->id . '/delete') }}"
                                            onclick="return confirm('Are you sure to delete this user?')"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"> No Users avaible!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="my-3">
                        {{ $user->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
