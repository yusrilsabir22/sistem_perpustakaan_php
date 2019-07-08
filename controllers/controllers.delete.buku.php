<?php
    if(isset($_SESSION["pengguna"])) {
        require('../config/config.php');
        $id_buku = $_POST["id_buku"];
        if(!empty($id_buku)) {
            $query = "DELETE FROM `buku` WHERE `id_buku`=$id_buku";
            $res = mysqli_query($koneksi, $query);
            if($res) {
                echo "data berhasil dihapus";
            } else {
                // echo $res;
                echo "data gagal dihapus";
            }
        } else {
            echo "silahkan pilih data yang ingin dihapus";
        }
        http_response_code(201);
    } else {
        echo "<center><h1>401 unauthorized</h1></center>";
        http_response_code(401);
    }
?>