<?php
    session_start();

    if(!isset($_SESSION["pengguna"])) {
        die("Silahkan melakukan autentikasi, anda akan diteruskan ke halaman login secara otomatis!!! <script>setTimeout(function(){ location.href='login';}, 2000)</script>");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Peminjaman</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
    <?php include('components/navbars.php') ?>

    <script>
        /**
         * @params {array} is an array for looping and set to tbody of table
         * @params {type} is tipe for compare, which format do you use
         */
        // function formUbahPeminjam(type,{id_peminjam, judul, nama_peminjam, tahun, status, waktu}) {
        //     let content_form_buku = `<div class="modal-header">
        //             <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
        //             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        //             <span aria-hidden="true">&times;</span>
        //             </button>
        //         </div>
        //         <div class="modal-body">
        //             <form onsubmit="${type == "tambah" || !type ? 'return kirimData(event)' : 'return kirimDataUbah(event)'}" data-uid="${id_peminjam ? id_peminjam : ''}" class="m-form" method="post" id="m-form-buku">
        //                 <div class="form-group">
        //                     <label for="">Nama Peminjam</label>
        //                     <input type="text" value="${nama_peminjam ? nama_peminjam : ''}" class="form-control" name="pengarang" id="form-pengarang" />
        //                 </div>
        //                 <div class="form-group">
        //                     <label for="">Judul Buku</label>
        //                     <input type="text" value="${judul ? judul : ''}" class="form-control" name="judul" id="form-judul"/>
        //                 </div>
        //                 <div class="form-group">
        //                     <label for="">Waktu Peminjaman</label>
        //                     <input type="number" value="${waktu_peminjaman ? waktu_peminjaman : ''}" class="form-control" name="waktu-peminjaman" id="form-waktu-peminjaman" />
        //                 </div>
        //                 <div class="form-group">
        //                     <label for="">Waktu Pengembalian</label>
        //                     <input type="number" value="${waktu_pengembalian ? waktu_pengembalian : ''}" class="form-control" name="waktu-pengembalian" id="form-waktu-pengembalian" />
        //                 </div>
        //                 <div class="form-group">
        //                     <label>Status</label>
        //                     <input type="number" min="0" max="1" value="${status ? status : ''}" id="form-status" name="status" onkeyup="checkValue(this.value)" class="form-control">
        //                 </div>
                        
        //                 <div class="form-group">
        //                     <input type="submit" value="kirim" class="btn btn-primary" />
        //                 </div>
        //             </form> 

        //         </div>
        //         <div class="modal-footer">
        //             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        //         </div>`
        //     return content_form_buku;
        // }
        
    //   setTimeout(() => {
    //       document.getElementById("modal-content").innerHTML = formUbahPeminjam("tambah",{});
    //   }, 2000);
        let resultPeminjam = []
        function insertTable(array) {
            let results = ''
             for(let obj of array) {
                    let aobj = obj;
                    results += `<tr>
                        <td>${obj.id_peminjam}</td>
                        <td>${obj.nama_peminjam}</td>
                        <td>${obj.judul}</td>
                        <td class="text-center">${obj.waktu_peminjaman}</td>
                        ${obj.waktu_pengembalian != 0 ? '<td class="text-center">'+obj.waktu_pengembalian+'</td>' : '<td class="text-center">-</td>'}
                        ${obj.status == "0" ? "<td class='text-danger'>Belum Dikembalikan</td>" : "<td class='text-success'>Dikembalikan</td>"}
                        <td>
                            <button 
                                class="btn btn-primary" 
                                data-judul="${obj.judul}"
                                data-id-buku="${obj.id_buku}"
                                data-pengarang="${obj.pengarang}"
                                data-tahun="${obj.tahun}"
                                data-status="${obj.status}"
                                data-waktu="${obj.waktu}"
                                onclick="ubahData({
                                    id_buku: this.getAttribute('data-id-buku'),
                                    judul: this.getAttribute('data-judul'), 
                                    pengarang: this.getAttribute('data-pengarang'),
                                    tahun: this.getAttribute('data-tahun'),
                                    status: this.getAttribute('data-status'),
                                    waktu: this.getAttribute('data-waktu')
                                })">
                                Ubah
                            </button>
                        </td>
                        <td><button 
                                class="btn btn-danger" 
                                data-judul="${obj.judul}"
                                data-id-buku="${obj.id_buku}"
                                data-pengarang="${obj.pengarang}"
                                data-tahun="${obj.tahun}"
                                data-status="${obj.status}"
                                data-waktu="${obj.waktu}"
                                onclick="return hapusData({
                                    id_buku: this.getAttribute('data-id-buku'),
                                    judul: this.getAttribute('data-judul'), 
                                    pengarang: this.getAttribute('data-pengarang'),
                                    tahun: this.getAttribute('data-tahun'),
                                    status: this.getAttribute('data-status'),
                                    waktu: this.getAttribute('data-waktu')
                                })"
                            >Hapus</button></td>
                    </tr>
                    `
                }
                document.getElementById("table_peminjam").innerHTML = results;
        }
        $.ajax('../controllers/peminjam/controllers.get.peminjam.php', {
            success: function(data) {
                try {
                    const arr = JSON.parse(data);
                    // resultPeminjam = arr;
                    insertTable(arr)
                } catch (error) {
                    document.getElementById("table_peminjam").innerHTML = `<tr colspan="6" class="text-center">${data}</tr>`;
                }
            },
            error: function(data) {
                console.log(JSON.stringify(data))
            }
        })
    </script>

    <div class="p-2 mt-2">
        <br>
        <button class="btn btn-success btn-block" type="button" data-toggle="modal" data-target="#exampleModal">Tambah Peminjam</button>
        <br>
        <?php include('table/peminjaman.table.php');?>
    </div>



    <script>
        // var $root = 

        function cariBuku(v){
            let search = v;
            let category = document.getElementById("form-select-search").value;
            if(resultPeminjam.length > 0) {
                var matchFill = new RegExp(search, 'i');
                var result = resultPeminjam.filter(function(fill){ 
                    return matchFill.test(fill[category])
                });
                let cariResult = ''
                if(result.length > 0) {
                    insertTable(result)
                } else if(result <= 0) {
                    document.getElementById("table_buku").innerHTML = `<tr><td colspan='6' class='text-center'>Tidak ada data yang ditemukan</td></tr>`
                } else if(search == "") {
                    insertTable(resultPeminjam);
                }
            }
        }
        

        function hapusData(obj) {
            $.post('../controllers/controllers.delete.buku.php', {id_buku: obj.id_buku}, function(data) {
                if(data == "data berhasil dihapus") {
                    // document.getElementById("m-form-buku").reset();
                    $("#exampleModal").modal('hide');
                    alert(data)
                    $.ajax('../controllers/controllers.get.buku.php', {
                        success: function(data) {
                            const arr = JSON.parse(data);
                            // console.log(data)
                            resultPeminjam = arr;
                            insertTable(arr)
                        },
                        error: function(data) {
                            console.log(JSON.stringify(data))
                        }
                    })
                } else {
                    alert(data)
                }
            })
        }
        
        // function ubahData(obj) {
        //     document.getElementById("modal-content").innerHTML = formUbahBuku("ubah", obj);
        //     $("#exampleModal").modal("show");
        //     $("#exampleModal").on("hidden.bs.modal", function(e) {
        //         document.getElementById("modal-content").innerHTML = formUbahBuku("tambah", {});
        //     })
        // }
    </script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>