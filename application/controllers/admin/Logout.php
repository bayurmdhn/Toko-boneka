<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
		$this->session->unset_userdata('admin');

		$this->session->set_flashdata('sukses', 'Logout berhasil');

		redirect('admin/login');
	}

}

/* End of file Logout.php */
/* Location: ./application/controllers/admin/Logout.php */