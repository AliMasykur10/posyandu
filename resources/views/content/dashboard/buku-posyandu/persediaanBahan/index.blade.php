@extends('layouts.app')

@section('title', 'Persediaan Bahan')

@section('main')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Persediaan Bahan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">persediaan bahan</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="text-left">Basic DataTables</h4>
                                <a class="btn btn-primary ml-auto" href="{{ route('persediaan-bahan.create') }}">
                                    <i class="fas fa-plus"></i>Tambah</a>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Bulan</th>
                                                <th>Nama Barang</th>
                                                <th>Tanggal Terima</th>
                                                <th>Asal / Sumber</th>
                                                <th>Sisa Bulan lalu</th>
                                                <th>Jumlah Diterima</th>
                                                <th>Jumlah Keluar</th>
                                                <th>Sisa Bulan ini</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($datas as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->bulan }}</td>
                                                    <td>{{ $data->nama_barang }}</td>
                                                    <td>{{ $data->tanggal_terima }}</td>
                                                    <td>{{ $data->asal }}</td>
                                                    <td>{{ $data->jumlah }}</td>
                                                    <td>
                                                        <a class="btn btn-info ml-auto mr-1" data-target="#exampleModal1"
                                                            data-toggle="modal" href="#">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a class="btn btn-warning ml-auto"
                                                            href="/tugas-absensi/{{ $data->id }}/edit"><i
                                                                class="fas fa-edit"></i></a>


                                                        <form action="{{ route('tugas-absensi.destroy', $data->id) }}"
                                                            class="d-inline" id="delete-form-1" method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="btn btn-danger btn-action del mr-1"
                                                                type="submit">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            {{-- <tr>
                                                <td>1</td>
                                                <td>Januari</td>
                                                <td>vitamin</td>
                                                <td>1-9-2024</td>
                                                <td>Keluarahan</td>
                                             <td>2</td> 
                                             <td>10</td> 
                                             <td>9</td> 
                                             <td>3</td> 
                                                <td>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#exampleModal1"
                                                        class="btn btn-info ml-auto mr-1">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="/children-data/1/edit"
                                                        class="btn btn-warning ml-auto"><i class="fas fa-edit"></i></a>
                                                    <form action="/children-data/1" method="POST"
                                                        id="delete-form-1" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-danger mr-1 btn-action del">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr> --}}
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
