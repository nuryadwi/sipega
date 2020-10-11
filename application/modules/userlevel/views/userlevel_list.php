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
                    Manajemen pengelolaan hak akses user
                </p>
            </div>
            <div class="card-body">
                <div class="card-title">
                    <a href="<?php echo base_url('userlevel/create')?>" class="btn btn-success btn-sm"><i class="ti-plus"></i> Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-striped datatable">
                        <thead>
                            <tr>
                                <th width="2%">No</th>
                                <th width="10%">Nama Level</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            foreach ($role as $roles) :
                            ?>
                            <tr>
                                <td style="vertical-align:middle"><?=$i++;?></td>
                                <td style="vertical-align:middle"><?=$roles->role_name;?></td>
                                <td style="vertical-align:middle">
                                    <a href="<?php echo base_url('userlevel/userlevel_akses/').$roles->role_id ?>" class="btn btn-success btn-sm" data-toggles="tooltip" title="Akses"><span class="ti-unlock"></span></a>
                                    <a href="<?php echo base_url('userlevel/create/').$roles->role_id ?>" class="btn btn-primary btn-sm" data-toggles="tooltip" title="Edit"><span class="ti-pencil-alt"></span></a>
                                    <a href="<?php echo base_url('userlevel/delete/').$roles->role_id ?>" class="btn btn-danger btn-sm tombol-hapus" data-toggles="tooltip" title="Hapus"><span class="ti-trash"></span></a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
