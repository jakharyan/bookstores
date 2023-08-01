<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	
	public function simpan_buku()
	{
		$data = array(
			'judul_buku'=> $this->input->post('judulBuku'),
			'tahun_terbit'=>$this->input->post('tahunTerbit'),
			'kode_penerbit'=> $this->input->post('kodePenerbit')
		);
			$this->Model_buku->simpan_buku($data);
			$this->session->set_flashdata('pesan',
			'<div class="alert alert-info" role="alert">
			Data Derhasil Disimpan</div>');
			redirect('pages/daftar_buku');
	}
	public function simpan_penerbit()
	{
		$data = array(
			// 'judul_Penerbit'=> $this->input->post('judulPenerbit'),
			'kode_penerbit'=> $this->input->post('kodePenerbit'),
			'nama_penerbit'=>$this->input->post('namaPenerbit'),
			'alamat_penerbit'=>$this->input->post('alamatPenerbit')
		);
			$this->Model_penerbit->simpan_penerbit($data);
			$this->session->set_flashdata('pesan',
			'<div class="alert alert-info" role="alert">
			Data Derhasil Disimpan</div>');
			redirect('pages/daftar_penerbit');
	}
	public function hapus_buku()
	{
		$kode = $this->uri->segment(3);
		$this->Model_buku->hapus_buku($kode);
		redirect('pages/daftar_buku');
	}
	public function hapus_penerbit()
	{
		$kode = $this->uri->segment(3);
		$this->Model_penerbit->hapus_penerbit($kode);
		redirect('pages/daftar_penerbit');
	}
	public function show_edit_page()
	{
		$kode = $this->uri->segment(3);
		$this->load->model('Model_penerbit');
		$this->load->model('Model_buku');
		$data['data_buku'] = $this->Model_buku->get_buku_by_kode($kode)->row_array();
		$data['data_penerbit'] = $this->Model_penerbit->get_all_penerbit()->result_array();
		$data['title'] = "Daftar Penerbit";
		$this->load->view('templates/header', $data);
		$this->load->view('edit_buku');
		$this->load->view('templates/footer');
	}
	public function show_edit_penerbit()
	{
		$kode = $this->uri->segment(3);
		$this->load->model('Model_penerbit');
		$data['data_penerbit'] = $this->Model_penerbit->get_penerbit_by_kode($kode)->row_array();
		$data['title'] = "Daftar Penerbit";
		$this->load->view('templates/header', $data);
		$this->load->view('edit_penerbit');
		$this->load->view('templates/footer');
	}
	public function update_buku()
	{
		$data = array(
			'kode_buku' => $this->input->post('kodeBuku'),
			'judul_buku' => $this->input->post('judulBuku'),
			'tahun_terbit' => $this->input->post('tahunTerbit'),
			'kode_penerbit' => $this->input->post('kodePenerbit')
		);
			$kode = $this->input->post('kodeBuku');
			$this->Model_buku->update_buku($data, $kode);
			redirect('Pages/daftar_buku');
	}
	public function update_penerbit()
	{
		$data = array(
			'kode_penerbit' => $this->input->post('kodePenerbit'),
			'nama_penerbit' => $this->input->post('namaPenerbit'),
			'alamat_penerbit' => $this->input->post('alamatPenerbit'),
		);
			$kode = $this->input->post('kodePenerbit');
			$this->Model_penerbit->update_penerbit($data, $kode);
			redirect('Pages/daftar_penerbit');
	}
	public function index()
	{
		//$this->load->view('welcome_message');
        $data['title'] = "Home";
        $this->load->view('templates/header',$data);
        $this->load->view('home');
        $this->load->view('templates/footer');
	}
	public function daftar_buku()
    {
		//$data['data_buku'] = $this->db->get('tb_buku')->result_array();
		$this->load->model('Model_penerbit');
		$data['data_buku'] = $this->Model_buku->get_all_buku()->result_array();
		$data['data_penerbit'] = $this->Model_penerbit->get_all_penerbit()->result_array();
        $data['title'] = "Daftar Buku";
        $this->load->view('templates/header',$data);
        $this->load->view('daftar_buku');
		$this->load->view('templates/modal');
        $this->load->view('templates/footer');
    }
    public function daftar_penerbit()
    {
		$this->load->model('Model_penerbit');
		// $data['data_penerbit'] = $this->m->get('tb_penerbit')->result_array();
		$data['data_buku'] = $this->Model_buku->get_all_buku()->result_array();
		$data['data_penerbit'] = $this->Model_penerbit->get_all_penerbit()->result_array();
        $data['title'] = "Daftar Penerbit";
        $this->load->view('templates/header',$data);
        $this->load->view('daftar_penerbit');
		$this->load->view('templates/modal_penerbit');
        $this->load->view('templates/footer');
    }
}
