<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="<?php echo site_url('dashboard');?>"><h3>SIPEGA</h3></a>
        <a class="navbar-brand brand-logo-mini" href="<?php echo site_url('dashboard');?>"><h3>SIP</h3></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="ti-view-list"></span>
    </button>
    
    <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" href="#">
              <span class="ti-face-smile mx-0"> <?php echo $this->session->userdata('role_name')?></span>
            </a>
        </li>
        <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <?php if($this->session->userdata('images') != 'user.png') : ?>
                <img src="<?php echo base_url("assets/media/" . formatFolderUser($this->session->userdata('user_id'))."/profile/".$this->session->userdata('images'));?>" alt="profile"/>
            <?php else : ?>
                <img src="<?php echo base_url('assets/demo/brand/user.png')?>" alt="profile"/>
            <?php endif ?>
            
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a href="<?php echo site_url('profile');?>" class="dropdown-item">
            <i class="ti-user text-primary"></i>
            Profile
            </a>
            <?php if($this->session->userdata['role_id'] === '1') { ?>
                <a class="dropdown-item" href="<?php echo site_url('settings');?>">
                <i class="ti-settings text-primary"></i>
                Settings
                </a>
            <div class="dropdown-divider"></div>
            <?php }?>

            <a  href="<?php echo site_url('login/logout');?>" class="dropdown-item">
            <i class="ti-power-off text-primary"></i>
            Logout
            </a>
        </div>
        </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="ti-view-list"></span>
    </button>
    </div>
</nav>