@extends('layouts.app')

@section('title', 'Data User')

@push('style')
    <!-- CSS Libraries -->
    <link href="{{ asset('library/selectric/public/selectric.css') }}" rel="stylesheet">
    <link href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
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
                <h1>Data User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Data User</a></div>
                </div>
            </div>

            <div class="section-body mb-4">
                <a class="btn btn-primary" href="{{ route('handle-user.admin') }}">Tambah User</a>
            </div>

            <div class="section-body">
                <div class="card-body">
                    <div class="search">
                        <form action="{{ route('tampil-user.index') }}" method="GET">
                            <div class="input-grup row mb-3">
                                <input class="form-control col" name="search" placeholder="Search..." type="text"
                                    value="{{ request('search') }}">
                                <div class="input-group-append col">
                                    <button class="btn btn-primary mr-3" type="submit">Search</button>
                                    <a class="btn btn-warning d-flex justify-content-center align-items-center"
                                        href="{{ route('tampil-user.index') }}">Clear</a>
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
                                @foreach ($user as $index => $u)
                                    <tr>
                                        <td>
                                            {{ ($user->currentPage() - 1) * $user->perPage() + $index + 1 }}
                                        </td>
                                        <td>{{ $u->username }}</td>
                                        <td>{{ $u->role }}</td>
                                        <td>
                                            <a class="btn btn-warning ml-auto"
                                                href="/tampil-user/edit/{{ $u->id }}"><i
                                                    class="fas fa-edit"></i></a>
                                            <form action="tampil-user/{{ $u->id }}" class="d-inline"
                                                id="delete-form-{{ $u->id }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-action del mr-1" type="submit">
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
