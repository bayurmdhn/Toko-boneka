<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

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

		$data['testimoni'] = $this->M_admin->tampil_testimoni();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/testimoni/v_tampil', $data);
		$this->load->view('admin/layout/footer');
	}

	public function detail($id_testimoni)
	{

		$data['testimoni'] = $this->M_admin->detail_testimoni($id_testimoni);

		$this->load->view('admin/layout/header');
		$this->load->view('admin/testimoni/v_detail', $data);
		$this->load->view('admin/layout/footer');
	}

	public function hapus($id_testimoni)
	{

		$this->M_admin->hapus_testimoni($id_testimoni);

		$this->session->set_flashdata('pesan', 'Data berhasil dihapus');

		redirect('admin/testimoni');
	}

}

/* End of file Testimoni.php */
/* Location: ./application/controllers/admin/Testimoni.php */