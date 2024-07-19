@extends('admin.layout.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Edit Service</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('updateservices_admin', $service->id_services) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="text" class="form-control" id="icon" name="icon" value="{{ $service->icon }}" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $service->title }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
