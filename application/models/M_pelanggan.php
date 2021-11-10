<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan extends CI_Model {

	function tampil_produk_terlaris()
	{
		$ambil = $this->db->get('tb_produk');

		$hasil = $ambil->result_array();

		return $hasil;
	}

	function tampil_produk()
	{
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori');
		$ambil = $this->db->get('tb_produk');

		$hasil = $ambil->result_array();

		return $hasil;
	}

	function tampil_kategori()
	{
		$ambil = $this->db->get('tb_kategori');

		$hasil  = $ambil->result_array();

		return $hasil;
	}

	function detail_produk($id_produk)
	{
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori');
		$this->db->where('id_produk', $id_produk);
		$ambil = $this->db->get('tb_produk');

		$hasil = $ambil->row_array();

		return $hasil;
	}

	function produk_kategori($id_kategori, $limit=null, $offset=null)
	{
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori');
		$this->db->order_by('id_produk', 'desc');
		$this->db->where('tb_produk.id_kategori', $id_kategori);
		$ambil = $this->db->get('tb_produk', $limit, $offset);

		$hasil = $ambil->result_array();

		return $hasil;
	}

	function tampil_produk_perkategori($id_kategori)
	{
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori');
		$this->db->where('tb_produk.id_kategori', $id_kategori);
		$ambil = $this->db->get('tb_produk');

		$hasil = $ambil->result_array();

		return $hasil;
	}

	function tambah_keranjang($id_produk, $jumlah)
	{
		//cek apakah id_produk pada session keranjang sudah ada
		if (isset($_SESSION['keranjang'][$id_produk])) {
			//jika sudah ada
			//tambahkan jumlah produk di keranjang dengan jumlah sebelumnya
			$_SESSION['keranjang'][$id_produk] = $_SESSION['keranjang'][$id_produk] + $jumlah;

		}else{

			$_SESSION['keranjang'][$id_produk] = $jumlah;
		}
	}

	function tampil_keranjang()
	{
		//ambil data keranjang di session keranjang
		$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();

		$data = array();

		$index = 0;

		foreach ($keranjang as $id_produk => $jumlah) {
			
			$this->db->where('id_produk', $id_produk);
			$produk = $this->db->get('tb_produk')->row_array();

			$data[$index]['id_produk'] = $id_produk;
			$data[$index]['nama_produk'] = $produk['nama_produk'];
			$data[$index]['harga_produk'] = $produk['harga_produk'];
			$data[$index]['berat_produk'] = $produk['berat_produk'];
			$data[$index]['foto_produk'] = $produk['foto_produk'];
			$data[$index]['stok_produk'] = $produk['stok_produk'];
			$data[$index]['jumlah'] = $jumlah;

			$index++;

		}

		return $data;
	}

	function update_keranjang($input)
	{
		foreach ($input['jumlah'] as $id_produk => $jumlah) {
			$_SESSION['keranjang'][$id_produk] = $jumlah;
		}
	}

	function simpan_pembelian($data)
	{
		$sekarang = date("Y-m-d H:i:s");
		$sehari_kedepan = date("Y-m-d H:i:s", strtotime($sekarang. "+1 days"));

		$data_pengiriman['id_pelanggan'] = $_SESSION['member']['id_pelanggan'];
		$data_pengiriman['tanggal_pembelian'] = $sekarang;
		$data_pengiriman['batas_pembayaran'] = $sehari_kedepan;
		$data_pengiriman['total_belanja'] = $data['total_belanja'];
		$data_pengiriman['total_ongkir'] = $data['total_ongkir'];
		$data_pengiriman['total_pembelian'] = $data['total_pembelian'];
		$data_pengiriman['status_pembelian'] = "Pending";
		$data_pengiriman['nama_penerima'] = $data['nama_penerima'];
		$data_pengiriman['alamat_penerima'] = $data['alamat_penerima'];
		$data_pengiriman['telp_penerima'] = $data['telp_penerima'];
		$data_pengiriman['kecamatan_penerima'] = $data['kecamatan_penerima'];
		$data_pengiriman['tipe_kota_penerima'] = $data['tipe_kota'];
		$data_pengiriman['kota_penerima'] = $data['nama_kota'];
		$data_pengiriman['provinsi_penerima'] = $data['nama_provinsi'];
		$data_pengiriman['kode_pos_penerima'] = $data['kodepos_penerima'];
		$data_pengiriman['ekspedisi_pengiriman'] = $data['nama_ekspedisi'];
		$data_pengiriman['paket_pengiriman'] = $data['nama_paket'];
		$data_pengiriman['estimasi_pengiriman'] = $data['estimasi_pengiriman'];
		$data_pengiriman['catatan_pembelian'] = $data['catatan_pembelian'];

		$this->db->insert('tb_pembelian', $data_pengiriman);

		//mengambil id pembelian barusan
		$id_pembelian = $this->db->insert_id();

		// $id_pembelian = 1;

		$keranjang = $this->tampil_keranjang();

		$data_pembelian_detail = array();

		//mengumpulkan data produk yang di beli 
		foreach ($keranjang as $key => $value) {
			$data_pembelian_detail[$key]['id_pembelian'] = $id_pembelian;
			$data_pembelian_detail[$key]['id_produk'] = $value['id_produk'];
			$data_pembelian_detail[$key]['nama_produk'] = $value['nama_produk'];
			$data_pembelian_detail[$key]['harga_produk'] = $value['harga_produk'];
			$data_pembelian_detail[$key]['berat_produk'] = $value['berat_produk'];
			$data_pembelian_detail[$key]['jumlah_pembelian'] = $value['jumlah'];

		}
		//masukan data produk ke tabel pembelian detail
		$this->db->insert_batch('tb_pembelian_detail', $data_pembelian_detail);

		// echo "<pre>";
		// print_r($keranjang);
		// echo "</pre>";
		// die;

		// hapus keranjang
		unset($_SESSION['keranjang']);

		return $id_pembelian;
	}

	function tampil_pembelian()
	{
		// ambil id_pelanggan dari session member
		$pelanggan = $this->session->userdata('member');

		$id_pelanggan = $pelanggan['id_pelanggan'];

		// dapatkan data pembelian per id_pelanggan
		$this->db->where('id_pelanggan', $id_pelanggan);
		$ambil = $this->db->get('tb_pembelian');

		$hasil = $ambil->result_array();

		return $hasil;
	}
	function simpan_pelanggan($input)
	{
		$input['password_pelanggan']=sha1($input['password_pelanggan']);

		$input['kode_verifikasi'] = date("YmdHis").rand(0,99);

			//konfigurasi upload
		$config['upload_path']			= './assets/img/pelanggan/';
		$config['allowed_types']		= 'jpg|jpeg|png';

		//panggil library upload
		$this->load->library("upload", $config);

		//adegan upload
		$ngupload = $this->upload->do_upload("foto_pelanggan");

		if ($ngupload) 
		{
			$input["foto_pelanggan"] = $this->upload->data("file_name");
			$this->db->insert("tb_pelanggan", $input);
		}
		else
		{
 		// jalankan query insert
			$this->db->insert("tb_pelanggan", $input);
		}

		return $input;

	}
	function login_pelanggan($email,$password)
	{
		$password = sha1($password);

		$this->db->where('email_pelanggan', $email);
		$this->db->where('password_pelanggan', $password);
		$ambil = $this->db->get('tb_pelanggan');

		$jumlah_data = $ambil->num_rows();

		if ($jumlah_data > 0) 
		{
			$data_pelogin = $ambil->row_array();

			if ($data_pelogin['status_aktifasi']==0) {
				return 'belum aktifasi';
			}

			$this->session->set_userdata('member', $data_pelogin);

			return 'sukses';
		}
		else
		{
			return 'gagal';
		}
	}

	function verifikasi_pelanggan($kode,$email)
	{
		$this->db->where('kode_verifikasi', $kode);
		$this->db->where('email_pelanggan', $email);
		$this->db->where('status_aktifasi', 0);
		$ambil = $this->db->get('tb_pelanggan');

		if ($ambil->num_rows() > 0) {
			$this->db->where('email_pelanggan', $email);
			$this->db->update('tb_pelanggan', ['status_aktifasi'=>1]);

			return true;
		}else
		{
			return false;
		}
	}

	function profil_pelanggan()
	{
		$pelanggan = $this->session->userdata('member');

		$id_pelanggan = $pelanggan['id_pelanggan'];

		$this->db->where('id_pelanggan', $id_pelanggan);
		$ambil = $this->db->get('tb_pelanggan');

		return $ambil->row_array();
	}

	function edit_profil($inputan, $id_pelanggan)
	{
		$config['upload_path']		= './assets/img/pelanggan/';
		$config['allowed_types']	= 'jpg|jpeg|png';

		$this->load->library("upload", $config);

		$ngupload = $this->upload->do_upload("foto_pelanggan");

		if ($ngupload) 
		{
			$inputan["foto_pelanggan"] = $this->upload->data("file_name");
			// echo "<pre>";
			// print_r($this->upload->data());
			// echo "</pre>";
			// die;
		} 
		// else {
		// 	echo "<pre>";
		// 	print_r($this->upload->display_errors());
		// 	echo "</pre>";
		// 	die;
		// }

		if (empty($inputan['password_pelanggan'])) {
			unset($inputan['password_pelanggan']);
		}else
		{
			$inputan['password_pelanggan'] = sha1($inputan['password_pelanggan']);
		}

		$this->db->where('id_pelanggan', $id_pelanggan);
		$this->db->update('tb_pelanggan', $inputan);
	}

	function pembelian_pelanggan($id_pembelian)
	{
		$this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_pembelian.id_pelanggan', 'left');
		$this->db->where('id_pembelian', $id_pembelian);
		$ambil = $this->db->get("tb_pembelian");
		$hasil = $ambil->row_array();
		return $hasil;
	}
	function pembelian_detail($id_pembelian)
	{	
		$this->db->where('id_pembelian', $id_pembelian);
		$ambil = $this->db->get("tb_pembelian_detail");

		$hasil = $ambil->result_array();

		return $hasil;

	}
	function snap_pembayaran($id_pembelian)
	{
		date_default_timezone_set("Asia/Jakarta");

		$pemesanan = $this->pembelian_pelanggan($id_pembelian);
		$pemesanan_detail= $this->pembelian_detail($id_pembelian);

		// echo "<pre>";
		// print_r($pemesanan);
		// echo "</pre>";
		// die;

			// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $pemesanan['total_pembelian'],
		);

		foreach ($pemesanan_detail as $key => $value) 
		{
			$items_details[$key]['id']= $value['id_pembelian_detail'];
			$items_details[$key]['price']= $value['harga_produk'];
			$items_details[$key]['quantity']= $value['jumlah_pembelian'];
			$items_details[$key]['name']= $value['nama_produk'];
		}

		$key_ongkir = count($pemesanan_detail); // 3

		// echo $key_ongkir; die;

		$items_details[$key_ongkir]['id'] = 'Biaya Kirim';
		$items_details[$key_ongkir]['price'] = $pemesanan['total_ongkir'];
		$items_details[$key_ongkir]['quantity'] = 1;
		$items_details[$key_ongkir]['name'] = $pemesanan['ekspedisi_pengiriman'] . " " . $pemesanan['paket_pengiriman'];

		// echo "<pre>";
		// print_r($items_details);
		// echo "</pre>";
		// die;

		// Optional
		$billing_address = array(
			'first_name'    => $pemesanan['nama_pelanggan'],
			'address'       => $pemesanan['alamat_pelanggan'],
			'city'          => $pemesanan['kota_penerima'],
			'postal_code'   => $pemesanan['kode_pos_penerima'],
			'phone'         => $pemesanan['telp_pelanggan'],
			'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
			'first_name'    => $pemesanan['nama_penerima'],
			'address'       => $pemesanan['alamat_penerima'] . ", " . $pemesanan['kecamatan_penerima'],
			'city'          => $pemesanan['kota_penerima'],
			'postal_code'   => $pemesanan['kode_pos_penerima'],
			'phone'         => $pemesanan['telp_penerima'],
			'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
			'first_name'    => $pemesanan['nama_pelanggan'],
			'address'       => $pemesanan['alamat_pelanggan'],
			'email'       => $pemesanan['email_pelanggan'],
			'billing_address'  => $billing_address,
			'shipping_address' => $shipping_address,
			'country_code'  => 'IDN'
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O",$time),
			'unit' => 'hour', 
			'duration'  => 24
		);

		$transaction_data = array(
			'transaction_details'=> $transaction_details,
			'item_details'       => $items_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		// echo "<pre>";
		// print_r($snapToken); die;

		echo $snapToken;
	}

	function simpan_pembayaran($id_pembelian, $data)
	{
		$data_pembayaran['id_pembelian'] = $id_pembelian;
		$data_pembayaran['kode_pembayaran'] = $data['order_id'];
		$data_pembayaran['tipe_pembayaran'] = $data['payment_type'];
		$data_pembayaran['tanggal_pembayaran'] = $data['transaction_time'];
		$data_pembayaran['status_pembayaran'] = $data['transaction_status'];
		$data_pembayaran['instruksi_pembayaran'] = $data['pdf_url'];

		$this->db->insert('tb_pembayaran', $data_pembayaran);
	}

	function detail_pembayaran($id_pembelian)
	{
		$this->db->where('id_pembelian', $id_pembelian);
		$ambil = $this->db->get('tb_pembayaran');

		$hasil = $ambil->row_array();

		return $hasil;
	}

	function update_pembelian($id_pembelian, $data_update)
	{
		$this->db->where('id_pembelian', $id_pembelian);
		$this->db->update('tb_pembelian', $data_update);

		// update pembayaran jg
		$this->db->where('id_pembelian', $id_pembelian);
		$this->db->update('tb_pembayaran', array('status_pembayaran'=>'Diterima'));
	}

	function cek_status_checkout($id_pembelian)
	{
		$this->db->where('id_pembelian', $id_pembelian);
		$ambil = $this->db->get('tb_pembayaran');

		$pembayaran = $ambil->row_array();

		$jumlah = $ambil->num_rows();

		if ($jumlah > 0) {

			if ($pembayaran['status_pembayaran']=='pending') {
				return 'belum menyelesaikan pembayaran';
			} else {
				return 'sudah menyelesaikan pembayaran';
			}

		} else {
			return 'belum melakukan pembayaran';
		}
	}

	// testimoni pelanggan
	function tampil_testimoni()
	{
		$this->db->join('tb_pembelian', 'tb_testimoni.id_pembelian = tb_pembelian.id_pembelian', 'left');
		$this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_pembelian.id_pelanggan', 'left');
		$ambil = $this->db->get('tb_testimoni');
		$hasil = $ambil->result_array();

		return $hasil;
	}

	function tampil_testimoni_perpembelian($id_pembelian)
	{
		return $this->db
		->where('t.id_pembelian', $id_pembelian)
		->get('tb_testimoni t')->row_array();
	}

	function tampil_ulasan_perpembelian($id_pembelian)
	{
		return $this->db
		->select("*, pd.id_pembelian AS id_pembelian")
		->join('tb_ulasan u', 'u.id_pembelian = pd.id_pembelian', 'left')
		->join('tb_produk p', 'p.id_produk = pd.id_produk', 'left')
		->where('pd.id_pembelian', $id_pembelian)
		->group_by('pd.id_produk')
		->get('tb_pembelian_detail pd')->result_array();
	}

	function tambah_testimoni($id_pembelian, $inputan)
	{
		// echo "<pre>";
		// print_r($inputan);
		// echo "</pre>";
		// die;
		$inputan['id_pembelian'] = $id_pembelian;
		$this->db->insert('tb_testimoni', $inputan);
	}
	function update_testimoni($id_pembelian, $inputan)
	{
		$this->db->where('id_pembelian', $id_pembelian);
		$this->db->update('tb_testimoni', $inputan);
	}

	function tampil_ulasan_perproduk($id_produk)
	{
		$this->db->join('tb_pembelian', 'tb_pembelian.id_pembelian = tb_ulasan.id_pembelian', 'left');
		$this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_pembelian.id_pelanggan', 'left');
		$this->db->where('tb_ulasan.id_produk', $id_produk);
		$ambil = $this->db->get('tb_ulasan');
		$hasil = $ambil->result_array();

		return $hasil; 
	}

	function ambil_ulasan($inputan)
	{
		$id_pembelian = $inputan['id_pembelian'];
		$id_produk = $inputan['id_produk'];
		
		return $this->db->where('id_pembelian', $id_pembelian)
		->where('id_produk', $id_produk)
		->get('tb_ulasan')->row_array();

	}

	function tambah_ulasan($inputan)
	{
		$this->db->insert('tb_ulasan', $inputan);
	}

	function update_ulasan($inputan)
	{
		$id_pembelian = $inputan['id_pembelian'];
		$id_produk = $inputan['id_produk'];

		$this->db->where('id_pembelian', $id_pembelian);
		$this->db->where('id_produk', $id_produk);
		$this->db->update('tb_ulasan', $inputan);
	}

}

/* End of file M_pelanggan.php */
/* Location: ./application/models/M_pelanggan.php */