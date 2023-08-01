<h1>Selamat datang di daftar penerbit</h1>
<?= $this->session->flashdata('pesan');?>
<button type="button" class="btn btn-primary col-12 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambahkan Daftar Penerbit
</button>
<table class="table table-bordered"id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kode Penerbit</th>
      <th scope="col">Nama Penerbit</th>
      <th scope="col">Alamat</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach($data_penerbit as $row) {?>
    <tr>
      <th scope="row"><?=$no++; ?></th>
      <td><?=$row['kode_penerbit']; ?></td>
      <td><?=$row['nama_penerbit'];?></td>
      <td><?=$row['alamat_penerbit'];?></td>
       <td><a href="<?=base_url('pages/hapus_penerbit/').$row['kode_penerbit'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">
      <i class="fa fa-trash" aria-hidden="true">
      </i>
    </a>
    <a href="<?=base_url('pages/show_edit_penerbit/').$row['kode_penerbit'];?>" class= "btn btn-primary btn-sm">
  <i class="fa fa-pencil-square" aria-hidden="true">
      </i>
    </a>
  </td>
    </tr>
    <?php }?>
  </tbody>
</table>