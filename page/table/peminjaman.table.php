<div class="d-flex w-100 justify-content-between">
    <div class="w-100">
        <input type="text" class="form-control" placeholder="Cari Peminjam" id="cariBuku" onkeyup="cariPeminjam(this.value)">
    </div>
    <div class="col-2">
        <select name="form-select" id="form-select-search" class="form-control">
            <option value="nama_peminjam">Nama Peminjam</option>
            <option value="judul">Judul</option>
            <option value="id_peminjam">ID Peminjam</option>
        </select>
    </div>
</div>
<br>
<table class="table">
    <thead class="bg-warning">
        <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Judul Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Status</th>
            <th> </th>
            <th> </th>
        </tr>
    </thead>
    <tbody id="table_peminjam">
       
    </tbody>
</table>