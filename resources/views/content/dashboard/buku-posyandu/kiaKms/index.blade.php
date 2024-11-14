@extends('layouts.app')

@section('title', 'KIa & KMS')

@section('main',)


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Distribusi KIA & KMS</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">kia & kms</a></div>
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
                                            <th class="text-center">No</th>
                                            <th>Bulan</th>
                                            <th>Nama Barang</th>
                                            <th>Tanggal Terima</th>
                                            <th>Asal / Sumber</th>
                                            <th>Sisa Bulan lalu</th>
                                            <th>Jumlah Diterima</th>
                                            <th>Jumlah Keluar</th>
                                            <th>Sisa Bulan ini</th>
                                            <th>Keterangan</th>
                                            <th>Aksi/th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Januari</td>
                                                <td>Bulu KIA / KMS</td>
                                                <td>1-9-2024</td>
                                                <td>Keluarahan</td>
                                             <td>2</td> 
                                             <td>10</td> 
                                             <td>9</td> 
                                             <td>3</td> 
                                             <td>-</td> 
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