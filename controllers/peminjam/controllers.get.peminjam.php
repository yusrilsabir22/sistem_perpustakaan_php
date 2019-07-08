<?php 
    if(isset($_SESSION["pengguna"])) {
        require('../../config/config.php');
        $query = "SELECT
                     peminjam.id_peminjam AS id_peminjam,
                     peminjam.nama_peminjam AS nama_peminjam,
                     buku.judul AS judul,
                     buku.id_buku AS id_buku,
                     buku_pinjam.waktu_peminjaman AS waktu_peminjaman,
                     buku_pinjam.waktu_pengembalian AS waktu_pengembalian,
                     buku_pinjam.status AS status
                     FROM
                         buku_pinjam
                     INNER JOIN
                         peminjam
                     ON
                         buku_pinjam.id_peminjam = peminjam.id_peminjam
                     INNER JOIN
                         buku 
                     ON
                         buku_pinjam.id_buku = buku.id_buku";
        $sql = mysqli_query($koneksi, $query);
        $results = mysqli_num_rows($sql);
        if($results || $results > 0) {
            echo '[';
            $no = 0;
            while($row = mysqli_fetch_assoc($sql)) {
                $data["id_peminjam"] = $row["id_peminjam"];
                $data["id_buku"] = $row["id_buku"];
                $data["nama_peminjam"] = $row["nama_peminjam"];
                $data["judul"] = $row["judul"];
                $data["waktu_peminjaman"] = $row["waktu_peminjaman"];
                $data["waktu_pengembalian"] = $row["waktu_pengembalian"];
                $data["status"] = $row["status"];
                echo json_encode($data);
                
                if($no < ($results - 1)) {
                    echo ",";
                }
    
                $no++;
            }
            echo "]";
        } else {
            echo "Tidak ada peminjam yang ditemukan";
        }
        http_response_code(201);
    } else {
        echo "<center><h1>401 unauthorized</h1></center>";
        http_response_code(401);
    }
?>