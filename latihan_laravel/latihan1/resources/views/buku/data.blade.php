<table border="1" width="100%">
    <tr>
        <th>No.</th>
        <th>Kode Buku</th>
        <th>Merk</th>
        <th>Type</th>
        <th>Harga</th>
        <th>Gambar</th>
        <th>Tools</th>
    </tr>
    @foreach ( $buku as $b )
        <tr>
            <td>{{ $i = isset($i)?++$i:1; }}</td>
            <td>{{ $b->kode_buku }}</td>
            <td>{{ $b->merk }}</td>
            <td>{{ $b->type }}</td>
            <td>{{ $b->harga_buku }}</td>
            <td>{{ $b->gambar }}</td>
            <td>Edit | Delete</td>
        </tr>
    @endforeach
</table>