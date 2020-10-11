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
                    Sasaran Kinerja Pegawai
                </p>
            </div>
            <div class="card-body">
            <blockquote class="blockquote blockquote-primary">
                <label class="text-muted">Cari berdasarkan Periode Penilaian</label>
                <form class="form-horizontal row" action="" method="post">
                    <div class="form-group col-md-5 col-sm-9">
                        <select class="form-control form-control-sm" name="id_tahun" id="id_tahun">
                            <option value="">--Please Select--</option>
                            <?php foreach($tahun as $thn) :?>
                                <option value="<?=$thn->id_tahun ?>"> <?=format_date($thn->periode_start).' s/d '.format_date($thn->periode_end) ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-12">
                        <button type="submit" class="btn btn-success btn-sm" value="1" name="cari"><i class="ti-search"></i> Cari</button>
                    </div>
                </form>
            </blockquote>
            </div>
            <div class="card-body">
                <table class="table card-table text-nowrap datatable">
                    <thead>
                        <tr>
                            <th width="2%">No</th>
                            <th width="10%">Pegawai</th>
                            <th width="10%">Jabatan</th>
                            <th width="10%">Jumlah SKP</th>
                            <th width="10%">Bulan</th>
                
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(!$skp) : ?>
                        --- Maaf data tidak ditemukan --
                    <?php else : ?>
                        <?php
                        $no =1 ;
                        foreach($skp as $s) : ?>
                            <td style="vertical-align:middle"><?=$no++;?></td>
                            <td style="vertical-align:middle"><?=$s->full_name;?></td>
                            <td style="vertical-align:middle"><?=$s->jabatan_name.' '.$s->departemen_name;?></td>
                            <td style="vertical-align:middle"><?=$s->count_skp;?></td>
                            <td style="vertical-align:middle"><?=$s->tahun ?></td>  
                            <td>
                                <a href="<?php echo base_url('kelola_skp/detail/').$s->user_id.'/'.$s->id_tahun?>" class="btn btn-success btn-sm" target="_blank"><i class="ti-zoom-in"></i> Detail</a>
                            </td>
                        <?php endforeach ?>
                    <?php endif?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>