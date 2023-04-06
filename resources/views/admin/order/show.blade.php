@extends('layouts.admin')
@section('title', 'Orders')
@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3>Orders List</h3>
                </div>
                <div class="card-body">
                    <div class="shadow bg white p-3">
                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart text-dark"> Users order details</i>
                            <a href="{{ url('admin/orders') }}" class="btn btn-sm btn-danger float-end mx-1">
                                Back</a>
                            <a href="{{ url('admin/invoice/' . $order->id) . '/generate' }}"
                                class="btn btn-sm btn-primary float-end mx-1">
                                Download Invoice</a>
                            <a href="{{ url('admin/invoice/' . $order->id) }} " target="_blank"
                                class="btn btn-sm btn-success float-end mx-1">
                                <span class="fa fa-eye"></span> View Invoice</a>
                            <a href="{{ url('admin/invoice/' . $order->id . '/mail') }} "
                                class="btn btn-sm btn-info float-end mx-1">
                                <span class="fa fa-eye"></span> Send Invoice Via
                                Email
                            </a>
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Order details</h5>
                                <hr>
                                <h6>Order id: {{ $order->id }}</h6>
                                <h6>Tracking id/No.: {{ $order->tracking_no }}</h6>
                                <h6>Ordered date: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                                <h6>Payment mode: {{ $order->payment_mode }}</h6>
                                <h6 class="border p-2 text-success">
                                    Order status message: <span class="text-uppercase">{{ $order->status_message }}</span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>User details</h5>
                                <hr>
                                <h6>Fullname: {{ $order->fullname }}</h6>
                                <h6>Email id: {{ $order->email }}</h6>
                                <h6>Phone: {{ $order->phone }}</h6>
                                <h6>Address: {{ $order->address }}</h6>
                                <h6>Pincode: {{ $order->pincode }}</h6>
                            </div>
                            <br>
                            <h5>Order items</h5>
                            <hr>
                            <div class="table table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Item Id</th>
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalPrice = 0;
                                        @endphp
                                        @foreach ($order->orderItem as $item)
                                            <tr>
                                                <td width="10%">{{ $item->id }}</td>
                                                <td width="10%">
                                                    @if ($item->product->productImages)
                                                        <img src="{{ asset('storage/uploads/product/' . $item->product->productImages[0]->image) }}"
                                                            style="width: 50px; height: 50px" alt="">
                                                    @else
                                                        <img src="{{ asset('storage/uploads/default.png') }}"
                                                            style="width: 50px; height: 50px" alt="">
                                                    @endif
                                                <td>
                                                    {{ $item->product->name }}
                                                    @if ($item->productColor)
                                                        @if ($item->productColor->color)
                                                            <span>- Color:
                                                                {{ $item->productColor->color->name }}</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td width="10%">IDR.{{ number_format($item->price) }}</td>
                                                <td width="10%">{{ $item->quantity }}</td>
                                                <td width="10%" class="fw-bold">
                                                    IDR.{{ number_format($item->quantity * $item->price) }}</td>
                                                @php
                                                    $totalPrice += $item->quantity * $item->price;
                                                @endphp
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5" class="fw-bold">Total Amount:</td>
                                            <td colspan="1" class="fw-bold">IDR.{{ number_format($totalPrice) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border mt-3">
                <div class="card-body">
                    <h4>Order Process (Order Update Status)
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ url('admin/orders/' . $order->id) }}" method="POST">
                                @csrf
                                @method('patch')
                                <label>Update for Order Status</label>
                                <div class="input-group">
                                    <select name="order_status" class="form-select">
                                        <option value="">Select status</option>
                                        <option value="In progress"
                                            {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>
                                            In
                                            progress</option>
                                        <option value="complete"
                                            {{ Request::get('status') == 'complete' ? 'selected' : '' }}>
                                            Complete
                                        </option>
                                        <option value="canceled"
                                            {{ Request::get('status') == 'canceled' ? 'selected' : '' }}>
                                            Canceled
                                        </option>
                                        <option value="out-of-delivery"
                                            {{ Request::get('status') == 'out-of-delivery' ? 'selected' : '' }}>Out of
                                            Delivery
                                        </option>
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <br>
                            <h4 class="mt-3">Current Order Status:
                                <span class="text-uppercase">{{ $order->status_message }}
                                </span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
