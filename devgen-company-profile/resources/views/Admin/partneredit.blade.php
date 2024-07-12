@extends('Admin.layout.app') @section('content')
<!-- Page-Title -->
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Partner</li>
                </ol>
            </div>
            <h4 class="page-title">Edit Partner</h4>
        </div>
        <!--end page-title-box-->
    </div>
    <!--end col-->
</div>
<!-- end page title end breadcrumb -->
<!-- end page title end breadcrumb -->

<div class="col-lg-6">
    <div class="mb-3 row">
        <label for="example-text-input" class="col-sm-2 col-form-label text-end"
            >Text</label
        >
        <div class="col-sm-10">
            <input
                class="form-control"
                type="text"
                value="Artisanal kale"
                id="example-text-input"
            />
        </div>
    </div>
    <div class="mb-3 row">
        <label
            for="example-email-input"
            class="col-sm-2 col-form-label text-end"
            >Email</label
        >
        <div class="col-sm-10">
            <input
                class="form-control"
                type="email"
                value="bootstrap@example.com"
                id="example-email-input"
            />
        </div>
    </div>
    <div class="mb-3 row">
        <label for="example-tel-input" class="col-sm-2 col-form-label text-end"
            >Telephone</label
        >
        <div class="col-sm-10">
            <input
                class="form-control"
                type="tel"
                value="1-(555)-555-5555"
                id="example-tel-input"
            />
        </div>
    </div>
    <div class="mb-3 row">
        <label
            for="example-password-input"
            class="col-sm-2 col-form-label text-end"
            >Password</label
        >
        <div class="col-sm-10">
            <input
                class="form-control"
                type="password"
                value="hunter2"
                id="example-password-input"
            />
        </div>
    </div>
    <div class="mb-3 row">
        <label
            for="example-number-input"
            class="col-sm-2 col-form-label text-end"
            >Number</label
        >
        <div class="col-sm-10">
            <input
                class="form-control"
                type="number"
                value="42"
                id="example-number-input"
            />
        </div>
    </div>
    <div class="mb-3 row">
        <label
            for="example-datetime-local-input"
            class="col-sm-2 col-form-label text-end"
            >Date and time</label
        >
        <div class="col-sm-10">
            <input
                class="form-control"
                type="datetime-local"
                value="2011-08-19T13:45:00"
                id="example-datetime-local-input"
            />
        </div>
    </div>
    <div class="mb-3 row">
        <label for="exampleColorInput" class="col-sm-2 col-form-label text-end"
            >Color</label
        >
        <div class="col-sm-10">
            <input
                type="color"
                class="form-control form-control-color"
                id="exampleColorInput"
                value="#0b51b7"
                title="project your color"
            />
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label text-end">Select</label>
        <div class="col-sm-10">
            <select class="form-select" aria-label="Default select example">
                <option selected="">Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label
            for="example-text-input-lg"
            class="col-sm-2 col-form-label text-end"
            >Large</label
        >
        <div class="col-sm-10">
            <input
                class="form-control form-control-lg"
                type="text"
                placeholder=".form-control-lg"
                id="example-text-input-lg"
            />
        </div>
    </div>
    <div class="mb-3 row">
        <label
            for="example-text-input-sm"
            class="col-sm-2 col-form-label text-end"
            >Small</label
        >
        <div class="col-sm-10">
            <input
                class="form-control form-control-sm"
                type="text"
                placeholder=".form-control-sm"
                id="example-text-input-sm"
            />
        </div>
    </div>
    <div class="mb-3 mb-lg-0 row">
        <label
            for="example-search-input"
            class="col-sm-2 col-form-label text-end"
            >Search</label
        >
        <div class="col-sm-10">
            <input
                class="form-control"
                type="search"
                value="How do I shoot web"
                id="example-search-input"
            />
        </div>
    </div>
    <a
        href="{{ route('partner_admin') }}"
        class="btn btn-success mt-4"
        style="margin-left: 45px"
        ><i class="ti ti-check"></i> Save</a
    >
    <a
        href="{{ route('partner_admin') }}"
        type="button"
        class="btn btn-outline-danger mt-4"
        style="margin-left: 5px"
        ><i class="ti ti-arrow-back"></i> Cancel</a
    >
</div>
@endsection
