@extends('layouts.app')
@section('title', 'Detail Order')
@section('content')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg white p-3">
                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart text-dark"> My order details</i>
                            <a href="{{ route('order') }}" class="btn btn-sm btn-danger float-end mx-1">Back</a>
                            <a href="{{ url('orders/' . $order->id . '/generate') }}"
                                class="btn btn-sm btn-warning float-end">dowload Pdf</a>
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
                                    Order status message: <span class="text-uppercase">In
                                        progress</span>
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
                                        <tr>
                                            @foreach ($order->orderItem as $item)
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
        </div>
    </div>
@endsection
