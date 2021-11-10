<div class="bg-light py-3">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mb-0"><a href="<?php echo base_url('utama') ?>">Beranda</a> 
				<span class="mx-2 mb-0">/</span><strong class="text-blue">Member</strong>
				<span class="mx-2 mb-0">/</span><strong class="text-blue">Beri Testimoni & Ulasan</strong>
			</div>
		</div>
	</div>
</div>  

<div class="site-section">
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h3>Beri Testimoni Toko & Ulasan Produk</h3>
			</div>
			<div class="card-body">
				<?php if ($this->session->flashdata('sukses')): ?>
					<div class="alert alert-success">
						<?php echo $this->session->flashdata('sukses'); ?>
					</div>
				<?php endif ?>
				<?php 
				// echo "<pre>";
				// print_r($testimoni);
				// print_r($ulasan);
				// echo "</pre>";
				?>
				<div class="card">
					<div class="card-header">
						<h4>Testimoni untuk Toko</h4>
					</div>
					<div class="card-body">
						<form action="<?php echo base_url('member/nilai/beri_testimoni/' . $this->uri->segment(4)) ?>" method="POST">
							<div class="form-group row">
								<div class="col-md-2">
									<select name="nilai_testimoni" class="form-control" required>
										<option value="">Pilih Nilai :</option>
										<option value="1" <?= ($testimoni['nilai_testimoni']==1 ? 'selected' : '') ?>>Jelek Banget</option>
										<option value="2"  <?= ($testimoni['nilai_testimoni']==2 ? 'selected' : '') ?>>Jelek</option>
										<option value="3"  <?= ($testimoni['nilai_testimoni']==3 ? 'selected' : '') ?>>Lumayan</option>
										<option value="4"  <?= ($testimoni['nilai_testimoni']==4 ? 'selected' : '') ?>>Bagus</option>
										<option value="5"  <?= ($testimoni['nilai_testimoni']==5 ? 'selected' : '') ?>>Bagus Banget</option>
									</select>
								</div>
								<div class="col-md-7">
									<textarea class="form-control" name="testimoni" required><?php echo $testimoni['testimoni'] ?></textarea>
								</div>
								<div class="col-md-3">
									<button type="submit" class="btn btn-primary">Beri Testimoni</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h4>Ulasan Produk</h4>
					</div>
					<div class="card-body">
						<?php foreach ($ulasan as $key => $value): ?>
							<div class="card card-body">
								<h5>Beri Ulasan tentang <a href="<?php echo base_url('produk/detail/' . $value['id_produk']) ?>"><?php echo $value['nama_produk'] ?></a></h5>
								<hr>
								<form action="<?php echo base_url('member/nilai/beri_ulasan') ?>" method="POST">
									<input type="hidden" name="id_produk" value="<?php echo $value['id_produk'] ?>">
									<input type="hidden" name="id_pembelian" value="<?php echo $value['id_pembelian'] ?>">
									<div class="form-group row">
										<div class="col-md-2">
											<select name="nilai_ulasan" class="form-control" required>
												<option value="">Pilih Nilai :</option>
												<option value="1" <?= ($value['nilai_ulasan']==1 ? 'selected' : '') ?>>Jelek Banget</option>
												<option value="2" <?= ($value['nilai_ulasan']==2 ? 'selected' : '') ?>>Jelek</option>
												<option value="3" <?= ($value['nilai_ulasan']==3 ? 'selected' : '') ?>>Lumayan</option>
												<option value="4" <?= ($value['nilai_ulasan']==4 ? 'selected' : '') ?>>Bagus</option>
												<option value="5" <?= ($value['nilai_ulasan']==5 ? 'selected' : '') ?>>Bagus Banget</option>
											</select>
										</div>
										<div class="col-md-7">
											<textarea class="form-control" name="ulasan" required><?php echo $value['ulasan'] ?></textarea>
										</div>
										<div class="col-md-3">
											<button type="submit" class="btn btn-primary">Beri Ulasan</button>
										</div>
									</div>
								</form>
							</div>
						<?php endforeach ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
