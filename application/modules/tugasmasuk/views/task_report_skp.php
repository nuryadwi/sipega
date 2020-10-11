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
                    <div class="form-group col-md-3 col-sm-9">
                        <input type="date" name="start_date" id="" class="form-control form-control-sm" required>
                        
                    </div>
                    <div class="form-group col-md-3 col-sm-9">
                        <input type="date" name="end_date" id="" class="form-control form-control-sm" required>
                        
                    </div>
                    <div class="form-group col-md-3 col-sm-12">
                        <button type="submit" class="btn btn-success btn-sm" value="1" name="cari"><i class="ti-search"></i> Cari</button>
                    </div>
                </form>
            </blockquote>
            </div>
            <div class="card-body">
                <?php 
                    if(!empty($date)){
                        echo "<label>List tugas pada tanggal ".format_date($date['start']).' sampai '.format_date($date['end'])."</label>";
                    }else{
                        echo "<label>Tugas Bulan ini</label>";
                    }
                ?>
                <div class="table-responsive">
                    <table class="table table-sm table-hover datatable">
                        <thead>
                            <tr>
                                <th width="2%">No</th>
                                <th width="10%">Pegawai</th>
                                <th width="10%">Jabatan</th>
                                <th width="10%">Tugas</th>
                                <th width="10%">Tanggal</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach($tugas as $t) : ?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><?=$t->full_name;?></td>
                                <td><?=$t->jabatan_name.' '.$t->departemen_name;?></td>
                                <td><?=$t->kegiatan;?></td>
                                <td><?=format_date($t->tanggal);?></td>
                                <td>
                                    <a style="color:white;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#ModalDetail<?=$t->id_skp_realisasi;?>"><i style="color:white;" class="ti-zoom-in"></i> Detail</a> 
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach($tugas as $t) : ?>
    <div class="modal fade" id="ModalDetail<?=$t->id_skp_realisasi?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Detail Tugas: <?=$t->full_name; ?></h5>
            
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
          <!--modal body-->
          <div class="modal-body">
            <h5>Kegiatan</h5>
            <p><?php echo $t->kegiatan?></p>
            <div class="boxDivider"></div>

            <h5>Tanggal</h5>
            <p><?php echo format_date($t->tanggal)?></p>
            <div class="boxDivider"></div>

            <h5>Jam Pelaksanaan</h5>
            <p><?php echo $t->waktu_mulai.' s/d '.$t->waktu_selesai?></p>
            <div class="boxDivider"></div>

            <h5>Hasil</h5>
            <p><?php echo $t->output.' '.$t->satuan?></p>
            <div class="boxDivider"></div>

            <h5>File tambahan</h5>
            <p>
                <?php if ($t->file != 'no-file'): ?>
                    <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                    <a href="<?php echo base_url().'tugasmasuk/download_skp/'.$t->id_skp_realisasi; ?>" class=""><i class="fa fa-paperclip"></i><?=$t->file?></a>
                <?php else:?>
                <label for="">Tidak ada berkas</label>
                <?php endif ?>
            </p>
            <div class="boxDivider"></div>
          </div>
          <!-- end modal body-->
          <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm btn-md" data-dismiss="modal">Close</button>
          <a href="<?php echo base_url('task_incoming_skp/approve/').$t->id_skp_realisasi ?>" class="btn btn-primary btn-sm" name="approve"><i class="fa fa-check"></i> Approve</a>
        </div>
      </div>
    </div>
</div>
<?php endforeach; ?>