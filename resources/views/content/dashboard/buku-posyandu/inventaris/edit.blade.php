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
                        <form action="{{ route('inventaris.update', $data->id) }}" enctype="multipart/form-data"
                            id="userForm" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <input name="role" type="hidden" value="admin">

                                    <div class="form-group col-6">
                                        <label for="nama_barang">Nama Barang</label>
                                        <input autofocus class="form-control" id="nama_barang" name="nama_barang"
                                            type="text" value="{{ $data->nama_barang }}">
                                        @error('nama_barang')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="tanggal_terima">Tanggal Terima</label>
                                        <input autofocus class="form-control" id="tanggal_terima" name="tanggal_terima"
                                            type="date" value="{{ $data->tanggal_terima }}">
                                        @error('tanggal_terima')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group col-6">
                                        <label for="asal">Asal/Sumber</label>
                                        <input autofocus class="form-control" id="asal" name="asal" type="text"
                                            value="{{ $data->asal }}">
                                        @error('asal')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="jumlah">Jumlah</label>
                                        <input autofocus class="form-control" id="jumlah" name="jumlah" type="text"
                                            value="{{ $data->jumlah }}">
                                        @error('jumlah')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="keadaan">keadaan</label>
                                        <select class="form-control selectric" id="keadaan" name="keadaan">
                                            <option disabled selected value="">-- Pilih keadaan --
                                            </option>
                                            <option {{ $data->keadaan == 'bagus' ? 'selected' : '' }} value="bagus">
                                                Bagus
                                            </option>
                                            <option {{ $data->keadaan == 'rusak' ? 'selected' : '' }} value="rusak">
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
                                            type="text" value="{{ $data->keterangan }}">
                                        @error('keterangan')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="posyandu">Posyandu</label>
                                        <select class="form-control selectric" id="posyandu" name="posyandu">
                                            <option disabled selected value="">-- Pilih Posyandu --
                                            </option>
                                            <option {{ $data->posyandu == 'anggrek' ? 'selected' : '' }} value="anggrek">
                                                Anggrek
                                            </option>
                                            <option {{ $data->posyandu == 'mawar' ? 'selected' : '' }} value="mawar">
                                                Mawar
                                            </option>
                                            <option {{ $data->posyandu == 'kenanga' ? 'selected' : '' }} value="kenanga">
                                                Kenanga
                                            </option>
                                            <option {{ $data->posyandu == 'teratai' ? 'selected' : '' }} value="teratai">
                                                Teratai
                                            </option>
                                            <option {{ $data->posyandu == 'cempaka' ? 'selected' : '' }} value="cempaka">
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
                                <button class="btn btn-primary" type="submit">Update barang</button>
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
