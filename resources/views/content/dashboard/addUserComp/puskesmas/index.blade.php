
<div class="row">
    <div class="col-12 ">
        <div class="card">
            <form action="tambah-user" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" value="puskesmas" name="role">
                        <div class="form-group col-6">
                            <label for="username">Username</label>
                            <input id="username" type="text" class="form-control" name="username"
                                autofocus value="{{ old('username') }}">
                            @error('username')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="name">Nama Puskesmas</label>
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
                            <label for="address">Alamat</label>
                            <input id="address" type="text" class="form-control" name="address"
                                value="{{ old('address') }}">
                            @error('address')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Tambah Puskesmas</button>
                </div>
            </form>
        </div>
    </div>
</div>