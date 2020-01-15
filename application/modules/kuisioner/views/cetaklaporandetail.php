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
<b> <?= $title; ?></b>
<b class="box-title">Guru : <?= $namagurutujuan;?>, Tahun : <?= $tahunpenilaian ?>, Bulan : <?= getbulanindo($bulanpenilaian) ?></b>
<table><tr><td valign="top">
<img src="<?= base_url('assets/images/profile/'.$imagegurutujuan) ?>"height="150px">
</td><td>
<table id="tablestd">
              <tr>
                <td scope="col">#</td>
                <td scope="col">Kategori</td>
                <td scope="col">DiriSendiri</td>
                <?php foreach ($list_role as $dtr) : ?>
                  <td scope="col">
                  <?= $dtr['role'] ?></td>
                  <?php endforeach; ?>
                <td scope="col">Penilaian</td>
              </tr>
              <?php $i = 1; ?>
              <?php foreach ($listkategori as $dt) : ?>
                <tr>
                  <td scope="row"><?= $i; ?></td>
                  <td><?= $dt['kategori']; ?></td>
                  <?php                 
                  $jumlahjawabanrolesendiri=get_jumlahnilaiguru_rolesendiri($dt['user_tujuan'],$dt['kategori_id'],$tahunpenilaian,$bulanpenilaian);
                  $jumlahsoalrolesendiri=get_jumlahsoalguru_rolesendiri($dt['user_tujuan'],$dt['kategori_id'],$tahunpenilaian,$bulanpenilaian);
                  $jumlahmaksnilairolesendiri=$jumlahsoalrolesendiri*4;
                  $penilaianrolesendiri = round(($jumlahjawabanrolesendiri/$jumlahmaksnilairolesendiri)*100);
                  ?>
                  <td scope="col"><?= $penilaianrolesendiri ?></td>
                  <?php foreach ($list_role as $dtr) : ?>
                    <?php                 
                  $jumlahjawabanrole=get_jumlahnilaiguru_role($dt['user_tujuan'],$dt['kategori_id'],$dtr['id'],$tahunpenilaian,$bulanpenilaian);
                  $jumlahsoalrole=get_jumlahsoalguru_role($dt['user_tujuan'],$dt['kategori_id'],$dtr['id'],$tahunpenilaian,$bulanpenilaian);
                  $jumlahmaksnilairole=$jumlahsoalrole*4;
                  $penilaianrole = round(($jumlahjawabanrole/$jumlahmaksnilairole)*100);
                  ?>
                  <td scope="col"><?= $penilaianrole ?></td>
                  <?php endforeach; ?>
                  <td>
                  <?php 
                   $jumlahjawaban=get_jumlahnilaiguru_det($dt['user_tujuan'],$dt['kategori_id'],$tahunpenilaian,$bulanpenilaian);
                   $jumlahsoal=get_jumlahsoalguru_det($dt['user_tujuan'],$dt['kategori_id'],$tahunpenilaian,$bulanpenilaian);
                   $jumlahmaksnilai=$jumlahsoal*4;
                   $penilaian = round(($jumlahjawaban/$jumlahmaksnilai)*100);
                   $total +=$penilaian;
                  ?>
                  <?= ($penilaian) ?>
                  </td>
                  </tr>
                  <?php $rata= round($total/$i); ?>
                  <?php $i++; ?>
              <?php endforeach; ?>
              <tr>
              <?php foreach ($list_role as $dtr) : ?>
                  <td scope="col"></td>
                  <?php endforeach; ?>  
              <td colspan="3"align="right"><b>Rata</b></td><td><b><?= $rata; ?></b></td></tr>
    </table>