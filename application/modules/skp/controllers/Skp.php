<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skp extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_login();
        $this->load->model('skp_model');
        $this->id = $this->session->userdata('user_id');
    }

    public function index()
    {
        $data = configs('Tabel Sasaran Kinerja Pegawai');
        $data['skpdata'] = $this->skp_model->getSkp($this->id);
        $this->template->load('main','skp_list', $data);
    }

    public function create($skp_id = null)
    {
        $formdata = array();
        if($skp_id)
        {
            $params = (int)$skp_id;
            $getskp = $this->skp_model->getSkpById($params);

            if( $getskp->num_rows() > 0)
            {
                $skpdata = $getskp->row_array();
                $formdata['skp_id'] = $skpdata['skp_id'];
                $formdata['kegiatan'] = $skpdata['kegiatan'];
                $formdata['kuantitas'] = $skpdata['kuantitas'];
                $formdata['kualitas'] = $skpdata['kualitas'];
                $formdata['satuan'] = $skpdata['satuan'];
                $formdata['waktu'] = $skpdata['waktu'];
            }else{
                $this->session->set_flashdata('message', 'invalid id not found');
				redirect('skp');
            }
        }else{
            $formdata['skp_id'] = "";
            $formdata['kegiatan'] = "";
            $formdata['kuantitas'] = "";
            $formdata['satuan'] = "";
            $formdata['kualitas'] = "";
            $formdata['waktu'] = "";
        }
        
        $data = configs('Create/Edit data SKP');
        $data['formdata'] = $formdata;
        $data['satuan'] = array('Pilih salah satu','lembar' => 'Lembar', 'dokumen' => 'Dokumen', 'laporan' => 'Laporan');
        $this->template->load('main', 'skp_form', $data);
    }
    
    public function saving()
    {
        if( isset($_POST['save']))
        {
            $validation_config = $this->skp_model->validation_rules();
            $this->form_validation->set_rules( $validation_config );
            $this->form_validation->set_message('required', '{field} wajib diisi');
            $this->form_validation->set_message('alpha', '{field} wajib diisi');
            $postdata = $this->input->post();
            if( $this->form_validation->run() === FALSE) {
                $this->create();
            }else{
                

                $skp_id = $this->skp_model->saving( $postdata );
				if($skp_id){
					$this->session->set_flashdata('message2', 'Successfuly! data has saved to datatabse');
					redirect('skp');
				}else{
					$this->session->set_flashdata('message', 'Failure! data not save');
					redirect('skp/create');
				}
            }
        }
    }

    public function delete($skp_id)
    {
        $this->skp_model->destroy($skp_id);
        $this->session->set_flashdata('message2', 'Data has deleted from database!');
		redirect('skp');
    }
}