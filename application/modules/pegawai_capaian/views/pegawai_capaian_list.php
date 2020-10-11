<div class="col-lg-12">
    <div class="flash-success" data-flashdata="<?= $this->session->flashdata('message2'); ?>"></div>
    <div class="flash-failed" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?=$c_judul;?></h4>
               
            </div>
            <div class="card-body">
                <h4 align="center">NILAI SASARAN KINERJA</h4>
                <p>Jangka waktu penilaian</p>
                <p>date</p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2" width="1%">A.</td>
                                <th rowspan="2" width="20%"style="text-align: center;">Kegiatan</td>
                                <th colspan="4" style="text-align: center;">Target</td>
                                <th colspan="1"></td>
                                <th colspan="3" style="text-align: center;">Realiasai</td>
                                <th rowspan="2">Perhitungan</th>
                                <th rowspan="2">NilaiCapaian</th>
                            </tr>
                            <tr>
                                <td width="">Kuant/Output</th>
                                <td width="">Satuan</th>
                                <td width="">Kualitas/Mutu</th>
                                <td width="">Waktu</th>
                                <td style="background: ;"></th>
                                <td width="">Kuant/Output</th>
                                <td width="">kualitas/Mutu</th>
                                <td width="">Waktu</th>
                                
                            </tr> 
                        </thead>
                        <tbody>
                            <?php if(!empty($skp)) : ?>
                                <?php
                                $no =1;
                                foreach($skp as $s) : ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$s->kegiatan; ?></td>
                                    <td><?=$s->kuantitas; ?></td>
                                    <td><?=$s->satuan; ?></td>
                                    <td><?=$s->kualitas; ?></td>
                                    <td><?=$s->waktu.' Bulan'; ?></td>
                                    <td style="background: ;"></td>
                                    <td><?=$s->realisasi.' '.$s->satuan;?></td>
                                    <td><?=$s->kualitas_re; ?></td>
                                    <td><?=$s->waktu_re?></td>
                                    <td><?=round($s->total_hitung,2)?></td>
                                    <td><?=round($s->nilai_capaian_skp,2)?></td>
                                </tr>
                                <?php endforeach ?>
                            <?php else : ?>
                            <tr>
                                <td colspan="12"><center>No Data</center></td>
                            </tr>
                            <?php endif ?>
                        </tbody>
                        <thead>
                            <tr>
                                <th>B.</th>
                                <th colspan="10">Tugas tambahan</th>
                                <th>####</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($task)) : ?>
                            <tr>
                                <th>&nbsp;</th>
                                <td colspan="10">
                                    <ol>
                                        <?php foreach($task as $ts) :?>
                                        <li><?=$ts->kegiatan?></li>
                                        <?php endforeach?>
                                    </ol>
                                    
                                </td>
                                <td><?=$jml_task?></td>
                            </tr>
                        <?php else : ?>
                            <tr>
                                <th colspan="12">
                                    <center>No Data</center>
                                </th>
                            </tr>
                        <?php endif ?>
                        </tbody>
                        <thead>
                        <tr>
                            <th colspan="11"><center>Nilai Capaian SKP</center></th>
                            <th>
                                <?php if(!$nilai_capaian){
                                        echo "00.00";
                                }else {
                                    echo $nilai_capaian.' ('.cek_nilai($nilai_capaian).')';
                                }
                                ?>
                            </th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>