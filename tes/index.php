<?php
include "koneksi.php";

function insert(){
    global $koneksi;
    $nama_barang = $_POST['nama_barang'];
    $harga_satuan = $_POST['harga_satuan'];
    $jumlah_beli = $_POST['jumlah_beli'];

    $sql = "INSERT INTO toko (nama_barang, harga_satuan, jumlah_beli) 
            VALUES ('$nama_barang', '$harga_satuan', '$jumlah_beli')";
    mysqli_query($koneksi, $sql);
    echo "<p>Data berhasil ditambahkan!</p>";
}

function update(){
    global $koneksi;
    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $harga_satuan = $_POST['harga_satuan'];
    $jumlah_beli = $_POST['jumlah_beli'];

    $sql = "UPDATE toko 
            SET nama_barang='$nama_barang', harga_satuan='$harga_satuan', jumlah_beli='$jumlah_beli' 
            WHERE id='$id'";
    mysqli_query($koneksi, $sql);
    echo "<p>Data berhasil diupdate!</p>";
}

function delete(){
    global $koneksi;
    $id = $_GET['id'];
    $sql = "DELETE FROM toko WHERE id='$id'";
    mysqli_query($koneksi, $sql);
    echo "<p>Data berhasil dihapus!</p>";
}

function form(){
    global $koneksi;
    $id = "";
    $nama_barang = "";
    $harga_satuan = "";
    $jumlah_beli = "";
    $btn_value = "input";
    $btn_text  = "Input";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM toko WHERE id='$id'";
        $result = mysqli_query($koneksi, $sql);
        $row = mysqli_fetch_assoc($result);

        $nama_barang = $row['nama_barang'];
        $harga_satuan = $row['harga_satuan'];
        $jumlah_beli = $row['jumlah_beli'];
        $btn_value = "update";
        $btn_text  = "Update";
    }
    ?>

    <h2>Form Toko</h2>
    <form method="post" action="?page=toko&mode=form">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <input type="text" placeholder="Nama Barang" name="nama_barang" value="<?= $nama_barang; ?>">
        <input type="text" placeholder="Harga Satuan" name="harga_satuan" value="<?= $harga_satuan; ?>">
        <input type="text" placeholder="Jumlah Beli" name="jumlah_beli" value="<?= $jumlah_beli; ?>">
        <button type="submit" name="btn" value="<?= $btn_value; ?>"><?= $btn_text; ?></button>
    </form>

    <?php
}

function data(){
    global $koneksi;
    $sql = "SELECT * FROM toko ORDER BY id ASC";
    $data = mysqli_query($koneksi, $sql);
    $no = 1;
    ?>

    <h2>Data Toko</h2>
    <table border="1" width="70%" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Harga Satuan</th>
            <th>Jumlah Beli</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($data)) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['harga_satuan']; ?></td>
                <td><?= $row['jumlah_beli']; ?></td>
                <td>
                    <a href="?page=toko&mode=form&id=<?= $row['id']; ?>">Edit</a> | 
                    <a href="?page=toko&mode=hapus&id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <?php
}

// === navigasi utama ===
echo "
<p>
    <a href='?page=toko&mode=form'>Tambah Barang</a> | 
    <a href='?page=toko'>Data</a>
</p>
";

if(isset($_GET['mode']) && $_GET['mode']=="form"){
    if(isset($_POST['btn'])){
        if($_POST['btn']=="input") insert();
        else if($_POST['btn']=="update") update();
    }
    form();
}else{
    if(isset($_GET['mode']) && $_GET['mode']=="hapus") delete();
    data();
}
?>