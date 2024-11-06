@extends('layouts.app')

@section('title', 'Data Anak')

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
                <h1>Edit Anak</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Edit Data</a></div>
                </div>
            </div>
                            
            {{-- {{ dd($data) }} --}}

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <form action="{{ route('tampil-user.edit.anak.update', $id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="nik">Nomor Induk Anak (NIK) </label>
                                        <input id="nik" type="number" class="form-control" name="nik"
                                            value="{{ $data->nik }}">
                                        @error('nik')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group col-6">
                                        <label for="nama">Nama Anak </label>
                                        <input id="nama" type="text" class="form-control" name="name"
                                            value="{{ $data->name}}">
                                        @error('nama')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group col-6">
                                        <label for="date_of_birth">Tanggal Lahir Anak </label>
                                        <input id="date_of_birth" type="date" class="form-control datepicker"
                                            name="date_of_birth" value="{{ $data->date_of_birth }}">
                                        @error('date_of_birth')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                
                                    <div class="form-group col-6">
                                        <label for="place_of_birth">Tempat Lahir Anak </label>
                                        <input id="place_of_birth_{{$data->id }}" type="text" class="form-control"
                                            name="place_of_birth" value="{{ $data->place_of_birth}}">
                                        @error('place_of_birth')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-6">
                                        <label for="gender">Jenis Kelamin Anak </label>
                                        <select name="gender" id="gender" class="form-control selectric">
                                            <option value="" selected disabled>-- Pilih Jenis Kelamin --
                                            </option>
                                            <option value="L"
                                                {{ $data->gender == 'L' ? 'selected' : '' }}>
                                                Laki-laki
                                            </option>
                                            <option value="P"
                                                {{ $data->gender == 'P' ? 'selected' : '' }}>
                                                Perempuan
                                            </option>
                                        </select>
                                        @error('gender')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group col-6">
                                        <label for="golongan_darah">Golongan Darah Anak </label>
                                        <select name="golongan_darah" id="golongan_darah" class="form-control selectric">
                                            <option value="" selected disabled>-- Golongan Darah --
                                            </option>
                                            <option value="A"
                                                {{ $data->golongan_darah == 'A' ? 'selected' : '' }}>
                                                A
                                            </option>
                                            <option value="B"
                                                {{ $data->golongan_darah == 'B' ? 'selected' : '' }}>
                                                B
                                            </option>
                                            <option value="AB"
                                                {{ $data->golongan_darah == 'AB' ? 'selected' : '' }}>
                                                AB
                                            </option>
                                            <option value="O"
                                                {{ $data->golongan_darah == 'O' ? 'selected' : '' }}>
                                                O
                                            </option>
                                        </select>
                                        @error('golongan_darah')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                </div>  

                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Update Anak</button>
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
