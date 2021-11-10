<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __construct()
	{
		parent :: __construct();

		$this->load->model('M_pelanggan');
		
	}

	public function index()
	{

		$input=$this->input->post();

		// aturan validasi
		$this->form_validation->set_rules('email_pelanggan', 'Email', 'trim|required|valid_email|is_unique[tb_pelanggan.email_pelanggan]');
		$this->form_validation->set_rules('nama_pelanggan', 'Nama', 'trim|required');
		$this->form_validation->set_rules('password_pelanggan', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('telp_pelanggan', 'Telp/No. HP', 'trim|required|is_numeric|min_length[10]');

		// buat pesan validasi utk setiap rule/aturan
		$this->form_validation->set_message('required', '{field} wajib diisi.');
		$this->form_validation->set_message('valid_email', '{field} tidak valid.');
		$this->form_validation->set_message('is_unique', '{field} sudah terdaftar.');
		$this->form_validation->set_message('min_length', '{field} terlalu pendek. Minimal {param} karakter/digit.');
		$this->form_validation->set_message('is_numeric', '{field} hanya boleh angka.');


		// apakah form validasi berjalan dan hasilnya VALID
		if ($this->form_validation->run() == TRUE)
		{
			$data = $this->M_pelanggan->simpan_pelanggan($input);

			$data['judul'] = 'Pendaftaran Akun Toko Boneka ALKA';
			$data['email'] = $data['email_pelanggan'];
			$data['pesan'] = '
			<p>Halo, '.$data['nama_pelanggan'].'! Pendaftaran Anda berhasil.</p>
			<p>Mohon verifikasi email untuk mengaktifkan akun Anda dan mulai berbelaja di tiko kami.</p>
			<a href="'.base_url('member/daftar/verifikasi?kode='. $data['kode_verifikasi']. '&email=' .$data['email_pelanggan']).'" style="background-color: blue; text-decoration: none; color: white; padding: 10px 20px; border-radius: 25px;">Verifikasi Sekarang</a>
			<br>
			<br>
			';

			kirim_email($data);

			$this->session->set_flashdata('sukses', 'Pendaftaran berhasil! Silakan cek email Anda untuk verifikasi akun.');
			redirect('member/daftar','refresh');
		}

		$this->load->view('header');
		$this->load->view('member/daftar');
		$this->load->view('footer');
	}

	private function _kirim_email($data)
	{
		// konfigurasi email dipanggil
		$this->load->config('email');
		//library email di panggil
		$this->load->library('email');

		$dari = $this->config->item('smtp_user');
		$ke = $data['email_pelanggan'];
		$judul = $data['judul'];
		$pesan = $data['pesan'];

		$this->email->set_newline("\r\n");
		$this->email->from($dari);
		$this->email->to($ke);
		$this->email->subject($judul);
		$this->email->message($pesan);

		$kirim = $this->email->send();

		if ($kirim == TRUE) {
			return;
		}else{
			show_error($this->email->print_debugger());
			die;
		}
	}

	public function verifikasi()
	{
		$kode = $this->input->get('kode');
		$email = $this->input->get('email');

		if (!$this->input->get('kode') || !$this->input->get('email')) {
			
			$this->session->set_flashdata('gagal', 'Alamat URL tidak ditemukan');
		}else
		{
			$verifikasi = $this->M_pelanggan->verifikasi_pelanggan($kode, $email);

			if ($verifikasi == true) {
				$this->session->set_flashdata('sukses', 'Verifikasi email berhasil silahkan login untuk memulai berbelanja');
			}else
			{
				$this->session->set_flashdata('gagal', 'Email atau token tidak ditemukan');
			}
		}

		redirect('member/daftar');
	}


}

/* End of file Daftar.php */
/* Location: ./application/controllers/member/Daftar.php */