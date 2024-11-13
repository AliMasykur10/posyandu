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
                                    <input name="role" type="hidden" value="keluarga">
                                    <div class="form-group col-6">
                                        <label for="username">Username</label>
                                        <input autofocus class="form-control" id="username" name="username" type="text"
                                            value="{{ $data->username }}">
                                        @error('username')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row">

                                    <div>
                                        <p class="ml-3">Ibu</p>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="nik_ibu">Nomor Induk Ibu (NIK)</label>
                                        <input class="form-control" id="nik_ibu" name="nik_ibu" type="number"
                                            value="{{ $data->family->nik_ibu }}">
                                        @error('nik_ibu')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="nama_ibu">Nama ibu</label>
                                        <input class="form-control" id="nama_ibu" name="nama_ibu" type="text"
                                            value="{{ $data->family->nama_ibu }}">
                                        @error('nama_ibu')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="date_of_birth_ibu">Tanggal Lahir Ibu</label>
                                        <input class="form-control datepicker" id="date_of_birth_ibu"
                                            name="date_of_birth_ibu" type="date"
                                            value="{{ $data->family->date_of_birth_ibu }}">
                                        @error('date_of_birth_ibu')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="place_of_birth_ibu">Tempat Lahir Ibu</label>
                                        <input class="form-control" id="place_of_birth_ibu" name="place_of_birth_ibu"
                                            type="text" value="{{ $data->family->place_of_birth_ibu }}">
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
                                            <option {{ $data->family->golongan_darah_ibu == 'A' ? 'selected' : '' }}
                                                value="A">
                                                A
                                            </option>
                                            <option {{ $data->family->golongan_darah_ibu == 'B' ? 'selected' : '' }}
                                                value="B">
                                                B
                                            </option>
                                            <option {{ $data->family->golongan_darah_ibu == 'AB' ? 'selected' : '' }}
                                                value="AB">
                                                AB
                                            </option>
                                            <option {{ $data->family->golongan_darah_ibu == '0' ? 'selected' : '' }}
                                                value="0">
                                                0
                                            </option>
                                        </select>
                                        @error('golongan_darah_ibu')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">

                                    <div>
                                        <p class="ml-3">Ayah</p>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="form-group col-6">
                                        <label for="nik_ayah">Nomor Induk Ayah (NIK)</label>
                                        <input class="form-control" id="nik_ayah" name="nik_ayah" type="number"
                                            value="{{ $data->family->nik_ayah }}">
                                        @error('nik_ayah')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="nama_ayah">Nama Ayah</label>
                                        <input class="form-control" id="nama_ayah" name="nama_ayah" type="text"
                                            value="{{ $data->family->nama_ayah }}">
                                        @error('nama_ayah')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="date_of_birth_ayah">Tanggal Lahir Ayah</label>
                                        <input class="form-control datepicker" id="date_of_birth_ayah"
                                            name="date_of_birth_ayah" type="date"
                                            value="{{ $data->family->date_of_birth_ayah }}">
                                        @error('date_of_birth_ayah')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="place_of_birth_ayah">Tempat Lahir Ayah</label>
                                        <input class="form-control" id="place_of_birth_ayah" name="place_of_birth_ayah"
                                            type="text" value="{{ $data->family->place_of_birth_ayah }}">
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
                                            <option {{ $data->family->golongan_darah_ayah == 'A' ? 'selected' : '' }}
                                                value="A">
                                                A
                                            </option>
                                            <option {{ $data->family->golongan_darah_ayah == 'B' ? 'selected' : '' }}
                                                value="B">
                                                B
                                            </option>
                                            <option {{ $data->family->golongan_darah_ayah == 'AB' ? 'selected' : '' }}
                                                value="AB">
                                                AB
                                            </option>
                                            <option {{ $data->family->golongan_darah_ayah == '0' ? 'selected' : '' }}
                                                value="0">
                                                0
                                            </option>
                                        </select>
                                        @error('golongan_darah_ayah')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row">

                                    <div>
                                        <p class="ml-3">Lainnya</p>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="form-group col-6">
                                        <label for="address">Alamat</label>
                                        <input class="form-control" id="address" name="address" type="text"
                                            value="{{ $data->family->address }}">
                                        @error('address')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="kecamatan">Kecamatan</label>
                                        <select class="form-control selectric" id="kecamatan" name="kecamatan">
                                            <option disabled selected value="">-- Pilih Desa --
                                            </option>
                                            <option {{ $data->family->kecamatan == 'Paiton' ? 'selected' : '' }}
                                                value="Paiton">
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
                                            <option {{ $data->family->desa == 'Jabung Sisir' ? 'selected' : '' }}
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
                                            <option {{ $data->family->posyandu == 'anggrek' ? 'selected' : '' }}
                                                value="anggrek">
                                                Anggrek
                                            </option>
                                            <option {{ $data->family->posyandu == 'mawar' ? 'selected' : '' }}
                                                value="mawar">Mawar
                                            </option>
                                            <option {{ $data->family->posyandu == 'melati' ? 'selected' : '' }}
                                                value="melati">Melati
                                            </option>
                                            <option {{ $data->family->posyandu == 'kamboja' ? 'selected' : '' }}
                                                value="kamboja">Kamboja
                                            </option>
                                            <option {{ $data->family->posyandu == 'matahari' ? 'selected' : '' }}
                                                value="matahari">Matahari
                                            </option>
                                        </select>
                                        @error('posyandu')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group col-6">
                                        <label for="phone_number">Nomer Telefon (AKTIF)</label>
                                        <input class="form-control" id="phone_number" name="phone_number" type="number"
                                            value="{{ $data->family->phone_number }}">
                                        @error('phone_number')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        @foreach ($data->family->child as $anak)
                                            <a class="btn btn-primary mr-2"
                                                href="/tampil-user/edit/anak/{{ $anak->id }}">Edit
                                                {{ $anak->name }}</a>
                                        @endforeach
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer text-right">
                                <button class="btn btn-primary" type="submit">Update Keluarga</button>
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
