@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="me-md-3 me-xl-5">
                <h2>Dashboard</h2>
                <p class="mb-md-0">Your analytics dashboard template.</p>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label>Total Orders</label>
                        <h1>{{ $totalOrders }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3">
                        <label>Today Orders</label>
                        <h1>{{ $totalTodayOrder }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label>Month Orders</label>
                        <h1>{{ $totalThisMonthOrder }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label>Years Orders</label>
                        <h1>{{ $totalThisYearOrder }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">View</a>
                    </div>
                </div>
                <hr>
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label>Total Products</label>
                        <h1>{{ $totalProduct }}</h1>
                        <a href="{{ route('products') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3">
                        <label>Total Category</label>
                        <h1>{{ $totalCategory }}</h1>
                        <a href="{{ route('categories') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label>Total Brands</label>
                        <h1>{{ $totalBrand }}</h1>
                        <a href="{{ route('brands') }}" class="text-white">View</a>
                    </div>
                </div>
                <hr>
                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label>Total All Users</label>
                        <h1>{{ $totalAllUsers }}</h1>
                        <a href="{{ route('user') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3">
                        <label>Total User</label>
                        <h1>{{ $totalUser }}</h1>
                        <a href="{{ route('user') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label>Total Admin</label>
                        <h1>{{ $totalAdmin }}</h1>
                        <a href="{{ route('admin') }}" class="text-white">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
