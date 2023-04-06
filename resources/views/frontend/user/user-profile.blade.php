@extends('layouts.app')
@section('title', 'User Profile')
@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h4>
                        User Profile
                        <a href="{{ route('create-password') }}" class="btn btn-sm btn-outline-warning float-end">Change
                            Password!</a>
                        <div class="underline mb-4"></div>
                    </h4>
                </div>
                <div class="col-md-10">
                    @if (session('message'))
                        <p class="alert alert-success">{{ session('message') }}</p>
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
                            <h4 class="mb-0 text-white">User Details</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('profile') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-mb-6 mb-3">
                                        <label>Username</label>
                                        <input type="text" name="username" value="{{ Auth::user()->name }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-mb-6 mb-3">
                                        <label>Email</label>
                                        <input type="text" name="email" value="{{ Auth::user()->email }}" readonly
                                            class="form-control">
                                    </div>
                                    <div class="col-mb-6 mb-3">
                                        <label>No Hp / Phone</label>
                                        <input type="number" name="phone"
                                            value="{{ Auth::user()->userDetail->phone ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-mb-6 mb-3">
                                        <label>Zip / Pin Code</label>
                                        <input type="number" name="pin_code"
                                            value="{{ Auth::user()->userDetail->pin_code ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-mb-12 mb-3">
                                        <label>Address</label>
                                        <textarea type="text" name="address" value="" class="form-control" rows="3">{{ Auth::user()->userDetail->address ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-sm btn-outline-primary">Save</button>
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
