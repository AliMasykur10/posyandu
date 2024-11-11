{{-- {{ dd($jenisUser) }} --}}

<div class="section-body">
    <div class="card">
        <div class="card-body">
            <div class="form-group col-6">
                <label for="tipe-user">Jenis User</label>

                <select name="jenisUser" id="jenisUser" class="form-control selectric" onchange="location = this.value;">
                    <option value="{{ route('handle-user.admin') }}"
                        {{ $jenisUser == 'admin' ? 'selected' : '' }}>
                            Admin
                    </option>
                    <option value="{{ route('handle-user.bidan') }}"
                        {{ $jenisUser == 'bidan' ? 'selected' : '' }}>
                            Bidan
                    </option>
                    <option value="{{ route('handle-user.kader') }}"
                        {{ $jenisUser == 'kader' ? 'selected' : '' }}>
                            Kader
                    </option>
                    <option value="{{ route('handle-user.kepalaDesa') }}"
                        {{ $jenisUser == 'kepalaDesa' ? 'selected' : '' }}>
                            Kepala Desa
                    </option>
                    <option value="{{ route('handle-user.keluarga') }}"
                        {{ $jenisUser == 'keluarga' ? 'selected' : '' }}>
                            Keluarga
                    </option>
                    <option value="{{ route('handle-user.puskesmas') }}"
                        {{ $jenisUser == 'puskesmas' ? 'selected' : '' }}>
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
