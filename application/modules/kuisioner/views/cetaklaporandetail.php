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
<b class="box-title">Guru : <?= $namagurutujuan;?></b>
<table id="tablestd">
              <tr>
                <td >#</td>
                <td >Kategori</td>
                <td >Penilaian</td>
              </tr>
              <?php $i = 1; ?>
              <?php foreach ($listkategori as $dt) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $dt['kategori']; ?></td>
                  <td>
                  <?php 
                   $jumlahjawaban=get_jumlahnilaiguru_det($dt['user_tujuan'],$dt['kategori_id']);
                   $jumlahsoal=get_jumlahsoalguru_det($dt['user_tujuan'],$dt['kategori_id']);
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
              <tr><td colspan="2"align="right"><b>Rata</b></td><td><b><?= $rata; ?></b></td></tr>
    </table>