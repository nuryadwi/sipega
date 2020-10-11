<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_prestasi extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->id = $this->session->userdata('user_id');
        $this->load->model('pegawai_prestasi_model','prestasi_model');
    }

    public function index()
    {
        $data = configs('Prestasi Pegawai');
        $user_id = $this->id;
        $thn = date('Y');
        $getTahun = $this->db->get_where('tb_tahun', array('tahun' => $thn))->row();
        $tahun = $getTahun->id_tahun;

        $getNilaiCapaian = $this->prestasi_model->getNilaiCapaian($user_id,$tahun);
        $getNilaiPerilaku = $this->prestasi_model->getNilaiPerilaku($user_id,$tahun);
        $getNilaiPrestasi = $this->prestasi_model->getNilaiPrestasi($user_id,$tahun);

        $data['nilai_capaian'] = $getNilaiCapaian;
        $data['nilai_perilaku'] = $getNilaiPerilaku;
        $data['nilai_prestasi'] = $getNilaiPrestasi;
        $this->template->load('main','pegawai_prestasi_list', $data);
    }

}