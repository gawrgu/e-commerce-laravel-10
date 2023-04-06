<!-- Modal Add -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Brand</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('create-brand') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option>--Choose One--</option>
                            @foreach ($category as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name">Brand Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name')
                            <small class="my-3 text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Status</label><br>
                        <input type="checkbox" name="status" id="status">
                        <hr> Checked = Hidden, Un Checked = Visible
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($brands as $brand)
    <!-- Modal Edit -->
    <div class="modal fade" id="updateModal{{ $brand->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Brand</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('admin/brand/edit/' . $brand->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option>--Choose One--</option>
                                @foreach ($category as $value)
                                    <option {{ $value->id == $brand->category_id ? 'selected' : '' }}
                                        value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name">Brand Name</label>
                            <input type="text" name="name" id="name" value="{{ $brand->name }}"
                                class="form-control">
                            @error('name')
                                <small class="my-3 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status" id="status"
                                {{ $brand->status == 1 ? 'checked' : '' }}>
                            <hr>
                            Checked
                            = Hidden, Un
                            Checked = Visible
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@foreach ($brands as $brand)
    <!-- Modal Delete -->
    <div class="modal fade" id="deleteModal{{ $brand->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Brand</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('admin/delete-brand/' . $brand->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <h5>Are you sure to delete this brand?</h5>
                        <small>
                            <p>Name : {{ $brand->name }}</p>
                            <p>created_at : {{ $brand->created_at }}</p>
                        </small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
