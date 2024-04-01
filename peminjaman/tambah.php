<?php

include '../koneksi.php';
include 'function.php';

if (isset($_POST['simpan'])) {

    $tgl_pinjam = $_POST['tgl_pinjam'];
    $kembali = $_POST['tgl_kembali'];

    $buku = $_POST['buku'];
    $pecah_buku = explode(".", $buku);
    $id = $pecah_buku[0];
    $judul = $pecah_buku[1];

    $nama = $_POST['nama'];
    $pecah_nama = explode(".", $nama);
    $nim = $pecah_nama[0];
    $nama = $pecah_nama[1];

    $sql = $koneksi->query("select * from tb_buku where judul = '$judul'");
    while ($data = $sql->fetch_assoc()) {
        $sisa = $data['jumlah_buku'];

        if ($sisa == 0) {
?>
            <script>
                alert("Stok Buku Habis, Silahkan Isi Kembali");
                window.location.href = "?page=transaksi&aksi=tambah";
            </script>

        <?php
        } else {
            $sql = $koneksi->query("INSERT INTO `tb_transaksi`( `judul`, `nim`, `nama`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES ('$judul', '$nim','$nama','$tgl_pinjam','$kembali','Pinjam')");
            $sql2 = $koneksi->query("UPDATE tb_buku set jumlah_buku = (jumlah_buku-1) where id = '$id'");

        ?>

            <script>
                alert("Peminjaman berhasil ditambah");
                window.location.href = "peminjaman.php";
            </script>

<?php
        }
    }
}

?>