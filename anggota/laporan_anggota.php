<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "db_perpustakaanuib");
$filename = "anggota-excell-(" . date('d-m-Y') . ").xls";
header("content-disposition: attachment; filename=$filename");
header("content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
?>
<h2>Laporan Anggota</h2>
<h3>Nama Petugas : <?php echo $_SESSION['username'] ?></h3>
<h4>Tanggal : <?php echo date('d-m-Y') ?></h4>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Prodi</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $no = 1;
        $sql = $koneksi->query("select * from tb_anggota");
        while ($data = $sql->fetch_assoc()) {

            if ($data['jk'] == "L") {
                $jk = "Laki-Laki";
            } else {
                $jk = "Perempuan";
            }

        ?>

            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['nim']; ?></td>
                <td><?php echo $data['tempat_lahir']; ?></td>
                <td><?php echo $data['tgl_lahir']; ?></td>
                <td><?php echo $jk; ?></td>
                <td><?php echo $data['prodi']; ?></td>
            </tr>

        <?php } ?>
    </tbody>
</table>