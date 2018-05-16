<form id="formEditSiswa">
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
				<select name="jurusan" class="form-control" value="<?php echo $data['siswa_jurusan']; ?>">
					<?php foreach ($tb_jurusan->result() as $jurusan): ?>
						<option value="">---Jurusan---</option>
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
				<select name="kelas" class="form-control" value="<?php echo $data['siswa_kelas']; ?>">
					<?php foreach ($tb_kelas->result() as $kelas): ?>
						<option value="">---Kelas---</option>
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
	var jk = $('[name=jk]').val();
	$('[name=jk]').val(jk).change();
	var jurusan = $('[name=jurusan]').val();
	$('[name=jurusan]').val(jurusan).change();
	var kelas = $('[name=kelas]').val();
	$('[name=kelas]').val(kelas).change();

	$('#formEditSiswa').submit(function (e) {
	e.preventDefault();
	$.ajax({
		url: baseUrl+"skiba/admin/siswa/edit",
		type: "post",
		data: $(this).serialize(),
		dataType: "json",
		beforeSend: function () {
			/* body... */
		},
		success: function (response) {
			swal("Success!", response.pesan, "success");
			// window.location.href=baseUrl+"skiba/admin/siswa";
		} ,
		error:function(response){
     		swal("Oops...", "Something went wrong :(", "error");
      	}
	})
})
</script>