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
        {{-- @if ($errors->any())
         {{ dd($errors->all()) }}
        @endif --}}

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
                                    <input name="role" type="hidden" value="kader">
                                    <div class="form-group col-6">
                                        <label for="username">Username</label>
                                        <input autofocus class="form-control" id="username" name="username" type="text"
                                            value="{{ old('username') }}">
                                        @error('username')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="name">Nama Petugas</label>
                                        <input class="form-control" id="name" name="name" type="text"
                                            value="{{ old('name') }}">
                                        @error('name')
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
                                        <label for="nik">Nomor Induk Petugas (NIK)</label>
                                        <input class="form-control" id="nik" name="nik" type="number"
                                            value="{{ old('nik') }}">
                                        @error('nik')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="date_of_birth">Tanggal Lahir Petugas</label>
                                        <input class="form-control datepicker" id="date_of_birth" name="date_of_birth"
                                            type="date" value="{{ old('date_of_birth') }}">
                                        @error('date_of_birth')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="place_of_birth">Tempat Lahir Petugas</label>
                                        <input class="form-control" id="place_of_birth" name="place_of_birth" type="text"
                                            value="{{ old('place_of_birth') }}">
                                        @error('place_of_birth')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="gender">Jenis Kelamin</label>
                                        <select class="form-control selectric" id="gender" name="gender">
                                            <option disabled selected value="">-- Pilih Jenis Kelamin --
                                            </option>
                                            <option {{ old('gender') == 'Laki-laki' ? 'selected' : '' }} value="Laki-laki">
                                                Laki-laki
                                            </option>
                                            <option {{ old('gender') == 'Perempuan' ? 'selected' : '' }} value="Perempuan">
                                                Perempuan
                                            </option>
                                        </select>
                                        @error('gender')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="position">Jabatan</label>
                                        <select class="form-control selectric" id="position" name="position">
                                            <option disabled selected value="">-- Pilih Jabatan --
                                            </option>
                                            <option {{ old('position') == 'Ketua' ? 'selected' : '' }} value="Ketua">
                                                Ketua
                                            </option>
                                            <option {{ old('position') == 'Anggota' ? 'selected' : '' }} value="Anggota">
                                                Anggota
                                            </option>
                                            <option {{ old('position') == 'Bendahara' ? 'selected' : '' }}
                                                value="Bendahara">Bendahara
                                            </option>
                                        </select>
                                        @error('position')
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
                                        <label for="last_educations">Pendidikan Terakhir</label>
                                        <select class="form-control selectric" id="last_educations"
                                            name="last_educations">
                                            <option disabled selected value="">-- Pilih Pendidikan --
                                            </option>
                                            <option {{ old('last_educations') == 'SD ' ? 'selected' : '' }}
                                                value="SD/MI/Sederajat">
                                                SD/MI/Sederajat
                                            </option>

                                            <option {{ old('last_educations') == 'SMP/MTS/Sederajat' ? 'selected' : '' }}
                                                value="SMP/MTS/Sederajat">SMP/MTS/Sederajat
                                            </option>

                                            <option {{ old('last_educations') == 'SMA/MA/Sederajat' ? 'selected' : '' }}
                                                value="SMA/MA/Sederajat">SMA/MA/Sederajat
                                            </option>

                                            <option {{ old('last_educations') == 'D1' ? 'selected' : '' }} value="D1">
                                                D1
                                            </option>
                                            <option {{ old('last_educations') == 'D2' ? 'selected' : '' }} value="D2">
                                                D2
                                            </option>
                                            </option>
                                            <option {{ old('last_educations') == 'D3' ? 'selected' : '' }} value="D3">
                                                D3
                                            </option>
                                            <option {{ old('last_educations') == 'S1/D4' ? 'selected' : '' }}
                                                value="S1/D4">S1/D4
                                            </option>
                                            <option {{ old('last_educations') == 'S2' ? 'selected' : '' }} value="S2">
                                                S2
                                            </option>
                                            <option {{ old('last_educations') == 'S3' ? 'selected' : '' }} value="S3">
                                                S3
                                            </option>
                                        </select>
                                        @error('last_educations')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="tahun_menjadi">Tahun Menjadi</label>
                                        <input class="form-control" id="tahun_menjadi" name="tahun_menjadi"
                                            type="text" value="{{ old('tahun_menjadi') }}">
                                        @error('tahun_menjadi')
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
                                <button class="btn btn-primary" type="submit">Tambah Petugas</button>
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
