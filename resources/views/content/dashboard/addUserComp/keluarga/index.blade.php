@extends('layouts.app')

@section('title', 'Data Petugas')

@push('style')
    <!-- CSS Libraries -->
    <link href="{{ asset('library/selectric/public/selectric.css') }}" rel="stylesheet">
    <link href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet">
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

            @include('content.dashboard.addUserComp.dropdown.dropdown', ['jenisUser' => $jenisUser])



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="tambah-user" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <input name="role" type="hidden" value="keluarga">
                                    <div class="form-group col-6">
                                        <label for="username">Username</label>
                                        <input autofocus class="form-control" id="username" name="username" type="text"
                                            value="{{ old('username') }}">
                                        @error('username')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group col-6">
                                        <label class="d-block" for="password">Password</label>
                                        <input class="form-control" id="password" name="password" type="password">
                                        @error('password')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label class="d-block" for="password_confirmation">Konfirmasi Password</label>
                                        <input class="form-control" id="password_confirmation" name="password_confirmation"
                                            type="password">
                                        @error('password_confirmation')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="nik_ibu">Nomor Induk Ibu (NIK)</label>
                                        <input class="form-control" id="nik_ibu" name="nik_ibu" type="number"
                                            value="{{ old('nik_ibu') }}">
                                        @error('nik_ibu')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="nama_ibu">Nama ibu</label>
                                        <input class="form-control" id="nama_ibu" name="nama_ibu" type="text"
                                            value="{{ old('nama_ibu') }}">
                                        @error('nama_ibu')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="date_of_birth_ibu">Tanggal Lahir Ibu</label>
                                        <input class="form-control datepicker" id="date_of_birth_ibu"
                                            name="date_of_birth_ibu" type="date" value="{{ old('date_of_birth_ibu') }}">
                                        @error('date_of_birth_ibu')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="place_of_birth_ibu">Tempat Lahir Ibu</label>
                                        <input class="form-control" id="place_of_birth_ibu" name="place_of_birth_ibu"
                                            type="text" value="{{ old('place_of_birth_ibu') }}">
                                        @error('place_of_birth_ibu')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="golongan_darah_ibu">Golongan Darah Ibu</label>
                                        <select class="form-control selectric" id="golongan_darah_ibu"
                                            name="golongan_darah_ibu">
                                            <option disabled selected value="">-- Pilih Jenis Kelamin --
                                            </option>
                                            <option {{ old('golongan_darah_ibu') == 'A' ? 'selected' : '' }}
                                                value="A">
                                                A
                                            </option>
                                            <option {{ old('golongan_darah_ibu') == 'B' ? 'selected' : '' }}
                                                value="B">
                                                B
                                            </option>
                                            <option {{ old('golongan_darah_ibu') == 'AB' ? 'selected' : '' }}
                                                value="AB">
                                                AB
                                            </option>
                                            <option {{ old('golongan_darah_ibu') == '0' ? 'selected' : '' }}
                                                value="0">
                                                0
                                            </option>
                                        </select>
                                        @error('golongan_darah_ibu')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="nik_ayah">Nomor Induk Ayah (NIK)</label>
                                        <input class="form-control" id="nik_ayah" name="nik_ayah" type="number"
                                            value="{{ old('nik_ayah') }}">
                                        @error('nik_ayah')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="nama_ayah">Nama Ayah</label>
                                        <input class="form-control" id="nama_ayah" name="nama_ayah" type="text"
                                            value="{{ old('nama_ayah') }}">
                                        @error('nama_ayah')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="date_of_birth_ayah">Tanggal Lahir Ayah</label>
                                        <input class="form-control datepicker" id="date_of_birth_ayah"
                                            name="date_of_birth_ayah" type="date"
                                            value="{{ old('date_of_birth_ayah') }}">
                                        @error('date_of_birth_ayah')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="place_of_birth_ayah">Tempat Lahir Ayah</label>
                                        <input class="form-control" id="place_of_birth_ayah" name="place_of_birth_ayah"
                                            type="text" value="{{ old('place_of_birth_ayah') }}">
                                        @error('place_of_birth_ayah')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="golongan_darah_ayah">Golongan Darah Ayah</label>
                                        <select class="form-control selectric" id="golongan_darah_ayah"
                                            name="golongan_darah_ayah">
                                            <option disabled selected value="">-- Pilih Jenis Kelamin --
                                            </option>
                                            <option {{ old('golongan_darah_ayah') == 'A' ? 'selected' : '' }}
                                                value="A">
                                                A
                                            </option>
                                            <option {{ old('golongan_darah_ayah') == 'B' ? 'selected' : '' }}
                                                value="B">
                                                B
                                            </option>
                                            <option {{ old('golongan_darah_ayah') == 'AB' ? 'selected' : '' }}
                                                value="AB">
                                                AB
                                            </option>
                                            <option {{ old('golongan_darah_ayah') == '0' ? 'selected' : '' }}
                                                value="0">
                                                0
                                            </option>
                                        </select>
                                        @error('golongan_darah_ayah')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="nik_anak">Nomor Induk Anak (NIK)</label>
                                        <input class="form-control" id="nik_anak" name="nik_anak" type="number"
                                            value="{{ old('nik_anak') }}">
                                        @error('nik_anak')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="nama_anak">Nama Anak</label>
                                        <input class="form-control" id="nama_anak" name="nama_anak" type="text"
                                            value="{{ old('nama_anak') }}">
                                        @error('nama_anak')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="date_of_birth_anak">Tanggal Lahir Anak</label>
                                        <input class="form-control datepicker" id="date_of_birth_anak"
                                            name="date_of_birth_anak" type="date"
                                            value="{{ old('date_of_birth_anak') }}">
                                        @error('date_of_birth_anak')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="place_of_birth_anak">Tempat Lahir Anak</label>
                                        <input class="form-control" id="place_of_birth_anak" name="place_of_birth_anak"
                                            type="text" value="{{ old('place_of_birth_anak') }}">
                                        @error('place_of_birth_anak')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="gender_anak">Jenis Kelamin Anak</label>
                                        <select class="form-control selectric" id="gender_anak" name="gender_anak">
                                            <option disabled selected value="">-- Pilih Jenis Kelamin --
                                            </option>
                                            <option {{ old('gender_anak') == 'Laki-laki' ? 'selected' : '' }}
                                                value="L">
                                                Laki-laki
                                            </option>
                                            <option {{ old('gender_anak') == 'Perempuan' ? 'selected' : '' }}
                                                value="P">
                                                Perempuan
                                            </option>
                                        </select>
                                        @error('gender_anak')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="golongan_darah_anak">Golongan Darah Anak</label>
                                        <select class="form-control selectric" id="golongan_darah_anak"
                                            name="golongan_darah_anak">
                                            <option disabled selected value="">-- Golongan Darah --
                                            </option>
                                            <option {{ old('golongan_darah_anak') == 'A' ? 'selected' : '' }}
                                                value="A">
                                                A
                                            </option>
                                            <option {{ old('golongan_darah_anak') == 'B' ? 'selected' : '' }}
                                                value="B">
                                                B
                                            </option>
                                            <option {{ old('golongan_darah_anak') == 'AB' ? 'selected' : '' }}
                                                value="AB">
                                                AB
                                            </option>
                                            <option {{ old('golongan_darah_anak') == '0' ? 'selected' : '' }}
                                                value="0">
                                                0
                                            </option>
                                        </select>
                                        @error('golongan_darah_anak')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="address">Alamat</label>
                                        <input class="form-control" id="address" name="address" type="text"
                                            value="{{ old('address') }}">
                                        @error('address')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="kecamatan">Kecamatan</label>
                                        <select class="form-control selectric" id="kecamatan" name="kecamatan">
                                            <option disabled selected value="">-- Pilih Desa --
                                            </option>
                                            <option {{ old('kecamatan') == 'Paiton ' ? 'selected' : '' }} value="Paiton">
                                                Paiton
                                            </option>
                                        </select>
                                        @error('kecamatan')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="desa">Desa</label>
                                        <select class="form-control selectric" id="desa" name="desa">
                                            <option disabled selected value="">-- Pilih Desa --
                                            </option>
                                            <option {{ old('desa') == 'Jabung Sisir' ? 'selected' : '' }}
                                                value="Jabung Sisir">
                                                Jabung Sisir
                                            </option>
                                        </select>
                                        @error('desa')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="posyandu">Posyandu</label>
                                        <select class="form-control selectric" id="posyandu" name="posyandu">
                                            <option disabled selected value="">-- Pilih Posyandu --
                                            </option>
                                            <option {{ old('posyandu') == 'Anggrek' ? 'selected' : '' }} value="anggrek">
                                                Anggrek
                                            </option>
                                            <option {{ old('posyandu') == 'Mawar' ? 'selected' : '' }} value="mawar">
                                                Mawar
                                            </option>
                                            <option {{ old('posyandu') == 'Kenanga' ? 'selected' : '' }} value="kenanga">
                                                Kenanga
                                            </option>
                                            <option {{ old('posyandu') == 'teratai' ? 'selected' : '' }} value="teratai">
                                                Teratai
                                            </option>
                                            <option {{ old('posyandu') == 'cempaka' ? 'selected' : '' }} value="cempaka">
                                                Cempaka
                                            </option>
                                        </select>
                                        @error('posyandu')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="phone_number">Nomer Telefon (AKTIF)</label>
                                        <input class="form-control" id="phone_number" name="phone_number" type="number"
                                            value="{{ old('phone_number') }}">
                                        @error('phone_number')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" type="submit">Tambah Keluarga</button>
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
