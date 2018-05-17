<form id="form" class="form" action="<?php echo base_url('admin/guru/edit') ?>" method="post">
	<div class="modal-header">
		<h4 class="modal-title" id="myLargeModalLabel">Ubah Data</h4>
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	</div>
	<div class="modal-body">
		<input type="text" name="id" value="<?php echo $data['guru_id']; ?>" hidden>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">NIP</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" value="<?php echo $data['guru_nip']; ?>" name="nip" placeholder="masukan nip">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Nama</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="nama" value="<?php echo $data['guru_nama']; ?>" placeholder="masukan nama">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Tanggal Lahir</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="date" value="<?php echo $data['guru_tl']; ?>" name="tl" placeholder="masukan tl">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" value="<?php echo $data['guru_alamat']; ?>" name="alamat" placeholder="masukan alamat">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Mapel</label>
			<div class="col-sm-12 col-md-10">
				<input type="text" id="guru_mapel" value="<?php echo $data['guru_mapel']; ?>" hidden>
				<select name="mapel" class="form-control" value="<?php echo $data['guru_mapel']; ?>">
					<option value="">---Mapel---</option>
					<?php foreach ($tb_mapel->result() as $mapel): ?>
						<option value="<?php echo $mapel->mapel_kode; ?>">
							<?php echo $mapel->mapel_nama; ?>
						</option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Jabatan</label>
			<div class="col-sm-12 col-md-10">
				<input type="text" id="guru_jabatan" value="<?php echo $data['guru_jabatan']; ?>" hidden>
				<select name="jabatan" class="form-control" value="<?php echo $data['guru_jabatan']; ?>">
					<option value="">---Jabatan---</option>
					<?php foreach ($tb_jabatan->result() as $jabatan): ?>
						<option value="<?php echo $jabatan->jabatan_kode; ?>">
							<?php echo $jabatan->jabatan_nama; ?>
						</option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			<button class="btn btn-primary">Simpan</button>
		</form>
		</div>

<script>
	$(document).ready(function () {
		var mapel = document.getElementById('guru_mapel');
		var jabatan = document.getElementById('guru_jabatan')
		mapel = mapel.getAttribute('value');
		$('[name=mapel]').val(mapel).change();
		jabatan = jabatan.getAttribute('value');
		$('[name=jabatan]').val(jabatan).change();
	})
</script>