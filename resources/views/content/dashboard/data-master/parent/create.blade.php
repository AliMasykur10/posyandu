@extends('layouts.app')

@section('title', 'Data Keluarga')

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
                <h1>Data Keluarga</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                    <div class="breadcrumb-item">Keluarga</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form action="/parent-data" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <input name="role" type="hidden" value="parents">
                                        <div class="form-group col-6">
                                            <label for="username">Username</label>
                                            <input autofocus class="form-control" id="username" name="username"
                                                type="text" value="{{ old('username') }}">
                                            @error('username')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="nik">Nomor Kartu Keluarga (NKK)</label>
                                            <input class="form-control" id="nkk" name="nkk" type="number"
                                                value="{{ old('nkk') }}">
                                            @error('nik')
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
                                            <label class="d-block" for="password_confirmation">Password Confirmation</label>
                                            <input class="form-control" id="password_confirmation"
                                                name="password_confirmation" type="password">
                                            @error('password_confirmation')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="mother_name">Nama Ibu</label>
                                            <input class="form-control" id="mother_name" name="mother_name" type="text"
                                                value="{{ old('mother_name') }}">
                                            @error('mother_name')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="father_name">Nama Ayah</label>
                                            <input class="form-control" id="father_name" name="father_name" type="text"
                                                value="{{ old('father_name') }}">
                                            @error('father_name')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="date_of_birth_mom">Tanggal Lahir Ibu</label>
                                            <input class="form-control datepicker" id="date_of_birth_mom"
                                                name="date_of_birth_mom" type="text"
                                                value="{{ old('date_of_birth_mom') }}">
                                            @error('date_of_birth_mom')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="date_of_birth_father">Tanggal Lahir Ayah</label>
                                            <input class="form-control datepicker" id="date_of_birth_father"
                                                name="date_of_birth_father" type="text"
                                                value="{{ old('date_of_birth_father') }}">
                                            @error('date_of_birth_father')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="place_of_birth_mom">Tempat Lahir Ibu</label>
                                            <input class="form-control" id="place_of_birth_mom" name="place_of_birth_mom"
                                                type="text" value="{{ old('place_of_birth_mom') }}">
                                            @error('place_of_birth_mom')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="place_of_birth_father">Tempat Lahir Ayah</label>
                                            <input class="form-control" id="place_of_birth_father"
                                                name="place_of_birth_father" type="text"
                                                value="{{ old('place_of_birth_father') }}">
                                            @error('place_of_birth_father')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="blood_type_mom">Golongan Darah Ibu</label>
                                            <select class="form-control selectric" id="blood_type_mom"
                                                name="blood_type_mom">
                                                <option disabled selected value="">-- Pilih Golongan Darah Ibu --
                                                </option>
                                                <option {{ old('blood_type_mom') == 'A' ? 'selected' : '' }}
                                                    value="A">A</option>
                                                <option {{ old('blood_type_mom') == 'B' ? 'selected' : '' }}
                                                    value="B">B</option>
                                                <option {{ old('blood_type_mom') == 'AB' ? 'selected' : '' }}
                                                    value="AB">AB</option>
                                                <option {{ old('blood_type_mom') == 'O' ? 'selected' : '' }}
                                                    value="O">O</option>
                                            </select>
                                            @error('blood_type_mom')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="blood_type_father">Golongan Darah Ayah</label>
                                            <select class="form-control selectric" id="blood_type_father"
                                                name="blood_type_father">
                                                <option disabled selected value="">-- Pilih Golongan Darah Ayah --
                                                </option>
                                                <option {{ old('blood_type_father') == 'A' ? 'selected' : '' }}
                                                    value="A">A</option>
                                                <option {{ old('blood_type_father') == 'B' ? 'selected' : '' }}
                                                    value="B">B</option>
                                                <option {{ old('blood_type_father') == 'AB' ? 'selected' : '' }}
                                                    value="AB">AB</option>
                                                <option {{ old('blood_type_father') == 'O' ? 'selected' : '' }}
                                                    value="O">O</option>
                                            </select>
                                            @error('blood_type_father')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="many_kids">Banyak Anak</label>
                                            <input class="form-control" id="many_kids" name="many_kids" type="number"
                                                value="{{ old('many_kids') }}">
                                            @error('many_kids')
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
                                            <label for="city">Kota</label>
                                            <input class="form-control" id="city" name="city" type="text"
                                                value="{{ old('city') }}">
                                            @error('city')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="subdistrict">Kecamatan</label>
                                            <input class="form-control" id="subdistrict" name="subdistrict"
                                                type="text" value="{{ old('subdistrict') }}">
                                            @error('subdistrict')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="ward">Kelurahan</label>
                                            <input class="form-control" id="ward" name="ward" type="text"
                                                value="{{ old('ward') }}">
                                            @error('ward')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="postal_code">Kode Post</label>
                                            <input class="form-control" id="postal_code" name="postal_code"
                                                type="number" value="{{ old('postal_code') }}">
                                            @error('postal_code')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="phone_number">Nomer Telefon (AKTIF)</label>
                                            <input class="form-control" id="phone_number" name="phone_number"
                                                type="number" value="{{ old('phone_number') }}">
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
