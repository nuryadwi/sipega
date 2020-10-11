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
                    Capaian Kinerja Pegawai
                </p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered datatable">
                        <thead>
                            <tr>
                                <th class="w-1">No.</th>
                                <th>Pegawai</th>
                                <th>Jabatan</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i =1;
                            foreach($staffs as $staff) {?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$staff->full_name?></td>
                                <td><?=$staff->jabatan_name.' '.$staff->departemen_name?></td>
                                <td>
                                <a href="<?php echo base_url().'capaian_kerja/detail/'.$staff->user_id;?>" class="btn btn-primary mr-1 btn-sm" data-toggle="tooltip" data-html="true" title="Nilai"><span class="ti-marker-alt"></span></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>