<div class="d-flex w-100 justify-content-between">
    <div class="w-100">
        <input type="text" class="form-control" placeholder="Cari Buku" id="cariBuku" onkeyup="cariBuku(this.value)">
    </div>
    <div class="col-2">
        <select name="form-select" id="form-select-search" class="form-control">
            <option value="pengarang">Nama Pengarang</option>
            <option value="judul">Judul</option>
            <option value="tahun">Tahun Terbit</option>
            <option value="id_buku">ID Buku</option>
        </select>
    </div>
</div>
<br>
<table class="table">
    <thead class="bg-warning">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Pengarang</th>
            <th scope="col">Judul Buku</th>
            <th scope="col">Tahun Terbit</th>  
            <th scope="col">Status</th>
            <th scope="col">Waktu</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody id="table_buku">
    </tbody>
</table>