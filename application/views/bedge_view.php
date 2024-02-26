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
      <a href="<?php echo site_url('bedge/add'); ?>" type="submit" class="btn btn-info pull-right" style="margin:3px 3px;" id="tampilesai">
        <span class="icon-plus"></span> Tambah Badge</a>
      <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
        <h5>Computational Thinking <span id="judul"></span></h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered table-striped ">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Gambar</th>
              <th>Jumlah Point</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($bedge as $key => $value) { ?>
              <tr>
                <td><?php echo $value['nama_bedge']; ?></td>
                <td><img src="<?php echo base_url('assets/img/bedge'); ?>/<?php echo $value['gambar_bedge']; ?>" style="width: 250px;"></td>
                <td><?php echo $value['nilai_bedge']; ?></td>
                <td><a href="<?php echo site_url('bedge/delete') ?>/<?php echo $value['idbedge']; ?>" class="btn btn-danger">Delete</a> <a href="<?php echo site_url('bedge/edit') ?>/<?php echo $value['idbedge']; ?>" class="btn btn-info">Edit</a></td>
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