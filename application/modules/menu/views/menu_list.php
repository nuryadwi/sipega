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
                    Manajemen pengelolaan menu sistem
                </p>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="<?php echo site_url('menu/save_setting');?>" enctype="multipart/form-data" method="post">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Tampilkan Menu berdasarkan Role</label>
                        <div class="col-sm-2">
                        <?php echo form_dropdown('show_menu', array('1' => 'YA', '0' => 'TIDAK'),$setting['value'],array('class' => 'form-control form-control-sm')); ?>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary btn-sm mr-2"><i class="ti-check"></i> Apply</button>
                        </div>
                    </div>
                </form>
                <a href="<?php echo base_url('menu/create') ?>" class="btn btn-success btn-sm"><i class="ti-plus"></i> Add Menu</a>
            </div>
            <div class="card-body">
                <div class="card-title">
                    
                </div>
        
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-striped datatable">
                        <thead>
                            <tr>
                                <th class="w-1">No.</th>
                                <th>Menu</th>
                                <th>Url</th>
                                <th>Icon</th>
                                <th>Submenu</th>
                                <th>Aktive</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        foreach($menu as $m): ?>
                            <tr>
                                <td><?=$no++; ?></td>
                                <td><?=$m['title']; ?></td>
                                <td><?=$m['url']; ?></td>
                                <td><?=$m['icon']; ?></td>
                                <td><?=$m['is_main_menu']; ?></td>
                                <td><?=string_is_aktif($m['is_active']); ?></td>
                                <td>
                                    <a href="<?php echo base_url('menu/create/').$m['menu_id'] ?>" class="btn btn-primary btn-sm" data-toggles="tooltip" title="Edit"><span class="ti-pencil-alt"></span></a>
                                    <a href="<?php echo base_url('menu/delete/').$m['menu_id'] ?>" class="btn btn-danger btn-sm tombol-hapus" data-toggles="tooltip" title="Hapus"><span class="ti-trash"></span></a>
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
