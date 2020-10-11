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
                    
                </p>
                <form autocomplete="off" class="forms-sample" action="<?php echo site_url('skp/saving');?>" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="skp_id" value="<?=$formdata['skp_id']?>">

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Kegiatan</label>
                        <div class="col-sm-6">
                            <input type="text" name="kegiatan" value="<?=$formdata['kegiatan']?>" class="form-control" placeholder="Kegiatan">
                            <code><?=form_error('kegiatan')?></code>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Kuantitas / Output</label>
                        <div class="col-sm-6">
                            <input type="text" name="kuantitas" value="<?=$formdata['kuantitas']?>" class="form-control" placeholder="Kuantitas/ Output">
                            <code><?=form_error('kuantitas')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Satuan</label>
                        <div class="col-sm-6">
                            <?php echo form_dropdown('satuan',$satuan,$formdata['satuan'], 'class="form-control" ') ?>
                            <code><?=form_error('satuan')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Kualitas/ Mutu</label>
                        <div class="col-sm-6">
                            <input type="text" name="kualitas" min="0" max="100" value="<?=$formdata['kualitas']?>" class="form-control" placeholder="Kualitas/ Mutu">
                            <code><?=form_error('kualitas')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Jangka Waktu</label>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control"  min="0" max="12"  id="waktu" name="waktu" value="<?=$formdata['waktu']?>" aria-label="Waktu" placeholder="Berapa Bulan?" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">
                                            Bulan
                                        </span>
                                    </div>
                                </div>
                            <code><?=form_error('waktu')?></code>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="<?=base_url();?>skp" class="btn btn-sm btn-warning"><i class="ti-back-left"></i> Back</i></a>
                            
                            <button type="submit" class="btn btn-sm btn-primary" name="save"><i class="ti-save"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>