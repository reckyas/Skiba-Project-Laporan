<form id="form" class="form" action="<?php echo base_url('admin/siswa/edit') ?>">
	<div class="modal-header">
		<h4 class="modal-title" id="myLargeModalLabel">Ubah Data</h4>
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	</div>
	<div class="modal-body">
		<input type="text" name="id" value="<?php echo $data['siswa_id']; ?>" hidden>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">NIS</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" value="<?php echo $data['siswa_nis']; ?>" name="nis" placeholder="masukan nis">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Nama</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" name="nama" value="<?php echo $data['siswa_nama']; ?>" placeholder="masukan nama">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Tanggal Lahir</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="date" value="<?php echo $data['siswa_tl']; ?>" name="tl" placeholder="masukan tl">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Jenis Kelamin</label>
			<div class="col-sm-12 col-md-10">
				<input type="text" id="siswa_jk" value="<?php echo $data['siswa_jk']; ?>" hidden>
				<select name="jk" value="<?php echo $data['siswa_jk']; ?>" class="form-control">
					<option value="">---Gender---</option>
					<option value="L">Laki-laki</option>
					<option value="P">Perempuan</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" value="<?php echo $data['siswa_alamat']; ?>" name="alamat" placeholder="masukan alamat">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Jurusan</label>
			<div class="col-sm-12 col-md-10">
				<input type="text" id="siswa_jurusan" value="<?php echo $data['siswa_jurusan']; ?>" hidden>
				<select name="jurusan" class="form-control" value="<?php echo $data['siswa_jurusan']; ?>">
					<option value="">---Jurusan---</option>
					<?php foreach ($tb_jurusan->result() as $jurusan): ?>
						<option value="<?php echo $jurusan->jurusan_kode; ?>">
							<?php echo $jurusan->jurusan_nama; ?>
						</option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Kelas</label>
			<div class="col-sm-12 col-md-10">
				<input type="text" id="kelas" value="<?php echo $data['siswa_kelas'] ?>" hidden>
				<select name="kelas" class="form-control" value="<?php echo $data['siswa_kelas']; ?>" >
					<option value="">---Kelas---</option>
					<?php foreach ($tb_kelas->result() as $kelas): ?>
						<option value="<?php echo $kelas->kelas_kode; ?>">
							<?php echo $kelas->kelas_nama; ?>
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
		var jurusan = document.getElementById('siswa_jurusan');
		var kelas = document.getElementById('kelas');
		var jk = document.getElementById('siswa_jk');
		jurusan = jurusan.getAttribute('value');
		$('[name=jurusan]').val(jurusan).change();
		kelas = kelas.getAttribute('value');
		$('[name=kelas]').val(kelas).change();
		jk = jk.getAttribute('value');
		$('[name=jk]').val(jk).change();
	})
</script>