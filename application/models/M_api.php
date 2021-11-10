<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_api extends CI_Model {

	public $apikey = "b6fcdd0c465d29b0bf12e0aac8a13692";

	public function tampil_provinsi()
	{
		$curl = curl_init();

		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: $this->apikey"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {

			// ubah respon JSON rajaongkir menjadi array
			$response = json_decode($response, TRUE);

			// ambil provinsi dari hasil data yang di dapat dr raja ongkir
			$data_provinsi = $response['rajaongkir']['results'];

			// echo "<pre>";
			// print_r($data_provinsi);
			// echo "</pre>";
			return $data_provinsi;
		}
	}

	public function tampil_kota($id_provinsi)
	{
		$curl = curl_init();

		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=&province=$id_provinsi",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: $this->apikey"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {

			// ubah respon JSON rajaongkir menjadi array
			$response = json_decode($response, TRUE);

			// ambil kota dari hasil data yang di dapat dr raja ongkir
			$data_kota = $response['rajaongkir']['results'];

			echo "<pre>";
			print_r($data_kota);
			echo "</pre>";
			return $data_kota;
		}
	}

	public function tampil_ongkir()
	{
		$id_kota_asal = 501;
		$id_kota_tujuan = $this->input->get('tujuan');
		$total_berat = $this->input->get('berat');
		$ekspedisi = $this->input->get('ekspedisi');

		$curl = curl_init();

		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=$id_kota_asal&destination=$id_kota_tujuan&weight=$total_berat&courier=$ekspedisi",
			CURLOPT_HTTPHEADER => array(
				"key: $this->apikey"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {

			// ubah respon JSON rajaongkir menjadi array
			$response = json_decode($response, TRUE);

			// ambil kota dari hasil data yang di dapat dr raja ongkir
			$data_ongkir = $response['rajaongkir']['results'];

			echo "<pre>";
			print_r($data_ongkir);
			echo "</pre>";
			return $data_ongkir;
		}
	}

}

/* End of file M_api.php */
/* Location: ./application/models/M_api.php */