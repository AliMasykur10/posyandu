
<div class="table-responsive">

    <h4>Admin</h2>
    <table class="table-striped table" id="table-1">

        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userAdmin as $user)
            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->name }}</td>
            </tr>
            @endforeach

        </tbody>

    </table>

</div>