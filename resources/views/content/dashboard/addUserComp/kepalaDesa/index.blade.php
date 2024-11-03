
<div class="row">
    <div class="col-12 ">
        <div class="card">
            <form action="tambah-user" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" value="kepalaDesa" name="role">
                        <div class="form-group col-6">
                            <label for="username">Username</label>
                            <input id="username" type="text" class="form-control" name="username"
                                autofocus value="{{ old('username') }}">
                            @error('username')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="name">Nama Kepala Desa</label>
                            <input id="name" type="text" class="form-control" name="name"
                                value="{{ old('name')}}">
                            @error('name')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="password" class="d-block">Password</label>
                            <input id="password" type="password" class="form-control" name="password">
                            @error('password')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="password_confirmation" class="d-block">Konfirmasi Password</label>
                            <input id="password_confirmation" type="password" class="form-control"
                                name="password_confirmation">
                            @error('password_confirmation')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="nik">Nomor Induk Kependudukan (NIK)</label>
                            <input id="nik" type="number" class="form-control" name="nik"
                                value="{{ old('nik') }}">
                            @error('nik')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group col-6">
                            <label for="date_of_birth">Tanggal Lahir Petugas</label>
                            <input id="date_of_birth" type="date" class="form-control datepicker"
                                name="date_of_birth" value="{{ old('date_of_birth') }}">
                            @error('date_of_birth')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="place_of_birth">Tempat Lahir Petugas</label>
                            <input id="place_of_birth" type="text" class="form-control"
                                name="place_of_birth" value="{{ old('place_of_birth') }}">
                            @error('place_of_birth')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control selectric">
                                <option value="" selected disabled>-- Pilih Jenis Kelamin --
                                </option>
                                <option value="Laki-laki"
                                    {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="Perempuan"
                                    {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                            @error('gender')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="address">Alamat</label>
                            <input id="address" type="text" class="form-control" name="address"
                                value="{{ old('address') }}">
                            @error('address')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-6">
                            <label for="last_educations">Pendidikan Terakhir</label>
                            <select name="last_educations" id="last_educations" class="form-control selectric">
                                <option value="" selected disabled>-- Pilih Pendidikan --
                                </option>
                                <option value="SD/MI/Sederajat" {{ old('last_educations') == 'SD ' ? 'selected' : '' }}>
                                    SD/MI/Sederajat 
                                </option>
                                
                                <option value="SMP/MTS/Sederajat"
                                    {{ old('last_educations') == 'SMP/MTS/Sederajat' ? 'selected' : '' }}>SMP/MTS/Sederajat
                                </option>

                                <option value="SMA/MA/Sederajat"
                                    {{ old('last_educations') == 'SMA/MA/Sederajat' ? 'selected' : '' }}>SMA/MA/Sederajat
                                </option>

                                <option value="D1"
                                    {{ old('last_educations') == 'D1' ? 'selected' : '' }}>D1
                                </option>
                                <option value="D2"
                                    {{ old('last_educations') == 'D2' ? 'selected' : '' }}>D2
                                </option>
                                </option>
                                <option value="D3"
                                    {{ old('last_educations') == 'D3' ? 'selected' : '' }}>D3
                                </option>
                                <option value="S1/D4"
                                    {{ old('last_educations') == 'S1/D4' ? 'selected' : '' }}>S1/D4
                                </option>
                                <option value="S2"
                                    {{ old('last_educations') == 'S2' ? 'selected' : '' }}>S2
                                </option>
                                <option value="S3"
                                    {{ old('last_educations') == 'S3' ? 'selected' : '' }}>S3
                                </option>
                            </select>
                            @error('last_educations')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Tambah Kepala Desa</button>
                </div>
            </form>
        </div>
    </div>
</div>