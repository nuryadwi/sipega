<style type="text/css">
    #imgView{  
        width: 100px; 
        height:100px; 
        padding: 10px; 
        border-radius:50%;
        border: 1px solid #CCCCCC;
    }
</style>
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
                    Setting Application
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <center>
                <?php if(empty($config['logo'])){ ?>
                    <img alt="image" class="profile-widget-picture rounded-circle" width="100px" height="100px" src="<?php echo base_url('assets/demo/brand/user.png');?>">
                <?php }else{ ?>
                    <img alt="image" class="profile-widget-picture rounded-circle" width="100px" height="100px" src="<?php echo $url.$config['logo'];?>">
                <?php } ?>
                <h3 class="text-center"><?=strtoupper($config['name_app'])?></h3>
                <p class="text-muted text-center"><?=$config['instansi']?></p>
            </center>
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Email:&nbsp;</b> <a class="pull-right"><?=$config['email']?></a>
                </li>
                <li class="list-group-item">
                    <b>Pimpinan:&nbsp;</b> <a class="pull-right"><?=$config['pimpinan']?></a>
                </li>
                <li class="list-group-item">
                    <b>Sekretaris:&nbsp;</b> <a class="pull-right"><?=$config['sekretaris']?></a>
                </li>
            </ul>
            <div class="card-body profile-widget-description">
                <strong><i class="ti-location-pin"></i> Alamat</strong>
                <p class="text-muted"><?=$config['alamat'].".&nbsp;&nbsp;<i class='fa fa-phone'></i> ".$config['phone']?></p>
                <div class="boxDivider"></div>
                
                <strong><i class="fa fa-file"></i> About</strong>
                <p class="text-muted"><?=$config['about']?></p>
                <div class="boxDivider"></div>
            </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'settings/saving'?>" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id_konfigurasi" id='id_konfigurasi' value="<?=$config['id_konfigurasi']?>">

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Nama Aplikasi</label>
                        <div class="col-sm-9">
                            <input type="text" name="name_app" value="<?=strtoupper($config['name_app'])?>" class="form-control" placeholder="Nama Aplikasi">
                            <code><?=form_error('name_app')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Email Kantor</label>
                        <div class="col-sm-9">
                            <input type="text" name="email" value="<?=$config['email']?>" class="form-control" placeholder="Alamat Email Kantor">
                            <code><?=form_error('email')?></code>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Alamat Kantor</label>
                        <div class="col-sm-9">
                        <textarea class="textarea" name="alamat" id="alamat" cols="50" rows="5" class="form-control" placeholder="alamat"><?=$config['alamat']?></textarea>
                            <code><?=form_error('alamat')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No Telepon</label>
                        <div class="col-sm-9">
                            <input type="text" name="phone" value="<?=strtoupper($config['phone'])?>" class="form-control" placeholder="No Telepon Kantor">
                            <code><?=form_error('phone')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Logo</label>
                        <div class="col-sm-9">
                            <input type="hidden"  name="old_logo" value="<?=$config['logo']?>" />
                            <input type="file" id="inputFile" name="logo" class="imgFile file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                            <div class="imgWrap"><br />
                                <?php if($config['logo'] !=''): ?>
                                    <img src="<?php echo $url.$config['logo'];?>" id="imgView" class="card-img-top img-fluid" />
                                <?php else : ?>
                                    <img src="<?=base_url() ;?>assets/demo/brand/user.png" id="imgView" class="card-img-top img-fluid" />
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                                    
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Nama Instansi</label>
                        <div class="col-sm-9">
                            <input type="text" name="instansi" value="<?=strtoupper($config['instansi'])?>" class="form-control" placeholder="Nama Instansi">
                            <code><?=form_error('instansi')?></code>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Nama Pimpinan</label>
                        <div class="col-sm-9">
                            <input type="text" name="pimpinan" value="<?=strtoupper($config['pimpinan'])?>" class="form-control" placeholder="Nama Pimpinan">
                            <code><?=form_error('pimpinan')?></code>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Nama Sekretaris</label>
                        <div class="col-sm-9">
                            <input type="text" name="sekretaris" value="<?=strtoupper($config['sekretaris'])?>" class="form-control" placeholder="Nama Sekretaris">
                            <code><?=form_error('sekretaris')?></code>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Aboutr</label>
                        <div class="col-sm-9">
                        <textarea class="textarea" name="about" id="about" cols="50" rows="10" class="form-control" placeholder="about"><?=$config['about']?></textarea>
                            <code><?=form_error('about')?></code>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">&nbsp;</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="<?=base_url();?>dashboard" class="btn btn-sm btn-warning"><i class="ti-close"></i> Cancel</i></a>
                            
                            <button type="submit" class="btn btn-sm btn-primary" name="save"><i class="ti-save"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    //load image privew
    $("#inputFile").change(function(event) {  
    fadeInAdd();
    getURL(this);    
    });

    $("#inputFile").on('click',function(event){
    fadeInAdd();
    });

    function getURL(input) {    
    if (input.files && input.files[0]) {   
        var reader = new FileReader();
        var filename = $("#inputFile").val();
        filename = filename.substring(filename.lastIndexOf('\\')+1);
        reader.onload = function(e) {
        debugger;      
        $('#imgView').attr('src', e.target.result);
        $('#imgView').hide();
        $('#imgView').fadeIn(500);      
        $('.custom-file-label').text(filename);             
        }
        reader.readAsDataURL(input.files[0]);    
    }
    $(".alert").removeClass("loadAnimate").hide();
    }

    function fadeInAdd(){
    fadeInAlert();  
    }
    function fadeInAlert(text){
    $(".alert").text(text).addClass("loadAnimate");  
    }
</script>