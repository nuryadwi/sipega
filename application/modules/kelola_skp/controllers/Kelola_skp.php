<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_skp extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_login();
        $this->load->model('kelola_skp_model', 'kelola_skp');
        $this->id = $this->session->userdata('user_id');
        date_default_timezone_set('ASIA/JAKARTA');
    }
    
    /** just access for operator */

    public function index()
    {
        $data = configs('Kelola SKP Pegawai');
        $tahun = $this->db->get('tb_tahun')->result();
        if(!empty(($_POST['cari'])))
        {   
            $params = $_POST['id_tahun'];
            $get_skp = $this->kelola_skp->getSKP($params);
            $skp = $get_skp;
        }else{
            $thn = date('Y');
            $periode = $this->kelola_skp->get_periode($thn)->row();
            $params = $periode->id_tahun;
            $get_skp = $this->kelola_skp->getSKP($params);
            $skp = $get_skp;
        }

        $data['skp'] = $skp;
        $data['tahun'] = $tahun;
        $this->template->load('main', 'skp_list', $data);
    }

    public function detail()
    {   
        $id = $this->uri->segment(3);
        $id_tahun = $this->uri->segment(4);
       
        $skp = $this->kelola_skp->getSKPbyId($id,$id_tahun);
        $user = $this->kelola_skp->getUserById($id);

        $data = configs('FORMULIR SASARAN KERJA PEGAWAI NEGERI SIPIL');
        $data['skp'] = $skp;
        $data['userdata'] = $user->row_array();
       
        $this->template->load('main','skp_detail', $data);
    }

    public function nilai_skp()
    {
        $user_id = $this->uri->segment(3);
        $id_tahun = $this->uri->segment(4);
        $user = $this->kelola_skp->getUserById($user_id);
        $skp = $this->kelola_skp->getSKPbyId($user_id,$id_tahun);
        $data = configs('PENILAIAN SASARAN KINERJA PEGAWAI');
        $data['userdata'] = $user->row_array();
        $data['skp'] = $skp;
        $data['user_id'] = $user_id;

        $this->template->load('main','nilai_skp', $data);
    }
    
    public function proses()
    {
        #aspek kuantitas
        $postdata = $this->input->post();

        $aspek_kuantitas = ($postdata['realisasi']/$postdata['kuantitas'])*100;
        #aspek mutu
        $aspek_mutu = ($postdata['kualitas_re']/$postdata['kualitas'])*100;
        
        #hitung tingkat efisiensi waktu
        $efisiensi_waktu = 100-(($postdata['waktu_re']/$postdata['waktu'])*100);
        if($efisiensi_waktu<=24){
            $aspek_waktu = (((1.76*$postdata['waktu'])-$postdata['waktu_re'])/$postdata['waktu'])*100;
        }elseif(empty($postdata['realisasi'])){
            $aspek_waktu = (((1.76*$postdata['waktu'])-$postdata['waktu_re'])/$postdata['waktu'])*0*100;
        }else{
            $aspek_waktu = (76-(((1.76*$postdata['waktu'])-$postdata['waktu_re'])/$postdata['waktu'])*100);
        }
        
        #hitung capaian skp
        $perhitungan = $aspek_kuantitas+$aspek_mutu+$aspek_waktu;
        $nilai_capaian_skp = $perhitungan/3;

        #insert to tb skp
        $data['total_hitung'] = $perhitungan;
        $data['nilai_capaian_skp'] = $nilai_capaian_skp;
        $data['waktu_re'] = $postdata['waktu_re'];
        $data['kualitas_re'] = $postdata['kualitas_re'];
        $this->kelola_skp->update_skp($data, $postdata['skp_id']);
        
        $user_id = $postdata['user_id'];
        $this->session->set_flashdata('message2', 'Nilai Berhasil di input');
        redirect('kelola_skp/nilai_skp/'.$user_id);
    }

    public function delete()
    {
        $skp_id= $this->uri->segment(3);
        $user_id= $this->uri->segment(4);
        $thn= $this->uri->segment(5);
        $data['total_hitung'] = '0';
        $data['nilai_capaian_skp'] = '0';
        $data['waktu_re'] = '0';
        $data['kualitas_re'] = '0';
        $this->kelola_skp->update_skp($data, $skp_id);
        $this->session->set_flashdata('message2', 'Data nilai skp berhasil di reset');
        redirect('kelola_skp/nilai_skp/'.$user_id.'/'.$thn);
    }

    // public function __index()
    // {
    //     $this->input->post('cari');
    //     $this->form_validation->set_rules('bln', 'Bulan', 'required|numeric');
    //     $this->form_validation->set_rules('thn', 'Tahun', 'required|numeric');
        
    //     if( $this->form_validation->run() === TRUE) {
    //         $bln = $this->input->post('bln', TRUE);
    //         $thn = $this->input->post('thn', TRUE);
    //     }else{
    //         $bln = date('m');
    //         $thn = date('Y');
    //     }
    //     $start = $thn.'-'.$bln.'-01';
    //     $end = $thn.'-'.$bln.'-31';
    //     $where = ['ts.tanggal >=' => $start, 'ts.tanggal <=' => $end ];
    //     $skp = $this->kelola_skp->countSKP($where)->result();
    //     $data = configs('SKP Pegawai');
    //     $data['skp'] = $skp;
    //     $data['bln'] = $bln;
    //     $data['thn'] = $thn;
    //     $this->template->load('main', 'skp_list', $data);
    // }

    // public function details()
    // {
    //     $id = $this->uri->segment(3);
    //     $get = base64_decode($id);
    //     $pecah = explode("/", $get);
    //     $user_id = $pecah[0];
    //     $bln = $pecah[1];
    //     $thn = $pecah[2];

    //     $start = $thn.'-'.$bln.'-01';
    //     $end = $thn.'-'.$bln.'-31';
    //     $where = ['ts.create_at >=' => $start, 'ts.create_at <=' => $end, 'ts.user_id' => $user_id ];
    //     $skp = $this->kelola_skp->getAll($where)->result();
    //     $userdata = $this->kelola_skp->getAll($where)->row_array();
    //     $data = configs('FORMULIR SASARAN KERJA PEGAWAI NEGERI SIPIL');
    //     $data['bulan'] = $bln;
    //     $data['thn'] = $thn;
    //     $data['user'] = $userdata;
    //     $data['skp'] = $skp;
    //     $this->template->load('main', 'skp_detail', $data);
    // }
    

    // public function __nilai_skp()
    // {
    //     $id = $this->uri->segment(3);
    //     $get = base64_decode($id);
    //     $pecah = explode("/", $get);
    //     $bln = $pecah[1];
    //     $thn = $pecah[2];
    //     $user_id = $pecah[0];
    //     $start = $thn.'-'.$bln.'-01';
    //     $end = $thn.'-'.$bln.'-31';
    //     $where = ['ts.create_at >=' => $start, 'ts.create_at <=' => $end, 'ts.user_id' => $user_id ];
    //     $skp = $this->kelola_skp->getAll($where)->result();
    //     $userdata = $this->kelola_skp->getAll($where)->row_array();

    //     $data = configs('Penilaian SKP');
    //     $data['bulan'] = bulan($bln);
    //     $data['user'] = $userdata;
    //     $data['skp'] = $skp;
    //     $data['id'] = $id;
      
    //     $this->template->load('main', 'nilai_skp', $data);
    // }

   
}