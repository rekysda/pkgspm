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