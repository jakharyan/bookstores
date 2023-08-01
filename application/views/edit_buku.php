<form action="<?=base_url('pages/update_buku');?>"method="POST">
      <div class="modal-body">
        <!--isi form-->
<div class="form-floating mt-4 mb-3">
  <input type="text" class="form-control" name="kodeBuku" value="<?= $data_buku['kode_buku'];?>" readonly>
    <label for="floatingInput">Kode Buku</label>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" name="judulBuku"
 placeholder="Judul Buku" value="<?=$data_buku['judul_buku'];?>">
<label for="floatingInput">Judul Buku</label>
</div>
<div class="form-floating">
  <select class="form-control" id="floatingYear" name="tahunTerbit">
    <?php for($a=2021;$a<=2023;$a++){
        if($a==$data_buku['tahun_terbit']){?>
    <option value="<?=$a;?>" selected><?=$a;?></option>
<?php }else{ ?>
    <option value="<?=$a;?>"><?=$a;?>
</option>
<?php }}?>
    </select>
    <label for="floatingYear">Tahun Terbit</label></div>
<div class="form-floating mt-3">
  <select class="form-control" id="floatingPenerbit" name="kodePenerbit">
    <?php
    $kode = $data_buku['kode_penerbit']; 
    foreach($data_penerbit as $row){
        if($row['kode_penerbit'] == $kode){?>
    <option value="<?=$row['kode_penerbit'];?>" selected>
    <?=$row['nama_penerbit'];?></option>
<?php }}?>
  </select>
  <label for="floatingPenerbit">Penerbit</label>
</div>
      </div>
      <div class="modal-footer mt-2">
        <button type="button" class="btn btn-secondary" style="margin-right:10px"onClick= "history.back()">kembali</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>