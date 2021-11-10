<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('member')) {
				$this->session->set_flashdata('gagal', 'Mohon login terlebih dahulu!');
			redirect('member/daftar');
		}
		
		$params = array('server_key' => 'SB-Mid-server-exJNELupwhzClkuJyKnvl1js', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->model('M_pelanggan');
	}

	public function index()
	{

		if ($this->input->post()) {
			
			$data_input = $this->input->post();

			$id_pembelian=$this->M_pelanggan->simpan_pembelian($data_input);

			//siapkan data untuk kirim email
			$data_email['detail'] = $this->M_pelanggan->pembelian_pelanggan($id_pembelian);
			$data_email['produk'] = $this->M_pelanggan->pembelian_detail($id_pembelian);

			$template_email = $this->load->view('view_email_checkout', $data_email, TRUE);

			$data['judul'] = 'Pemesanan Toko Boneka ALKA Berhasil! Berikut Detailnya:';
			$data['pesan'] = $template_email;
			$data['email'] = $data_email['detail']['email_pelanggan'];

			kirim_email($data);

			redirect("checkout/batas_pembayaran/$id_pembelian",'refresh');

		}
		$data['keranjang'] = $this->M_pelanggan->tampil_keranjang();

		$this->load->view('header');
		$this->load->view('checkout', $data);
		$this->load->view('footer');
	}

	function batas_pembayaran($id_pembelian)
	{
		$this->load->model('M_admin');

		$data['pembelian']=$this->M_admin->detail_pembelian($id_pembelian);
		$data['status_checkout'] = $this->M_pelanggan->cek_status_checkout($id_pembelian);
		// $pembelian=$this->M_pelanggan->pembelian_detail($id_pembelian);
		// echo "<pre>";
		// print_r($data['pembelian']);
		// echo "</pre>";
		$this->load->view('header');
		$this->load->view('batas_pembayaran',$data);
		$this->load->view('footer');
	}
	function token()
	{
		$id_pembelian=$this->input->get("id_pembelian");
		$this->M_pelanggan->snap_pembayaran($id_pembelian);
	}
	function finish($id_pembelian)
	{
		$result = json_decode($this->input->post('result_data'), TRUE);

		$data['info'] = $result;
		$data['info']['id_pembelian'] = $id_pembelian;

		// redirect('member/')
		// echo 'RESULT <br><pre>';
		// var_dump($result);
		// echo '</pre>' ;

		$this->load->model('M_pelanggan');
		$this->M_pelanggan->simpan_pembayaran($id_pembelian, $result);

		redirect('member/dashboard/selesai/' . $id_pembelian);

	}
}

/* End of file Checkout.php */
/* Location: ./application/controllers/Checkout.php */