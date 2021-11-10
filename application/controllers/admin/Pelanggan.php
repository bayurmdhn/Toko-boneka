<?php

class Pelanggan extends CI_Controller
{

	function __construct()
	{
		parent:: __construct();

		if (!$this->session->userdata('admin')) {
			$this->session->set_flashdata('gagal', 'Anda Harus login terlebih dahulu');
			redirect('admin/login');
		}

		$this->load->model('M_admin');
	}

	function index()
	{

		$data['pelanggan'] = $this->M_admin->tampil_pelanggan();

		//echo "<pre>";
		//print_r($data['pelanggan']);
		//echo "</pre>";

		$this->load->view('admin/layout/header');
		$this->load->view('admin/pelanggan/v_tampil', $data);
		$this->load->view('admin/layout/footer');
	}

	function detail($id_pelanggan)
	{

		$data['pelanggan'] = $this->M_admin->detail_pelanggan($id_pelanggan);

		// echo "<pre>";
		// print_r($data['pelanggan']);
		// echo "</pre>";

		$this->load->view('admin/layout/header');
		$this->load->view('admin/pelanggan/v_detail', $data);
		$this->load->view('admin/layout/footer');
	}

	function hapus($id_pelanggan)
	{

		$this->M_admin->hapus_pelanggan($id_pelanggan);

		$this->session->set_flashdata('pesan', 'Data telah dihapus');

		redirect('admin/pelanggan');

	}
}