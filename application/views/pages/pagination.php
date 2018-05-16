<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Form</li>
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
					<table class="table">
						<thead>
							<th>NIM</th>
							<th>Nama</th>
							<th>Prodi</th>
						</thead>
						<tbody>
							<?php foreach ($mahasiswa as $mhs): ?>
								<tr>
									<td><?php echo $mhs->nim; ?></td>
									<td><?php echo $mhs->nama; ?></td>
									<td><?php echo $mhs->prodi; ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
					<?php echo $this->pagination->create_links(); ?>
				</div>
			</div>