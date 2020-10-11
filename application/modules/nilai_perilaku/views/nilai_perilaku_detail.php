<div class="col-lg-12">
    <div class="flash-success" data-flashdata="<?= $this->session->flashdata('message2'); ?>"></div>
    <div class="flash-failed" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?=$c_judul;?></h4>
                
                <?php if(!$nilai_perilaku){ ?>
                <p class="card-description">
                    Form Penilaian Perilaku Pegawai
                </p>
                <?php }else{ ?>
                    
                <?php } ?>
                
            </div>
            <div class="card-body">
                
                <?php 
                    if(empty($nilai_perilaku)){
                        $this->view('nilai_perilaku/form');
                    }else{
                        $this->view('nilai_perilaku/list');
                    }
                ?>
            </div>
        </div>
    </div>
</div>