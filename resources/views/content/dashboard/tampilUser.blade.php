@extends('layouts.app')

@section('title', 'Data User')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
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
                <h1>Data User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Data User</a></div>
                </div>
            </div>

            <div class="section-body mb-4">
               <a href="{{ route('handle-user.admin') }}" class="btn btn-primary">Tambah User</a>
            </div>

            <div class="section-body">
                <div class="card-body">
                    <div class="search">
                    <form action="{{ route('tampil-user.index') }}" method="GET" >
                        <div class="input-grup mb-3 row" >
                            <input type="text" name="search" class="form-control col" placeholder="Search..." value="{{ request('search') }}" >
                            <div class="input-group-append col">
                                <button class="btn btn-primary mr-3" type="submit">Search</button>
                                <a href="{{ route('tampil-user.index') }}" class="btn btn-warning d-flex justify-content-center align-items-center" >Clear</a>
                            </div>    
                        </div>
                        </form>    
                    </div> 
                    <div class="table-responsive mt-4">

                        <table class="table-striped table" id="table-1">

                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $index => $u)
                                <tr>
                                    <td>
                                        {{ ($user->currentPage() - 1) * $user->perPage() + $index + 1 }}
                                    </td>
                                    <td>{{ $u->username }}</td>
                                    <td>{{ $u->role }}</td>
                                    <td>
                                        <a href="/tampil-user/edit/{{ $u->id }}"
                                            class="btn btn-warning ml-auto"><i class="fas fa-edit"></i></a>
                                        <form action="tampil-user/{{ $u->id }}" method="POST"
                                            id="delete-form-{{ $u->id }}" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-danger mr-1 btn-action del">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>

                        <div>
                            {{ $user->links() }}
                        </div>

                    </div>

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

