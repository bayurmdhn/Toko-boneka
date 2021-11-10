	<option value="">Pilih Provinsi</option>
	<?php foreach ($provinsi as $key => $value): ?>
		<option value="<?php echo $value['province_id'] ?>" data-nama="<?php echo $value['province'] ?>"><?php echo $value['province'] ?></option>
		<?php endforeach ?>