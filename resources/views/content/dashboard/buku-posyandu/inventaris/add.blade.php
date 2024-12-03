@extends('layouts.app')

@section('title', 'Kegiatan')

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
                <h1>Tambah Barang</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Inventaris</a></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('inventaris.store') }}" enctype="multipart/form-data" id="userForm"
                            method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <input name="role" type="hidden" value="admin">

                                    <div class="form-group col-6">
                                        <label for="nama_barang">Nama Barang</label>
                                        <input autofocus class="form-control" id="nama_barang" name="nama_barang"
                                            type="text" value="{{ old('nama_barang') }}">
                                        @error('nama_barang')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="tanggal_terima">Tanggal Terima</label>
                                        <input autofocus class="form-control" id="tanggal_terima" name="tanggal_terima"
                                            type="date" value="{{ old('tanggal_terima') }}">
                                        @error('tanggal_terima')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group col-6">
                                        <label for="asal">Asal/Sumber</label>
                                        <input autofocus class="form-control" id="asal" name="asal" type="text"
                                            value="{{ old('asal') }}">
                                        @error('asal')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="jumlah">Jumlah</label>
                                        <input autofocus class="form-control" id="jumlah" name="jumlah" type="text"
                                            value="{{ old('jumlah') }}">
                                        @error('jumlah')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="keadaan">keadaan</label>
                                        <select class="form-control selectric" id="keadaan" name="keadaan">
                                            <option disabled selected value="">-- Pilih keadaan --
                                            </option>
                                            <option {{ old('keadaan') == 'bagus' ? 'selected' : '' }} value="bagus">
                                                Bagus
                                            </option>
                                            <option {{ old('keadaan') == 'rusak' ? 'selected' : '' }} value="rusak">
                                                Rusak
                                            </option>
                                        </select>
                                        @error('keadaan')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="keterangan">Keterangan</label>
                                        <input autofocus class="form-control" id="keterangan" name="keterangan"
                                            type="text" value="{{ old('keterangan') }}">
                                        @error('keterangan')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="posyandu">Posyandu</label>
                                        <select class="form-control selectric" id="posyandu" name="posyandu">
                                            <option disabled selected value="">-- Pilih Posyandu --
                                            </option>
                                            <option {{ old('posyandu') == 'anggrek' ? 'selected' : '' }} value="anggrek">
                                                Anggrek
                                            </option>
                                            <option {{ old('posyandu') == 'mawar' ? 'selected' : '' }} value="mawar">
                                                Mawar
                                            </option>
                                            <option {{ old('posyandu') == 'kenanga' ? 'selected' : '' }} value="kenanga">
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

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" type="submit">Tambah barang</button>
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
