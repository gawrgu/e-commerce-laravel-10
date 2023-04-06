@extends('layouts.admin')
@section('title', 'Add User')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>Add User</h3>
                        <h3><a href="{{ route('user') }}" class="btn btn-sm btn-danger float-end">Back</a>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('users') }}" method="POST">
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
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
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
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                                @error('role_as')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-outline-primary" type="submit">Save</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
