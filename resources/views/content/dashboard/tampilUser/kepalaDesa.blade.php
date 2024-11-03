
<div class="table-responsive mt-4">

    <h4>Kepala Desa</h2>
    <table class="table-striped table" id="table-1">

        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Gender</th>
                <th>Alamat</th>
                <th>Pendidikan Terakhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userKades as $user)
            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->kades->name }}</td>
                <td>{{ $user->kades->nik }}</td>
                <td>{{ $user->kades->place_of_birth }}</td>
                <td>{{ $user->kades->date_of_birth }}</td>
                <td>{{ $user->kades->gender }}</td>
                <td>{{ $user->kades->address }}</td>
                <td>{{ $user->kades->last_educations }}</td>
            </tr>
            @endforeach

        </tbody>

    </table>

</div>