$(document).ready(function(){

	$.ajax({
		method: "GET",
		url: BASE_URL + "api/provinsi",
		success: function(hasil)
		{
			// console.log(hasil)
			$("#pilih_provinsi").html(hasil);
		}
	})

	$("#pilih_provinsi").on('change', function(){
		var id_provinsi = $(this).val();
		var nama_provinsi = $("option:selected", this).data('nama');

		$("input[name=nama_provinsi]").val(nama_provinsi);

		// console.log(id_provinsi)
		// console.log(nama_provinsi)

		$.ajax({
			method: "GET",
			url: BASE_URL + "api/kota/" + id_provinsi,
			success: function(hasil)
			{
				// console.log(hasil)
				 $("#pilih_kota").html(hasil);
			}
		})
	});

	// ketika select #pilih_kota diubah
	$("#pilih_kota").on('change', function(){

		var id_kota_tujuan = $(this).val();
		var nama_kota = $("option:selected", this).data('nama');
		var kodepos = $("option:selected", this).data('kodepos');
		var tipe_kota = $("option:selected", this).data('tipe');

		$("input[name=nama_kota]").val(nama_kota);
		$("input[name=tipe_kota]").val(tipe_kota);
		$("input[name=kodepos_penerima]").val(kodepos);

		if (id_kota_tujuan !== "") {
			$("#pilih_ekspedisi").prop("disabled", false);
		} else {
			$("#pilih_ekspedisi").prop("disabled", true);
			$("#pilih_ekspedisi").val("");

		}

	});

	$("#pilih_ekspedisi").on('change', function(){

		var	ekspedisi = $("option:selected", this).val();
		var id_kota_tujuan = $("#pilih_kota").val();
		var total_berat = $("input[name=total_berat]").val();

		$.ajax({
			method: "GET",
			url: BASE_URL + "api/ongkir?tujuan=" + id_kota_tujuan + 
			"&berat=" + total_berat + 
			"&ekspedisi=" + ekspedisi,
			success: function(hasil)
			{
				$("#pilih_paket").html(hasil);
			}
		});
	});

	$("#pilih_paket").on('change', function(){

		var nama_paket = $(this).val();
		var ongkir = $("option:selected", this).data('ongkir');
		var nama_ekspedisi = $("option:selected", this).data('nama');
		var estimasi = $("option:selected", this).data('estimasi');

		$("input[name=nama_ekspedisi]").val(nama_ekspedisi);
		$("input[name=estimasi_pengiriman]").val(estimasi);

		var total_belanja = $("input[name=total_belanja]").val()

		$("input[name=nama_paket]").val(nama_paket);
		$("input[name=total_ongkir]").val(ongkir);

		ongkir_terformat = parseFloat(ongkir).toLocaleString("id-ID");
		$("#total_ongkir").html("Rp " + ongkir_terformat);

		var total_bayar = parseInt(total_belanja) + parseInt(ongkir);
		$("input[name=total_pembelian]").val(total_bayar);

		total_bayar = parseFloat(total_bayar).toLocaleString("id-ID");

		$("#total_bayar").html("Rp " + total_bayar);

	});

});