<div class="bg-light py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<h3>Daftar Testimoni Pelanggan</h3>
						<p>Lorem, ipsum dolor sit amet, consectetur adipisicing elit. Sequi, beatae.</p>
					</div>
					<div class="card-body">
						<?php foreach ($testimoni as $key => $value): ?>
							<div class="card mb-3">
								<div class="card-body">
									<div class="d-flex testimoni">
										<img class="img-fluid mr-4 testimoni-img" src="<?php echo base_url('assets/img/pelanggan/' . $value['foto_pelanggan']) ?>" alt="foto pelanggan">
										<div class="testimoni-content" >
											<h3 class="testimoni-author"><?php echo $value['nama_pelanggan'] ?></h3>
											<p class="testimoni-text"><?php echo $value['testimoni'] ?></p>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<style>
	.testimoni-img {
		width:100px!important;
		height:100px!important;
		/*border-radius: 50%;*/
		object-fit: cover;
	}

</style>