<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function detail($id_kategori)
	{
		$this->load->model('M_pelanggan');

		$data['produk'] = $this->M_pelanggan->tampil_produk_perkategori($id_kategori);

		$this->load->view('header');
		$this->load->view('produk', $data);
		$this->load->view('footer');
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */