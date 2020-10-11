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
                    Tambah menu / edit menu
                </p>
                <form autocomplete="off" class="forms-sample" action="<?php echo site_url('menu/saving');?>" enctype="multipart/form-data" method="post">
                <input type="hidden" name="menu_id" id='menu_id' value="<?=$formdata['menu_id']?>" class="form-control">
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Nama Menu</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="title" value="<?=$formdata['title']?>" placeholder="Nama Menu">
                            <code><?=form_error('title')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Alamat Url</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="url" value="<?=$formdata['url']?>" placeholder="Alamat Url">
                            <code class="url"></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Icon</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="icon" value="<?=$formdata['icon']?>" placeholder="Icon menu">
                            <code class="icon"></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Sub Menu</label>
                        <div class="col-sm-6">
                            <?php echo dropdown_dinamis('is_main_menu', 'tb_menu', 'title', 'menu_id', $formdata['is_main_menu'], 'DESC') ?>
                            <code class="is_main_menu"></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Ditampilan di menu?</label>
                        <div class="col-sm-6">
                        <?php echo form_dropdown('is_aktif',array("1" => "Yes", "0" => "No"),$formdata['is_aktif'], 'class="form-control"');?>
                            <code><?=form_error('is_aktif')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">&nbsp;</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="<?=base_url();?>menu" class="btn btn-sm btn-warning"><i class="ti-back-left"></i> Back</i></a>
                            
                            <button type="submit" class="btn btn-sm btn-primary" name="save"><i class="ti-save"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>