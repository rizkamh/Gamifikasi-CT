</head>
<body>

	<!--Header-part-->
	<div id="header">
		<h1><a href="home">POLINEMA</a></h1>
	</div>
	<!--close-Header-part-->
	<!--top-Header-menu-->
	<div id="user-nav" class="navbar navbar-inverse">
		<ul class="nav">
			<li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown"
					data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i> <span
						class="text">Welcome <?= $this->session->userdata("ses_nama"); ?> </span><b
						class="caret"></b></a>
				<ul class="dropdown-menu">
				<?php if ($this->session->userdata("islogin")=='masuk' || $this->session->userdata("islogin")=='masukdsn') { ?>
					<li><a href="profil"><i class="icon-user"></i> Profil Pengguna</a></li>
					<li><a href="profil/gantipass"><i class="icon-lock"></i> Ganti Password</a></li>
				<?php } else if ($this->session->userdata("islogin") == 'masukmhs'){?>
					<li><a href="hmahasiswa/profil"><i class="icon-user"></i> Profil Pengguna</a></li>
					<li><a href="hmahasiswa/profil/gantipass"><i class="icon-lock"></i> Ganti Password</a></li>
				<?php } ?>
				</ul>
			</li>
			<?php if ($this->session->userdata("islogin")=='masuk') { ?>
				<li><a title="" href="logout"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a>
			<?php }else if ($this->session->userdata("islogin")=='masukmhs') { ?>
			
				<li><a title=""><i class="icon icon-book"></i> Matakuliah <span class="text" id="mknav"> Computational Thinking</span></a>
				<li><a title="" href="<?= site_url("logout")?>"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a>
			<?php }else if ($this->session->userdata("islogin")=='masukdsn') { ?>
				<li><a title=""><i class="icon icon-book"></i> Matakuliah <span class="text" id="mknav">Computational Thinking</span></a>
				<li><a title="" href="<?= site_url("logout")?>"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a>
			<?php } ?>
			</li>
		</ul>
	</div>
	<!--close-top-Header-menu-->
	<!--sidebar-menu-->
	<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
		<ul>
			<li>
				<div class="bingkai">
					<div class="pasfoto">
						<img src="<?= base_url("assets/img/fotomahasiswa/".$this->session->userdata("ses_id").".jpeg")?>" alt="">
					</div>
					<div class="namapasfoto" >
						<p><?= $this->session->userdata("ses_nama"); ?></p>
					</div>
				</div>
			</li>