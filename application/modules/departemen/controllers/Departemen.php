<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departemen extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_login();
        $this->load->model('departemen_model');
    }

    public function index()
    {
        $data = configs('Data departemen');
        $data['data'] = $this->departemen_model->getData();
        $this->template->load('main', 'departemen_list', $data);
    }

    public function create( $id_departemen =null)
    {
        $formdata = array();
        if($id_departemen)
        {
            $params = (int)$id_departemen;
            $departemen = $this->departemen_model->getDataById($params);

            if( $departemen->num_rows() > 0 )
            {
                $data = $departemen->row_array();
                $formdata['id_departemen'] = $data['id_departemen'];
                $formdata['departemen_name'] = $data['departemen_name'];
            }else{
                $this->session->set_flashdata('message', 'invalid id not found');
				redirect('departemen');
            }
        }else{
            $formdata['id_departemen'] = "";
            $formdata['departemen_name'] = "";
        }

        $data = configs('Create/Edit Departemen');
		$data['formdata'] = $formdata;
		$this->template->load('main','departemen_form', $data);
    }

    public function saving()
    {
        if(isset($_POST['save']))
        {
            $validation = array(
                array(
                    'field' => 'departemen_name',
                    'rules' => 'trim|required',
                    'label' => 'Nama Departemen'
                ),
            );
            $this->form_validation->set_rules( $validation );
            $this->form_validation->set_message('required', '{field} wajib diisi');
            $postdata = $this->input->post();
            if( $this->form_validation->run() === FALSE) {
                $this->create($id_departemen = null);
            }else{
                $id_departemen = $this->departemen_model->saveData( $postdata);
				if($id_departemen){
					$this->session->set_flashdata('message2', 'Successfuly! data has saved to datatabse');
					redirect('departemen');
				}else{
					$this->session->set_flashdata('message', 'Failure! data not save');
					redirect('departemen/create');
				}
            }
        }else{
            $this->session->set_flashdata('message', 'Error, please try again');
            redirect('departemen');
        }
    }

    public function delete($id_departemen)
    {
        if(!empty($id_departemen)) {
            $this->departemen_model->destroy($id_departemen);
            $this->departemen_model->destroy_jabatan($id_departemen);
            $this->session->set_flashdata('message2', 'Data has deleted from database!');
            redirect('departemen');
        }else{
            $this->session->set_flashdata('message', 'Error saving. please try again!');
		    redirect('departemen');
        }
        
    }
    
}