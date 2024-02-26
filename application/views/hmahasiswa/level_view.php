<?php $this->load->view('components/head'); ?>
<base href="<?= base_url() ?>">
<?php $this->load->view('components/navbar'); ?>
<li><a href="hmahasiswa/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li class="active"><a href="hmahasiswa/soalmhs/level"><i class="icon icon-th-list"></i> <span>Soal</span></a> </li>
<li><a href="hmahasiswa/nilaimhs"><i class="icon icon-trophy"></i> <span>Nilai</span></a> </li>
<!-- <li><a href="hmahasiswa/diskusimhs"><i class="icon icon-group"></i> <span>Forum Diskusi</span></a> </li> -->

</ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="hmahasiswa/soalmhs" class="current">Soal</a> </div>
		<h1><span class="icon-briefcase"></span>
			Level <small> Computional Thinking</small></h1>
	</div>
	<hr>
	<!-- <button id="tes">test</button>
	<button id="tes2">test2</button> -->
	<div class="container-fluid">
		<div class="ini"></div>
		<div class="row-fluid" id="tampilawal">
			<div class="span12" style="margin: 0px;">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
						<h5>Level</h5>
					</div>
					<!-- style="display:none;" -->
					<div class="widget-content">
						<!-- grid -->
						<div class="row" style="margin:0px">
							<?php foreach ($level as $key => $value) { ?>
								<div class="span4">
									<a href="<?php echo site_url('hmahasiswa/soalmhs/index?level=' . $value['idlevel']); ?>">
										<img src="<?php echo base_url() . 'assets/img/' . $value['icon'] ?>" />
										<div style="margin-top:-10px; background-color: white;">
											<center>
												<h5>Level : <?php echo $value['nama_level'] ?></h5>
											</center>
										</div>
										<div style="margin-top:-10px; background-color: white;">
											<center>
												<h5>Total Point : <?php echo $value['minimum_point'] ?></h5>
											</center>
										</div>
									</a>
								</div>
							<?php } ?>
							<!-- <div class="span4">...</div>
              <div class="span8">...</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('components/foot'); ?>
<script src="assets/js/app/myfunction.js"></script>
<?php $this->load->view('components/jsfoot'); ?>
</body>

</html>