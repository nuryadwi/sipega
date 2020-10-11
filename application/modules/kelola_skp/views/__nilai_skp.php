<div class="col-lg-12">
    <div class="flash-success" data-flashdata="<?= $this->session->flashdata('message2'); ?>"></div>
    <div class="flash-failed" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?=$c_judul;?></h4>
                <p class="card-description">
                    PEGAWAI NEGERI SIPIL YANG DINILAI
                </p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <address>
                        <p class="font-weight-bold">PEJABAT YANG DINILAI</p>
                        <hr>
                        <p>
                            Nama : <?=$user['full_name'] ?>
                        </p>
                        <p>
                            NIP: <?=$user['nip']?>
                        </p>
                        <p>
                            Jabatan: <?=$user['jabatan_name']?>
                        </p>
                        <p>
                            Departemen: <?=$user['departemen_name']?>
                        </p>
                        </address>
                        <hr>
                    </div>
                    <!-- <div class="col-md-6">
                        <address>
                        <p class="font-weight-bold">PEJABAT PENILAI</p>
                        <hr>
                        <p>
                            Nama : 
                        </p>
                        <p>
                            NIP: 
                        </p>
                        <p>
                            Jabatan: 
                        </p>
                        <p>
                            Departemen:
                        </p>
                        </address>
                        <hr>
                    </div> -->
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-md table-bordered"> 
                        
                        <thead>
                            <tr>
                                <th rowspan="2">No.</td>
                                <th rowspan="2" style="text-align: center;">Kegiatan</td>
                                <th colspan="4" style="text-align: center;">Target</td>
                                <th colspan="1"></td>
                                <th colspan="6" style="text-align: center;">Realiasai</td>
                            </tr>
                            <tr>
                                <td width="">Kuant/Output</th>
                                <td width="">Satuan</th>
                                <td width="">Kualitas/Mutu</th>
                                <td width="">Waktu</th>
                                <td style="background: ;"></th>
                                <td width="">Kuant/Output</th>
                                <td width="">kualitas/Mutu</th>
                                <td width="">Waktu(Bulan)</th>
                                <td width="">Aksi</th>
                                <td width="">Perhitungan</th>
                                <td width="">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no=1;
                            foreach($skp as $s) :?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$s->kegiatan; ?></td>
                                <td><?=$s->kuantitas; ?></td>
                                <td><?=$s->satuan; ?></td>
                                <td><?=$s->kualitas; ?></td>
                                <td><?=$s->waktu.' Bulan'; ?></td>
                                <td style="background: ;"></td>
                                <td><?=$s->realisasi.' '.$s->satuan;?></td>
                                <td>
                                <form autocomplete="off" action="<?php echo base_url('kelola_skp/proses') ?>" class="form-horizontal" method="post">
                                    <input type="text" name="kualitas_re" class="form-control form-control-sm" required>
                                    <input type="hidden" name="kuantitas" value="<?=$s->kuantitas; ?>">
                                    <input type="hidden" name="skp_id" value="<?=$s->skp_id; ?>">
                                    <input type="hidden" name="realisasi" value="<?=$s->realisasi; ?>">
                                    <input type="hidden" name="kualitas" value="<?=$s->kualitas; ?>">
                                    <input type="hidden" name="waktu" value="<?=$s->waktu; ?>">
                                    <input type="hidden" name="id" value="<?=$id; ?>">
                                </td>
                                <td>
                                <input type="text" name="waktu_re" class="form-control form-control-sm" required>
                                </td>
                                <td>
                                <?php if(empty($s->nilai_capaian_skp)) {?>
                                <button class="btn btn-primary btn-sm" name="proses">Proses</button>
                                <?php }else{?>
                                    <label for="">Sudah di input</label>
                                <?php } ?>
                                </form>
                                </td>
                                <td><?=round($s->total_hitung,2)?></td>
                                <td><?=round($s->nilai_capaian_skp,2)?> %</td>
                            
                            </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>