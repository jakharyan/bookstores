<h1>Selamat datang di daftar buku</h1>
<!-- Button trigger modal -->
<?= $this->session->flashdata('pesan');?>
<button type="button" class="btn btn-primary col-12 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambahkan Daftar Buku
</button>
<table class="table table-bordered" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kode Buku</th>
      <th scope="col">Judul Buku</th>
      <th scope="col">Tahun Terbit</th>
      <th scope="col">Penerbit</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach($data_buku as $row) {?>
    <tr>
      <th scope="row"><?=$no++; ?></th>
      <td><?=$row['kode_buku']; ?></td>
      <td><?=$row['judul_buku'];?></td>
      <td><?=$row['tahun_terbit'];?></td>
      <td><?=$row['nama_penerbit'];?></td>

      <td><a href="<?=base_url('pages/hapus_buku/').$row['kode_buku'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">
      <i class="fa fa-trash" aria-hidden="true">
      </i>
    </a>
    <a href="<?=base_url('pages/show_edit_page/').$row['kode_buku'];?>" class= "btn btn-primary btn-sm">
  <i class="fa fa-pencil-square" aria-hidden="true">
      </i>
    </a>
  </td>
    </tr>
    <?php }?>
  </tbody>
</table>