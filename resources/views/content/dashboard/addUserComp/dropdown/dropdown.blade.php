<div class="section-body">
    <div class="card">
        <div class="card-body">
            <div class="col-6 mb-3"> <a class="btn btn-primary" href="{{ route('tampil-user.index') }}">Back</a></div>
            <div class="form-group col-6">
                <label for="tipe-user">Jenis User</label>

                <select class="form-control selectric" id="jenisUser" name="jenisUser" onchange="location = this.value;">
                    <option {{ $jenisUser == 'admin' ? 'selected' : '' }} value="{{ route('handle-user.admin') }}">
                        Admin
                    </option>
                    <option {{ $jenisUser == 'bidan' ? 'selected' : '' }} value="{{ route('handle-user.bidan') }}">
                        Bidan
                    </option>
                    <option {{ $jenisUser == 'kader' ? 'selected' : '' }} value="{{ route('handle-user.kader') }}">
                        Kader
                    </option>
                    <option {{ $jenisUser == 'kepalaDesa' ? 'selected' : '' }}
                        value="{{ route('handle-user.kepalaDesa') }}">
                        Kepala Desa
                    </option>
                    <option {{ $jenisUser == 'keluarga' ? 'selected' : '' }}
                        value="{{ route('handle-user.keluarga') }}">
                        Keluarga
                    </option>
                    <option {{ $jenisUser == 'puskesmas' ? 'selected' : '' }}
                        value="{{ route('handle-user.puskesmas') }}">
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
