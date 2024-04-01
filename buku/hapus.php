<?php

include '../koneksi.php';

$id = $_POST['id'];

if (isset($_POST['hapus'])) {
    $sql = mysqli_query($koneksi, "delete from tb_buku where id='$id'");
}
if ($sql) {
?>
    <script>
        window.location.href = "buku.php";
    </script>
<?php
}
?>