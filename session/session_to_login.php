<?php
    include("../config/config.php");
    // $koneksi dari file config.php
    session_start();
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    if(!empty($user) && !empty($pass)) {
        $query = "SELECT * FROM `pengguna` WHERE `nama_pengguna`='$user' AND `kata_sandi`='$pass'";
        $result = mysqli_query($koneksi, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows == 1) {
            $_SESSION["pengguna"] = $user;
            header("location:../page/buku");
            // http_response_code(201);
        } else {
            echo "<script>
                alert(`nama pengguna atau kata sandi yang anda masukkan salah \nCoba Lagi!!!`); 
                location.href='../page/login.php'
            </script>";
        }
    } else {
        echo "<script>
                alert(`nama pengguna dan kata sandi tidak boleh kosong \nCoba Lagi!!!`); 
                location.href='.../page/login.php'
            </script>";
    }
?>