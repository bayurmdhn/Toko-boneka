<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

	public function index()
	{
		$this->load->model('M_pelanggan');

		$input = $this->input->post();

		if ($input) {

			// if ($input['jumlah'] > $input['stok']) {
				
			// 	$this->session->set_flashdata('pesan', 'Jumlah melebihi stok produk tersedia!');

			// 	return redirect('keranjang');
			// }
			
			$this->M_pelanggan->update_keranjang($input);

			$this->session->set_flashdata('pesan', 'Keranjang Berhasil diperbarui!');

			redirect('keranjang');
		}

		$data['keranjang'] = $this->M_pelanggan->tampil_keranjang();

		

		$this->load->view('header');
		$this->load->view('keranjang', $data);
		$this->load->view('footer');
	}

	public function hapus($id_produk)
	{
		unset($_SESSION['keranjang'][$id_produk]);

		$this->session->set_flashdata('pesan', 'Produk berhasil dihapus dari keranjang!');

		redirect('keranjang');
	}

}

/* End of file Keranjang.php */
/* Location: ./application/controllers/Keranjang.php */