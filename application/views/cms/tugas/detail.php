<div class="contaner-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
				  <h3 class="card-title">
				    <?= $title ?>
				  </h3>
				</div>
				<div class="card-body">
					<div class="form-group text-center">
						<h2><b><span class="<?= $data->ikon ?>"></span> <u><?= $data->nama_tugas ?></u> <span class="<?= $data->ikon ?>"></span></b></h2>
					</div>
					<div class="form-group text-center">
						<?= $data->deskripsi_singkat ?>
					</div>
					<div class="form-group">
						<?= $data->deskripsi ?>
					</div>
				</div>
				<div class="card-footer">
					<a href="<?= base_url($this->uri->segment(1).'/'.$this->uri->segment(2)); ?>" class="btn btn-secondary" title="Back To List">Back</a>
				</div>
			</div>
		</div>
	</div>
</div>