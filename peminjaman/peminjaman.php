<?php
include '../koneksi.php';
include 'function.php';
session_start();
if ($_SESSION['status'] != 'login') {
?> <script>
        alert("Login Terlebih Dahulu!!");
        window.location.href = "../index.php";
    </script>
<?php
}
$tgl_pinjam = date("d-m-Y");
$tujuhari = mktime(0, 0, 0, date("n"), date("j") + 7, date("Y"));
$kembali = date("d-m-Y", $tujuhari);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrasi Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <nav class=" navbar navbar-expand-lg bg-light">
        <div class="container-lg">
            <a class="navbar-brand fw-bold text-success" href="#">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto me-auto">
                    <a class="nav-link" href="../home.php">Home</a>
                    <a class="nav-link" href="../buku/buku.php">Buku</a>
                    <a class="nav-link" href="../anggota/anggota.php">Anggota</a>
                    <a class="nav-link active text-success" href="peminjaman.php">Peminjaman</a>
                </div>
                <a href="../logout.php" class="btn btn-outline-success">Logout</a>
            </div>
        </div>
    </nav>

    <section id="peminjaman">
        <!-- Modal Tambah-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Peminjaman</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="tambah.php" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Judul Buku</label>
                                <select class="form-select" name="buku">
                                    <?php
                                    $sql = $koneksi->query("select * from tb_buku order by id");
                                    while ($data = $sql->fetch_assoc()) {
                                        echo "<option value='$data[id].$data[judul]'>$data[judul]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Peminjam</label>
                                <select class="form-select" id="nama" aria-label="Default select example" name="nama">
                                    <?php
                                    $sql = $koneksi->query("select * from tb_anggota order by nim");
                                    while ($data = $sql->fetch_assoc()) {
                                        echo "<option value='$data[nim].$data[nama]'>$data[nim].$data[nama]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Pinjam</label>
                                <input class="form-control" name="tgl_pinjam" id="exampleFormControlInput1" value="<?php echo $tgl_pinjam ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Kembali</label>
                                <input class="form-control" name="tgl_kembali" id="exampleFormControlInput1" value="<?php echo $kembali ?>" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="simpan">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="data-peminjaman" class="container-lg d-flex pt-5 pb-3">
            <h4 class="pt-3">Data Peminjaman</h4>
            <button type="button" class="btn btn-success h-50 ms-auto mt-3 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Peminjaman
            </button>
        </div>

        <div id="tabel" class="container-lg bg-light p-3 table-responsive">
            <table id="example" class="table table-striped" style="width:100%">
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
                        <th>Aksi</th>
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
                            <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalHapus<?= $no ?>">
                                    Kembali
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Hapus -->
                        <div class="modal fade" id="ModalHapus<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Pengembalian Buku</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="kembali.php" method="post">
                                        <input type="text" name="id" value="<?php echo $data['id'] ?>" hidden>
                                        <input type="text" name="judul" value="<?php echo $data['judul'] ?>" hidden>
                                        <div class="modal-body">
                                            <h6>Apakah anda yakin untuk mengembalikan peminjaman?</h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="hapus">Kembalikan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Terlambat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="container-lg">
            <a href="laporan_peminjaman.php" type="button" class="btn btn-warning h-50 mt-4 mb-4">
                Export ke Excell
            </a>
        </div>
    </section>

    <footer class="text-center text-lg-start bg-light text-muted">
        <div class="container-lg text-center text-md-start">
            <!-- Grid row -->
            <div class="row pt-4">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Universitas Islam Balitar
                    </h6>
                    <p>
                        Dibuat untuk memenuhi tugas mata kuliah Pemrograman Web
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-3 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Anggota Kelompok
                    </h6>
                    <p>
                        Mohhamad Amir Fatkhi Zen
                    </p>
                    <p>
                        Kharismatul Yogi Nafi'ah
                    </p>
                    <p>
                        Mahendra
                    </p>
                    <p>
                        Moh Dida Prayoga
                    </p>
                    <p>
                        Ahmad Khafa Billah
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Nim
                    </h6>
                    <p>
                        21104410016
                    </p>
                    <p>
                        21104410019
                    </p>
                    <p>
                        21104410039
                    </p>
                    <p>
                        18104410010
                    </p>
                    <p>
                        18104410014
                    </p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2023 Copyright:
            <b>Kelompok 6</b>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        new DataTable('#example');
    </script>
</body>

</html>