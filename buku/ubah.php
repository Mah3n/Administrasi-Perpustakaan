<?php

include '../koneksi.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];
$isbn = $_POST['isbn'];
$jumlah = $_POST['jumlah'];
$lokasi = $_POST['lokasi'];
$tanggal = $_POST['tanggal'];

if (isset($_POST['simpan'])) {
    $sql = mysqli_query($koneksi, "UPDATE `tb_buku` SET `judul` = '$judul', `pengarang` = '$pengarang', `penerbit` = '$penerbit', 
    `tahun_terbit` = '$tahun', `isbn` = '$isbn', `jumlah_buku` = '$jumlah', `lokasi` = '$lokasi', `tgl_input` = '$tanggal' WHERE `tb_buku`.`id` = $id;");

    if ($sql) {
?>
        <script>
            alert('Buku Berhasil di Ubah');
            window.location.href = "buku.php";
        </script>
<?php
    }
}
?>