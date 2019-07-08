<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form onsubmit="return kirimData(event)" class="m-form" method="post" id="m-form-buku">
            <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="judul" id="form-judul"/>
            </div>
            <div class="form-group">
                <label for="">Nama Pengarang</label>
                <input type="text" class="form-control" name="pengarang" id="form-pengarang" />
            </div>
            <div class="form-group">
                <label for="">Tahun Terbit</label>
                <input type="number" class="form-control" name="tahun" id="form-tahun" />
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="number" min="0" max="1" value="" id="form-status" name="status" onkeyup="checkValue(this.value)" class="form-control">
            </div>
            
            <div class="form-group">
                <input type="submit" value="kirim" class="btn btn-primary" />
            </div>
        </form> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>
<script>

    function kirimData(e) {
        let id_buku = new Date().getTime();
        let judul = document.getElementById("form-judul").value;
        let pengarang = document.getElementById("form-pengarang").value;
        let tahun = document.getElementById("form-tahun").value;
        let status = document.getElementById("form-status").value;
            status = status == "" ? 0 : parseInt(status);
        $.post('../controllers/controllers.post.buku.php', {id_buku, judul, pengarang, tahun: parseInt(tahun), status}, function(data) {
            if(data == "data berhasil ditambahkan") {
                // e.target.reset;
                document.getElementById("m-form-buku").reset();
                $("#exampleModal").modal('hide');
                alert(data)
                $.ajax('../controllers/controllers.get.buku.php', {
                    success: function(data) {
                        const arr = JSON.parse(data);
                        // console.log(data)
                        resultBuku = arr;
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
        e.preventDefault();
    }

    function kirimDataUbah(e) {
        let id_buku = parseInt(e.target.attributes[1].value)
        let judul = document.getElementById("form-judul").value;
        let pengarang = document.getElementById("form-pengarang").value;
        let tahun = document.getElementById("form-tahun").value;
        let status = document.getElementById("form-status").value;
            status = status == "" ? 0 : parseInt(status);

        $.post('../controllers/controllers.update.buku.php', {id_buku, judul, pengarang, tahun: parseInt(tahun), status}, function(data) {
            if(data == "data berhasil diubah") {
                // e.target.reset;
                document.getElementById("m-form-buku").reset();
                $("#exampleModal").modal('hide');
                alert(data)
                $.ajax('../controllers/controllers.get.buku.php', {
                    success: function(data) {
                        const arr = JSON.parse(data);
                        // console.log(data)
                        resultBuku = arr;
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
        e.preventDefault()
    }

    function checkValue(v) {
        let cc = document.getElementById("form-status")
        if(parseInt(v) > 1) {
            cc.value = "";
        } else if(!parseInt(v) && v != 0 || v == "e") {
            cc.value = "";
        }
    }
</script>