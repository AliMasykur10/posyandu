@extends('layouts.app')

@section('title', 'Data Petugas')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush



@section('main')
    <div class="main-content">

        <section class="section">
            <div class="section-header">
                <h1>Data User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">tambah Data</a></div>
                </div>
            </div>

            @include('content.dashboard.addUserComp.dropdown.dropdown',['jenisUser' => $jenisUser])

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <form action="{{ route('tambah-user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" value="puskesmas" name="role">
                                    <div class="form-group col-6">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username"
                                            autofocus value="{{ old('username') }}">
                                        @error('username')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                    <div class="form-group col-6">
                                        <label for="name">Nama Puskesmas</label>
                                        <input id="name" type="text" class="form-control" name="name"
                                            value="{{ old('name')}}">
                                        @error('name')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Password</label>
                                        <input id="password" type="password" class="form-control" name="password">
                                        @error('password')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                    <div class="form-group col-6">
                                        <label for="password_confirmation" class="d-block">Konfirmasi Password</label>
                                        <input id="password_confirmation" type="password" class="form-control"
                                            name="password_confirmation">
                                        @error('password_confirmation')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
            
                                    <div class="form-group col-6">
                                        <label for="address">Alamat</label>
                                        <input id="address" type="text" class="form-control" name="address"
                                            value="{{ old('address') }}">
                                        @error('address')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Tambah Puskesmas</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush

