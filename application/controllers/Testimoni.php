<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

	public function index()
	{
		$this->load->model('M_pelanggan');

		$data['testimoni'] = $this->M_pelanggan->tampil_testimoni();

		$this->load->view('header');
		$this->load->view('testimoni', $data);
		$this->load->view('footer');
	}

}

/* End of file Testimoni.php */
/* Location: ./application/controllers/Testimoni.php */