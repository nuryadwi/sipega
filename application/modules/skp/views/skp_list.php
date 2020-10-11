<div class="col-lg-12">
    <div class="flash-success" data-flashdata="<?= $this->session->flashdata('message2'); ?>"></div>
    <div class="flash-failed" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                    <h3 class="card-title"><?=$c_judul.' Bulan '.bulan(date('m')).' '.date('Y') ?></h3>
                    <div class="card-options">
                        <a href="<?php echo base_url('skp/create')?>" class="btn btn-success btn-sm"><i class="ti-plus"></i>  Create</a>
                    </div>
                </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover datatable">
                        <thead>
                            <tr>
                                <th width="2%">No</th>
                                <th width="40%">Kegiatan Tugas Jabatan</th>
                                <th width="10%">Kuantitas/ Output</th>
                                <th width="10%">Kualitas/ Mutu</th>
                                <th width="10%">Waktu</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach($skpdata as $skp) : ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$skp['kegiatan']?></td>
                                <td><?=$skp['kuantitas'].' '.$skp['satuan']?></td>
                                <td><?=$skp['kualitas']?></td>
                                <td><?=$skp['waktu'].' Bulan'?></td>
                                <td>
                                <?php if($skp['status'] === '0'){ ?>
                                    <a href="<?php echo base_url('skp/create/').$skp['skp_id'] ?>" class="btn btn-info btn-sm" data-toggles="tooltip" title="Edit"><i class="ti-pencil-alt"></i></a>
                                    <a href="<?php echo base_url('skp/delete/').$skp['skp_id'] ?>" class="btn btn-danger btn-sm tombol-hapus" data-toggles="tooltip" title="Hapus"><span class="ti-trash"></span></a>
                                <?php }else{ ?>
                                    <span class="badge badge-success">Sudah teraprove</span>
                                <?php } ?>
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