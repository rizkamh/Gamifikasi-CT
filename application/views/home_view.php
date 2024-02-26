<?php $this->load->view('components/head'); ?>
<base href="<?= base_url() ?>">
<?php $this->load->view('components/navbar'); ?>

<li class="active"><a href="home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Manage Mahasiswa</span> <span class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
	<ul>
		<li><a href="mahasiswa">Data Mahasiswa</a></li>
		<li><a href="nilai">Nilai</a></li>
	</ul>
</li>
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

<!--main-container-part-->
<div id="content">
	<div class="ini"></div>
	<!--breadcrumbs-->
	<div id="content-header">
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
				Home</a></div>
	</div>
	<!--End-breadcrumbs-->
	<!--Action boxes-->
	<div class="container-fluid">
		<div class="row-fluid span12">
			<div class="quick-actions_homepage">
				<ul class="quick-actions">
					<li class="bg_lo"> <a href="subbuatsoal"> <i class="icon-book"></i>Buat Soal </a> </li>
					<li class="bg_lb"> <a href="soalterkirim"> <i class="icon-book"></i>Data Soal </a> </li>
					<li class="bg_dg"> <a href="laporan/nilailaporan"> <i class="icon-trophy"></i> Penilaian </a> </li>
					<li class="bg_dg"> <a href="bedge"> <i class="icon-trophy"></i> Badge </a> </li>
					<li class="bg_dg"> <a href="leaderboard"> <i class="icon-trophy"></i> Leader Board </a> </li>
				</ul>
			</div>
			<!--End-Action boxes-->
		</div>
	</div>
	<hr>
	<!-- <div class="container-fluid">
		<div class="row-fluid">
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-bullhorn"></i> </span>
					<h5>Pengumuman</h5>
				</div>
				<div class="widget-content" >
				</div>
			</div>
		</div>
		<form name="form1" id="form1">
			<div class="control-group">
				<div class="controls">
					<textarea class="span12" rows="4" name="isi" id="isi" placeholder="Ketikan soal..."></textarea>
					<span name="isi"></span>
				</div>
			</div>
			<input type="hidden" name="isihide" id="isihide">
			<input class="btn btn-danger pull-right" style=" margin-left:5px;" type="reset" value="Batal" /> -->
	<!-- <input class="btn btn-success pull-right" type="submit" value="Kirim" id="kirim" /> -->
	<!-- </form> -->
	<!-- <div class="container-fluid"> -->
	<!-- <div class="row-fluid"> -->
	<!-- </div>  -->
</div>

<!--end-main-container-part-->

<?php $this->load->view('components/foot'); ?>
<script src="assets/js/app/home.js"></script>

<?php $this->load->view('components/jsfoot'); ?>
<script src="assets/ckeditor/ckeditor.js"></script>
<script src="assets/ckfinder/ckfinder.js"></script>
<script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	CKEDITOR.replace('isi');
	CKFinder.setupCKEditor();
</script>
</body>

</html>