<div class="col-lg-12">
    <div class="flash-success" data-flashdata="<?= $this->session->flashdata('message2'); ?>"></div>
    <div class="flash-failed" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?=$c_judul .' '.$roles->role_name;?> </h4>
                <p class="card-description">
                    Manajemen Pemberian Hak akses pada setiap role
                    
                </p>
                
            </div>
            <div class="card-body">
            <a href="<?php echo base_url('userlevel') ?>" class="btn btn-success btn-sm">Selesai</a>
                <div class="table-responsive pt-3">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th width="2%">No</th>
                                <th width="20%">Nama Menu</th>
                                <th style="text-align:left" width="10%">Beri Hak Akses</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            $i=1;
                            $role_id = $this->uri->segment(3);
                            foreach ($menu as $m) {
                                echo "<tr>
                                        <td>$i</td>
                                        <td>$m->title</td>
                                        <td>
                                        <p class='form-check'>
                                            <label class='form-check-label'>
                                            <input class='form-check-input' type='checkbox' ".  checked_akses($role_id, $m->menu_id)." onClick='kasi_akses($m->menu_id,$role_id)'>
                                            </label>
                                        </p>
                                        </td>
                                    </tr>";
                                    $i++;
                                }                           
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function kasi_akses(menu_id, role_id){  
            var menu_id = menu_id;
            var level = role_id;
            $.ajax({
              url:"<?php echo base_url()?>userlevel/kasi_akses_ajax",
              data:"menu_id=" + menu_id + "&level="+ level ,
              success: function(html)
              { 
                alertSuccess('data has changes!!!');
              }
          });
    }

    function alertSuccess(message, title){
        var t = (title == '')? ' Success':title;
        Swal.fire({
        type: 'success',
        title: t,
        html: message,
        //html:true
        });
    }
</script>