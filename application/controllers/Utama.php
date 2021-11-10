<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {

	public function index()
	{
		$this->load->model('M_pelanggan');

		$data['produk_terlaris'] = $this->M_pelanggan->tampil_produk_terlaris();

		$this->load->view('header');
		$this->load->view('utama', $data);
		$this->load->view('footer');
	}
}
