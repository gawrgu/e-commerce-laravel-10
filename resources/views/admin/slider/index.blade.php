@extends('layouts.admin')
@section('title', 'Sliders')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Slider List
                        <a href="{{ route('create-slider') }}" class="btn btn-sm float-end btn-primary text-white">Add
                            Slider</a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>TITLE</th>
                                    <th>DESCRIPTION</th>
                                    <th>IMAGE</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sliders as $slider)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->description }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $slider->image) }}"
                                                style="width: 60px;height:60px">
                                        </td>
                                        <td>{{ $slider->status == 1 ? 'hidden' : 'visible' }}</td>
                                        <td>
                                            <a href="{{ url('admin/slider/' . $slider->id . '/edit') }}"
                                                class="btn btn-sm btn-success">Edit</a>
                                            <a href="{{ url('admin/delete-slider/' . $slider->id) }}"
                                                onclick="return confirm('are you sure to delete this?')"
                                                class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="6">No Slider Found!</td>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="my-3">
                        {{ $sliders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- @section('scripts')
    <script>
        $(document).on('click', '.deleteSliderBtn', function() {
                    var prod_color_id = $(this).val();
                    var thisClick = $(this);
                swal({
                        title: "Are you sure?",
                        text: "Your will not be able to recover this imaginary file!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    },
                    function() {
                        // window.location.href = "/admin/" + deleteFunction +
                        //     "/" + id;
                        // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    });
            })
    </script>
@endsection --}}
