<?php  


class M_admin extends CI_model
{
	function login($inputan)
	{
		$username = $inputan['username'];
		$password = $inputan['password'];

		$this->db->where('username_admin', $username);
		$this->db->where('password_admin', $password);
		$ambil = $this->db->get('tb_admin');

		$jumlah_data = $ambil->num_rows();

		if ($jumlah_data > 0) {
			$data_pelogin = $ambil->row_array();

			$this->session->set_userdata('admin', $data_pelogin);

			return 'sukses';
		}
		else
		{
			return 'gagal';
		}
	}

	function tampil_kategori()
	{

 	//jalankan query tampil data / SELECT
		$ambil = $this->db->get("tb_kategori");


 	// hasil ambil dati queri , pecah jadi array multidimensi
		$hasil =  $ambil->result_array();

 	//outputkan $hasil;
		return $hasil;
	}

	function tambah_kategori($inputan)
	{
 		//ambil nama kategori
 		//$nama_kategori = $inputan['nama_kategori'];

 		// jalankan query insert
 		//$this->db->query("INSERT INTO tb_kategori (nama_kategori) VALUES ('$nama_kategori') ");

		$this->db->insert("tb_kategori", $inputan);
	}

	function hapus_kategori($id_kategori)
	{
		$this->db->where("id_kategori", $id_kategori);
		$this->db->delete("tb_kategori");

	}

	function detail_kategori($id_kategori)
	{
		$this->db->where("id_kategori", $id_kategori );
		$ambil = $this->db->get("tb_kategori");
		$hasil = $ambil->row_array();

		return $hasil;
	}

	function ubah_kategori($inputan, $id_kategori)
	{
		$nama_kategori = $inputan['nama_kategori'];

		$this->db->where("id_kategori", $id_kategori );
		$this->db->update("tb_kategori", $inputan);
	}


	function tampil_produk()
	{
 		//$ambil = $this->db->query("SELECT * FROM tb_produk JOIN tb_kategori ON tb_produk.id_kategori = tb_kategori.id_kategori");

 		//$hasil = $ambil->result_array();

 		//return $hasil;

		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_kategori', 'tb_produk.id_kategori = tb_kategori.id_kategori', 'left');
		$ambil = $this->db->get();
		$hasil = $ambil->result_array();

		return $hasil;
	}

	function tambah_produk($inputan)
	{
		//konfigurasi upload
		$config['upload_path']			= './assets/img/produk/';
		$config['allowed_types']		= 'jpg|jpeg|png|gif';

		//panggil library upload
		$this->load->library("upload", $config);

		//adegan upload
		$ngupload = $this->upload->do_upload("foto_produk");

		if ($ngupload) 
		{
			$inputan["foto_produk"] = $this->upload->data("file_name");
		}

 		// jalankan query insert
		$this->db->insert("tb_produk", $inputan);
	}

	function detail_produk($id_produk)
	{

		$this->db->join('tb_kategori', 'tb_produk.id_kategori = tb_kategori.id_kategori', 'left');
		$this->db->where("id_produk", $id_produk);
		$ambil = $this->db->get("tb_produk");

		$hasil = $ambil->row_array();

		return $hasil;
	}

	function ubah_produk($inputan, $id_produk)
	{
		$config['upload_path']		= './assets/img/produk/';
		$config['allowed_types']	= 'jpg|jpeg|png|gif';

		$this->load->library("upload", $config);

		$ngupload = $this->upload->do_upload("foto_produk");

		if ($ngupload) 
		{
			$inputan["foto_produk"] = $this->upload->data("file_name");
		}

		$this->db->where('id_produk', $id_produk);
		$this->db->update('tb_produk', $inputan);
	}

	function hapus_produk($id_produk)
	{
		$this->db->where("id_produk", $id_produk);
		$this->db->delete("tb_produk");
	}


	function tampil_pelanggan()
	{
		$ambil = $this->db->get("tb_pelanggan");

		$hasil = $ambil->result_array();

		return $hasil;
	}

	function detail_pelanggan($id_pelanggan)
	{
		$this->db->where("id_pelanggan", $id_pelanggan);
		$ambil = $this->db->get("tb_pelanggan");

		$hasil = $ambil->result_array();

		return $hasil;
	}

	function hapus_pelanggan($id_pelanggan)
	{
		$this->db->where("id_pelanggan", $id_pelanggan);
		$this->db->delete("tb_pelanggan");
	}

	function tampil_pembelian()
	{
		$this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_pembelian.id_pelanggan');
		$ambil = $this->db->get("tb_pembelian");

		$hasil = $ambil->result_array();

		return $hasil;
	}

	function detail_pembelian($id_pembelian)
	{
		$this->db->select("*, tb_pembelian.id_pembelian AS id_pembelian");
		$this->db->join('tb_pembayaran', "tb_pembayaran.id_pembelian = tb_pembelian.id_pembelian", 'left');
		$this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_pembelian.id_pelanggan');
		$this->db->where('tb_pembelian.id_pembelian', $id_pembelian);

		$ambil = $this->db->get("tb_pembelian");

		$hasil = $ambil->row_array();

		return $hasil;
	}

	function tampil_pembelian_produk($id_pembelian)
	{
		$this->db->where('id_pembelian', $id_pembelian);
		$ambil = $this->db->get("tb_pembelian_detail");

		$hasil = $ambil->result_array();

		return $hasil;
	}

	function tampil_testimoni()
	{
		$this->db->join('tb_pembelian', 'tb_testimoni.id_pembelian = tb_pembelian.id_pembelian');
		$ambil = $this->db->get('tb_testimoni');
		$hasil = $ambil->result_array();

		return $hasil;
	}

	function detail_testimoni($id_testimoni)
	{
		$this->db->join('tb_pembelian', 'tb_pembelian.id_pembelian = tb_testimoni.id_pembelian');
		$this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_pembelian.id_pelanggan');
		$this->db->where('id_testimoni', $id_testimoni);
		$ambil = $this->db->get("tb_testimoni");

		$hasil = $ambil->row_array();

		return $hasil;
	}

	function hapus_testimoni($id_testimoni)
	{
		$this->db->where('id_testimoni', $id_testimoni);
		$this->db->delete('tb_testimoni');
	}

	function tampil_ulasan()
	{
		$this->db->join('tb_pembelian', 'tb_pembelian.id_pembelian = tb_ulasan.id_pembelian');
		$this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_pembelian.id_pelanggan');
		$this->db->join('tb_produk', 'tb_produk.id_produk = tb_ulasan.id_produk');
		$ambil = $this->db->get('tb_ulasan');

		$hasil = $ambil->result_array();

		return $hasil;
	}

	function detail_ulasan($id_ulasan)
	{
		$this->db->join('tb_pembelian', 'tb_pembelian.id_pembelian = tb_ulasan.id_pembelian');
		$this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_pembelian.id_pelanggan');
		$this->db->join('tb_produk', 'tb_produk.id_produk = tb_ulasan.id_produk');
		$this->db->where('id_ulasan', $id_ulasan);
		$ambil = $this->db->get("tb_ulasan");

		$hasil = $ambil->row_array();

		return $hasil;
	}

	function update_resi($id_pembelian, $inputan)
	{
		$this->db->where('id_pembelian', $id_pembelian);
		$this->db->set('status_pembelian', 'Dikirim');
		$this->db->set('resi_pengiriman', $inputan['resi_pengiriman']);
		$this->db->update('tb_pembelian');
	}

 	// module pengaturan
	function simpan_pengaturan($inputan)
	{
		foreach ($inputan as $nama => $isi) {
			$this->db->where('nama_pengaturan', $nama);
			$this->db->set('isi_pengaturan', $isi);
			$this->db->update('tb_pengaturan');
		}
	}

	// module laporan
	function tampil_laporan_penjualan($bulan = 'semua')
	{
		$this->db->join('tb_pelanggan pl', 'pl.id_pelanggan = pm.id_pelanggan', 'left');
		$this->db->where('pm.status_pembelian', 'Dikirim');

		if ($bulan != 'semua') {
			$this->db->where('MONTH(pm.tanggal_pembelian)', $bulan);
		}

		$this->db->order_by('pm.tanggal_pembelian', 'DESC');
		$ambil = $this->db->get('tb_pembelian pm');

		return $ambil->result_array();
	}

		function tampil_laporan_produk($bulan = 'semua')
	{
		$this->db->join('tb_pembelian_detail', 'pm.id_pembelian = tb_pembelian_detail.id_pembelian', 'left');
		$this->db->join('tb_produk', 'tb_pembelian_detail.id_produk = tb_produk.id_produk', 'left');
		$this->db->where('pm.status_pembelian', 'Dikirim');

		if ($bulan != 'semua') {
			$this->db->where('MONTH(pm.tanggal_pembelian)', $bulan);
		}

		$this->db->order_by('pm.tanggal_pembelian', 'DESC');
		$ambil = $this->db->get('tb_pembelian pm');

		return $ambil->result_array();
	}



}