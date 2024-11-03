@extends('layouts.app')

@section('title', 'Data Petugas')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush



@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">tambah Data</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group col-6">
                            <label for="tipe-user">Jenis User</label>
                            <select name="jenisUser" id="jenisUser" class="form-control selectric" onchange="handleChange(this.value)">
                                </option>
                                <option value="admin" selected 
                                    {{ old('jenisUser') == 'admin' ? 'selected' : '' }}>
                                    Admin
                                </option>
                                <option value="bidan"
                                    {{ old('jenisUser') == 'bidan' ? 'selected' : '' }}>
                                    Bidan
                                </option>
                                <option value="kader"
                                    {{ old('jenisUser') == 'kader' ? 'selected' : '' }}>
                                    Petugas
                                </option>
                                <option value="kepalaDesa"
                                    {{ old('jenisUser') == 'kepalaDesa' ? 'selected' : '' }}>
                                    Kepala Desa
                                </option>
                                <option value="keluarga"
                                    {{ old('jenisUser') == 'keluarga' ? 'selected' : '' }}>
                                    Keluarga
                                </option>
                                <option value="puskesmas"
                                    {{ old('jenisUser') == 'puskesmas' ? 'selected' : '' }}>
                                    Puskesmas
                                </option>
                            </select>
                            @error('tipe-user')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            

            <div class="section-body" id="result"></div>
            
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


<script>

        window.onload = 
            function(){
                
                let defaultValue = document.getElementById('jenisUser').value;
                handleChange(defaultValue);
                console.log(defaultValue);
            }




    function handleChange(value) {

        fetch("/handle-user/" + value)
        .then(response => response.text())
        .then(data => {
            document.getElementById('result').innerHTML = data;
        }).catch(error => console.error('Error', error));
        
    }
</script>