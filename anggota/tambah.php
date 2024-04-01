<?php

include '../koneksi.php';

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$tempat = $_POST['tempat'];
$tanggal = $_POST['tanggal'];
$jk = $_POST['jk'];
$prodi = $_POST['prodi'];

if (isset($_POST['simpan'])) {
    $sql = mysqli_query($koneksi, "INSERT INTO `tb_anggota` (`nama`, `nim`, `tempat_lahir`, `tgl_lahir`, `jk`, `prodi`)
    values('$nama', '$nim', '$tempat', '$tanggal', '$jk', '$prodi')");
}

if ($sql) {

?>

    <script>
        alert('Anggota Berhasil di tambah');
        window.location.href = "anggota.php";
    </script>

<?php

}
?>