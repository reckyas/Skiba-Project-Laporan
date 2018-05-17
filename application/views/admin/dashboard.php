<div class="min-height-200px">
	<div class="page-header">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="title">
					<h4>Dashboard</h4>
				</div>
				<nav aria-label="breadcrumb" role="navigation">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
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
		Selamat Datang <strong><?php echo $this->session->userdata('ses_nama'); ?></strong>
</div>