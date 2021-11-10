	<option value="">Pilih Paket</option>
	<?php foreach ($ongkir as $key => $value): ?>
		<option value="<?php echo $value['service'] ?>" 
			data-nama="<?php echo $nama_ekspedisi ?>"
			data-estimasi="<?php echo $value['cost'][0]['etd'] ?>"
			data-ongkir="<?php echo $value['cost'][0]['value'] ?>"
			><?php echo $value['service'] . "- Rp" . rupiah2($value['cost'][0]['value']) . " | Estimasi " . $value['cost'][0]['etd'] . " hari"?></option>
		<?php endforeach ?>