<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();

		$this->load->model('M_pelanggan');
	}

	public function index()
	{
		
		$data['produk'] = $this->M_pelanggan->tampil_produk();
		$data['kategori'] = $this->M_pelanggan->tampil_kategori();

		//echo "<pre>";
		//print_r($data);
		//echo "</pre>";

		$this->load->view('header');
		$this->load->view('produk', $data);
		$this->load->view('footer');
	}

	public function detail($id_produk)
	{
		//ambil inputan
		$inputan = $this->input->post();

		//jika ada inputan
		if ($inputan) 
		{	
			
			//ambil jumlah produk yang mau di tambahkan ke keranjang
			$jumlah = $inputan['jumlah'];

			if ($jumlah > $inputan['stok']) {
				
				$this->session->set_flashdata('pesan', 'Jumlah inputan melebihi stok produk tersedia!');

				return redirect('produk/detail/'.$id_produk);
			}
			
			//jalankan fungsi tambah keranjang
			$this->M_pelanggan->tambah_keranjang($id_produk, $jumlah);

			$this->session->set_flashdata('pesan', 'Produk berasil ditambah  ke keranjang');

			redirect('produk/detail/'.$id_produk);

		}		


		$data['detail'] = $this->M_pelanggan->detail_produk($id_produk);
		$data['terkait'] = $this->M_pelanggan->produk_kategori($data['detail']['id_kategori'],4,0);
		$data['ulasan'] = $this->M_pelanggan->tampil_ulasan_perproduk($id_produk);


		$this->load->view('header');
		$this->load->view('detail_produk', $data);
		$this->load->view('footer');
	}

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */