<?php
$this->load->view("laporan/head", array("title" => $title));
?>
<base href="<?= base_url(); ?>">
<div id="lap" style="width:210px; height:297px; margin-left:50px;">
	<table class='head' style="width:800px; margin-right:150px;">
		<tr>
			<td rowspan="4" style="width:50px;"><img style="  margin-bottom:40px; width:120px; height:120px;" src="assets/img/icon.png" alt=""></td>
		</tr>
		<tr>
			<td style="color:#cfba46;  text-align: center;">
				<h2>POLITEKNIK NEGERI MALANG</h2>
			</td>
		</tr>
		<tr>
			<td style="text-align:center;">Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141</td>
		</tr>
		<tr>
			<td>.</td>
		</tr>
	</table>
	<h1 style="width:800px; margin-left:50px;"><?= $title ?> </h1>

	<table border="1" style="width:800px; margin-right:150px;">
		<thead>
			<tr>
				<th width="90px;">NIM</th>
				<th>Nama</th>
				<th>Nilai</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($nilai as  $item) :
				echo "<tr>
                        <td style='text-align:center;'>{$item->nim}</td>
                        <td>{$item->namamhs}</td>
                        <td>{$item->nilai}</td>";
				echo "</tr>";
			endforeach;
			?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		window.print();
	})
</script>
<?php
$this->load->view("laporan/foot");
?>