<form method="post" action="{{ url('buku') }}">
    @csrf
    <input type="text" name="kode_buku">
    <input type="text" name="id_kategori">
    <input type="text" name="judul">
    <input type="text" name="penulis">
    <input type="text" name="penerbit">
    <input type="text" name="tahun">
    <button name="kirim">Kirim</button>
</form>