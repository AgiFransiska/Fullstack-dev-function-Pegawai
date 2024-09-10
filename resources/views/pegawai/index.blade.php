<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

<table id="pegawaiTable" class="display">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Tanggal Lahir</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pegawai as $data)
        <tr>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->jabatan }}</td>
            <td>{{ $data->tanggal_lahir }}</td>
            <td>
                <!-- Action buttons here -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#pegawaiTable').DataTable();
    });
</script>

<form action="{{ route('pegawai.store') }}" method="POST">
    @csrf
    <div>
        <label>Nama</label>
        <input type="text" name="nama" required>
    </div>
    <div>
        <label>Jabatan</label>
        <select name="jabatan" class="select2" required>
            <option value="Manager">Manager</option>
            <option value="Staff">Staff</option>
            <option value="Intern">Intern</option>
        </select>
    </div>
    <div>
        <label>Tanggal Lahir</label>
        <input type="text" id="tanggal_lahir" name="tanggal_lahir" required>
    </div>
    <button type="submit">Submit</button>
</form>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $('.select2').select2();
    $('#tanggal_lahir').datepicker({
        dateFormat: 'yy-mm-dd'
    });
</script>
