@extends('layouts.app')

@section('title', 'Data Anak')

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
                <h1>Edit Anak</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Edit Data</a></div>
                </div>
            </div>

            {{-- {{ dd($data) }} --}}

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('tampil-user.edit.anak.update', $id) }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="nik">Nomor Induk Anak (NIK) </label>
                                        <input class="form-control" id="nik" name="nik" type="number"
                                            value="{{ $data->nik }}">
                                        @error('nik')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="nama">Nama Anak </label>
                                        <input class="form-control" id="nama" name="name" type="text"
                                            value="{{ $data->name }}">
                                        @error('nama')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="date_of_birth">Tanggal Lahir Anak </label>
                                        <input class="form-control datepicker" id="date_of_birth" name="date_of_birth"
                                            type="date" value="{{ $data->date_of_birth }}">
                                        @error('date_of_birth')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group col-6">
                                        <label for="place_of_birth">Tempat Lahir Anak </label>
                                        <input class="form-control" id="place_of_birth_{{ $data->id }}"
                                            name="place_of_birth" type="text" value="{{ $data->place_of_birth }}">
                                        @error('place_of_birth')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="gender">Jenis Kelamin Anak </label>
                                        <select class="form-control selectric" id="gender" name="gender">
                                            <option disabled selected value="">-- Pilih Jenis Kelamin --
                                            </option>
                                            <option {{ $data->gender == 'L' ? 'selected' : '' }} value="L">
                                                Laki-laki
                                            </option>
                                            <option {{ $data->gender == 'P' ? 'selected' : '' }} value="P">
                                                Perempuan
                                            </option>
                                        </select>
                                        @error('gender')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="golongan_darah">Golongan Darah Anak </label>
                                        <select class="form-control selectric" id="golongan_darah" name="golongan_darah">
                                            <option disabled selected value="">-- Golongan Darah --
                                            </option>
                                            <option {{ $data->golongan_darah == 'A' ? 'selected' : '' }} value="A">
                                                A
                                            </option>
                                            <option {{ $data->golongan_darah == 'B' ? 'selected' : '' }} value="B">
                                                B
                                            </option>
                                            <option {{ $data->golongan_darah == 'AB' ? 'selected' : '' }} value="AB">
                                                AB
                                            </option>
                                            <option {{ $data->golongan_darah == 'O' ? 'selected' : '' }} value="O">
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
                                <button class="btn btn-primary" type="submit">Update Anak</button>
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
