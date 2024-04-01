<?php
session_start();
if ($_SESSION['status'] != 'login') {
?> <script>
        alert("Login Terlebih Dahulu!!");
        window.location.href = "index.php";
    </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrasi Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-lg">
            <a class="navbar-brand fw-bold text-success" href="#">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto me-auto">
                    <a class="nav-link active text-success" href="home.php">Home</a>
                    <a class="nav-link" href="./buku/buku.php">Buku</a>
                    <a class="nav-link" href="./anggota/anggota.php">Anggota</a>
                    <a class="nav-link" href="./peminjaman/peminjaman.php">Peminjaman</a>
                </div>
                <a href="logout.php" class="btn btn-outline-success">Logout</a>
            </div>
        </div>
    </nav>

    <section id="banner" class="d-flex align-items-center justify-content-center">
        <div id="banner-text" class="container-lg">
            <h1 class="text-light pb-3">Selamat Datang, <?php echo $_SESSION['username'] ?></h1>
            <p class="text-light" style="text-align: justify;">Kami dengan gembira menyambut Anda ke dalam sistem perpustakaan kami. Dengan login Anda, pintu ke dunia pengetahuan terbuka lebar. Anda memiliki kendali penuh untuk mengelola koleksi buku, mengatur peminjaman, dan menyediakan layanan terbaik kepada anggota perpustakaan. Jadikan perpustakaan ini tempat yang penuh inspirasi dan pengetahuan. Teruslah berinovasi dan menciptakan pengalaman terbaik bagi para pencari ilmu. Bersama-sama, kita akan membuka pintu menuju petualangan literasi yang tak terbatas!</p>
            <a href="#menu" class="btn btn-outline-light">Selamat Bertugas!</a>
        </div>
    </section>

    <section id="menu-menu" class="pb-5">
        <div id="list-menu" class="container-lg">
            <h2 class="pt-4">Daftar menu</h2>
            <div class="card-menu d-flex flex-wrap gap-4">
                <div class="card mt-3 bg-success-subtle" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-light fs-3"><i class="fa-solid fa-book"></i></h5>
                        <h6 class="card-subtitle text-light mb-2 mt-3">Buku</h6>
                        <p class="card-text text-light">Anda dapat mengelola data buku seperti menambah, merubah, dan menghapus</p>
                        <a href="./buku/buku.php" class="btn btn-outline-light">Buku</a>
                    </div>
                </div>
                <div class="card mt-3 bg-success-subtle" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-light fs-3"><i class="fa-solid fa-user"></i></h5>
                        <h6 class="card-subtitle text-light mb-2 mt-3">Anggota</h6>
                        <p class="card-text text-light">Anda dapat mengelola data anggota seperti menambah, merubah, dan menghapus</p>
                        <a href="./anggota/anggota.php" class="btn btn-outline-light">Anggota</a>
                    </div>
                </div>
                <div class="card mt-3 bg-success-subtle" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-light fs-3"><i class="fa-solid fa-right-left"></i></h5>
                        <h6 class="card-subtitle text-light mb-2 mt-3">Peminjaman</h6>
                        <p class="card-text text-light">Anda dapat mengelola data Peminjaman seperti menambah, merubah, dan menghapus</p>
                        <a href="./peminjaman/peminjaman.php" class="btn btn-outline-light">Peminjaman</a>
                    </div>
                </div>
            </div>
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
                        Mohammad Dida Prayoga
                    </p>
                    <p>
                        Nur Ahmad Khafa Billah
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
</body>

</html>