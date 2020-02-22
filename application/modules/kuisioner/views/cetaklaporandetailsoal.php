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
<hr>
<h4>PENILAIAN KINERJA GURU SMAK BHAKTI SAMUDERA<br>
Bulan : <?= getbulanindo($bulanpenilaian) ?><br>
Tahun : <?= $tahunpenilaian ?></h4>
<table><tr><td valign="top">
<table>
<tr><td>
<b class="box-title">
</b></td>
<td width='50px'>
</td>
<td>
<b>
Guru : <?= $namagurutujuan;?><br>
Mata Pelajaran : <?= $mapelgurutujuan?><br>
Masa Kerja : <?= $masakerjagurutujuan?><br>
Tahun : <?= $tahunpenilaian ?><br>
Bulan : <?= getbulanindo($bulanpenilaian) ?><br>
</b>
</td></tr>
</table>
</td>
</tr><tr>
<td>
<table id="tablestd">
              <tr>
                <td>#</td>
                <td>Pertanyaan</td>
                <td>Nilai</td>
              </tr>
              <?php foreach ($listkategori as $dtk) : ?>
              <?php $i = 1; ?>
              <?php 
                   $jumlahjawaban=get_jumlahnilaiguru_det($user_tujuan,$dtk['id'],$tahunpenilaian,$bulanpenilaian);
                   $jumlahsoal=get_jumlahsoalguru_det($user_tujuan,$dtk['id'],$tahunpenilaian,$bulanpenilaian);
                   $jumlahmaksnilai=$jumlahsoal*4;
                   $penilaian = round(($jumlahjawaban/$jumlahmaksnilai)*100);
                  ?>
              <tr>
                  <td colspan='2'><b><?= $dtk['kategori'] ?></b></td>
                  <td><b>(<?= $penilaian; ?>)</b>
                  </td>
                </tr>
              <?php foreach ($listquestion as $dt) : ?>
                <?php if($dtk['id']==$dt['kategori_id']){ ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $dt['soal']; ?></td>
                  <td>
                  <?php
                  $soal_id=$dt['id'];
                  ?>
                  <?php
                  $jumlahnilai = get_jumlahnilai_usertujuan($soal_id,$user_tujuan,$tahunpenilaian,$bulanpenilaian);
                  $jumlahcount =get_jumlahnilaicount_usertujuan($soal_id,$user_tujuan,$tahunpenilaian,$bulanpenilaian);
                  $nilairata = ($jumlahnilai*25)/$jumlahcount;
                  ?>
                  <?= $nilairata ?>
                  </td>
                </tr>
                <?php } ?>
                <?php $i++; ?>
              <?php endforeach; ?>
              <?php endforeach; ?>
              <?php 
                  $jumlahjawaban=get_jumlahnilaiguru($user_tujuan,$tahunpenilaian,$bulanpenilaian);
                  $jumlahsoal=get_jumlahsoalguru($user_tujuan,$tahunpenilaian,$bulanpenilaian);
                  $jumlahmaksnilai=$jumlahsoal*4;
                  $penilaian = round(($jumlahjawaban/$jumlahmaksnilai)*100);
                  ?>
              <tr>
                <td colspan="2"align="right">
                <b><u>Total</u></b>
                </td><td>
                <b><u><?= $penilaian ?></u></b>
                <input type="hidden" name="role_id" value="<?= $role_id ?>">
                <input type="hidden" name="tahunpenilaian" value="<?= $tahunpenilaian ?>">
                <input type="hidden" name="bulanpenilaian" value="<?= $bulanpenilaian ?>">
                </td>
                    </tr>
                </table>
<div align='right'>Surabaya, <?= $tglskrg ?></div>                