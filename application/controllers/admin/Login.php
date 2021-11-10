<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index()
	{
		
		$inputan = $this->input->post();

		if ($inputan) {

			$this->load->model('M_admin');

			$cek_login = $this->M_admin->login($inputan);

			if ($cek_login  == 'sukses') {
				$this->session->set_flashdata('sukses', 'login berhasil');

				redirect('admin/dashboard');
			}else
			{
				$this->session->set_flashdata('gagal', 'Username atau Password salah');

				redirect('admin/login');
			}
		}

		$this->load->view('admin/v_login');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/admin/Login.php */