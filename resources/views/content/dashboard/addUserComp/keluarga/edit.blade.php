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
                <h1>Edit User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Edit Data</a></div>
                </div>
            </div>
                            

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <form action="{{ route('tambah-user.update', $id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" value="keluarga" name="role">
                                    <div class="form-group col-6">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username"
                                            autofocus value="{{ $data->username }}">
                                        @error('username')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                </div>   

                                <div class="row">
                                    
                                    <div>
                                        <p class="ml-3" >Ibu</p>
                                    </div>

                                </div>  
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="nik_ibu">Nomor Induk Ibu (NIK)</label>
                                        <input id="nik_ibu" type="number" class="form-control" name="nik_ibu"
                                            value="{{ $data->family->nik_ibu }}">
                                        @error('nik_ibu')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                    <div class="form-group col-6">
                                        <label for="nama_ibu">Nama ibu</label>
                                        <input id="nama_ibu" type="text" class="form-control" name="nama_ibu"
                                            value="{{ $data->family->nama_ibu}}">
                                        @error('nama_ibu')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                    <div class="form-group col-6">
                                        <label for="date_of_birth_ibu">Tanggal Lahir Ibu</label>
                                        <input id="date_of_birth_ibu" type="date" class="form-control datepicker"
                                            name="date_of_birth_ibu" value="{{$data->family->date_of_birth_ibu }}">
                                        @error('date_of_birth_ibu')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                    <div class="form-group col-6">
                                        <label for="place_of_birth_ibu">Tempat Lahir Ibu</label>
                                        <input id="place_of_birth_ibu" type="text" class="form-control"
                                            name="place_of_birth_ibu" value="{{  $data->family->place_of_birth_ibu }}">
                                        @error('place_of_birth_ibu')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                    <div class="form-group col-6">
                                        <label for="golongan_darah_ibu">Golongan Darah Ibu</label>
                                        <select name="golongan_darah_ibu" id="golongan_darah_ibu" class="form-control selectric">
                                            <option value="" selected disabled>-- Pilih Jenis Kelamin --
                                            </option>
                                            <option value="A"
                                                {{ $data->family->golongan_darah_ibu == 'A' ? 'selected' : '' }}>
                                                A
                                            </option>
                                            <option value="B"
                                                {{ $data->family->golongan_darah_ibu == 'B' ? 'selected' : '' }}>
                                                B
                                            </option>
                                            <option value="AB"
                                                {{ $data->family->golongan_darah_ibu == 'AB' ? 'selected' : '' }}>
                                                AB
                                            </option>
                                            <option value="0"
                                                {{ $data->family->golongan_darah_ibu == '0' ? 'selected' : '' }}>
                                                0
                                            </option>
                                        </select>
                                        @error('golongan_darah_ibu')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>  

                                <div class="row">
                                    
                                    <div>
                                        <p class="ml-3" >Ayah</p>
                                    </div>

                                </div>  
                                <div class="row">

                                    <div class="form-group col-6">
                                        <label for="nik_ayah">Nomor Induk Ayah (NIK)</label>
                                        <input id="nik_ayah" type="number" class="form-control" name="nik_ayah"
                                            value="{{ $data->family->nik_ayah }}">
                                        @error('nik_ayah')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                    <div class="form-group col-6">
                                        <label for="nama_ayah">Nama Ayah</label>
                                        <input id="nama_ayah" type="text" class="form-control" name="nama_ayah"
                                            value="{{ $data->family->nama_ayah }}">
                                        @error('nama_ayah')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                    <div class="form-group col-6">
                                        <label for="date_of_birth_ayah">Tanggal Lahir Ayah</label>
                                        <input id="date_of_birth_ayah" type="date" class="form-control datepicker"
                                            name="date_of_birth_ayah" value="{{ $data->family->date_of_birth_ayah }}">
                                        @error('date_of_birth_ayah')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                    <div class="form-group col-6">
                                        <label for="place_of_birth_ayah">Tempat Lahir Ayah</label>
                                        <input id="place_of_birth_ayah" type="text" class="form-control"
                                            name="place_of_birth_ayah" value="{{ $data->family->place_of_birth_ayah }}">
                                        @error('place_of_birth_ayah')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                    <div class="form-group col-6">
                                        <label for="golongan_darah_ayah">Golongan Darah Ayah</label>
                                        <select name="golongan_darah_ayah" id="golongan_darah_ayah" class="form-control selectric">
                                            <option value="" selected disabled>-- Pilih Jenis Kelamin --
                                            </option>
                                            <option value="A"
                                                {{ $data->family->golongan_darah_ayah == 'A' ? 'selected' : '' }}>
                                                A
                                            </option>
                                            <option value="B"
                                                {{ $data->family->golongan_darah_ayah == 'B' ? 'selected' : '' }}>
                                                B
                                            </option>
                                            <option value="AB"
                                                {{ $data->family->golongan_darah_ayah == 'AB' ? 'selected' : '' }}>
                                                AB
                                            </option>
                                            <option value="0"
                                                {{ $data->family->golongan_darah_ayah == '0' ? 'selected' : '' }}>
                                                0
                                            </option>
                                        </select>
                                        @error('golongan_darah_ayah')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>  

                                @foreach ($data->family->child as $anak)
                                <div class="row">
                                    
                                    <div>
                                        <p class="ml-3" >Anak {{ $loop->iteration }}</p>
                                    </div>

                                </div>  

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="nik_anak">Nomor Induk Anak (NIK) {{ $loop->iteration }}</label>
                                        <input id="nik_anak" type="number" class="form-control" name="nik_anak_{{ $anak->id }}"
                                            value="{{ $anak->nik }}">
                                        @error('nik_anak')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                    <div class="form-group col-6">
                                        <label for="nama_anak">Nama Anak {{ $loop->iteration }}</label>
                                        <input id="nama_anak" type="text" class="form-control" name="nama_anak_{{ $anak->id }}"
                                            value="{{ $anak->name}}">
                                        @error('nama_anak')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                    <div class="form-group col-6">
                                        <label for="date_of_birth_anak">Tanggal Lahir Anak {{ $loop->iteration }}</label>
                                        <input id="date_of_birth_anak" type="date" class="form-control datepicker"
                                            name="date_of_birth_anak_{{ $anak->id  }}" value="{{ $anak->date_of_birth }}">
                                        @error('date_of_birth_anak')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
            
                                    <div class="form-group col-6">
                                        <label for="place_of_birth_anak">Tempat Lahir Anak {{ $loop->iteration }}</label>
                                        <input id="place_of_birth_anak_{{$anak->id }}" type="text" class="form-control"
                                            name="place_of_birth_anak" value="{{ $anak->place_of_birth}}">
                                        @error('place_of_birth_anak')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-6">
                                        <label for="gender_anak">Jenis Kelamin Anak {{ $loop->iteration }}</label>
                                        <select name="gender_anak_{{ $anak->id  }}" id="gender_anak" class="form-control selectric">
                                            <option value="" selected disabled>-- Pilih Jenis Kelamin --
                                            </option>
                                            <option value="L"
                                                {{ $anak->gender == 'L' ? 'selected' : '' }}>
                                                Laki-laki
                                            </option>
                                            <option value="P"
                                                {{ $anak->gender == 'P' ? 'selected' : '' }}>
                                                Perempuan
                                            </option>
                                        </select>
                                        @error('gender_anak')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="golongan_darah_anak">Golongan Darah Anak {{ $loop->iteration }}</label>
                                        <select name="golongan_darah_anak_{{ $anak->id }}" id="golongan_darah_anak" class="form-control selectric">
                                            <option value="" selected disabled>-- Golongan Darah --
                                            </option>
                                            <option value="A"
                                                {{ $anak->golongan_darah == 'A' ? 'selected' : '' }}>
                                                A
                                            </option>
                                            <option value="B"
                                                {{ $anak->golongan_darah == 'B' ? 'selected' : '' }}>
                                                B
                                            </option>
                                            <option value="AB"
                                                {{ $anak->golongan_darah == 'AB' ? 'selected' : '' }}>
                                                AB
                                            </option>
                                            <option value="0"
                                                {{ $anak->golongan_darah == 'O' ? 'selected' : '' }}>
                                                O
                                            </option>
                                        </select>
                                        @error('golongan_darah_anak')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>  
                                    @endforeach    

                                    <div class="row">
                                    
                                        <div>
                                            <p class="ml-3" >Lainnya</p>
                                        </div>
    
                                    </div>  

                                <div class="row">

                                    <div class="form-group col-6">
                                        <label for="address">Alamat</label>
                                        <input id="address" type="text" class="form-control" name="address"
                                            value="{{ $data->family->address }}">
                                        @error('address')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-6">
                                        <label for="kecamatan">Kecamatan</label>
                                        <select name="kecamatan" id="kecamatan" class="form-control selectric">
                                            <option value="" selected disabled>-- Pilih Desa --
                                            </option>
                                            <option value="Paiton" {{ $data->family->kecamatan == 'Paiton' ? 'selected' : '' }}>
                                                Paiton 
                                            </option>
                                        </select>
                                        @error('kecamatan')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                    
                                    <div class="form-group col-6">
                                        <label for="desa">Desa</label>
                                        <select name="desa" id="desa" class="form-control selectric">
                                            <option value="" selected disabled>-- Pilih Desa --
                                            </option>
                                            <option value="Jabung Sisir" {{ $data->family->desa == 'Jabung Sisir' ? 'selected' : '' }}>
                                                Jabung Sisir 
                                            </option>
                                        </select>
                                        @error('desa')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

            
                                    <div class="form-group col-6">
                                        <label for="posyandu">Posyandu</label>
                                        <select name="posyandu" id="posyandu" class="form-control selectric">
                                            <option value="" selected disabled>-- Pilih Posyandu --
                                            </option>
                                            <option value="anggrek" {{ $data->family->posyandu == 'anggrek' ? 'selected' : '' }}>
                                                Anggrek
                                            </option>
                                            <option value="mawar"
                                                {{ $data->family->posyandu == 'mawar' ? 'selected' : '' }}>Mawar
                                            </option>
                                            <option value="melati"
                                                {{ $data->family->posyandu == 'melati' ? 'selected' : '' }}>Melati
                                            </option>
                                            <option value="kamboja"
                                                {{ $data->family->posyandu == 'kamboja' ? 'selected' : '' }}>Kamboja
                                            </option>
                                            <option value="matahari"
                                                {{ $data->family->posyandu == 'matahari' ? 'selected' : '' }}>Matahari
                                            </option>
                                        </select>
                                        @error('posyandu')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                                
                                    <div class="form-group col-6">
                                        <label for="phone_number">Nomer Telefon (AKTIF)</label>
                                        <input id="phone_number" type="number" class="form-control"
                                            name="phone_number" value="{{ $data->family->phone_number }}">
                                        @error('phone_number')
                                            <span class="text-danger text-small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>  
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Update Keluarga</button>
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
