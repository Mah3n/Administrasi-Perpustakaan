<?php
session_start();
include 'function.php';
$koneksi = new mysqli("localhost", "root", "", "db_perpustakaanuib");
$filename = "transaksi-excell-(" . date('d-m-Y') . ").xls";
header("content-disposition: attachment; filename=$filename");
header("content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
?>
<h2>Laporan Data Transaksi</h2>
<h3>Nama Petugas : <?php echo $_SESSION['username'] ?></h3>
<h4>Tanggal : <?php echo date('d-m-Y') ?></h4>
<table border="1">
    <thead>
        <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Terlambat</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $sql = $koneksi->query("select * from tb_transaksi where status ='pinjam'");
        while ($data = $sql->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['judul']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['nim']; ?></td>
                <td><?php echo $data['tgl_pinjam']; ?></td>
                <td><?php echo $data['tgl_kembali']; ?></td>
                <td><?php

                    $denda = 3000;
                    $tanggal_deadline = $data['tgl_kembali'];
                    $tgl_kembali = date('Y-m-d');

                    $lambat = terlambat($tanggal_deadline, $tgl_kembali);
                    $denda1 = $lambat * $denda;

                    if ($lambat > 0) {
                        echo "<font color='red'>$lambat hari <br> (Rp. $denda1)</font>";
                    } else {
                        echo $lambat . "Hari";
                    }

                    ?></td>
                <td><?php echo $data['status']; ?></td>
            </tr>

        <?php } ?>
    </tbody>
</table>