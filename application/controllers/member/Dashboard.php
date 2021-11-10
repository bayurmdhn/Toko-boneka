<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	function __construct()
	{
		parent::__construct();

		// cek apakah sudah login?
		// jika tidak ada bukti login, lemparkan ke halaman login
		if (!$this->session->userdata('member')) {
				$this->session->set_flashdata('gagal', 'Mohon login terlebih dahulu!');
			redirect('member/daftar');
		}

		$params = array('server_key' => 'SB-Mid-server-exJNELupwhzClkuJyKnvl1js', 'production' => false);
		$this->load->library('veritrans');
		$this->veritrans->config($params);

		$this->load->model('M_pelanggan');

	}

	public function index()
	{
		$data['pembelian'] = $this->M_pelanggan->tampil_pembelian();
		$data['pelanggan'] = $this->M_pelanggan->profil_pelanggan();

		$this->load->view('header');
		$this->load->view('member/dashboard', $data);
		$this->load->view('footer');
	}

	public function edit($id_pelanggan)
	{
		$inputan = $this->input->post();

		if ($inputan)
		{
			$this->M_pelanggan->edit_profil($inputan, $id_pelanggan);

			$this->session->set_flashdata('pesan', 'Profil Berhasil diperbarui');

			redirect('member/dashboard');
		}

		// ambil data pelanggan yang login
		$data['pelanggan'] = $this->M_pelanggan->profil_pelanggan();
		$this->load->view('header');
		$this->load->view('member/edit_profil', $data);
		$this->load->view('footer');
	}

	public function pembelian($id_pembelian)
	{
		$data['detail'] = $this->M_pelanggan->pembelian_pelanggan($id_pembelian);
		$data['produk'] = $this->M_pelanggan->pembelian_detail($id_pembelian);

		$pembayaran = $this->M_pelanggan->detail_pembayaran($id_pembelian);

		if (!empty($pembayaran)) {
			// cek status midtrans
			$data_midtrans = $this->veritrans->status($pembayaran['kode_pembayaran']);

			// print_r($data_midtrans); 

			// jika trx status dr midtrans == 'settlement' DAN status pmbelian pending
			if ($data_midtrans->transaction_status == 'settlement' && $data['detail']['status_pembelian']=='Pending') {
				// update status pembelian jadi dikemas
				$data_update['status_pembelian'] = 'Dikemas';
				$this->M_pelanggan->update_pembelian($id_pembelian, $data_update);
			} 
			// jika trx status dr midtrans == 'pending' DAN batas pembayaran terlewati
			elseif ($data_midtrans->transaction_status == 'pending' && strtotime($data['detail']['batas_pembayaran']) < strtotime(date("Y-m-d H:i:s"))  ) {

				// buat expired di midtrans nya
				$this->veritrans->expire($pembayaran['kode_pembayaran']);

				// update status pembelian jadi kadaluarsa
				$data_update['status_pembelian'] = 'Kadaluarsa';
				$this->M_pelanggan->update_pembelian($id_pembelian, $data_update);
			}
		}

		

		$data['detail'] = $this->M_pelanggan->pembelian_pelanggan($id_pembelian);

		$this->load->view('header');
		$this->load->view('member/detail_pembelian', $data);
		$this->load->view('footer');
	}

	public function pembayaran($id_pembelian)
	{	
		$pembayaran = $this->M_pelanggan->detail_pembayaran($id_pembelian);

		// cek status midtrans
		$data_midtrans = $this->veritrans->status($pembayaran['kode_pembayaran']);

		$data['pembayaran'] = $data_midtrans;

		$this->load->view('header');
		$this->load->view('member/detail_pembayaran', $data);
		$this->load->view('footer');
	}

	public function selesai($id_pembelian)
	{
		// ambil data pembayaran
		$data['pembayaran'] = $this->M_pelanggan->detail_pembayaran($id_pembelian);


		$this->load->view('header');
		$this->load->view('member/selesai_pembayaran', $data);
		$this->load->view('footer');
	}

	public function testimoni($id_pembelian)
	{
		$data['testimoni'] = $this->M_pelanggan->tampil_testimoni_perpembelian($id_pembelian);
		$data['ulasan'] = $this->M_pelanggan->tampil_ulasan_perpembelian($id_pembelian);


		$this->load->view('header');
		$this->load->view('member/testimoni_ulasan', $data);
		$this->load->view('footer');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/member/Dashboard.php */