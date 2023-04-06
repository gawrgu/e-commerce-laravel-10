@extends('layouts.admin')
@section('title', 'Create Slider')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Create Slider
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
                    <form action="{{ route('save-slider') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea type="text" rows="3" name="description" id="description" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="gambar" class="form-label">Image</label>
                                <input type="file" name="gambar" id="gambar" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">status</label>
                                <input type="checkbox" name="status">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-outline-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
