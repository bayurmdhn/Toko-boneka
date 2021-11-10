<?php 

class Produk extends CI_Controller
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

		$data['produk'] = $this->M_admin->tampil_produk();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/produk/v_tampil', $data);
		$this->load->view('admin/layout/footer');
	}

	function tambah()
	{
		$data['kategori'] = $this->M_admin->tampil_kategori();

		$inputan = $this->input->post();

		if ($inputan)
		{
			$this->M_admin->tambah_produk($inputan);

			$this->session->set_flashdata('pesan', 'Data berhasil ditambah');

			redirect('admin/produk');
		}

		$this->load->view('admin/layout/header');
		$this->load->view('admin/produk/v_tambah', $data);
		$this->load->view('admin/layout/footer');
	}

	function detail($id_produk)
	{

		//$data['kategori'] = $this->M_admin->tampil_kategori();

		$data['produk'] = $this->M_admin->detail_produk($id_produk);

		//print_r($data['kategori']);

		$this->load->view('admin/layout/header');
		$this->load->view('admin/produk/v_detail', $data);
		$this->load->view('admin/layout/footer');
	}


	function hapus($id_produk)
	{

		$this->M_admin->hapus_produk($id_produk);

		$this->session->set_flashdata('pesan', 'Data berhasil dihapus');

		redirect('admin/produk');
	}

	function ubah($id_produk)
	{

		$inputan = $this->input->post();

		if ($inputan) 
		{
			$this->M_admin->ubah_produk($inputan, $id_produk);

			$this->session->set_flashdata('pesan', 'Data dirubah');

			redirect('admin/produk');
		}

		$data['produk'] = $this->M_admin->detail_produk($id_produk);
		$data['kategori'] = $this->M_admin->tampil_kategori();


		$this->load->view('admin/layout/header');
		$this->load->view('admin/produk/v_ubah', $data);
		$this->load->view('admin/layout/footer');
	}
}