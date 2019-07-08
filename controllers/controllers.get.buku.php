<?php 
    session_start();
    if(isset($_SESSION['pengguna'])) {
        require('../config/config.php');
        $query = mysqli_query($koneksi,"SELECT * FROM `buku`");
        $results = mysqli_num_rows($query);
        if($results > 0) {
            echo '[';
            $arr = array();
            $no = 0;
            while($row = mysqli_fetch_assoc($query)) {
                    $data["id_buku"] = $row["id_buku"];
                    $data["judul"] = $row["judul"];
                    $data["pengarang"] = $row["pengarang"];
                    $data["tahun"] = $row["tahun"];
                    $data["status"] = $row["status"];
                    $data["waktu"] = $row["waktu"];
                    echo json_encode($data);
                
                if($no < ($results-1)) {
                    echo ",";
                }
    
                $no++;
            }
            // echo $no;
            // echo $results;
            echo "]";
        } else {
            echo "Tidak ada buku yang ditemukan";
        }

        http_response_code(201);
    } else {
        echo "<center><h1>401 Unauthorized</h1></center>";
        http_response_code(401);
    }
?>