<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model("M_pelanggan");
	}

	public function beri_testimoni($id_pembelian)
	{
		$testimoni = $this->M_pelanggan->tampil_testimoni_perpembelian($id_pembelian);

		$inputan = $this->input->post();

		// kalau testimoni kosong, masukan testimoni baru
		if (empty($testimoni)) {
			$this->session->set_flashdata('sukses', 'Testimoni berhasil dikirim!');
			$this->M_pelanggan->tambah_testimoni($id_pembelian, $inputan);
		} else {
			$this->session->set_flashdata('sukses', 'Testimoni berhasil diperbarui!');
			$this->M_pelanggan->update_testimoni($id_pembelian, $inputan);
		}

		redirect('member/dashboard/testimoni/' . $id_pembelian['id_pembelian']);

	}

	public function beri_ulasan()
	{
		$inputan = $this->input->post();
		$ulasan = $this->M_pelanggan->ambil_ulasan($inputan);

		// kalau ulasan kosong, masukan ulasan baru
		if (empty($ulasan)) {
			$this->session->set_flashdata('sukses', 'Ulasan produk berhasil dikirim!');
			$this->M_pelanggan->tambah_ulasan($inputan);
		} else {
			$this->session->set_flashdata('sukses', 'Ulasan produk berhasil diperbarui!');
			$this->M_pelanggan->update_ulasan($inputan);
		}

		redirect('member/dashboard/testimoni/' . $inputan['id_pembelian']);

	}

}

/* End of file Nilai.php */
/* Location: ./application/controllers/member/Nilai.php */