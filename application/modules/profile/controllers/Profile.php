<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

    public function __construct()
	{
		parent::__construct();
        is_login();
        $this->load->model('profile_model');
        $this->user_id = $this->session->userdata('user_id');
    }
        
    public function index()
    {
        $formdata = array();
        $user_id = $this->session->userdata('user_id');
        if( $user_id )
        {
            $params = (int)$user_id;
            $getUsers = $this->profile_model->getUserById($params);
            
            if ($getUsers->num_rows() > 0 )
            {
                $profile = $getUsers->row_array();
                $formdata['jabatan'] = $profile['jabatan_name']." ".$profile['departemen_name'];
                $formdata['last_login'] = $profile['last_login'];
                $formdata['create_at'] = $profile['create_at'];
                $formdata['status'] = $profile['active'];

                $formdata['user_id'] = $profile['user_id'];
                $formdata['nip'] = $profile['nip'];
                $formdata['nik'] = $profile['nik'];
                $formdata['full_name'] = $profile['full_name'];
                $formdata['born_date'] = $profile['born_date'];
                $formdata['email'] = $profile['email'];
                $formdata['phone'] = $profile['phone'];
                $formdata['gender'] = $profile['gender'];
                $formdata['address'] = $profile['address'];
                $formdata['fotoprofil'] = $profile['images'];

            }else{
                $this->session->set_flashdata('message', 'invalid id not found');
				redirect('block');
            }
        }else{
            $this->session->set_flashdata('message', 'invalid id not found');
			redirect('block');
        }
        $folder = formatFolderUser($this->user_id);
        $destination = base_url('assets/media/' .$folder. '/profile/');
       
        $data = configs('Profile');
        $data['formdata'] = $formdata;
        $data['url'] = $destination;
        $data['gender'] = array('Pilih Jenis Kelamin','L' => 'Laki-laki', 'P' => 'Perempuan');
        $this->template->load('main','profile_form', $data);
    }

    public function updateProfile()
    {
        if( isset($_POST['save']))
        {
            $validation = $this->profile_model->validation_rules();
            $this->form_validation->set_rules($validation);
            if($this->form_validation->run() === FALSE)
            {
                $this->index();
            }
            $postdata = $this->input->post();
            $name = $postdata['full_name'];
            $explode = explode(" ",$name);
            $display_name = $explode[0];
            $profile['nip'] = $postdata['nip'];
            $profile['nik'] = $postdata['nik'];
            $profile['full_name'] = $postdata['full_name'];
            $profile['display_name'] = $display_name;
            $profile['born_date'] =$postdata['born_date'];
            $profile['phone'] = $postdata['phone'];
            $profile['gender'] = $postdata['gender'];
            $profile['address'] = $postdata['address'];

            if( !empty($_FILES['fotoprofil']['tmp_name']))
            {
                $folder = formatFolderUser($this->user_id);
                $destination = FCPATH . 'assets/media/' .$folder. '/profile/';
                $curExtension = end(explode(".", $_FILES['fotoprofil']['name']));
                
                if(!is_dir($destination)) {
                    mkdir($destination, 0777, TRUE);
                }
                $config['file_name']            = "profile_".strtolower($display_name).".".$curExtension;
                $config['upload_path']          = $destination;
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $this->load->library('upload', $config);

                if($this->upload->do_upload('fotoprofil'))
                {
                    $uploaded = $this->upload->data();
                    $profile['images'] = $uploaded['file_name'];
                }
            }else{
                $profile['images'] = $postdata['old_images'];
            }

            if( $this->profile_model->updateProfile($postdata['user_id'],$profile)){
                $this->session->set_flashdata('message2', 'profile berhasil di update');
				redirect('profile');
            }else{
                $this->session->set_flashdata('message', 'Error, please try again');
				redirect('profile');
            }
        }
    }

    public function changePassword()
    {
        $this->form_validation->set_rules('email', 'Email tidak valid', 'trim|required|valid_email');
		$this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('message','error');
            redirect('profile');
        }else{
            $user_id = $this->user_id;
            $email = $this->input->post('email');
            $checkbox = $this->input->post('checkbox');
            $password = $this->input->post('password', TRUE);

            $options = array("cost" => 4);
            $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
            if (!empty($this->input->post('password'))) {
                $data = array(
                    'email'     => $email,
                    'password'  => $hashPassword,
                );
            }else{
                $data = array(
                    'email'     => $email, 
                );
            }
            $this->profile_model->updatePass($data, $user_id);

            if (!empty($password)) {
                $this->session->set_flashdata('message2', 'Password Anda berhasil di ganti. Silahkan logout terlebih dahulu kemudian login dengan password baru anda');
            }elseif (empty($password) && !empty($checkbox)){
                $this->session->set_flashdata('message', 'Password tidak boleh kosong');
            }else{
                $this->session->set_flashdata('message2', 'Email untuk login akun Anda berhasil di ganti. Silahkan logout terlebih dahulu kemudian login dengan email baru anda');
            }
            redirect(site_url('profile'));  
        }
    }
}