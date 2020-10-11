<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Capaian_kerja extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('capaian_model');
    }

    public function index()
    {
        $data = configs('Capaian Kinerja Pegawai');
        $getStaff = $this->capaian_model->getStaff()->result();
        $data['staffs'] = $getStaff;
        $this->template->load('main', 'capaian_list', $data);
    }

    public function detail($user_id)
    {
        $data = configs('Detail Capaian Kinerja Pegawai');
        $thn = date('Y');
        $getTahun = $this->db->get_where('tb_tahun', array('tahun' => $thn))->row();
        $tahun = $getTahun->id_tahun;

        $skp = $this->capaian_model->getSKPbyId($user_id,$getTahun->id_tahun);
        $task = $this->capaian_model->getTugas($user_id, $getTahun->id_tahun)->result();
        
        
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
        $this->template->load('main', 'capaian_detail', $data);
    }

    public function process()
    {
        #hitung nilai skp
        $postdata = $this->input->post();

        $data = array_sum($postdata['nilai_skp']);
        $total = count($postdata['nilai_skp']);
        #total tugas tambahan
        $tugas_tambahan = $postdata['jml_task'];
        #total nilai skp
        $hsl_skp = $data/$total;
        #nilai capaian kerja
         $nilai_capaian_kerja = round($hsl_skp,2)+$tugas_tambahan;

        $thn = date('Y');
        $getTahun = $this->db->get_where('tb_tahun', array('tahun' => $thn))->row();
        $tahun = $getTahun->id_tahun;
        
        $getNilaiPerilaku = $this->capaian_model->getNilaiPerilaku($postdata['user_id'])->row();
        $nilai_perilaku = $getNilaiPerilaku->nilai_perilaku;
        $nilai_capaian_hsl = ($nilai_capaian_kerja*60)/100;
        $nilai_perilaku_hsl = ($nilai_perilaku*40)/100;
        $nilai_prestasi_kerja = $nilai_capaian_hsl+$nilai_perilaku_hsl;
        
        #insert to tb prestasi
        if(! $this->capaian_model->isDuplicatePrestasi($postdata['user_id'],$tahun)){
            $this->session->set_flashdata('message', 'Failed! please try again');
            redirect('capaian_kerja/detail/'.$postdata['user_id']);
        }else {
            $prestasi['user_id'] = $postdata['user_id'];
            $prestasi['id_tahun'] = $tahun;
            $prestasi['create_at'] = date('Y-m-d H:i:s');
            $prestasi['nilai_capaian'] = round($nilai_capaian_hsl,2);
            $prestasi['nilai_perilaku'] = round($nilai_perilaku_hsl,2);
            $prestasi['nilai_prestasi_kerja'] = round($nilai_prestasi_kerja,2);
            $prestasi['keterangan'] = cek_nilai(round($nilai_prestasi_kerja,2));
            $this->capaian_model->insertNilaiPrestasi($prestasi);
        }

        #insert to tb nilai capaian
        if(! $this->capaian_model->isDuplicate($postdata['user_id'],$tahun)){
            $this->session->set_flashdata('message', 'Failed! please try again');
            redirect('capaian_kerja/detail/'.$postdata['user_id']);
        }else {
            $saved['user_id'] = $postdata['user_id'];
            $saved['id_tahun'] = $tahun;
            $saved['create_at'] = date('Y-m-d H:i:s');
            $saved['nilai_skp'] = round($hsl_skp,2);
            $saved['nilai_tugas_tambahan'] = $tugas_tambahan;
            $saved['nilai_capaian_kerja'] = round($nilai_capaian_kerja,2);
            $id_capaian = $this->capaian_model->insertNilai($saved);
            if($id_capaian){
                $this->session->set_flashdata('message2', 'Nilai Berhasil di input');
                redirect('capaian_kerja/detail/'.$postdata['user_id']);
            }else{
                $this->session->set_flashdata('message', 'Failed! please try again');
                redirect('capaian_kerja/detail/'.$postdata['user_id']);
            }
        }

    }

    public function reset_nilai($user_id)
    {
        $thn = date('Y');
        $getTahun = $this->db->get_where('tb_tahun', array('tahun' => $thn))->row();
        $tahun = $getTahun->id_tahun;
        $this->capaian_model->destroy_capaian($user_id, $tahun);
        $this->capaian_model->destroy_prestasi($user_id, $tahun);
        $this->session->set_flashdata('message2', 'Data Niali Berhasil di reset');
        redirect('capaian_kerja/detail/'.$user_id);
    }
}