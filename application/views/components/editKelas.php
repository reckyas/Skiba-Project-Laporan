<form id="form" class="form" action="<?php echo base_url('admin/kelas/edit'); ?>">
	<div class="modal-header">
		<h4 class="modal-title" id="myLargeModalLabel">Ubah Data</h4>
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	</div>
	<div class="modal-body">
		<input type="text" name="id" value="<?php echo $jurusan['kelas_id']; ?>" hidden>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Nama Jurusan</label>
			<div class="col-sm-12 col-md-10">
				<input class="form-control" type="text" value="<?php echo $jurusan['kelas_nama']; ?>" name="nama" placeholder="">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-12 col-md-2 col-form-label">Jurusan</label>
			<div class="col-sm-12 col-md-10">
				<input type="text" value="<?php echo $jurusan['kelas_jurusan']; ?>" id="jurusan_kode" hidden>
				<select name="kode_jurusan" id="" value="<?php echo $jurusan['kelas_jurusan']; ?>" class="form-control">
					<option value="">--- Jurusan ---</option>
					<?php foreach($tb_jurusan as $jurusan): ?>
						<option value="<?php echo $jurusan->jurusan_kode; ?>"><?php echo $jurusan->jurusan_nama; ?></option>
					<?php endforeach; ?>
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
			var obj = document.getElementById('jurusan_kode');
			obj = obj.getAttribute('value');
			$('[name=kode_jurusan]').val(obj).change();
		})
	</script>