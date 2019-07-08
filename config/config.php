<?php 
    function koneksi() {
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "sistem_perpustakaan";

        $link = mysqli_connect($server, $user, $pass, $database);

        if(!$link) {
            echo "<script>setTimeout(function(){location.href='page/login.php'}, 1000)</script>";
            // die("Gagal Koneksi".mysql_error());
        }

        return $link;
    }

    $koneksi = koneksi();
?>