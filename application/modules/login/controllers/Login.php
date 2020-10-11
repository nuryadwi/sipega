<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
    }
    
    public function index()
    {
        $data['title'] = "Login Page";
        $this->template->load('login', 'login_form', $data);
    }

    public function auth()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $result = $this->auth_model->auth($email);
        $data['result'] = json_decode(json_encode($result), true);

        if ( $data['result']['status'] == 1)
        {
            $hashed = $data['result']['data'][0]['password'];
            
            if (password_verify($password, $hashed))
            {
                $this->db->where("email = '$email' && active = 1 && banned = 0 && deleted = 0 ");
                $this->db->join('tb_roles', 'tb_users.role_id=tb_roles.role_id');
                $users = $this->db->get('tb_users')->row_array();
                $this->auth_model->updateLastlogin($users['user_id']);
                $this->session->set_userdata($users);
                redirect('dashboard','refresh');
            }
            else
            {
                $data['message2'] = "Incorrect email/password combination</div>";
                $this->session->set_flashdata('message2', $data);
                redirect('login','refresh');
            }
        }
        else
	  	{
	  		$data['message2'] = "Incorrect email/password combination</div>";
			$this->session->set_flashdata('message2', $data);
			redirect('login','refresh');
	  	}	
    }

    public function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}


}