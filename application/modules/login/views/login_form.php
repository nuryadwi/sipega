<div class="content-wrapper d-flex align-items-center auth px-0">
    <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <div class="row">
                <div class="col-lg-3">
                    <img alt="logo" class="profile-widget-picture rounded-circle" width="80px"  height="80px"src="<?php echo base_url('assets/demo/brand/logo-instansi.png');?>">
                </div>
                <div class="col-lg-9">
                <h4>Sistem Penilaian Tugas Kerja Pegawai</h4>
                <small class="text-muted font-weight-light"><i class="ti-flickr-alt"></i> Log in to start your session</small>
                </div>
            </div>

            <?=$this->session->flashdata('message2')?'<div class="alert alert-danger" role="alert"><strong>Failed : </strong>'.$this->session->flashdata('message2')['message2']:''?>
            <form class="pt-3" action="<?php echo base_url('login/auth') ?>" class="card" method="post">
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="email" placeholder="Alamat Email" aria-label="Email" aria-describedby="addon1">
                    <div class="input-group-append">
                        <span class="input-group-text" id="addon1">
                            <i class="ti-user"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">
                            <i class="ti-eye" id="show" style="cursor: pointer"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" name="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"><i class="ti-shift-right"></i>&nbsp; SIGN IN</button>
            </div>
            <div class="my-2 d-flex justify-content-between align-items-center">
                <div class="form-check">
                <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input">
                    Keep me signed in
                </label>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
</div>

<script>
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
</script>