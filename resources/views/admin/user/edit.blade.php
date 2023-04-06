@extends('layouts.admin')
@section('title', 'Edit User')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>Edit User</h3>
                        <h3><a href="{{ route('user') }}" class="btn btn-sm btn-danger float-end">Back</a>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/users/' . $user->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="{{ $user->name }}"
                                    class="form-control">
                                @error('name')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" readonly value="{{ $user->email }}" id="email"
                                    class="form-control">
                                @error('email')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password">Password</label>
                                <input type="text" name="password" id="password" class="form-control">
                                @error('password')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="role_as">Role</label>
                                <select name="role_as" id="role_as" class="form-control">
                                    <option value="">Select Role</option>
                                    <option value="0" {{ $user->role_as == '0' ? 'selected' : '' }}>User</option>
                                    <option value="1" {{ $user->role_as == '1' ? 'selected' : '' }}>Admin</option>
                                </select>
                                @error('role_as')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-outline-primary" type="submit">Update</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
