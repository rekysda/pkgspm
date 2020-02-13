
<img src="<?= base_url('assets/images/logoslip/header.jpg') ?>">
<hr>
<h4>PENILAIAN KINERJA GURU SMAK BHAKTI SAMUDERA<br>
Bulan : <?= getbulanindo($bulanpenilaian) ?><br>
Tahun : <?= $tahunpenilaian ?></h4>
<table><tr><td valign="top">
<table>
<tr><td>
<b class="box-title">
<img src="<?= base_url('assets/images/profile/'.$imagegurutujuan) ?>"height="70px">
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
                  <td align='center'>         
                  <?php $image=$dt['image'] ?>
                  <img src="<?= base_url('assets/images/banksoal/'.$image) ?>"height="30px"><br>
                  <?= $dt['kategori']; ?>
                  </td>
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
    <div align='right'>Surabaya, <?= $tglskrg ?></div>