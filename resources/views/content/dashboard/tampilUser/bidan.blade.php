<div class="table-responsive mt-4">

    <h4>Bidan Desa</h2>
    <table class="table-striped table" id="table-1">

        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>NIP</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Gender</th>
                <th>Alamat</th>
                <th>Pendidikan Terakhir</th>
                <th>Nomor Hp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userBidan as $user)
            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->midwife->name }}</td>
                <td>{{ $user->midwife->nik }}</td>
                <td>{{ $user->midwife->nip }}</td>
                <td>{{ $user->midwife->place_of_birth }}</td>
                <td>{{ $user->midwife->date_of_birth }}</td>
                <td>{{ $user->midwife->gender }}</td>
                <td>{{ $user->midwife->address }}</td>
                <td>{{ $user->midwife->last_educations }}</td>
                <td>{{ $user->midwife->phone_number }}</td>
            </tr>
            @endforeach
            
        </tbody>

    </table>

</div>