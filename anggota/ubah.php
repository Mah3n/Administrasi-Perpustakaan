<?php

include '../koneksi.php';

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$tempat = $_POST['tempat'];
$tanggal = $_POST['tanggal'];
$jk = $_POST['jk'];
$prodi = $_POST['prodi'];

if (isset($_POST['simpan'])) {
    $sql = mysqli_query($koneksi, "UPDATE `tb_anggota` SET `nim`='$nim',`nama`='$nama',`tempat_lahir`='$tempat',`tgl_lahir`='$tanggal',`jk`='$jk',`prodi`='$prodi' WHERE `tb_anggota`.`nim`= $nim;");

    if ($sql) {

?>

        <script>
            alert('Anggota Berhasil di ubah');
            window.location.href = "anggota.php";
        </script>

<?php

    }
}
?>