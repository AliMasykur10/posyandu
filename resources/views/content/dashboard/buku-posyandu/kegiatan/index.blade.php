@extends('layouts.app')

@section('title', 'Kegiatan')

@section('main')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kegiatan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Kegiatan</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="text-left">Basic DataTables</h4>
                                <a class="btn btn-primary ml-auto" href="{{ route('kegiatan.create') }}">
                                    <i class="fas fa-plus"></i>Tambah Kegiatan</a>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>Kegiatan</th>
                                                <th>Tempat</th>
                                                <th>Penangung Jawab</th>
                                                <th>Sumber Dana</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($data as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->kegiatan }}</td>
                                                    <td>{{ $data->tempat }}</td>
                                                    <td>{{ $data->penanggung_jawab }}</td>
                                                    <td>{{ $data->sumber_dana }}</td>
                                                    <td>{{ $data->keterangan }}</td>
                                                    <td>
                                                        <a class="btn btn-info ml-auto mr-1" data-target="#exampleModal1"
                                                            data-toggle="modal" href="#">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a class="btn btn-warning ml-auto"
                                                            href="/kegiatan/{{ $data->id }}/edit"><i
                                                                class="fas fa-edit"></i></a>

                                                        <form action="{{ route('kegiatan.destroy', $data->id) }}"
                                                            class="d-inline" id="delete-form-1" method="POST">
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
