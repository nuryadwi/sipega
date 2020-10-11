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
                                Nama : <?=$userdata['full_name'] ?>
                            </p>
                            <p>
                                NIP: <?=$userdata['nip'] ?>
                            </p>
                            <p>
                                Jabatan: <?=$userdata['jabatan_name'] ?>
                            </p>
                            <p>
                                Departemen: <?=$userdata['departemen_name'] ?>
                            </p>
                        </address>
                        <hr>
                    </div>
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
                            <?php if(!$skp) : ?>
                                <td align="center" colspan="10" class="text-muted">
                                    ---maaf data tidak ditemulan---
                                </td>

                            <?php else : ?>
                                <?php 
                                $no=1;
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

                                        <td>
                                            <form autocomplete="off" action="<?php echo base_url('kelola_skp/proses') ?>" class="form-horizontal" method="post">
                                            <?php if(empty($s->nilai_capaian_skp)) {?>
                                            <input type="number" name="kualitas_re" max="100" class="form-control form-control-sm" required>
                                            <?php }else{?>
                                                <?=$s->kualitas_re ?>
                                            <?php } ?>
                                            <input type="hidden" name="kuantitas" value="<?=$s->kuantitas; ?>">
                                            <input type="hidden" name="skp_id" value="<?=$s->skp_id; ?>">
                                            <input type="hidden" name="realisasi" value="<?=$s->realisasi; ?>">
                                            <input type="hidden" name="kualitas" value="<?=$s->kualitas; ?>">
                                            <input type="hidden" name="waktu" value="<?=$s->waktu; ?>">
                                            <input type="hidden" name="user_id" value="<?=$user_id; ?>">
                                        </td>
                                        <td>
                                        <?php if(empty($s->nilai_capaian_skp)) {?>
                                            <input type="number" name="waktu_re" max="12" class="form-control form-control-sm" placeholder="" required>
                                        <?php }else{?>
                                            <?=$s->waktu_re ?>
                                        <?php } ?>
                                        </td>
                                        <td>
                                            <?php if(empty($s->nilai_capaian_skp)) {?>
                                            <button class="btn btn-primary btn-sm" name="proses">Proses</button>
                                            <?php }else{?>
                                                
                                                <a href="<?php echo base_url('kelola_skp/delete/').$s->skp_id.'/'.$user_id.'/'.$s->id_tahun?>" class="btn btn-danger btn-sm tombol-hapus" data-toggles="tooltip" title="Hapus"><span class="ti-trash"></span></a>
                                            <?php } ?>
                                            </form>
                                        </td>
                                        <td><?=round($s->total_hitung,2)?></td>
                                        <td><?=round($s->nilai_capaian_skp,2)?> %</td>
                                    </tr>

                                <?php endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>