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
                    Manajemen Kelola Pengguna
                </p>
            </div>
            <div class="card-body">
                <div class="card-title">
                    <a href="<?php echo base_url('users/create')?>" class="btn btn-success btn-sm"><i class="ti-plus"></i> Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-striped datatable">
                        <thead>
                            <tr>
                                <th class="w-1">No.</th>
                                <th>Photo</th>
                                <th>Display Name</th>
                                <th>Role</th>
                                <th>Email</th>     
                                <th>NIP</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php 
                        $i = 1;
                        foreach($users as $user) : ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td>
                                <?php if($user->images != 'user.png') { ?>  
                                    <img class="rounded-circle" width="40" height="40" src="<?php echo base_url("assets/media/" . formatFolderUser($user->user_id)."/profile/".$user->images);?>">
                                <?php } else { ?>
                                    <img class="rounded-circle" width="40" height="40" src="<?php echo base_url().'assets/demo/brand/user.png';?>">
                                <?php } ?>
                                </td>

                                <td><?=$user->full_name?></td>
                                <td><?=$user->role_name?></td>
                                <td><?=$user->email?></td>
                                <td><?=$user->nip?></td>

                                <td style="vertical-align:middle">
                                <?php if ($user->user_id !== '1') { ?>
                                    <?php if($user->banned == 0) { ?>
                                        <a href="<?=base_url();?>users/banned/1/<?=$user->user_id;?>" class="btn btn-success btn-sm tombol-konfirmasi"  data-toggle="tooltip" title="Non-aktifkan?">Aktif</a>
                                    <?php } else { ?>
                                        <a href="<?=base_url();?>users/banned/0/<?=$user->user_id;?>" class="btn btn-danger btn-sm tombol-konfirmasi" data-toggle="tooltip" title="Aktifkan?" >Non Aktif</a>
                                    <?php }?>
                                <?php } ?>
                                </td>
                                <td style="vertical-align:middle">
                                <?php if ($user->user_id !== '1') { ?>
                                    <a class="btn btn-warning btn-sm tombol-konfirmasi" data-konfirmasi="Akan mereset password akun ini?" href="<?php echo base_url().'users/reset_pass/'.$user->user_id;?>"  data-toggle="tooltip" title="Reset Password"><span class="ti-reload"></span></a>&nbsp;
                                    
                                    <a href="<?php echo base_url().'users/create/'.$user->user_id;?>" class="btn btn-primary mr-1 btn-sm" data-toggle="tooltip" data-html="true" title="Edit"><span class="ti-pencil-alt"></span></a>
                                    <a href="<?php echo base_url('users/delete/').$user->user_id ?>" class="btn btn-danger btn-sm tombol-hapus" data-toggles="tooltip" title="Hapus"><span class="ti-trash"></span></a>
                                <?php } ?>
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

<div class="modal fade" id="ModalResetPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Reset Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
          <!--modal body-->
          <div class="modal-body">
            <table>
                <tr>
                    <th style="width:120px;">Username</th>
                    <th>:</th>
                    <th><?php echo $this->session->flashdata('uname');?></th>
                </tr>
                <tr>
                    <th style="width:120px;">Password Baru</th>
                    <th>:</th>
                    <th><?php echo $this->session->flashdata('upass');?></th>
                </tr>
            </table>
          </div>
          <!-- end modal body-->
          <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<script>
    <?php if($this->session->flashdata('message3') === 'show-modal') :?>
        $('#ModalResetPassword').modal('show');
    <?php endif; ?>
</script>