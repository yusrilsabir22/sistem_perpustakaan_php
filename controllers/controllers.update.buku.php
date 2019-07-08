<?php 
    if(isset($_SESSION["pengguna"])) {
        require('../config/config.php');
        $id_buku = $_POST["id_buku"];
        $judul = $_POST["judul"];
        $pengarang = $_POST["pengarang"];
        $tahun = $_POST["tahun"];
        $status = $_POST["status"];
        $status = $status ? $status : 0;
        // echo $status;
        if(!empty($id_buku) && !empty($judul) && !empty($pengarang) && !empty($tahun)) {
            $query = "UPDATE `buku` SET `judul`='$judul', `pengarang`='$pengarang', `tahun`=$tahun, `status`=$status WHERE `id_buku`=$id_buku";
            $res = mysqli_query($koneksi, $query);
            if($res) {
                echo "data berhasil diubah";
            } else {
                // echo $res;
                echo "data gagal diubah";
            }
        } else {
            echo "data yang dimasukkan harus terisi semua";
        }

        http_response_code(201);
    } else {
        echo "<center><h1>401 unauthorized</h1></center>";
        http_response_code(401);
    }
?>