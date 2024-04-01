<?php

include '../koneksi.php';

$nim = $_POST['nim'];

if (isset($_POST['hapus'])) {
    $sql = mysqli_query($koneksi, "delete from tb_anggota where nim='$nim'");
}
if ($sql) {
?>
    <script>
        window.location.href = "anggota.php";
    </script>
<?php
}
?>