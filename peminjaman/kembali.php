<?php

include '../koneksi.php';

$id = $_POST['id'];
$judul = $_POST['judul'];

if (isset($_POST['hapus'])) {
    $sql = $koneksi->query("update tb_transaksi set status='Kembali' where id='$id'");
    $sql = $koneksi->query("update tb_buku set jumlah_buku = (jumlah_buku+1) where judul='$judul'");
}
if ($sql) {
?>
    <script>
        alert("Proses pengembalian Buku Berhasil");
        window.location.href = "peminjaman.php";
    </script>
<?php
}
?>