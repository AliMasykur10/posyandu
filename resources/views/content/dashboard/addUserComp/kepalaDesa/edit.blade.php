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
                <h1>Edit User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Edit Data</a></div>
                </div>
            </div>
                            

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <form action="{{ route('tambah-user.update', $id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" value="kepalaDesa" name="role">
                                    <div class="form-group col-6">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username"
                                            autofocus value="{{$data->username }}">
                                        @error('username')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                    <div class="form-group col-6">
                                        <label for="name">Nama Kepala Desa</label>
                                        <input id="name" type="text" class="form-control" name="name"
                                            value="{{ $data->kades->name }}">
                                        @error('name')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
            
                                    <div class="form-group col-6">
                                        <label for="nik">Nomor Induk Kependudukan (NIK)</label>
                                        <input id="nik" type="number" class="form-control" name="nik"
                                            value="{{ $data->kades->nik }}">
                                        @error('nik')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
            
                                    <div class="form-group col-6">
                                        <label for="date_of_birth">Tanggal Lahir Petugas</label>
                                        <input id="date_of_birth" type="date" class="form-control datepicker"
                                            name="date_of_birth" value="{{ $data->kades->date_of_birth }}">
                                        @error('date_of_birth')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                    <div class="form-group col-6">
                                        <label for="place_of_birth">Tempat Lahir Petugas</label>
                                        <input id="place_of_birth" type="text" class="form-control"
                                            name="place_of_birth" value="{{ $data->kades->place_of_birth }}">
                                        @error('place_of_birth')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                    <div class="form-group col-6">
                                        <label for="gender">Jenis Kelamin</label>
                                        <select name="gender" id="gender" class="form-control selectric">
                                            <option value="" selected disabled>-- Pilih Jenis Kelamin --
                                            </option>
                                            <option value="Laki-laki"
                                                {{ $data->kades->gender == 'Laki-laki' ? 'selected' : '' }}>
                                                Laki-laki
                                            </option>
                                            <option value="Perempuan"
                                                {{ $data->kades->gender == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan
                                            </option>
                                        </select>
                                        @error('gender')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                    <div class="form-group col-6">
                                        <label for="address">Alamat</label>
                                        <input id="address" type="text" class="form-control" name="address"
                                            value="{{ $data->kades->address }}">
                                        @error('address')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-6">
                                        <label for="last_educations">Pendidikan Terakhir</label>
                                        <select name="last_educations" id="last_educations" class="form-control selectric">
                                            <option value="" selected disabled>-- Pilih Pendidikan --
                                            </option>
                                            <option value="SD/MI/Sederajat" {{ $data->kades->last_educations == 'SD ' ? 'selected' : '' }}>
                                                SD/MI/Sederajat 
                                            </option>
                                            
                                            <option value="SMP/MTS/Sederajat"
                                                {{ $data->kades->last_educations == 'SMP/MTS/Sederajat' ? 'selected' : '' }}>SMP/MTS/Sederajat
                                            </option>
            
                                            <option value="SMA/MA/Sederajat"
                                                {{ $data->kades->last_educations == 'SMA/MA/Sederajat' ? 'selected' : '' }}>SMA/MA/Sederajat
                                            </option>
            
                                            <option value="D1"
                                                {{ $data->kades->last_educations == 'D1' ? 'selected' : '' }}>D1
                                            </option>
                                            <option value="D2"
                                                {{ $data->kades->last_educations == 'D2' ? 'selected' : '' }}>D2
                                            </option>
                                            </option>
                                            <option value="D3"
                                                {{ $data->kades->last_educations == 'D3' ? 'selected' : '' }}>D3
                                            </option>
                                            <option value="S1/D4"
                                                {{ $data->kades->last_educations == 'S1/D4' ? 'selected' : '' }}>S1/D4
                                            </option>
                                            <option value="S2"
                                                {{ $data->kades->last_educations == 'S2' ? 'selected' : '' }}>S2
                                            </option>
                                            <option value="S3"
                                                {{ $data->kades->last_educations == 'S3' ? 'selected' : '' }}>S3
                                            </option>
                                        </select>
                                        @error('last_educations')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Update Kepala Desa</button>
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