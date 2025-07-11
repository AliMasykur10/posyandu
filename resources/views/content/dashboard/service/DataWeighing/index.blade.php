@extends('layouts.app')

@section('title', 'Data Penimbangan Anak')

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

    {{-- @if (auth()->check() && auth()->user()->role == 'bidan')
        @dd(auth()->user()->midwife->posyandu)
    @endif --}}

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Penimbangan Anak</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Layanan</a></div>
                    <div class="breadcrumb-item">Penimbangan Anak</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>Nama Anak</th>
                                                <th>Jenis Kelamin</th>
                                                <th>TTL</th>
                                                <th>Nama Ayah</th>
                                                <th>Nama Ibu</th>
                                                <th>Tanggal Penimbangan</th>
                                                <th>Perkembangan</th>
                                                <th>Berat Badan</th>
                                                <th>Tinggi Badan</th>
                                                <th>Keterangan</th>
                                                <th>Dilakukan Oleh</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($weighing as $penimbangan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $penimbangan->child->name }}</td>
                                                    <td>
                                                        @if ($penimbangan->child->gender == 'L')
                                                            Laki-laki
                                                        @else
                                                            Perempuan
                                                        @endif
                                                    </td>
                                                    <td>{{ $penimbangan->child->place_of_birth }},
                                                        {{ \Carbon\Carbon::parse($penimbangan->child->date_of_birth)->format('d F Y') }}
                                                    </td>
                                                    <td>{{ $penimbangan->child->parent->nama_ayah }}</td>
                                                    <td>{{ $penimbangan->child->parent->nama_ibu }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($penimbangan->weigh_date)->format('d F Y') }}
                                                    </td>
                                                    <td>
                                                        @if ($penimbangan->in_accordance == 'Y')
                                                            Sesuai
                                                        @else
                                                            Tidak Sesuai
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $penimbangan->body_weight }}
                                                    </td>

                                                    <td>
                                                        {{ $penimbangan->height }}
                                                    </td>

                                                    <td>
                                                        @if ($penimbangan->information == null)
                                                            Tidak Ada Keterangan
                                                        @else
                                                            {{ strip_tags($penimbangan->information) }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($penimbangan->users->officer_id != null)
                                                            {{ $penimbangan->users->officer->name }}
                                                        @elseif ($penimbangan->users->midwife != null)
                                                            {{ $penimbangan->users->midwife->name }}
                                                        @else
                                                            {{ $penimbangan->users->username }}
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <form action="/DataWeighing/{{ $penimbangan->id }}"
                                                            class="d-inline" id="delete-form-{{ $penimbangan->id }}"
                                                            method="POST">
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
