@extends('admin.layout.app')
@section('content')
    <!-- Page-Title -->
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">App setting</li>
                    </ol>
                </div>
                <h4 class="page-title">App setiing</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <!-- end page title end breadcrumb -->
    <div class="card">

        <div class="card-body">
            <div class="form-group mb-3 row">
                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Nama App</label>
                <div class="col-lg-9 col-xl-8">
                    <input class="form-control" type="text" value="Devgen">
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Deskripsi</label>
                <div class="col-lg-9 col-xl-8">
                    <textarea id="summernote" class="form-control" type="img" value="Dodson" height="200"></textarea>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">logo </label>
                <div class="col-lg-9 col-xl-8">
                    <div class="input-group mb-3">
                        <input name="images" type="file" class="dropify" data-height="100" />
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group mb-3 row">
            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Nomor kontak</label>
            <div class="col-lg-9 col-xl-8">
                <div class="input-group">
                    <span class="input-group-text"><i class="las la-phone"></i></span>
                    <input type="text" class="form-control" value="+123456789" placeholder="Phone"
                        aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Alamat Email</label>
            <div class="col-lg-9 col-xl-8">
                <div class="input-group">
                    <span class="input-group-text"><i class="las la-at"></i></span>
                    <input type="text" class="form-control" value="rosa.dodson@demo.com" placeholder="Email"
                        aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Link Instagram</label>
            <div class="col-lg-9 col-xl-8">
                <div class="input-group">
                    <span class="input-group-text"><i class="ti ti-brand-instagram"></i></span>
                    <input type="text" class="form-control" value=" https://mannatthemes.com/" placeholder="Email"
                        aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Alamat</label>
            <div class="col-lg-9 col-xl-8">
                <textarea class="form-control" type="img" value="Dodson"></textarea>
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Koordinat maap</label>
            <div class="col-lg-9 col-xl-8">
                <input class="form-control" type="text" id="gmap_coordinates" name="gmap_coordinates"
                    placeholder="Latitude, Longitude" required>
            </div>
        </div>
    </div>
    <div class="form-group mb-3 row">
        <div class="col-lg-9 col-xl-8 offset-lg-3">
            <button type="submit" class="btn btn-de-primary">Submit</button>
            <button type="button" class="btn btn-de-danger">Cancel</button>
        </div>
    </div>
    </div>
    </div>
@endsection
