<?php
include '../koneksi.php';

$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];
$isbn = $_POST['isbn'];
$jumlah = $_POST['jumlah'];
$lokasi = $_POST['lokasi'];
$tanggal = $_POST['tanggal'];

if (isset($_POST['simpan'])) {
    $sql = mysqli_query($koneksi, "INSERT INTO `tb_buku` (`judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jumlah_buku`, `lokasi`, `tgl_input`)
    values('$judul', '$pengarang', '$penerbit', '$tahun', '$isbn', '$jumlah', '$lokasi', '$tanggal')");
}

if ($sql) {
?>
    <script>
        alert('Buku Berhasil di tambah');
        window.location.href = "buku.php";
    </script>
<?php
}
?>