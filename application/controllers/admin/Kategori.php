<?php  

class Kategori extends CI_Controller
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
		//panggil model admin
		$this->load->model("M_admin");

		//jalankan fungsi tampil_kategori() pada model admin
		$data['kategori'] = $this->M_admin->tampil_kategori();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/kategori/v_tampil', $data);
		$this->load->view('admin/layout/footer');
	}

	function tambah()
	{
		//panggil model admin

		$inputan = $this->input->post();

		//jika ada inputan 
		if ($inputan) 
		{
			//jalankan fungsi tambah_kategori
			$this->M_admin->tambah_kategori($inputan);

			// buat pesan flashdata
			$this->session->set_flashdata('pesan', 'Data berhasil ditambah');

			//alihkan ke halaman tampil
			redirect('admin/kategori');
		}

		$this->load->view('admin/layout/header');
		$this->load->view('admin/kategori/v_tambah');
		$this->load->view('admin/layout/footer');
	}

	function hapus($id_kategori)
	{

		//jalankan fungsi hapus_kategori berdasarkan id
		$this->M_admin->hapus_kategori($id_kategori);


		//buat pesan flashdata
		$this->session->set_flashdata('pesan', 'data telah dihapus');

		redirect('admin/kategori/');
	}

	function ubah($id_kategori)
	{

		$inputan = $this->input->post();

		// jika ad inputan 
		if ($inputan) {
			
			// jalankan fungsi ubah 
			$this->M_admin->ubah_kategori($inputan, $id_kategori);

			// buat pesan flashdata

			$this->session->set_flashdata('pesan', 'Data dirubah');

			redirect('admin/kategori');
		}

		$data['kategori'] = $this->M_admin->detail_kategori($id_kategori);

		$this->load->view('admin/layout/header');
		$this->load->view('admin/kategori/v_ubah', $data);
		$this->load->view('admin/layout/footer');
	}

}
