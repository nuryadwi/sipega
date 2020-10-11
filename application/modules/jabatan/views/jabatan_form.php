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
                    Create / Edit Data Jabatan
                </p>
                <form autocomplete="off" class="forms-sample" action="<?php echo site_url('jabatan/saving');?>" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id_jabatan" value="<?=$formdata['id_jabatan']?>">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nama Jabatan</label>
                        <div class="col-sm-6">
                            <input type="text" name="jabatan_name" value="<?=$formdata['jabatan_name']?>" class="form-control" placeholder="Nama Jabatan">
                            <code><?=form_error('jabatan_name')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nama Departemen</label>
                        <div class="col-sm-6">
                            <?php echo dropdown_dinamis('id_departemen', 'tb_departemen', 'departemen_name', 'id_departemen',$formdata['id_departemen'],'DESC') ?>
                            <code><?=form_error('id_departemen')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="<?=base_url();?>jabatan" class="btn btn-sm btn-warning"><i class="ti-back-left"></i> Back</i></a>
                            
                            <button type="submit" class="btn btn-sm btn-primary" name="save"><i class="ti-save"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>