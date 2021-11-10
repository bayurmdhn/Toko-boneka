<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function index()
	{
		$this->load->model("M_admin");

		$bulan = $this->input->get('bulan');

		$data['laporan'] = $this->M_admin->tampil_laporan_penjualan($bulan);
		$data['laporan_produk'] = $this->M_admin->tampil_laporan_produk($bulan);

		$this->load->view('admin/layout/header');
		$this->load->view('admin/laporan', $data);
		$this->load->view('admin/layout/footer');
	}

	function cetak($bulan)
	{
		$this->load->model("M_admin");

		$bulan = $this->input->get('bulan');

		$data['laporan'] = $this->M_admin->tampil_laporan_penjualan($bulan);
		$data['laporan_produk'] = $this->M_admin->tampil_laporan_produk($bulan);

		$this->load->view('admin/cetak_laporan', $data);

	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/admin/Laporan.php */