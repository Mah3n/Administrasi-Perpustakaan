<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(150deg, rgb(39, 71, 153), rgb(38, 134, 86), rgb(129, 165, 148));
        }

        form {
            width: 400px;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgb(0, 0, 0, 0.5);
        }
    </style>
</head>

<body class="container-fluid">
    <h2 class="text-light pb-5">Tambah Akun</h2>
    <form method="post" action="" class="bg-light">
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"></span>
            <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <br>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"></span>
            <input type="text" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping">
        </div>
        <br>
        <div class="input-group flex-nowrap">
            <button class="btn btn-primary w-100" type="submit" name="submit">Simpan</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
if (isset($_POST['submit'])) {
    $sql = mysqli_query($koneksi, "INSERT INTO `tb_user` (`username`, `password`) VALUES ('$username', '$password')");
}
if ($sql) {
?> <script>
        alert("Berhasil menambah akun");
        window.location.href = "index.php";
    </script>
<?php
}
?>