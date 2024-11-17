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
                <h1>Edit User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Edit Data</a></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('tambah-user.update', $id) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <input name="role" type="hidden" value="bidan">
                                    <div class="form-group col-6">
                                        <label for="username">Username</label>
                                        <input autofocus class="form-control" id="username" name="username" type="text"
                                            value="{{ $data->username }}">
                                        @error('username')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="name">Nama Bidan</label>
                                        <input class="form-control" id="name" name="name" type="text"
                                            value="{{ $data->midwife->name }}">
                                        @error('name')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="nik">Nomor Induk Kependudukan (NIK)</label>
                                        <input class="form-control" id="nik" name="nik" type="number"
                                            value="{{ $data->midwife->nik }}">
                                        @error('nik')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="nip">Nomor Induk Petugas (NIP)</label>
                                        <input class="form-control" id="nip" name="nip" type="number"
                                            value="{{ $data->midwife->nip }}">
                                        @error('nip')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="date_of_birth">Tanggal Lahir Petugas</label>
                                        <input class="form-control datepicker" id="date_of_birth" name="date_of_birth"
                                            type="date" value="{{ $data->midwife->date_of_birth }}">
                                        @error('date_of_birth')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="place_of_birth">Tempat Lahir Petugas</label>
                                        <input class="form-control" id="place_of_birth" name="place_of_birth" type="text"
                                            value="{{ $data->midwife->place_of_birth }}">
                                        @error('place_of_birth')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="gender">Jenis Kelamin</label>
                                        <select class="form-control selectric" id="gender" name="gender">
                                            <option disabled selected value="">-- Pilih Jenis Kelamin --
                                            </option>
                                            <option {{ $data->midwife->gender == 'Laki-laki' ? 'selected' : '' }}
                                                value="Laki-laki">
                                                Laki-laki
                                            </option>
                                            <option {{ $data->midwife->gender == 'Perempuan' ? 'selected' : '' }}
                                                value="Perempuan">
                                                Perempuan
                                            </option>
                                        </select>
                                        @error('gender')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="address">Alamat</label>
                                        <input class="form-control" id="address" name="address" type="text"
                                            value="{{ $data->midwife->address }}">
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
                                        <label for="last_educations">Pendidikan Terakhir</label>
                                        <select class="form-control selectric" id="last_educations"
                                            name="last_educations">
                                            <option disabled selected value="">-- Pilih Pendidikan --
                                            </option>
                                            <option {{ $data->midwife->last_educations == 'SD' ? 'selected' : '' }}
                                                value="SD/MI/Sederajat">
                                                SD/MI/Sederajat
                                            </option>

                                            <option
                                                {{ $data->midwife->last_educations == 'SMP/MTS/Sederajat' ? 'selected' : '' }}
                                                value="SMP/MTS/Sederajat">SMP/MTS/Sederajat
                                            </option>

                                            <option
                                                {{ $data->midwife->last_educations == 'SMA/MA/Sederajat' ? 'selected' : '' }}
                                                value="SMA/MA/Sederajat">SMA/MA/Sederajat
                                            </option>

                                            <option {{ $data->midwife->last_educations == 'D1' ? 'selected' : '' }}
                                                value="D1">D1
                                            </option>
                                            <option {{ $data->midwife->last_educations == 'D2' ? 'selected' : '' }}
                                                value="D2">D2
                                            </option>
                                            </option>
                                            <option {{ $data->midwife->last_educations == 'D3' ? 'selected' : '' }}
                                                value="D3">D3
                                            </option>
                                            <option {{ $data->midwife->last_educations == 'S1/D4' ? 'selected' : '' }}
                                                value="S1/D4">S1/D4
                                            </option>
                                            <option {{ $data->midwife->last_educations == 'S2' ? 'selected' : '' }}
                                                value="S2">S2
                                            </option>
                                            <option {{ $data->midwife->last_educations == 'S3' ? 'selected' : '' }}
                                                value="S3">S3
                                            </option>
                                        </select>
                                        @error('last_educations')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="phone_number">Nomer Telefon (AKTIF)</label>
                                        <input class="form-control" id="phone_number" name="phone_number" type="number"
                                            value="{{ $data->midwife->phone_number }}">
                                        @error('phone_number')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" type="submit">Update Bidan</button>
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
