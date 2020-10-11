<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {
    
    public function __construct()
	{
		parent::__construct();
        is_login();
        $this->load->model('settings_model');
        $this->user_id = $this->session->userdata('user_id');
    }

    public function index()
    {
        $formdata = array();
        $getConfig = $this->settings_model->get_config();
        $folder = formatFolderUser($this->user_id);
        $destination = base_url('assets/media/' .$folder. '/logo/');

        $data = configs('Setting Application');
        $data['config'] = $getConfig->row_array();
        $data['url'] = $destination;
        $this->template->load('main', 'settings_form', $data);
    }

    public function saving()
    {
        if( isset($_POST['save']))
        {
            $validation = $this->settings_model->validation_rules();
            $this->form_validation->set_rules($validation);
            if($this->form_validation->run() === FALSE)
            {
                $error_message = validation_errors();
                $this->session->set_flashdata('message',$error_message);
                redirect('settings');
            }
            
            $postdata = $this->input->post();
            $settings['name_app']   = $postdata['name_app'];
            $settings['email']      = $postdata['email'];
            $settings['alamat']     = $postdata['alamat'];
            $settings['phone']      = $postdata['phone'];
            $settings['instansi']   = $postdata['instansi'];
            $settings['pimpinan']   = $postdata['pimpinan'];
            $settings['sekretaris'] = $postdata['sekretaris'];
            $settings['about']      = $postdata['about'];

            if( !empty($_FILES['logo']['tmp_name']))
            {
                $folder = formatFolderUser($this->user_id);
                $destination = FCPATH . 'assets/media/' .$folder. '/logo/';
                $curExtension = end(explode(".", $_FILES['logo']['name']));
                
                if(!is_dir($destination)) {
                    mkdir($destination, 0777, TRUE);
                }

                $config['file_name']        = "logo-instansi.".$curExtension;
                $config['upload_path']      = $destination;
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $this->load->library('upload', $config);

                if($this->upload->do_upload('logo'))
                {
                    $uploaded = $this->upload->data();
                    $settings['logo'] = $uploaded['file_name'];
                }
            }else
            {
                $settings['logo'] = $postdata['old_logo'];
            }

            if( $this->settings_model->savingData($postdata['id_konfigurasi'], $settings)){
                $this->session->set_flashdata('message2', 'Data sistem berhasil di update');
				redirect('settings');
            }else{
                $this->session->set_flashdata('message', 'Error, please try again');
				redirect('settings');
            }
        }
    }


}