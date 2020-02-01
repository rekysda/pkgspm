<style>
	body {
		font-size: 12px;
		color: black;
	}

	table#tablestd {
		border-width: 1px;
		border-style: solid;
		border-color: #D8D8D8;
		border-collapse: collapse;
		margin: 10px 0px;
		font-size: 12px;
	}

	table#tablestd td {
		padding: 0.5em;
		color: #000;
		vertical-align: top;
		border-width: 0px;
		padding: 4px;
		border: 1px solid #000;

	}

	table#tablemodul1 {
		border-width: 1px;
		border-style: solid;
		border-color: #000;
		border-collapse: collapse;
		margin: 10px 0px;
	}

	table#tablemodul1 td {
		padding: 1px 6px 2px 6px;
		border: 1px solid #000;

	}

	table#tablemodul1 th {
		padding: 1px 6px 2px 6px;
		border: 1px solid #000;

	}

	h1 {
		font-size: 24px;
	}
</style>

<h2 align="center"><?= $site_description; ?></h2>
<h4> <?= $title; ?>, Tahun : <?= $tahunpenilaian ?>, Bulan : <?= getbulanindo($bulanpenilaian) ?></h4>
<table id="tablestd">
              <tr>
                <td >#</td>
				<td >Nama Guru</td>
				<td >DiriSendiri</td>
				<?php foreach ($list_role as $dtr) : ?>
					<td>
						<?= $dtr['role'] ?></td>
						<?php endforeach; ?>
			<td >Penilaian</td>
              </tr>
              <?php $i = 1; ?>
			  <?php foreach ($listuser as $dt) : ?>
				<?php 
				$jumlahjawaban=get_jumlahnilaiguru($dt['id'],$tahunpenilaian,$bulanpenilaian); 
				if($jumlahjawaban){
				?>
                <tr>
                  <td><?= $i; ?></td>
				  <td><?= $dt['name']; ?></td>
				  <?php                 
                  $jumlahjawabanrolesendiri=get_jumlahnilaiguru_rolesendiri2($dt['id'],$tahunpenilaian,$bulanpenilaian);
                  $jumlahsoalrolesendiri=get_jumlahsoalguru_rolesendiri2($dt['id'],$tahunpenilaian,$bulanpenilaian);
                  $jumlahmaksnilairolesendiri=$jumlahsoalrolesendiri*4;
                  $penilaianrolesendiri = round(($jumlahjawabanrolesendiri/$jumlahmaksnilairolesendiri)*100);
                  ?>
                  <td><?= $penilaianrolesendiri ?></td>
				  <?php foreach ($list_role as $dtr) : ?>
                    <?php                 
                  $jumlahjawabanrole=get_jumlahnilaiguru_role2($dt['id'],$dtr['id'],$tahunpenilaian,$bulanpenilaian);
                  $jumlahsoalrole=get_jumlahsoalguru_role2($dt['id'],$dtr['id'],$tahunpenilaian,$bulanpenilaian);
                  $jumlahmaksnilairole=$jumlahsoalrole*4;
                  $penilaianrole = round(($jumlahjawabanrole/$jumlahmaksnilairole)*100);
                  ?>
                  <td><?= $penilaianrole ?></td>
                  <?php endforeach; ?>
                  <td>
                  <?php 
                  $jumlahjawaban=get_jumlahnilaiguru($dt['id'],$tahunpenilaian,$bulanpenilaian);
                  $jumlahsoal=get_jumlahsoalguru($dt['id'],$tahunpenilaian,$bulanpenilaian);
                  $jumlahmaksnilai=$jumlahsoal*4;
                  $penilaian = round(($jumlahjawaban/$jumlahmaksnilai)*100);
                  ?>
                  <?= ($penilaian) ?>
                  </td>
				</tr>
                <?php $i++; ?>
				<?php } ?>
              <?php endforeach; ?>
          </table>