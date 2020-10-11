<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_perilaku extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('np_model');
    }

    //strip_tags($var, '<p>')
    public function index()
    {
        $data = configs('Penilaian Perilaku');
        $getStaff = $this->np_model->getStaff()->result();
        $data['staffs'] = $getStaff;
        $this->template->load('main','nilai_perilaku_list',$data);
    }

    public function detail($user_id)
    {
        $data = configs('Detail Penilaian Perilaku'); 
        $getNilai = $this->np_model->getNilai($user_id)->result();
        $thn = date('Y');
        $getTahun = $this->np_model->getTahun($thn)->row();
        
        $data['user_id'] = $user_id;
        $data['nilai_perilaku'] = $getNilai;
        $data['tahun'] = $getTahun->id_tahun;
        $this->template->load('main','nilai_perilaku_detail',$data);
    }

    public function saving()
    {
        if(isset($_POST['save']))
        {
            $validation = $this->np_model->validation_rules();
            $postdata = $this->input->post();
            $user_id = $postdata['user_id'];
            
            $this->form_validation->set_rules( $validation );
            $this->form_validation->set_message('required', '{field} wajib diisi');
            if($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('message', 'Error, please try again!');
                $this->detail($user_id);
            }else{
                $saved['pelayanan'] = $postdata['pelayanan'];
                $saved['integritas'] = $postdata['integritas'];
                $saved['komitmen'] = $postdata['komitmen'];
                $saved['disiplin'] = $postdata['disiplin'];
                $saved['kerjasama'] = $postdata['kerjasama'];
                $saved['kepemimpinan'] = $postdata['kepemimpinan'];
                $jumlah = array_sum($saved);
                if(empty($postdata['kepemimpinan'])){
                    $nilai_rerata = $jumlah/5;
                }else{
                    $nilai_rerata = $jumlah/6;
                }
                if(!$nilai_rerata){
                    return false;
                }
                $saved['jumlah'] = $jumlah;
                $saved['nilai_perilaku'] = $nilai_rerata;
                $saved['user_id'] = $user_id;
                $saved['id_tahun'] = $postdata['id_tahun'];
                $saved['create_at'] = date('Y-m-d');
                $id_nilai = $this->np_model->insertNilaiPerilaku($saved);
                if($id_nilai){
                    $this->session->set_flashdata('message2', 'Menu has been saved to database!');
                    redirect('nilai_perilaku');
                }else{
                    $this->session->set_flashdata('message', 'Error,Please try again!');
                    $this->detail($user_id);
                }
            }
        }
    }
}