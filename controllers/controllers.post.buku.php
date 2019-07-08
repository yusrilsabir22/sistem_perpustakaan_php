<?php 
    if(isset($_SESSION["pengguna"])) {
        require('../config/config.php');
        $id_buku = $_POST["id_buku"];
        $judul = $_POST["judul"];
        $pengarang = $_POST["pengarang"];
        $tahun = $_POST["tahun"];
        $status = $_POST["status"];
        if(!empty($id_buku) && !empty($judul) && !empty($pengarang) && !empty($tahun)) {
            $query = "INSERT INTO `buku`(`id_buku`, `judul`, `pengarang`, `tahun`, `status`) VALUES ($id_buku, '$judul', '$pengarang', $tahun, $status)";
            $res = mysqli_query($koneksi, $query);
            if($res) {
                echo "data berhasil ditambahkan";
            } else {
                // echo $res;
                echo "data gagal ditambahkan";
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