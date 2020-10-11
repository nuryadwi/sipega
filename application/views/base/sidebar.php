<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('dashboard');?>">
            <i class="ti-home menu-icon"></i>
            <span class="menu-title">Dashboard</span>
        </a>
        </li>
        <?php
            $setting = $this->db->get_where('tb_setting', array('setting_id' => 1))->row_array();
            if ( $setting['value'] == 1 ) {
                $role_id = $this->session->userdata('role_id');
                $sql_menu = "SELECT *
                        FROM tb_menu
                        WHERE menu_id in(SELECT menu_id FROM tb_role_permission WHERE role_id = $role_id) AND is_main_menu = 0 AND is_active =1";
            }
            else{
                $sql_menu = "SELECT * FROM tb_menu WHERE is_active = 1 AND is_main_menu = 0";
            }
            $main_menu = $this->db->query($sql_menu)->result();
            foreach ( $main_menu as $menu ) {
                $this->db->where('is_main_menu', $menu->menu_id);
                $this->db->where('is_active', 1);
                $submenu = $this->db->get('tb_menu');

                if( $submenu->num_rows() > 0){
                    #show menu
                    echo "<li class='nav-item'>
                            <a class='nav-link' data-toggle='collapse' href='#$menu->icon' aria-expanded='false' aria-controls='ui-basic'>
                                <i class='$menu->icon menu-icon'></i>
                                <span class='menu-title'>".$menu->title."</span>
                                <i class='menu-arrow'></i>
                            </a>
                            <div class='collapse' id='$menu->icon'>";
                            foreach ($submenu->result() as $sub) {
                                echo "<ul class='nav flex-column sub-menu'>
                                        <li class='nav-item'> <a class='nav-link' href='".base_url($sub->url)."'>".$sub->title."</a></li>
                                    </ul>";
                            }
                    echo "</div>
                        </li>";
                }else{
                    echo "<li class='nav-item'>
                            <a class='nav-link' href='".base_url($menu->url)."'>
                            <i class='$menu->icon menu-icon'></i>
                            <span class='menu-title'>".$menu->title."</span>
                        </a>
                    </li>";
                }
            }
        ?>
    </ul>
</nav>