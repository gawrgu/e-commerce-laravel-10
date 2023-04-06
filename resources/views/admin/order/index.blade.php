@extends('layouts.admin')
@section('title', 'Orders')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Orders List</h3>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Filter by Date</label>
                            <input type="date" name="date" value="{{ Request::get('date') ?? date('d-m-y') }}"
                                class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">Filter by Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="">Select status</option>
                                <option value="In progress" {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>
                                    In
                                    progress</option>
                                <option value="complete" {{ Request::get('status') == 'complete' ? 'selected' : '' }}>
                                    Complete
                                </option>
                                <option value="canceled" {{ Request::get('status') == 'canceled' ? 'selected' : '' }}>
                                    Canceled
                                </option>
                                <option value="out-of-delivery"
                                    {{ Request::get('status') == 'out-of-delivery' ? 'selected' : '' }}>Out of Delivery
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="table table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tracking No</th>
                                <th>Username</th>
                                <th>Payment Mode</th>
                                <th>Ordered Date</th>
                                <th>Status Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @forelse ($orders as $item)
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->tracking_no }}</td>
                                    <td>{{ $item->fullname }}</td>
                                    <td>{{ $item->payment_mode }}</td>
                                    <td>{{ $item->created_at->format('d-m-y') }}</td>
                                    <td>{{ $item->status_message }}</td>
                                    <td>
                                        <a href="{{ url('admin/orders/' . $item->id) }}"
                                            class="btn btn-sm btn-primary">View</a>
                                    </td>
                            </tr>
                        @empty
                            <td colspan="6">No order avaible!</td>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mb-3">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <livewire:frontend.order.order-show /> --}}

@endsection
