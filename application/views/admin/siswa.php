<div class="min-height-200px">
	<div class="page-header">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="title">
					<h4>Dashboard</h4>
				</div>
				<nav aria-label="breadcrumb" role="navigation">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Data Master</a></li>
						<li class="breadcrumb-item">Siswa</li>
					</ol>
				</nav>
			</div>
			<div class="col-md-6 col-sm-12 text-right">
				<div class="dropdown">
					<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<?php echo date('d M Y') ?>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="#">Export List</a>
						<a class="dropdown-item" href="#">Policies</a>
						<a class="dropdown-item" href="#">View Assets</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="html-editor pd-20 bg-white border-radius-4 box-shadow mb-30">
		<!-- content -->
		<div class="clearfix mb-20">
			<div class="pull-right">
				<button class="btn btn-primary" data-toggle="modal" data-target="#tambahSiswa" style="font-family: arial;"><i class="fa fa-plus">  Tambah</i></button>
			</div>
		</div>
		<div id="contentSiswa" class="card-body" style="padding: 0;">
			<!-- Table siswa -->
		</div>
			<!-- modal tambah -->
			<div class="modal fade" id="tambahSiswa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<form id="formSiswa">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel">Tambah Data</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<div class="modal-body">
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">NIS</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control" type="text" name="nis" placeholder="masukan nis">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Nama</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control" type="text" name="nama" placeholder="masukan nama">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Tanggal Lahir</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control" type="date" name="tl" placeholder="masukan tl">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Jenis Kelamin</label>
									<div class="col-sm-12 col-md-10">
										<select name="jk" class="form-control">
											<option value="L">Laki-laki</option>
											<option value="P">Perempuan</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control" type="text" name="alamat" placeholder="masukan alamat">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Jurusan</label>
									<div class="col-sm-12 col-md-10">
										<select name="jurusan" class="form-control">
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
										<select name="kelas" class="form-control">
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
							<button type="submit" class="btn btn-primary">Simpan</button>
						</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal edit siswa -->
			<div class="modal fade" id="editSiswa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content" id="contentEditSiswa">
						
							<!-- Content Id Siswa -->
						
					</div>
				</div>
			</div>
		<!-- end content -->
</div>