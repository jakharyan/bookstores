<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Model_penerbit extends CI_Model{
    public function get_all_penerbit()
    {
        $this->db->select('*');
        $this->db->from('tb_penerbit');
        $query = $this->db->get();
        return $query;
    }
    public function simpan_penerbit($data)
    {
        $this->db->insert('tb_penerbit', $data); 
    }
    public function update_penerbit($data, $kode)
    {
        $this->db->where('kode_penerbit', $kode);
        $this->db->update('tb_penerbit', $data);
    }
    public function hapus_penerbit($kode)
    {
        $this->db->where('kode_penerbit', $kode);
        $query = $this->db->get('tb_buku');
        if($query->num_rows()>0){
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Data gagal dihapus, Penerbit Sedang Digunakan di Daftar Buku!!</div>');
        } else{
            $this->db->where('kode_penerbit', $kode);
            $this->db->delete('tb_penerbit');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus!!</div>');
        }
        
    }
    public function get_penerbit_by_kode($kode)
	{
		return $this->db->get_where('tb_penerbit', array('kode_penerbit'=>$kode));
	}
}