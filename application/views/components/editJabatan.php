 <form id="form" action="<?php echo base_url('admin/jabatan/edit'); ?>" class="form">
	<div class="modal-header">
		<h4 class="modal-title" id="myLargeModalLabel">Ubah Data</h4>
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	</div>
	<div class="modal-body">
		<input type="text" name="id" value="<?php echo $jabatan['jabatan_id']; ?>" hidden>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Nama Jabatan</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" value="<?php echo $jabatan['jabatan_nama']; ?>" name="nama" placeholder="">
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
		<button class="btn btn-primary">Simpan</button>
	</form>
	</div>