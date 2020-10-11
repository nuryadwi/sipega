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
                    <table class="table table-sm table-bordered"> 
                        <thead>
                            <tr>
                                <th rowspan="2" width="2%">No.</th>
                                <th rowspan="2" width="10%" style="text-align: center;">Kegiatan</th>
                                <th colspan="5" style="text-align: center;">Target</th>
                            </tr>
                            <tr>
                                <td class="specifictd" width="2%">Kuant/Output</td>
                                <td width="2%">Satuan</td>
                                <td width="2%">Kualitas/Mutu</td>
                                <td width="2%">Waktu</td>
                                <td width="5%">Biaya</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!$skp) : ?>
                                <td align="center" colspan="7" class="text-muted">
                                    --maaf data tidak ditemulan--
                                </td>
                            <?php else : ?>
                                <?php 
                                $no =1;
                                foreach($skp as $s) : ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$s->kegiatan?></td>
                                        <td><?=$s->kuantitas?></td>
                                        <td><?=$s->satuan?></td>
                                        <td><?=$s->kualitas?></td>
                                        <td><?=$s->waktu.' Bulan'?></td>
                                        <td><?='Rp '.$s->biaya?></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-body">
                <a href="<?php echo base_url('kelola_skp/nilai_skp/').$s->user_id.'/'.$s->id_tahun?>" class="btn btn-primary btn-sm"><i class="ti-pencil"></i> Nilai SKP</a>
            </div>
        </div>
    </div>
</div>