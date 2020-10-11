<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
        $this->load->helper('date');
		$this->load->model(array('users_model','jabatan/jabatan_model','jabatan_model'));
    }
	
	
	public function index()
	{
		$data = configs('Management User');
		$data['users'] = $this->users_model->getAllUsers()->result();
        $this->template->load('main','user_list', $data);
	}

	public function create( $userId = null )
	{
		$formdata = array();

		if( $userId )
		{
			$params = (int)$userId;
			$user = $this->users_model->getUser( $params );
			
			if($user->num_rows() > 0 )
			{
				$userdata = $user->row_array();

				$formdata['user_id'] = $userdata['user_id'];
				$formdata['role_id'] = $userdata['role_id'];
				$formdata['nip'] = $userdata['nip'];
				$formdata['fullname'] = $userdata['full_name'];
				$formdata['born_date'] = $userdata['born_date'];
				$formdata['email'] = $userdata['email'];
				$formdata['id_jabatan'] = $userdata['id_jabatan'];
				
			}else
			{
				$this->session->set_flashdata('message', 'invalid id not found');
				redirect('users');
			}
		}else
		{
			$formdata['user_id'] = "";
			$formdata['role_id'] = "";
			$formdata['nip'] = "";
			$formdata['fullname'] = "";
			$formdata['born_date'] = "";
			$formdata['email'] = "";
			$formdata['id_jabatan'] = "";
		}
		
		$data = configs('Create/Edit User');
		$data['jabatan'] = $this->jabatan_model->getAllJabatan();
		$data['formdata'] = $formdata;
		$this->template->load('main','user_form', $data);
	}

	public function saving()
	{
		if(isset($_POST['save']))
		{
			$validation_config = array(
				array(
					'field' => 'nip',
					'rules' => 'trim|required|numeric',
					'label' => 'NIP'
				),
				array(
					'field' => 'fullname',
					'rules' => 'trim|required',
					'label' => 'Nama Lengkap',
				),
				array(
					'field' => 'born_date',
					'rules' => 'trim|required',
					'label' => 'Tanggal Lahir',
				),
				array(
					'field' => 'email',
					'rules' => 'trim|required|valid_email',
					'label' => 'Email',
				),
				array(
					'field' => 'id_jabatan',
					'rules' => 'trim|required',
					'label' => 'Jabatan',
				),
			);

			$this->form_validation->set_rules( $validation_config );
            $this->form_validation->set_message('required', '{field} wajib diisi');
            
			$postdata = $this->input->post();
			if($this->form_validation->run() === FALSE) {
                $this->create();
            }else{
				$user_id = $this->users_model->saveUsers( $postdata );
				if($user_id){
					$this->session->set_flashdata('message2', 'Successfuly! data has saved to datatabse');
					redirect('users');
				}else{
					$this->session->set_flashdata('message', 'Failure! data not save');
					redirect('users/create');
				}
			}
		}
	}

	public function banned()
	{
		if(!is_numeric($this->uri->segment(3)) || !is_numeric($this->uri->segment(4)))
		{
			redirect('users');
		}
		$this->users_model->update_banned('tb_users', ['banned' => $this->uri->segment(3)], ['user_id ' => $this->uri->segment(4)]);
		redirect('users');
	}

	public function reset_pass($user_id)
	{
		$users = $this->db->get_where('tb_users', array('user_id' => $user_id))->row_array();
		$user = $users['email'];
		$pass = $users['born_date'];
		$pisah = explode('-', $pass);
		$larik = array($pisah[2], $pisah[1],$pisah[0]);
		$satukan = implode("", $larik);
		$password = $satukan;
		$options = array('cost' => 4);
		$hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
		$data = array(
			'password' => $hashPassword,
		);
		$this->users_model->reset_pass($data, $user_id);
		$this->session->set_flashdata('message2','Username: '.$user.' Password: '.$password.'');
		redirect(site_url('users'));
	}

	public function delete($user_id)
	{
		$deleted['deleted'] = 1;
		$this->users_model->deleted($user_id, $deleted);
		$this->session->set_flashdata('message2','User has been deleted from database');
		redirect(site_url('users'));
	}
}
