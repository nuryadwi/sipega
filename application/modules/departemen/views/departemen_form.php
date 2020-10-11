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
                    Create / Edit Data Departemen
                </p>
                <form autocomplete="off" class="forms-sample" action="<?php echo site_url('departemen/saving');?>" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id_departemen" value="<?=$formdata['id_departemen']?>">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nama Jabatan</label>
                        <div class="col-sm-6">
                            <input type="text" name="departemen_name" value="<?=$formdata['departemen_name']?>" class="form-control" placeholder="Nama Departemen">
                            <code><?=form_error('departemen_name')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="<?=base_url();?>departemen" class="btn btn-sm btn-warning"><i class="ti-back-left"></i> Back</i></a>
                            
                            <button type="submit" class="btn btn-sm btn-primary" name="save"><i class="ti-save"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>