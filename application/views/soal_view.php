<?php $this->load->view('components/head'); ?>
<?php $this->load->view('components/navbar'); ?>
<!--sidebar-menu-->

		<li><a href="home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
		<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Manage Mahasiswa</span> <span
					class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
			<ul>
				<li><a href="mahasiswa">Data Mahasiswa</a></li>
				<li><a href="nilai">Nilai</a></li>
			</ul>
		</li>
<li class="submenu"> <a href="#"><i class="icon icon-print"></i> <span>Laporan</span> <span
			class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
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
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
				href="materi" class="current">Materi</a> </div>
		<h1><span class="icon-briefcase"></span>
			Manajemen <small>Soal Pembelajaran</small></h1>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="row-fluid">
			<table class="table table-bordered table-striped ">
				<thead>
					<tr>
						<th>No</th>
						<th>Soal</th>
						<th>Level</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($soal as $key => $value) { ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value['soal']; ?></td>
							<td><?php echo $value['nama_level']; ?></td>
							<td><a href="<?php if($value['jenis'] == 'pilgan') { echo site_url('soalpilgan/'.$value['nama_level']); } else { echo site_url('soalesai/'.$value['id']); } ?>" class="btn btn-info" >Views</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>

<?php $this->load->view('components/foot'); ?>


<?php $this->load->view('components/jsfoot'); ?>
</body>

</html>