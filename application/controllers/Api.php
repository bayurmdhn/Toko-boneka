<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();


		$this->load->model("M_api");
	}

	public function provinsi()
	{
		$data['provinsi'] = $this->M_api->tampil_provinsi();

		$html = $this->load->view('api/data_provinsi', $data, TRUE);

		echo $html;
	}

	public function kota($id_provinsi)
	{
		$data['kota'] = $this->M_api->tampil_kota($id_provinsi);

		$html = $this->load->view('api/data_kota', $data, TRUE);

		echo $html;
	}

	public function ongkir()
	{
		$ongkir = $this->M_api->tampil_ongkir();

		$data['nama_ekspedisi'] = $ongkir[0]['name'];
		$data['ongkir'] = $ongkir[0]['costs'];

		$html = $this->load->view('api/data_ongkir', $data, TRUE);

		echo $html;
	}

}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */