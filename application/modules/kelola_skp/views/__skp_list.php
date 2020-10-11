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
                <label class="text-muted">Cari berdasarkan bulan</label>
                <form class="form-horizontal row" action="" method="post">
                    <div class="form-group col-md-2 col-sm-9">
                        <select class="form-control form-control-sm" name="bln">
                            <option value="01" <?php if ($bln == '01') { echo 'selected'; } ?>>Januari</option>
                            <option value="02" <?php if ($bln == '02') { echo 'selected'; } ?>>Februari</option>
                            <option value="03" <?php if ($bln == '03') { echo 'selected'; } ?>>Maret</option>
                            <option value="04" <?php if ($bln == '04') { echo 'selected'; } ?>>April</option>
                            <option value="05" <?php if ($bln == '05') { echo 'selected'; } ?>>Mei</option>
                            <option value="06" <?php if ($bln == '06') { echo 'selected'; } ?>>Juni</option>
                            <option value="07" <?php if ($bln == '07') { echo 'selected'; } ?>>Juli</option>
                            <option value="08" <?php if ($bln == '08') { echo 'selected'; } ?>>Agustus</option>
                            <option value="09" <?php if ($bln == '09') { echo 'selected'; } ?>>September</option>
                            <option value="10" <?php if ($bln == '10') { echo 'selected'; } ?>>Oktober</option>
                            <option value="11" <?php if ($bln == '11') { echo 'selected'; } ?>>November</option>
                            <option value="12" <?php if ($bln == '12') { echo 'selected'; } ?>>Desember</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-12">
                    <select class="form-control form-control-sm" name="thn">
                        <?php for ($i = 2019; $i <= date('Y')+5; $i++) { ?>
                            <option value="<?=$i;?>" <?php if ($thn == $i){ echo 'selected'; }?>>
                                <?=$i;?>
                            </option>
                        <?php } ?>
                    </select>
                    </div>

                    <div class="form-group col-md-3 col-sm-12">
                        <button type="submit" class="btn btn-success btn-sm" name="cari"><i class="ti-search"></i> Cari</button>
                    </div>
                </form>
                </blockquote>
            </div>
            <div class="card-body">
            <?php
                        switch($bln) {
                            case '01':
                                $Bulan = 'Januari';
                                break;
                            case '02':
                                $Bulan = 'Februari';
                                break;
                            case '03':
                                $Bulan = 'Maret';
                                break;
                            case '04':
                                $Bulan = 'April';
                                break;
                            case '05':
                                $Bulan = 'Mei';
                                break;
                            case '06':
                                $Bulan = 'Juni';
                                break;
                            case '07':
                                $Bulan = 'Juli';
                                break;
                            case '08':
                                $Bulan = 'Agustus';
                                break;
                            case '09':
                                $Bulan = 'September';
                                break;
                            case '10':
                                $Bulan = 'Oktober';
                                break;
                            case '11':
                                $Bulan = 'November';
                                break;
                            case '12':
                                $Bulan = 'Desember';
                                break;
                        }
                    ?>
                    <div class="template-demo">
                        <h1 class="display-4">Laporan Bulan <?=$Bulan.' '.$thn;?></h1>
                    </div>
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
                        <?php
                            $no = 1;
                            foreach($skp as $s) : ?>
                            <tr>
                                <td style="vertical-align:middle"><?=$no++;?></td>
                                <td style="vertical-align:middle"><?=$s->full_name;?></td>
                                <td style="vertical-align:middle"><?=$s->jabatan_name.' '.$s->departemen_name;?></td>
                                <td style="vertical-align:middle"><?=$s->count_skp;?></td>
                                <td style="vertical-align:middle"><?=$Bulan;?></td>
                                <td>
                                    <a href="<?php echo base_url('kelola_skp/details/').base64_encode($s->user_id.'/'.$bln.'/'.$thn)?>" class="btn btn-success btn-sm" target="_blank"><i class="ti-zoom-in"></i> Detail</a>
                                </td>
                            </tr>
                        <?php endforeach ?> 
                        </tbody>
                    </table>                     
            </div>
        </div>
    </div>
</div>