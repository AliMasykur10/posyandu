
<div class="table-responsive mt-4">

    <h4>Puskesmas</h2>
    <table class="table-striped table" id="table-1">

        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userPuskesmas as $user)
            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->puskesmas->name }}</td>
                <td>{{ $user->puskesmas->address }}</td>
            </tr>
            @endforeach

        </tbody>

    </table>

</div>