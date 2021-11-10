<?php  

function rupiah($angka)
{
	echo number_format($angka, 0, ",", ".");
}

function tanggal($tgl)
{
	return date("d F Y H:i", strtotime($tgl));
}

function tampil_kategori()
{
	$CI =& get_instance();
	$CI->load->model("M_pelanggan");

	$kategori = $CI->M_pelanggan->tampil_kategori();

	return $kategori;
}

function rupiah2($angka)
{
	return number_format($angka, 0, ",", ".");
}

function ambil_pengaturan($nama)
{
	// manggil CI
	$CI =& get_instance();

	$CI->db->where('nama_pengaturan', $nama);
	$ambil = $CI->db->get('tb_pengaturan');

	$hasil = $ambil->row_array();

	// echo "<pre>";
	// print_r($hasil);
	// echo "</pre>";

	return $hasil['isi_pengaturan'];
}

function kirim_email($data)
	{
		$CI =& get_instance();
		// konfigurasi email dipanggil
		$CI->load->config('email');
		//library email di panggil
		$CI->load->library('email');

		$dari = $CI->config->item('smtp_user');
		$ke = $data['email'];
		$judul = $data['judul'];
		$pesan = $data['pesan'];

		$CI->email->set_newline("\r\n");
		$CI->email->from($dari);
		$CI->email->to($ke);
		$CI->email->subject($judul);
		$CI->email->message($pesan);

		$kirim = $CI->email->send();

		if ($kirim == TRUE) {
			return;
		}else{
			show_error($CI->email->print_debugger());
			die;
		}
	}