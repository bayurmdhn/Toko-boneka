	<option value="">Pilih Kota</option>
	<?php foreach ($kota as $key => $value): ?>
		<option value="<?php echo $value['city_id'] ?>" data-tipe="<?php echo $value['type'] ?>" data-nama="<?php echo $value['city_name'] ?>" data-kodepos="<?php echo $value['postal_code'] ?>"><?php echo $value['city_name'] ?></option>
		<?php endforeach ?>