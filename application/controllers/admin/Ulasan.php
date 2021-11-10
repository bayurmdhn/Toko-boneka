<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulasan extends CI_Controller {

	function __construct()
	{
		parent:: __construct();

		if (!$this->session->userdata('admin')) {
			$this->session->set_flashdata('gagal', 'Anda Harus login terlebih dahulu');
			redirect('admin/login');
		}

		$this->load->model('M_admin');
	}

	public function index()
	{

		$data['ulasan'] = $this->M_admin->tampil_ulasan();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/ulasan/v_tampil', $data);
		$this->load->view('admin/layout/footer');
	}

	public function detail($id_ulasan)
	{

		$data['ulasan'] = $this->M_admin->detail_ulasan($id_ulasan);

		$this->load->view('admin/layout/header');
		$this->load->view('admin/ulasan/v_detail', $data);
		$this->load->view('admin/layout/footer');
	}

}

/* End of file Ulasan.php */
/* Location: ./application/controllers/admin/Ulasan.php */