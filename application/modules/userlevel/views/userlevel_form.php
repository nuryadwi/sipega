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
                    Tambah Role User / Edit Role User
                </p>
                <form autocomplete="off" class="forms-sample" action="<?php echo site_url('userlevel/saving');?>" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="role_id" id='role_id' value="<?=$formdata['role_id']?>">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nama Role User</label>
                        <div class="col-sm-6">
                            <input type="text" name="role_name" value="<?=$formdata['role_name']?>" class="form-control" placeholder="Nama Role User">
                            <code><?=form_error('role_name')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-6">
                            <textarea name="description" id="description" cols="50" rows="5" class="form-control" placeholder="Deskripsi user"><?=$formdata['description']?></textarea>
                            <code><?=form_error('description')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="<?=base_url();?>userlevel" class="btn btn-sm btn-warning"><i class="ti-back-left"></i> Back</i></a>
                            
                            <button type="submit" class="btn btn-sm btn-primary" name="save"><i class="ti-save"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>