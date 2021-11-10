<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

	public function index()
	{
		$inputan = $this->input->post();

		if ($inputan) {

			$this->load->model("M_admin");
			
			$this->M_admin->simpan_pengaturan($inputan);

			$this->session->set_flashdata('sukses', 'Pengaturan berhasil diperbarui.');

			redirect(current_url());

		}

		$this->load->view('admin/layout/header');
		$this->load->view('admin/pengaturan');
		$this->load->view('admin/layout/footer');
	}

}

/* End of file Pengaturan.php */
/* Location: ./application/controllers/admin/Pengaturan.php */