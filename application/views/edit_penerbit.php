<form action="<?=base_url('pages/update_penerbit');?>"method="POST">
      <div class="modal-body">
        <!--isi form-->
        <div class="form-floating mt-4 mb-3">
  <input type="text" class="form-control" name="kodePenerbit" value="<?= $data_penerbit['kode_penerbit'];?>" readonly>
    <label for="floatingInput">Kode Penerbit</label>
</div>
        <div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="Nama Penerbit" name="namaPenerbit" value="<?=$data_penerbit['nama_penerbit'];?>">
  <label for="floatingInput">Nama Penerbit</label>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="Alamat Penerbit" name="alamatPenerbit" value="<?=$data_penerbit['alamat_penerbit'];?>">
  <label for="floatingInput">Alamat</label>
</div>
<!-- -->
      </div>
      <div class="modal-footer mt-2">
        <button type="button" class="btn btn-secondary" style="margin-right:10px"onClick= "history.back()">kembali</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>