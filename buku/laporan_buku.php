<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "db_perpustakaanuib");
$filename = "buku-excell-(" . date('d-m-Y') . ").xls";
header("content-disposition: attachment; filename=$filename");
header("content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
?>

<h2>Laporan Data Buku</h2>
<h3>Nama Petugas : <?php echo $_SESSION['username'] ?></h3>
<h4>Tanggal : <?php echo date('d-m-Y') ?></h4>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>ISBN</th>
            <th>Jumlah Buku</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $no = 1;
        $sql = $koneksi->query("select * from tb_buku");
        while ($data = $sql->fetch_assoc()) {

        ?>

            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['judul']; ?></td>
                <td><?php echo $data['pengarang']; ?></td>
                <td><?php echo $data['penerbit']; ?></td>
                <td><?php echo $data['isbn']; ?></td>
                <td><?php echo $data['jumlah_buku']; ?></td>
            </tr>

        <?php } ?>
    </tbody>
</table>