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
            <form action="tambah-user" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" value="keluarga" name="role">
                        <div class="form-group col-6">
                            <label for="username">Username</label>
                            <input id="username" type="text" class="form-control" name="username"
                                autofocus value="{{ old('username') }}">
                            @error('username')
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
                            <label for="nik_ibu">Nomor Induk Ibu (NIK)</label>
                            <input id="nik_ibu" type="number" class="form-control" name="nik_ibu"
                                value="{{ old('nik_ibu') }}">
                            @error('nik_ibu')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="nama_ibu">Nama ibu</label>
                            <input id="nama_ibu" type="text" class="form-control" name="nama_ibu"
                                value="{{ old('nama_ibu')}}">
                            @error('nama_ibu')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="date_of_birth_ibu">Tanggal Lahir Ibu</label>
                            <input id="date_of_birth_ibu" type="date" class="form-control datepicker"
                                name="date_of_birth_ibu" value="{{ old('date_of_birth_ibu') }}">
                            @error('date_of_birth_ibu')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="place_of_birth_ibu">Tempat Lahir Ibu</label>
                            <input id="place_of_birth_ibu" type="text" class="form-control"
                                name="place_of_birth_ibu" value="{{ old('place_of_birth_ibu') }}">
                            @error('place_of_birth_ibu')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="golongan_darah_ibu">Golongan Darah Ibu</label>
                            <select name="golongan_darah_ibu" id="golongan_darah_ibu" class="form-control selectric">
                                <option value="" selected disabled>-- Pilih Jenis Kelamin --
                                </option>
                                <option value="A"
                                    {{ old('golongan_darah_ibu') == 'A' ? 'selected' : '' }}>
                                    A
                                </option>
                                <option value="B"
                                    {{ old('golongan_darah_ibu') == 'B' ? 'selected' : '' }}>
                                    B
                                </option>
                                <option value="AB"
                                    {{ old('golongan_darah_ibu') == 'AB' ? 'selected' : '' }}>
                                    AB
                                </option>
                                <option value="0"
                                    {{ old('golongan_darah_ibu') == '0' ? 'selected' : '' }}>
                                    0
                                </option>
                            </select>
                            @error('golongan_darah_ibu')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="nik_ayah">Nomor Induk Ayah (NIK)</label>
                            <input id="nik_ayah" type="number" class="form-control" name="nik_ayah"
                                value="{{ old('nik_ayah') }}">
                            @error('nik_ayah')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input id="nama_ayah" type="text" class="form-control" name="nama_ayah"
                                value="{{ old('nama_ayah')}}">
                            @error('nama_ayah')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="date_of_birth_ayah">Tanggal Lahir Ayah</label>
                            <input id="date_of_birth_ayah" type="date" class="form-control datepicker"
                                name="date_of_birth_ayah" value="{{ old('date_of_birth_ayah') }}">
                            @error('date_of_birth_ayah')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="place_of_birth_ayah">Tempat Lahir Ayah</label>
                            <input id="place_of_birth_ayah" type="text" class="form-control"
                                name="place_of_birth_ayah" value="{{ old('place_of_birth_ayah') }}">
                            @error('place_of_birth_ayah')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="golongan_darah_ayah">Golongan Darah Ayah</label>
                            <select name="golongan_darah_ayah" id="golongan_darah_ayah" class="form-control selectric">
                                <option value="" selected disabled>-- Pilih Jenis Kelamin --
                                </option>
                                <option value="A"
                                    {{ old('golongan_darah_ayah') == 'A' ? 'selected' : '' }}>
                                    A
                                </option>
                                <option value="B"
                                    {{ old('golongan_darah_ayah') == 'B' ? 'selected' : '' }}>
                                    B
                                </option>
                                <option value="AB"
                                    {{ old('golongan_darah_ayah') == 'AB' ? 'selected' : '' }}>
                                    AB
                                </option>
                                <option value="0"
                                    {{ old('golongan_darah_ayah') == '0' ? 'selected' : '' }}>
                                    0
                                </option>
                            </select>
                            @error('golongan_darah_ayah')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="nik_anak">Nomor Induk Anak (NIK)</label>
                            <input id="nik_anak" type="number" class="form-control" name="nik_anak"
                                value="{{ old('nik_anak') }}">
                            @error('nik_anak')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="nama_anak">Nama Anak</label>
                            <input id="nama_anak" type="text" class="form-control" name="nama_anak"
                                value="{{ old('nama_anak')}}">
                            @error('nama_anak')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="date_of_birth_anak">Tanggal Lahir Anak</label>
                            <input id="date_of_birth_anak" type="date" class="form-control datepicker"
                                name="date_of_birth_anak" value="{{ old('date_of_birth_anak') }}">
                            @error('date_of_birth_anak')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="place_of_birth_anak">Tempat Lahir Anak</label>
                            <input id="place_of_birth_anak" type="text" class="form-control"
                                name="place_of_birth_anak" value="{{ old('place_of_birth_anak') }}">
                            @error('place_of_birth_anak')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-6">
                            <label for="gender_anak">Jenis Kelamin Anak</label>
                            <select name="gender_anak" id="gender_anak" class="form-control selectric">
                                <option value="" selected disabled>-- Pilih Jenis Kelamin --
                                </option>
                                <option value="L"
                                    {{ old('gender_anak') == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="P"
                                    {{ old('gender_anak') == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                            @error('gender_anak')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="golongan_darah_anak">Golongan Darah Anak</label>
                            <select name="golongan_darah_anak" id="golongan_darah_anak" class="form-control selectric">
                                <option value="" selected disabled>-- Golongan Darah --
                                </option>
                                <option value="A"
                                    {{ old('golongan_darah_anak') == 'A' ? 'selected' : '' }}>
                                    A
                                </option>
                                <option value="B"
                                    {{ old('golongan_darah_anak') == 'B' ? 'selected' : '' }}>
                                    B
                                </option>
                                <option value="AB"
                                    {{ old('golongan_darah_anak') == 'AB' ? 'selected' : '' }}>
                                    AB
                                </option>
                                <option value="0"
                                    {{ old('golongan_darah_anak') == '0' ? 'selected' : '' }}>
                                    0
                                </option>
                            </select>
                            @error('golongan_darah_anak')
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

                        <div class="form-group col-6">
                            <label for="kecamatan">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" class="form-control selectric">
                                <option value="" selected disabled>-- Pilih Desa --
                                </option>
                                <option value="Paiton" {{ old('kecamatan') == 'Paiton ' ? 'selected' : '' }}>
                                    Paiton 
                                </option>
                            </select>
                            @error('kecamatan')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <div class="form-group col-6">
                            <label for="desa">Desa</label>
                            <select name="desa" id="desa" class="form-control selectric">
                                <option value="" selected disabled>-- Pilih Desa --
                                </option>
                                <option value="Jabung Sisir" {{ old('desa') == 'Jabung Sisir' ? 'selected' : '' }}>
                                    Jabung Sisir 
                                </option>
                            </select>
                            @error('desa')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="posyandu">Posyandu</label>
                            <select name="posyandu" id="posyandu" class="form-control selectric">
                                <option value="" selected disabled>-- Pilih Posyandu --
                                </option>
                                <option value="anggrek" {{ old('posyandu') == 'Anggrek' ? 'selected' : '' }}>
                                    Anggrek
                                </option>
                                <option value="mawar"
                                    {{ old('posyandu') == 'Mawar' ? 'selected' : '' }}>Mawar
                                </option>
                                <option value="melati"
                                    {{ old('posyandu') == 'Melati' ? 'selected' : '' }}>Melati
                                </option>
                                <option value="kamboja"
                                    {{ old('posyandu') == 'Kamboja' ? 'selected' : '' }}>Kamboja
                                </option>
                                <option value="matahari"
                                    {{ old('posyandu') == 'Matahari' ? 'selected' : '' }}>Matahari
                                </option>
                            </select>
                            @error('posyandu')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="phone_number">Nomer Telefon (AKTIF)</label>
                            <input id="phone_number" type="number" class="form-control"
                                name="phone_number" value="{{ old('phone_number') }}">
                            @error('phone_number')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Tambah Keluarga</button>
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

