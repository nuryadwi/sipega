<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_capaian extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        is_login();
        $this->id = $this->session->userdata('user_id');
        $this->load->model('pegawai_capaian_model', 'capaian_model');
    }

    public function index()
    {
        $data = configs('Nilai Capaian SKP');
        $user_id = $this->id;
        $thn = date('Y');
        $getTahun = $this->db->get_where('tb_tahun', array('tahun' => $thn))->row();
        $tahun = $getTahun->id_tahun;

        $skp = $this->capaian_model->getSKPbyId($user_id, $getTahun->id_tahun);
        
        $task = $this->capaian_model->getTugas($user_id, $getTahun->id_tahun)->result();

        $getTahun = $this->db->get_where('tb_tahun', array('tahun' => $thn))->row();
        $tahun = $getTahun->id_tahun;

        #get nilai capaian
        $getNilai = $this->db->get_where('tb_nilai_capaian', array('user_id'=> $user_id, 'id_tahun'=> $tahun))->row();
        if(!$getNilai){
            $nilai_capaian = '00.00';
        }else {
            $nilai_capaian = $getNilai->nilai_capaian_kerja;
        }

        $data['skp'] = $skp;
        $data['task'] = $task;
        $data['user_id'] = $user_id;
        $data['nilai_capaian'] = $nilai_capaian;
        $data['jml_task'] = count($task);
        $data['periode'] = format_date($getTahun->periode_start).' s/d '.format_date($getTahun->periode_end);

        $this->template->load('main', 'pegawai_capaian_list', $data);
    }

}