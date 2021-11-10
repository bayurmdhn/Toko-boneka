<?php  

class Dashboard extends CI_Controller
{
	function index()
	{
		if (!$this->session->userdata('admin')) {
			$this->session->set_flashdata('gagal', 'Anda Harus login terlebih dahulu');
			redirect('admin/login');
		}

		$this->load->view('admin/layout/header');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/layout/footer');
	}
}