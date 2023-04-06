@extends('layouts.admin')
@section('title', 'Admin Setting')
@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('admin/settings') }}" method="POST">
                @csrf
                <div class="card mb-3">
                    <div class="card-header bg-success">
                        <h3 class="text-white mb-0">Website</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Website Name</label>
                                <input type="text" name="website_name" value="{{ $setting->website_name ?: '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Website Url</label>
                                <input type="text" name="website_url" value="{{ $setting->website_url ?: '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Page Title</label>
                                <input type="text" name="page_title" value="{{ $setting->page_title ?: '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta Keywords</label>
                                <input type="text" name="meta_keyword" value="{{ $setting->meta_keyword ?: '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta Descriotion</label>
                                <input type="text" name="meta_description" value="{{ $setting->meta_description ?: '' }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website - Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Address</label>
                                <textarea type="text" name="address" class="form-control" rows="3">{{ $setting->address ?: '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone 1</label>
                                <input type="number" name="phone1" value="{{ $setting->phone1 ?: '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone 2</label>
                                <input type="number" name="phone2" value="{{ $setting->phone2 ?: '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email Id 1</label>
                                <input type="email" name="email1" value="{{ $setting->email1 ?: '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email 2</label>
                                <input type="email" name="email2" value="{{ $setting->email2 ?: '' }}"
                                    class="form-control">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-dark">
                        <h3 class="text-white mb-0">Website - Social Media</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Facebook (optional)</label>
                                <input type="text" name="facebook" value="{{ $setting->facebook ?: '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Twitter (optional)</label>
                                <input type="text" name="twitter" value="{{ $setting->twitter ?: '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Instagram (optional)</label>
                                <input type="text" name="instagram" value="{{ $setting->instagram ?: '' }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Youtube (optional)</label>
                                <input type="text" name="youtube" value="{{ $setting->youtube ?: '' }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-outline-primary btn-sm">Save Settings</button>
                </div>
            </form>
        </div>
    </div>

@endsection
