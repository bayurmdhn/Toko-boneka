<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

	public function __construct()
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
		$data['pembelian'] = $this->M_admin->tampil_pembelian();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/pembelian/v_tampil', $data);
		$this->load->view('admin/layout/footer');
	}

	public function detail($id_pembelian)
	{
		$inputan = $this->input->post();

		if ($inputan) {
				
			$this->M_admin->update_resi($id_pembelian, $inputan);

			$this->session->set_flashdata('pesan', 'Resi berhasil di kirim!');
			
			redirect(current_url());

		}

		$data['detail'] = $this->M_admin->detail_pembelian($id_pembelian);
		$data['produk'] = $this->M_admin->tampil_pembelian_produk($id_pembelian);

		$this->load->view('admin/layout/header');
		$this->load->view('admin/pembelian/v_detail', $data);
		$this->load->view('admin/layout/footer');
	}

}

/* End of file Pembelian.php */
/* Location: ./application/controllers/admin/Pembelian.php */