<?php $this->load->view('components/head'); ?>
<base href="<?= base_url(); ?>">

<link rel="stylesheet" href="assets/css/bootstrap-wysihtml5.css" />
<?php $this->load->view('components/navbar'); ?>
<!--sidebar-menu-->
<li><a href="home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Manage Mahasiswa</span> <span class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
	<ul>
		<li><a href="mahasiswa">Data Mahasiswa</a></li>
		<li><a href="nilai">Nilai</a></li>
	</ul>
</li>
<li class="submenu"> <a href="#"><i class="icon icon-print"></i> <span>Laporan</span> <span class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
	<ul>
		<li><a href="laporan/mahasiswalaporan">Laporan Mahasiswa</a></li>
		<li><a href="laporan/nilailaporan">Laporan Nilai</a></li>
	</ul>
</li>


</ul>
</div>
<!--sidebar-menu-->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
				Home</a> <a href="bedge" class="current">Badge</a> </div>
		<h1><span class="icon-briefcase"></span>
			Badge<small> Computational Thinking </small></h1>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
				<h5>Badge <span id="judul"></span></h5>
			</div>
			<div class="widget-content nopadding">
				<div class="modal-header">
					<h3>Form <span id="mode"></span> Badge</h3>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" enctype="multipart/form-data" id="form2" action="<?php echo site_url('bedge/save/'); ?>" method="post">
						<div class="control-group">
							<label class="control-label" for="nama">Nama</label>
							<div class="controls">
								<input type="text" id="nama" name="nama" value="">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="gambar">Gambar Bedge</label>
							<div class="controls">
								<input type="file" id="gambar" name="gambar">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="nilai">Nilai Bedge</label>
							<div class="controls">
								<input type="number" id="nilai" name="nilai" value="">
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button type="submit" class="btn btn-danger">Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>