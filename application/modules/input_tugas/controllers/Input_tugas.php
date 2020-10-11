<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_tugas extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_login();
        $this->load->model('tugas_model');
        $this->id = $this->session->userdata('user_id');
    }

    public function index()
    {
        
        $data = configs('Input Tugas');
        $data['skpdata'] = $this->tugas_model->getSkpByUser($this->id);
        $this->template->load('main', 'tugas_form', $data);
    }

    public function cari()
    {
        $skp_id=$_GET['skp_id'];
        $cari =$this->tugas_model->cari($skp_id)->result();
        echo json_encode($cari);
    }

    public function saveTugas()
    {
        if( isset($_POST['save']))
        {
            $validation = $this->tugas_model->validation_rules_skp();
            $this->form_validation->set_rules( $validation );
            $this->form_validation->set_message('required', '{field} wajib diisi');
            $this->form_validation->set_message('alpha', '{field} wajib diisi');
            if( $this->form_validation->run() === FALSE) {
                $this->index();
            }else{
                $postdata = $this->input->post();

                $saved['skp_id'] = $postdata['skp_id'];
                $saved['user_id'] = $this->id;
                $saved['tanggal'] = $postdata['tanggal'];
                $saved['waktu_mulai'] = $postdata['start_time'];
                $saved['waktu_selesai'] = $postdata['end_time'];
                $saved['output'] = $postdata['output'];
                $saved['create_at'] = date('Y-m-d H:i:s');

                if( !empty($_FILES['files']['tmp_name'])){
                    $folder = formatFolderUser($saved['user_id']);
                    $destination = FCPATH . 'assets/media/' .$folder. '/file_task/';

                    if(!is_dir($destination)) {
                        mkdir($destination, 0777, TRUE);
                    }

                    $config['file_name']        = "Tugas_jabatan_file-".$_FILES['files']['name'];
                    $config['upload_path']      = $destination;
                    $config['allowed_types']    = 'docx|doc|xls|ppt|jpg|jpeg|png|zip|rar';
                    $this->load->library('upload', $config);

                    if($this->upload->do_upload('files'))
                    {
                        $uploaded = $this->upload->data();
                        $saved['file'] = $uploaded['file_name'];
                    }

                }else{
                    $saved['file'] = 'no-file';
                }

                if( $this->tugas_model->insertTugas($saved) ){
                    $get_realisasi = $this->tugas_model->cari($saved['skp_id'])->row_array();
                    $data['realisasi'] = $get_realisasi['realisasi']+$postdata['output'];
                    $skp_id = $saved['skp_id'];
                    $this->tugas_model->updateSkp($data, $skp_id);

                    $this->session->set_flashdata('message2', 'Tugas berhasil tersimpan');
				    redirect('input_tugas');
                }else{
                    $this->session->set_flashdata('message', 'Error, please try again');
				    redirect('input_tugas');
                }
            }
        }else{
            $this->session->set_flashdata('message', 'Error, please try again');
            redirect('input_tugas');
        }
    }

    public function tambahan()
    {
        $data = configs('Input Tugas'); 
        $params = date('Y');
        $get_tahun = $this->tugas_model->get_periode($params)->row();
        $data['id_tahun'] = $get_tahun->id_tahun;
        $data['satuan'] = array('Pilih satuan','lembar' => 'Lembar', 'dokumen' => 'Dokumen', 'laporan' => 'Laporan', 'kegiatan' => 'Kegiatan');
        $this->template->load('main', 'tugas_tambahan_form', $data);
    }

    public function saveTambahan()
    {
        if( isset($_POST['save']))
        {
            $validation = $this->tugas_model->validation_rules_tambahan();
            $this->form_validation->set_rules( $validation );
            $this->form_validation->set_message('required', '{field} wajib diisi');
            $this->form_validation->set_message('alpha', '{field} wajib diisi');
            $this->form_validation->set_rules($validation);
            if( $this->form_validation->run() === FALSE) {
                $this->tambahan();
            }else{
                $postdata = $this->input->post();
                $saved['user_id'] = $this->id;
                $saved['kegiatan'] = $postdata['kegiatan'];
                $saved['waktu_mulai'] = $postdata['start_time'];
                $saved['waktu_selesai'] = $postdata['end_time'];
                $saved['pemberi_tugas'] = $postdata['pemberi_tugas'];
                $saved['tanggal'] = $postdata['tanggal'];
                $saved['output'] = $postdata['output'];
                $saved['satuan'] = $postdata['satuan'];
                $saved['id_tahun'] = $postdata['id_tahun'];
                $saved['create_at'] = date('Y-m-d H:i:s');

                if(!empty($_FILES['files']['tmp_name'])) {
                    $folder = formatFolderUser($saved['user_id']);
                    $destination = FCPATH . 'assets/media/' .$folder. '/file_task/';

                    if(!is_dir($destination)) {
                        mkdir($destination, 0777, TRUE);
                    }

                    $config['file_name']        = "Tugas_tambahan-".$_FILES['files']['name'];
                    $config['upload_path']      = $destination;
                    $config['allowed_types']    = 'docx|doc|xls|ppt|jpg|jpeg|png|zip|rar';
                    $this->load->library('upload', $config);

                    if($this->upload->do_upload('files'))
                    {
                        $uploaded = $this->upload->data();
                        $saved['file'] = $uploaded['file_name'];
                    }                
                }else{
                    $saved['file'] = 'no-file';
                }
                if( $this->tugas_model->insertTambahan($saved)){
                    $this->session->set_flashdata('message2', 'Tugas berhasil tersimpan');
                    redirect('input_tugas/tambahan');
                }else{
                    $this->session->set_flashdata('message', 'Error, please try again');
                    redirect('input_tugas/tambahan');
                }
            }
        }else{
            $this->session->set_flashdata('message', 'Error, please try again');
            redirect('input_tugas/tambahan');
        }
    }
}

/** Copyright Dwi Nuryadi @ files.yadi@gmail.com */