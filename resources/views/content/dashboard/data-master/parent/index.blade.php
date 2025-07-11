@extends('layouts.app')

@section('title', 'Data Keluarga')

@push('style')
    <!-- CSS Libraries -->
    <link href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('main')

    @if (session('success'))
        <div class="flash-data" data-flashdata="{{ session('success') }}"></div>
    @endif

    @if (session('error'))
        <div class="error-data" data-errordata="{{ session('error') }}"></div>
    @endif

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
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <a class="btn btn-primary ml-auto" href="/parent-data/create"><i class="fas fa-plus"></i>
                                    Tambah Keluarga</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>Username</th>
                                                <th>Nama Ibu</th>
                                                <th>Nama Ayah</th>
                                                <th>Jumlah Anak</th>
                                                <th>Kota</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($parents as $parent)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="user-name">
                                                        {{ $parent->users->first() ? $parent->users->first()->username : 'N/A' }}
                                                    <td>{{ $parent->nama_ibu }}</td>
                                                    <td>{{ $parent->nama_ayah }}</td>
                                                    <td>
                                                        {{ $parent->child->count() ? $parent->child->count() : 'N/A' }}</td>
                                                    <td>{{ $parent->kecamatan }}</td>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-info ml-auto mr-1"
                                                            data-target="#exampleModal{{ $parent->id }}"
                                                            data-toggle="modal" href="#">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <form action="/parent-data/{{ $parent->id }}" class="d-inline"
                                                            id="delete-form-{{ $parent->id }}" method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="btn btn-danger btn-action del mr-1"
                                                                type="submit">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    @foreach ($parents as $parent)
        <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal{{ $parent->id }}"
            role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Keluarga</h5>
                        <button aria-label="Close" class="close text-white" data-dismiss="modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4 border-right">
                                <!-- Bagian pertama -->
                                <dl class="row">
                                    <dt class="col-sm-4">Nama Ibu:</dt>
                                    <dd class="col-sm-8">{{ $parent->nama_ibu ?? 'N/A' }}</dd>

                                    <dt class="col-sm-4">Tanggal Lahir:</dt>
                                    <dd class="col-sm-8">
                                        {{ $parent->date_of_birth_ibu ? \Carbon\Carbon::parse($parent->date_of_birth_ibu)->format('d F Y') : 'N/A' }}
                                    </dd>

                                    <dt class="col-sm-4">Tempat Lahir:</dt>
                                    <dd class="col-sm-8">{{ $parent->place_of_birth_ibu ?? 'N/A' }}</dd>

                                    <dt class="col-sm-4">Tipe Darah:</dt>
                                    <dd class="col-sm-8">{{ $parent->golongan_darah_ibu ?? 'N/A' }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-4 border-right">
                                <!-- Bagian kedua -->
                                <dl class="row">
                                    <dt class="col-sm-4">Nama Ayah:</dt>
                                    <dd class="col-sm-8">{{ $parent->nama_ayah ?? 'N/A' }}</dd>

                                    <dt class="col-sm-4">Tanggal Lahir:</dt>
                                    <dd class="col-sm-8">
                                        {{ $parent->date_of_birth_ayah ? \Carbon\Carbon::parse($parent->date_of_birth_ayah)->format('d F Y') : 'N/A' }}
                                    </dd>

                                    <dt class="col-sm-4">Tempat Lahir:</dt>
                                    <dd class="col-sm-8">{{ $parent->place_of_birth_ayah ?? 'N/A' }}</dd>

                                    <dt class="col-sm-4">Tipe Darah:</dt>
                                    <dd class="col-sm-8">{{ $parent->golongan_darah_ayah ?? 'N/A' }}</dd>
                                </dl>
                            </div>
                            <div class="col-md-4">
                                <!-- Bagian ketiga -->
                                <dl class="row">
                                    <dt class="col-sm-4">Username:</dt>
                                    <dd class="col-sm-8">{{ $parent->users->first()->username ?? 'N/A' }}</dd>

                                    <dt class="col-sm-4">NKK:</dt>
                                    <dd class="col-sm-8">{{ $parent->nkk ?? 'N/A' }}</dd>

                                    <dt class="col-sm-4">Jumlah Anak:</dt>
                                    <dd class="col-sm-8">{{ $parent->child->count() ?? 'N/A' }}</dd>

                                    <dt class="col-sm-4">Alamat:</dt>
                                    <dd class="col-sm-8">{{ $parent->address ?? 'N/A' }}</dd>

                                    <dt class="col-sm-4">Kota:</dt>
                                    <dd class="col-sm-8">{{ $parent->desa ?? 'N/A' }}</dd>


                                    <dt class="col-sm-4">Kecamatan:</dt>
                                    <dd class="col-sm-8">{{ $parent->kecamatan ?? 'N/A' }}</dd>

                                    <dt class="col-sm-4">Posyandu:</dt>
                                    <dd class="col-sm-8">{{ $parent->posyandu ?? 'N/A' }}</dd>

                                    <dt class="col-sm-4">Nomor HP:</dt>
                                    <dd class="col-sm-8">{{ $parent->phone_number ?? 'N/A' }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-dismiss="modal" type="button">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.del').on('click', function(e) {
                e.preventDefault();

                const formId = $(this).closest('form').attr('id');

                swal({
                    title: 'Hapus Data',
                    text: 'Apakah Anda Yakin Ingin Menghapus Data Ini?',
                    icon: 'warning',
                    buttons: {
                        cancel: 'Batal',
                        confirm: {
                            text: 'Ya, Hapus!',
                            value: true,
                            className: 'btn-danger',
                        }
                    },
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $('#' + formId).submit();
                    } else {
                        swal('Penghapusan Dibatalkan');
                    }
                });
            });
        });
    </script>


    <script src="{{ asset('node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush
