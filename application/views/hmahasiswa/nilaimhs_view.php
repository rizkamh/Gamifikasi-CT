<?php $this->load->view('components/head'); ?>
<base href="<?= base_url() ?>">
<?php $this->load->view('components/navbar'); ?>
<li><a href="hmahasiswa/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li><a href="hmahasiswa/soalmhs/level"><i class="icon icon-th-list"></i> <span>Soal</span></a> </li>
<li class="active"><a href="hmahasiswa/nilaimhs"><i class="icon icon-trophy"></i> <span>Nilai</span></a> </li>
<!-- <li><a href="hmahasiswa/diskusimhs"><i class="icon icon-group"></i> <span>Forum Diskusi</span></a> </li> -->

</ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="hmahasiswa/nilaimhs" class="current">Nilai</a> </div>
		<h1><span class="icon-briefcase"></span>
			Nilai Mahasiswa <small> Computational Thinking </small></h1>
	</div>
	<hr>
	<div class="container-fluid">
		<div id="tampilawal">
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
							<h5>Riwayat Nilai</h5>
						</div>
						<div class="widget-content nopadding">
							<input type="hidden" id="prodi" value="<?= $this->session->userdata("ses_prodi") ?>">
							<input type="hidden" id="semester" value="<?= $this->session->userdata("ses_semester") ?>">
							<input type="hidden" id="nim" value="<?= $this->session->userdata("ses_id") ?>">
							<input type="hidden" id="nim" value="<?= $this->session->userdata("ses_nama") ?>">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Tipe Quiz</th>
										<th>Deskripsi</th>
										<th>Tanggal</th>
										<th>Selesai</th>
									</tr>
								</thead>
								<tbody id="tblriwayat">

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span3">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
						</div>
						<div class="widget-content">
							<a href="" class="thumbnail" id="tugas">
								<img src="assets/img/icons/020-philosophy.png" alt="Tugas">
								<div class="caption">
									<h4 align="center">Nilai</h4>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="span9">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
							<h3 style="margin: 0px;">Badge</h3>
						</div>
						<div class="widget-content">
							<div class="row" style="margin: 0px;">
								<?php foreach ($bedge as $key => $value) { ?>
									<div class="span3">
										<img src="<?php echo base_url('assets/img/bedge/' . $value['gambar_bedge']); ?>" style="max-width: 250px;">
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="tampilnilai">
			<div class="row-fluid">
				<div class="span8 offset2">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
							<h5>Nilai <span id="mode"></span></h5>
							<button type="submit" id="kembali" class="btn btn-default pull-right" style="margin:3px 3px;">Kembali</button>
							<form id="form1">
								<input type="hidden" name="tipetugas" id="tipetugas">
							</form>
							<!-- <button type="submit" id="cetak" class="btn btn-info pull-right" style="margin:3px 3px;">Cetak</button> -->
						</div>
						<input type="hidden" id="nama" value="<?= $this->session->userdata("ses_nama") ?>">
						<input type="hidden" id="nim" value="<?= $this->session->userdata("ses_nim") ?>">
						<div class="widget-content nopadding" id="cetakkonten">
							<span class="headcetak"></span>
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th style="width:26%">Tanggal</th>
										<th style="width:15%">Lama Waktu Pengerjaan</th>
										<th style="width:15%">Tipe Quiz</th>
										<th>Deskripsi</th>
										<th style="width:30px;">Nilai</th>
									</tr>
								</thead>
								<tbody id="tbltampilnilai">

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('components/foot'); ?>
<script src="assets/js/app/myfunction.js"></script>
<script src="assets/js/app/hmahasiswa/nilaimhs.js"></script>
<?php $this->load->view('components/jsfoot'); ?>
<script src="assets/js/jspdf.js"></script>
<!-- <script type="text/javascript">
	function demoFromHTML() {
		var pdf = new jsPDF('p', 'pt', 'letter');
		source = $('#cetakkonten')[0];
		specialElementHandlers = {
			'#bypassme': function (element, renderer) {
				return true
			}
		};
		margins = {
			top: 80,
			bottom: 60,
			left: 100,
			width: 1500
		};
		pdf.fromHTML(
			source, // HTML string or DOM elem ref.
			margins.left, // x coord
			margins.top, { // y coord
				'width': margins.width, // max width of content on PDF
				'elementHandlers': specialElementHandlers
			},
			function (dispose) {
				pdf.save('Test.pdf');
			}, margins);
	}
</script> -->
</body>

</html>