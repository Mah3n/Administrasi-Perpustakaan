<?php
    session_start();
    session_destroy();
    ?> <script>
            alert("Berhasil Logout");
            window.location.href = "index.php";
        </script>
    <?php
?>