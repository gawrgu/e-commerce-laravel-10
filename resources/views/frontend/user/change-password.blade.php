@extends('layouts.app')
@section('title', 'Change Password')
@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    @if (session('message'))
                        <p class="alert alert-danger">{{ session('message') }}</p>
                    @endif
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="card shadow">
                        <div class="card-header bg-dark">
                            <h4 class="mb-0 text-white">Change Password
                                <a href="{{ route('profile') }}" class=" btn btn-sm btn-outline-info float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('change-password') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-mb-6 mb-3">
                                        <label>Current password</label>
                                        <input type="password" name="current_password" class="form-control">
                                    </div>
                                    <div class="col-mb-6 mb-3">
                                        <label>New password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="col-mb-6 mb-3">
                                        <label>Confirm password</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-sm btn-outline-primary">Update
                                            Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
