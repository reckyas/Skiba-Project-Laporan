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
						<li class="breadcrumb-item">Jabatan</li>
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
		<div class="clearfix mb-20">
			<div class="pull-right">
				<button class="btn btn-primary" data-toggle="modal" data-target="#tambahJabatan" style="font-family: arial;"><i class="fa fa-plus">  Tambah</i></button>
			</div>
		</div>
		<div id="contentJabatan" class="card-body" style="padding: 0;">

			<!-- Table siswa -->

		</div>
		<!-- modal tambah -->
			<div class="modal fade" id="tambahJabatan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<form id="form" class="form" action="<?php echo base_url('admin/jabatan/tambah'); ?>" method="post">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel">Tambah Data</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<div class="modal-body">
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Nama Jabatan</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" type="text" name="nama" placeholder="masukan nama jabatan">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-primary simpan">Simpan</button>
						</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal edit guru -->
			<div class="modal fade" id="editJabatan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content" id="contentEditJabatan">
						
							<!-- Content Id guru -->
						
					</div>
				</div>
			</div>
		<!-- end content -->
</div>