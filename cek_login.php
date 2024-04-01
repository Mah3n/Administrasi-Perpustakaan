<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($koneksi, "SELECT * FROM `tb_user` where username='$username' and password='$password'");

$cek = mysqli_num_rows($data);

if (isset($_POST['submit'])) {
    if ($cek > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
?>
        <script>
            alert("Login berhasil");
            window.location.href = "home.php";
        </script>
    <?php
    } else {
    ?> <script>
            alert("Username / Password anda salah");
            window.location.href = "index.php";
        </script>
<?php
    }
}
?>