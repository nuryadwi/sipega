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
                    Setting Profile & Account
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
                    <?php if($formdata['fotoprofil'] != 'user.png'){ ?>
                        <img alt="image" class="profile-widget-picture rounded-circle" width="100px" height="100px" src="<?php echo $url.$formdata['fotoprofil'];?>">
                    <?php }else{ ?>
                        <img alt="image" class="profile-widget-picture rounded-circle" width="100px" height="100px" src="<?php echo base_url('assets/demo/brand/user.png');?>">
                    <?php } ?>
                    <h3 class="text-center"><?php echo $this->session->userdata('display_name'); ?></h3>
                    <p class="text-muted text-center"><?=$formdata['jabatan']?></p>
                </center>
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Login terakhir:&nbsp;</b> <a class="pull-right"><?=$formdata['last_login']?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Status Pengguna:&nbsp;</b> <a class="pull-right"><?=string_changes($formdata['status'])?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Tanggal Terdaftar:&nbsp;</b> <a class="pull-right"><?=$formdata['create_at']?></a>
                    </li>
                </ul>
                <div class="card-body profile-widget-description">
                    
                    <strong><i class="fa fa-user"></i>NIP</strong>
                    <p class="text-muted"><?=$formdata['nip']?></p>
                    <div class="boxDivider"></div>

                    <strong><i class="fa fa-phone"></i>No. Telephone</strong>
                    <p class="text-muted"><?=$formdata['phone']?></p>
                    <div class="boxDivider"></div>

                    <strong><i class="fa fa-map-marker"></i>Alamat</strong>
                    <p class="text-muted"><?=$formdata['address']?></p>
                    <div class="boxDivider"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7 grid-margin stretch-card">
        <div class="card col-md-12">
            <div class="card-body">
                    <ul class="nav nav-pills" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="profil-tab" data-toggle="tab" href="#profil" role="tab" aria-controls="home" aria-selected="true">Setting Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="akun-tab" data-toggle="tab" href="#akun" role="tab" aria-controls="profile" aria-selected="false">Setting Akun</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profil" role="tabpanel" aria-labelledby="home-tab3">
                            <div class="card-body">
                                <div class="card-description col-sm-4">
                                    <p>Setting Profile</p>
                                </div>
                                <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'profile/updateProfile'?>" enctype="multipart/form-data" method="post">
                                    <input type="hidden" name="user_id" id='user_id' value="<?=$formdata['user_id']?>">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">NIP</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nip" value="<?=$formdata['nip']?>" class="form-control" placeholder="No Induk Pegawai">
                                            <code><?=form_error('nip')?></code>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">NIK</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nik" value="<?=$formdata['nik']?>" class="form-control" placeholder="No Induk Kepenudukan">
                                            <code><?=form_error('nik')?></code>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="full_name" value="<?=$formdata['full_name']?>" class="form-control" placeholder="Nama Lengkap">
                                            <code><?=form_error('full_name')?></code>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-8">
                                            <input type="date" name="born_date" value="<?=$formdata['born_date']?>" class="form-control" placeholder="Tanggal Lahir">
                                            <code><?=form_error('born_date')?></code>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">No Telephone</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="phone" value="<?=$formdata['phone']?>" class="form-control" placeholder="No Telephone">
                                            <code><?=form_error('phone')?></code>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-8">
                                            <?php echo form_dropdown('gender',$gender,$formdata['gender'], 'class="form-control" ') ?>
                                            <code><?=form_error('gender')?></code>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Logo</label>
                                        <div class="col-sm-8">
                                            <input type="hidden"  name="old_images" value="<?=$formdata['fotoprofil']?>" />
                                            <input type="file" id="inputFile" name="fotoprofil" class="imgFile file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                                <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                </span>
                                            </div>
                                            <div class="imgWrap"><br />
                                                <?php if($formdata['fotoprofil'] != 'user.png'): ?>
                                                    <img src="<?php echo $url.$formdata['fotoprofil'];?>" id="imgView" class="card-img-top img-fluid" />
                                                <?php else : ?>
                                                    <img src="<?=base_url() ;?>assets/demo/brand/user.png" id="imgView" class="card-img-top img-fluid" />
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="" class="col-sm-4 col-form-label">Alamat</label>
                                        <div class="col-sm-12">
                                        <textarea class="textarea" name="address" cols="50" rows="10" class="form-control" placeholder="Alamat"><?=$formdata['address']?></textarea>
                                            <code><?=form_error('address')?></code>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <a href="<?=base_url();?>dashboard" class="btn btn-sm btn-warning"><i class="ti-close"></i> Cancel</i></a>
                                            <button type="submit" class="btn btn-sm btn-primary" name="save"><i class="ti-save"></i> Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="akun" role="tabpanel" aria-labelledby="profile-tab3">
                            <div class="card-body">
                                <div class="card-description col-sm-4">
                                    <p>Setting Account</p>
                                </div>
                                <form autocomplete="off" class="form-horizontal" action="<?php echo base_url().'profile/changePassword'?>" enctype="multipart/form-data" method="post">
                                    <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Email</label>
                                        <div class="col-sm-8">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="email" value="<?=$formdata['email']?>" name="email" placeholder="Alamat Email" aria-label="Email" aria-describedby="addon1">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="addon1">
                                                        <i class="ti-user"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <code><?=form_error('email')?></code>
                                            <p class="text-muted" style="display:none" id="emails"><?=$formdata['email']?></p>
                                        </div>
                                    </div>

                                    <div class="form-check form-check-primary">
                                        <label class="form-check-label">
                                        <input id="myCheck" type="checkbox" class="form-check-input showpass">
                                            Klik Untuk Ganti Password
                                        </label>
                                    </div>

                                    <div class="form-group" id="shown" style="display:none">
                                    <label for="" class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">
                                                        <i class="ti-eye" id="show" style="cursor: pointer"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <code><?=form_error('nip')?></code>
                                        </div>
                                    </div>
                              
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">&nbsp;</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <a href="<?=base_url();?>dashboard" class="btn btn-sm btn-warning"><i class="ti-close"></i> Cancel</i></a>
                                            
                                            <button type="submit" class="btn btn-sm btn-primary" name="saveAccount"><i class="ti-save"></i> Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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

    //password
    $('#show').on('click', function(){
        var myClass = $(this).attr("class");
        if (myClass == 'ti-eye') {
            $('#show').removeClass('ti-eye').addClass('ti-na');
            $('#password').attr('type', 'text');
        }
        else {
            $('#show').removeClass('ti-na').addClass('ti-eye');
            $('#password').attr('type', 'password');
        }
    });

    $('.showpass').on('click', function(){
        var checkBox = document.getElementById("myCheck");
        var pass = document.getElementById("shown");
        var email = document.getElementById("email");
        if (checkBox.checked == true) {
            pass.style.display ="block";
            email.style.display ="none";
            emails.style.display = "block";
            addon1.style.display = "none";
            
        }else{
            pass.style.display ="none";
            email.style.display ="block";   
        }
    });
</script>