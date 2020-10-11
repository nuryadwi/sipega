<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_prestasi extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('prestasi_model');
    }

    public function index()
    {
        $data = configs('Penilaian Prestasi Kerja Pegawai');
        $getStaff = $this->prestasi_model->getStaff()->result();
        $data['staffs'] = $getStaff;
        $this->template->load('main', 'prestasi_list', $data);
    }

    public function detail($user_id)
    {
        $data = configs('Detail Penilaian Prestasi');
        $thn = date('Y');
        $getTahun = $this->db->get_where('tb_tahun', array('tahun' => $thn))->row();
        $tahun = $getTahun->id_tahun;
        $getNilaiCapaian = $this->prestasi_model->getNilaiCapaian($user_id,$tahun);
        $getNilaiPerilaku = $this->prestasi_model->getNilaiPerilaku($user_id,$tahun);
        $getNilaiPrestasi = $this->prestasi_model->getNilaiPrestasi($user_id,$tahun);
        $data['nilai_capaian'] = $getNilaiCapaian;
        $data['nilai_perilaku'] = $getNilaiPerilaku;
        $data['nilai_prestasi'] = $getNilaiPrestasi;
        $this->template->load('main', 'prestasi_detail', $data);
    }
}