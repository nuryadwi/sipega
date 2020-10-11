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
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="3">UNSUR YANG DINILAI</th>
                                <th>JUMLAH</th>
                            </tr>
                            <tr>
                                <th colspan="1">A. Sasaran Kinerja Pegawai</th>
                                <?php 
                                if(!empty($nilai_capaian)){
                                    foreach ($nilai_capaian as $nc) {
                                        echo "<th colspan='2'>$nc->nilai_capaian_kerja x 60%</th>
                                        <td>".round((($nc->nilai_capaian_kerja*60)/100),2)."</td>";
                                    }
                                }else {
                                    echo "<th colspan='2'>No data</th>
                                        <td></td>";
                                }
                                ?>
                                
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th colspan="4">B. Perilaku Kerja</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if(!empty($nilai_perilaku)): ?>
                            <?php foreach ($nilai_perilaku as $np) : ?>
                            <tr>
                                <td>1. Orientasi Pelayanan</td>
                                <td><?=$np->pelayanan?></td>
                                <td><?=cek_nilai($np->pelayanan)?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2. Integritas</td>
                                <td><?=$np->integritas?></td>
                                <td><?=cek_nilai($np->integritas)?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3. Komitmen</td>
                                <td><?=$np->komitmen?></td>
                                <td><?=cek_nilai($np->komitmen)?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4. Disiplin</td>
                                <td><?=$np->disiplin?></td>
                                <td><?=cek_nilai($np->disiplin)?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>5. Kerjasama</td>
                                <td><?=$np->kerjasama?></td>
                                <td><?=cek_nilai($np->kerjasama)?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>5. Kepemimpinan</td>
                                <td><?=$np->kepemimpinan?></td>
                                <td><?=cek_nilai($np->kepemimpinan)?></td>
                                <td></td>     
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th>Nilai Perilaku Kerja</th>
                                <th colspan="2"><?=$np->nilai_perilaku ?> x40% </th>
                                <td><?= round((($np->nilai_perilaku*40)/100),2)?></td>
                            </tr>
                            <?php endforeach ?>
                           
                        <?php else : ?>
                        <tbody>
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td></td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th>Nilai Perilaku Kerja</th>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                        </thead>
                        <?php endif ?>
                        <thead>
                        <?php if(!empty($nilai_prestasi)) : ?>
                            <tr>
                            <?php foreach ($nilai_prestasi as $nps) : ?>
                                <th colspan="3" rowspan="3"><center>Nilai Prestasi Kerja</center></th>
                                <th><?=$nps->nilai_prestasi_kerja ?></th>
                            </tr>
                            <tr>
                                <td><?=cek_nilai($nps->nilai_prestasi_kerja) ?></td>
                            </tr>
                            <?php endforeach ?>
                                
                        <?php else : ?>
                            <tr>
                                <th colspan="3" rowspan="3"><center>Nilai Prestasi Kerja</center></th>
                                <th>-</th>
                            </tr>
                            <tr>
                                <td>-</td>
                            </tr>
                        <?php endif ?>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
