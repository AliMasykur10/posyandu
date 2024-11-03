@extends('layouts.app')

@section('title', 'SDIDTK')

@section('main',)


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>PUS & WUS</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">PUS & WUS</a></div>
            </div>
        </div>
    
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="text-left">Basic DataTables</h4>
                            <a href="/children-data/create" class="btn btn-primary ml-auto">
                                <i class="fas fa-plus"></i>Tambah</a>
                        </div>
    
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
                                            <th>Nama Ayah</th>
                                            <th>Nama Ibu</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Umur</th>
                                            <th>Alamat</th>
                                            <th>Status Gizi</th>
                                            <th>Jenis Kemampuan</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="">
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
                                            </tr>
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