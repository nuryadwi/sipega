<?php

if( !function_exists('configs')) {
    function configs($title,$c_des=null)
    {
        $ci = get_instance();
        $site = $ci->db->get('tb_konfigurasi')->row_array();
        $folder = formatFolderUser($site['id_konfigurasi']); //1
        $destination = base_url('assets/media/' .$folder. '/logo/');
        $data = array(
            'title'         => $site['name_app'].' | '.$title,
            'logo'          => $site['logo'],
            'icon'          => $destination.$site['logo'],
            'email'         => $site['email'],
            'phone'         => $site['phone'],
            'email'         => $site['email'],
            'alamat'        => $site['alamat'],
            'instansi'      => $site['instansi'],
            'pimpinan'      => $site['pimpinan'],
            'sekretaris'    => $site['sekretaris'],
            'metatext'      => $site['metatext'],
            'about'         => $site['about'],
            'site'          => $site,
            'c_judul'       => $title,
            'c_des'         => $c_des,
        );
        return $data;
    }
}

if( !function_exists('dropdown_dinamis') ){
    function dropdown_dinamis($name, $table, $field, $pk, $selected=null)
    {
        $ci = get_instance();
        $cmb = "<select name='$name' class='form-control'>"."<option value='0'>--Silakan Pilih--</option>";
        $data = $ci->db->get($table)->result();
        foreach ($data as $d){
            $cmb .="<option value='".$d->$pk."'";
            $cmb .= $selected==$d->$pk?" selected='selected'":'';
            $cmb .=">".  strtoupper($d->$field)."</option>";
        }
        $cmb .="</select>";
        return $cmb;  
    }
}

if( !function_exists('is_login') ){
    function is_login()
    {
        $ci = get_instance();
        if(!$ci->session->userdata('user_id')){
            redirect('login');
        }else{
        $modul = $ci->uri->segment(1);
        
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->db->get_where('tb_menu', array('url' => $modul))->row_array();
        $menu_id = $menu['menu_id'];

        $hak_akses = $ci->db->get_where('tb_role_permission', array('menu_id' => $menu_id, 'role_id' => $role_id));
        if($hak_akses->num_rows() < 1){
            redirect('block');
            exit;
        }
        
        }
    }
}

if( !function_exists('checked_akses') ){
    function checked_akses($role_id,$menu_id){
        $ci = get_instance();
        $ci->db->where('role_id',$role_id);
        $ci->db->where('menu_id',$menu_id);
        $data = $ci->db->get('tb_role_permission');
        if($data->num_rows()>0){
            return "checked='checked'";
        }
    }
}

if( !function_exists('formatFolderUser') ){
	function formatFolderUser($user_id)
	{
		return substr(md5(md5($user_id)),3,8);
	}
}


if( !function_exists('string_is_aktif')){
    function string_is_aktif($string){
        return $string=='1'?'Tampil':'Tidak Tampil';
    }
}
if( !function_exists('string_changes')){
    function string_changes($string){
        return $string=='1'?'Aktif':'Tidak Aktif';
    }
}

if( !function_exists('format_date')){
    function format_date($tanggal)
    {
        $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $bln = bulan($pecah[1]);
        $tgl = $pecah[2];
        $thn = $pecah[0];
    
        return $tgl.'-'.$bln.'-'.$thn;
    }

}

if( !function_exists('month')){
    function month($tanggal)
    {
        $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $bln = bulan($pecah[1]);
    
        return $bln;
    }
}

if( !function_exists('bulan')){
    function bulan($bln)
    {
        switch ($bln) {
        case 1:
        return "Januari";
        break;
        case 2:
        return "Februari";
        break;
        case 3:
        return "Maret";
        break;
        case 4:
        return "April";
        break;
        case 5:
        return "Mei";
        break;
        case 6:
        return "Juni";
        break;
        case 7:
        return "Juli";
        break;
        case 8:
        return "Agustus";
        break;
        case 9:
        return "September";
        break;
        case 10:
        return "Oktober";
        break;
        case 11:
        return "November";
        break;
        case 12:
        return "Desember";
        break;
        }
    }
}

if( !function_exists('cek_nilai') ){
    function cek_nilai($nilai){

        if($nilai>90){
            return $hasil = 'Amat baik';
        }else if($nilai > 76){
            return $hasil = 'Baik';
        }else if($nilai>61){
            return $hasil = 'Cukup';
        }else if($nilai > 51){
            return $hasil = 'Sedang';
        }else if(($nilai <50)){
            return $hasil = 'Kurang';
        }
        
    }
}