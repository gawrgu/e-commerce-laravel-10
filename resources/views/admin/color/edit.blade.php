@extends('layouts.admin')
@section('title', 'Edit Color')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3>Edit Color</h3>
                        <h3><a href="{{ url('admin/colors/') }}" class="btn btn-primary btn btn-sm text-white float-end">Back
                            </a></h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/colors/' . $color->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="">Name</label>
                                <input type="text" value="{{ $color->name }}" name="name" id="name"
                                    class="form-control">
                                @error('name')
                                    <small>
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="">Color Code</label>
                                <input type="text" value="{{ $color->code }}" name="code" id="code"
                                    class="form-control">
                                @error('code')
                                    <small>
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="">Status</label>
                                <input type="checkbox" {{ $color->status == 1 ? 'checked' : '' }} name="status"
                                    id="status"> Checked = hidden, Unchecked =
                                visible.
                                @error('status')
                                    <small>
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
