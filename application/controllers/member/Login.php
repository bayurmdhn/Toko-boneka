<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->model('M_pelanggan');
		$email=$this->input->post("email_pelanggan");
		$password=$this->input->post("password_pelanggan");

		if (isset($email) AND isset($password)) 
		{
			$login=$this->M_pelanggan->login_pelanggan($email,$password);

			if ($login=="sukses") 
			{
				redirect('utama','refresh');
			}
			else if($login=='belum aktifasi')
			{
				$this->session->set_flashdata('gagal', 'Mohon verifikasi email terlebih dahulu');

				redirect('member/daftar');
			}
			else
			{
				$this->session->set_flashdata('gagal', 'Email/password salah!');
				redirect('member/daftar','refresh');
			}

		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/member/Login.php */