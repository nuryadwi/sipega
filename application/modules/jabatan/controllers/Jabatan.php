<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_login();
        $this->load->model('jabatan_model');
    }

    public function index()
    {
        $data = configs('Data Jabatan');
        $data['jabatan'] = $this->jabatan_model->getAllJabatan();
        $this->template->load('main','jabatan_list',$data);
    }

    public function create($id_jabatan = null)
    {
        $formdata = array();
        if( $id_jabatan )
        {
            $params = (int)$id_jabatan;
            $jabatan = $this->jabatan_model->getJabatanById($params);

            if ($jabatan->num_rows() > 0 )
            {
                $jabatans = $jabatan->row_array();
                $formdata['id_jabatan'] = $jabatans['id_jabatan'];
                $formdata['jabatan_name'] = $jabatans['jabatan_name'];
                $formdata['id_departemen'] = $jabatans['id_departemen'];
            }else{
                $this->session->set_flashdata('message', 'invalid id not found');
				redirect('jabatan');
            }
        }else{
            $formdata['id_jabatan'] = "";
            $formdata['jabatan_name'] = "";
            $formdata['id_departemen'] = "";
        }
        
        $data = configs('Create/edit jabatan');
		$data['formdata'] = $formdata;
		$this->template->load('main','jabatan_form', $data);
    }

    public function saving()
    {
       if(isset($_POST['save']))
       {
            $validation = array(
                array(
                    'field' => 'jabatan_name',
                    'rules' => 'trim|required',
                    'label' => 'Nama Jabatan'
                ),
            );
            $this->form_validation->set_rules( $validation );
            $this->form_validation->set_message('required', '{field} wajib diisi');
            $postdata = $this->input->post();
            if( $this->form_validation->run() === FALSE) {
                $this->create($id_jabatan = null);
            }else{
                $id_jabatan = $this->jabatan_model->saveJabatan( $postdata);
				if($id_jabatan){
					$this->session->set_flashdata('message2', 'Successfuly! data has saved to datatabse');
					redirect('jabatan');
				}else{
					$this->session->set_flashdata('message', 'Failure! data not save');
					redirect('jabatan/create');
				}
            }
       }else{
        $this->session->set_flashdata('message', 'Error, please try again');
        redirect('jabatan');
       }
    }

    public function delete($id_jabatan)
    {
        if(!empty($id_jabatan)){
            $this->jabatan_model->destroy($id_jabatan);
            $this->session->set_flashdata('message2', 'Data has deleted from database!');
		    redirect('jabatan');
        }else{
            $this->session->set_flashdata('message', 'Error saving. please try again!');
		    redirect('jabatan');
        }
		
    }

}