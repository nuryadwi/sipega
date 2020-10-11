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
                    Tambah User / Edit User
                </p>
                <form autocomplete="off" class="forms-sample" action="<?php echo site_url('users/saving');?>" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="user_id" id='user_id' value="<?=$formdata['user_id']?>">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-6">
                            <?php echo dropdown_dinamis('role_id', 'tb_roles', 'role_name', 'role_id',$formdata['role_id'],'DESC') ?>
                            <code><?=form_error('role_name')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-6">
                            <input type="text" name="nip" value="<?=$formdata['nip']?>" class="form-control" placeholder="NIP Pegawai">
                            <code><?=form_error('nip')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-6">
                            <input type="text" name="fullname" value="<?=$formdata['fullname']?>" class="form-control" placeholder="Nama Pegawai">
                            <code><?=form_error('fullname')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-6">
                            <input type="date" name="born_date" value="<?=$formdata['born_date']?>" class="form-control" placeholder="Tanggal Lahir Pegawai">
                            <code><?=form_error('born_date')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Alamat Email</label>
                        <div class="col-sm-6">
                            <input type="text" name="email" value="<?=$formdata['email']?>" class="form-control" placeholder="Alamat Email Pegawai">
                            <code><?=form_error('email')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="id_jabatan" id="id_jabatan">
                                <option value="">--Please Select--</option>
                                <?php
                                foreach ($jabatan as $j):
                                    ?>
                                    <option <?php echo $formdata['id_jabatan'] == $j->id_jabatan ? 'selected="selected"': ''?> value="<?php echo $j->id_jabatan?>"><?php echo $j->jabatan_name.' '.$j->departemen_name?></option>
                                <?php endforeach; ?>

                            </select>
                            <code><?=form_error('id_jabatan')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-6">
                            <code>Password otomatis sesuai dengan tanggal lahir.<br>contoh "02041999"</code>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="<?=base_url();?>users" class="btn btn-sm btn-warning"><i class="ti-back-left"></i> Back</i></a>
                            
                            <button type="submit" class="btn btn-sm btn-primary" name="save"><i class="ti-save"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
