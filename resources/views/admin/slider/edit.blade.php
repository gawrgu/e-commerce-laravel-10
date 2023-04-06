@extends('layouts.admin')
@section('title', 'Edit Slider')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Slider
                        <a href="{{ route('sliders') }}" class="btn btn-sm float-end btn-primary text-white">Back</a>
                    </h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('admin/sliders/' . $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" value="{{ $slider->title }}" name="title" id="title"
                                    class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="gambar" class="form-label">Image</label>
                                <input type="file" name="gambar" id="gambar" class="form-control">
                            </div>
                            <div class="col-md-2 mb-3">
                                <img src="{{ asset('storage/' . $slider->image) }}" width="60px" height="60px"
                                    alt="img">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea type="text" rows="3" name="description" id="description" class="form-control">{{ $slider->description }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">status</label>
                                <input type="checkbox" name="status" {{ $slider->status == 1 ? 'checked' : '' }}>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-outline-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
