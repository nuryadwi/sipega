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
                    Master data departemen
                </p>
            </div>
            <div class="card-body">
                <div class="card-title">
                    <a href="<?php echo base_url('departemen/create')?>" class="btn btn-success btn-sm"><i class="ti-plus"></i> Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-striped datatable">
                        <thead>
                            <tr>
                                <th width="2%">No</th>
                                <th width="20%">Nama Departemen</th>
                                <th width="5%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $i = 1;
                        foreach($data as $dep ): ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$dep->departemen_name?></td>
                                <td>
                                    <a href="<?php echo base_url('departemen/create/').$dep->id_departemen ?>" class="btn btn-info btn-sm" data-toggles="tooltip" title="Edit"><i class="ti-pencil-alt"></i></a>
                                    <a href="<?php echo base_url('departemen/delete/').$dep->id_departemen ?>" class="btn btn-danger btn-sm tombol-hapus" data-toggles="tooltip" title="Hapus"><span class="ti-trash"></span></a>
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
