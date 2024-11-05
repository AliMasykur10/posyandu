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
                        <form action="{{ route('tambah-user.update', $id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="nik_anak">Nomor Induk Anak (NIK) </label>
                                        <input id="nik_anak" type="number" class="form-control" name="nik_anak_{{ $anak->id }}"
                                            value="{{ $anak->nik }}">
                                        @error('nik_anak')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group col-6">
                                        <label for="nama_anak">Nama Anak </label>
                                        <input id="nama_anak" type="text" class="form-control" name="nama_anak_{{ $anak->id }}"
                                            value="{{ $anak->name}}">
                                        @error('nama_anak')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group col-6">
                                        <label for="date_of_birth_anak">Tanggal Lahir Anak </label>
                                        <input id="date_of_birth_anak" type="date" class="form-control datepicker"
                                            name="date_of_birth_anak_{{ $anak->id  }}" value="{{ $anak->date_of_birth }}">
                                        @error('date_of_birth_anak')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                
                                    <div class="form-group col-6">
                                        <label for="place_of_birth_anak">Tempat Lahir Anak </label>
                                        <input id="place_of_birth_anak_{{$anak->id }}" type="text" class="form-control"
                                            name="place_of_birth_anak" value="{{ $anak->place_of_birth}}">
                                        @error('place_of_birth_anak')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-6">
                                        <label for="gender_anak">Jenis Kelamin Anak </label>
                                        <select name="gender_anak_{{ $anak->id  }}" id="gender_anak" class="form-control selectric">
                                            <option value="" selected disabled>-- Pilih Jenis Kelamin --
                                            </option>
                                            <option value="L"
                                                {{ $anak->gender == 'L' ? 'selected' : '' }}>
                                                Laki-laki
                                            </option>
                                            <option value="P"
                                                {{ $anak->gender == 'P' ? 'selected' : '' }}>
                                                Perempuan
                                            </option>
                                        </select>
                                        @error('gender_anak')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group col-6">
                                        <label for="golongan_darah_anak">Golongan Darah Anak </label>
                                        <select name="golongan_darah_anak_{{ $anak->id }}" id="golongan_darah_anak" class="form-control selectric">
                                            <option value="" selected disabled>-- Golongan Darah --
                                            </option>
                                            <option value="A"
                                                {{ $anak->golongan_darah == 'A' ? 'selected' : '' }}>
                                                A
                                            </option>
                                            <option value="B"
                                                {{ $anak->golongan_darah == 'B' ? 'selected' : '' }}>
                                                B
                                            </option>
                                            <option value="AB"
                                                {{ $anak->golongan_darah == 'AB' ? 'selected' : '' }}>
                                                AB
                                            </option>
                                            <option value="0"
                                                {{ $anak->golongan_darah == 'O' ? 'selected' : '' }}>
                                                O
                                            </option>
                                        </select>
                                        @error('golongan_darah_anak')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                </div>  

                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Update Keluarga</button>
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
