@if (session()->has('success'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">
                <h3>
                    {{ session()->get('success') }}
                </h3>
            </div>
        </div>
    </div>
@endif
@if (session()->has('error'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <h3>
                    {{ session()->get('error') }}
                </h3>
            </div>
        </div>
    </div>
@endif
