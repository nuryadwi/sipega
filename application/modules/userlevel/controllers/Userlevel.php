<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userlevel extends MY_Controller {

    function __construct()
    {
        parent::__construct();
            is_login();
            $this->load->model('userlevel_model');
	}

    public function index()
    {
        $data = configs('Level User');
        $data['role'] =  $this->userlevel_model->get_all('tb_roles')->result();
        
        $this->template->load('main','userlevel_list', $data);
    }

    public function userlevel_akses($role_id)
    {
        $params = (int)$role_id;
        $roles = $this->userlevel_model->getRole($params);

        if($roles->num_rows() > 0 )
        {
            $data = configs('Beri Akses');
            $data['roles']= $roles->row();
            $data['menu'] = $this->db->get('tb_menu')->result();
            $this->template->load('main','userlevel_akses', $data);
        }else{
            $this->session->set_flashdata('message', 'invalid id not found');
			redirect('userlevel');
        }
    }

    function kasi_akses_ajax(){
        $menu_id        = $_GET['menu_id'];
        $role_id  = $_GET['level'];
        // chek data
        $params = array('menu_id'=>$menu_id,'role_id'=>$role_id);
        $akses = $this->db->get_where('tb_role_permission',$params);
        if($akses->num_rows()<1){
            // insert data baru
            $this->db->insert('tb_role_permission',$params);
        }else{
            $this->db->where('menu_id',$menu_id);
            $this->db->where('role_id',$role_id);
            $this->db->delete('tb_role_permission');
        }
    }

    public function create( $role_id = null)
    {
        $formdata = array();
        if( $role_id )
        {
            $params = (int)$role_id;
            $role = $this->userlevel_model->getRole( $params );

            if ($role->num_rows() > 0 )
            {
                $roledata = $role->row_array();

                $formdata['role_id'] = $roledata['role_id'];
                $formdata['role_name'] = $roledata['role_name'];
                $formdata['description'] = $roledata['description'];
                
            }else{
                $this->session->set_flashdata('message', 'invalid id not found');
				redirect('userlevel');
            }
        }else{
            $formdata['role_id'] = "";
            $formdata['role_name'] = "";
            $formdata['description'] = "";
        }

        $data = configs('Create/Edit Level user');
		$data['formdata'] = $formdata;
		$this->template->load('main','userlevel_form', $data);
        
    }

    public function saving()
    {
        if(isset($_POST['save']))
        {
            $validation_config = array(
                array(
                    'field' => 'role_name',
                    'rules' => 'trim|required',
                    'label' => 'Role Name',
                ),
                array(
                    'field' => 'description',
                    'rules' => 'trim|required',
                    'label' => 'Description Role',
                ),
            );
            $this->form_validation->set_rules( $validation_config );
            $this->form_validation->set_message('required', '{field} wajib diisi');

            $postdata = $this->input->post();
            if($this->form_validation->run() === FALSE) {
                $this->create();
            }else{
                $saved['role_name'] = $postdata['role_name'];
                $saved['description'] = $postdata['description'];

                if( empty($postdata['role_id'])){
                    $saved['create_at'] = date('Y-m-d H:i:s');
                    $role_id = $this->userlevel_model->insertRoles($saved);
                    if($role_id !== 0) {
                        $this->session->set_flashdata('message2', 'User has been saved to database!');
				        redirect('userlevel');
                    }else{
                        $this->session->set_flashdata('message', 'Data failure save to database!');
				        redirect('userlevel');
                    }
                    
                }else{
                    $saved['update_at'] = date('Y-m-d H:i:s');
                    $role_id = $postdata['role_id'];
                    $this->userlevel_model->updateRoles($role_id,$saved);
                    $this->session->set_flashdata('message2', 'User has been update to database!');
				    redirect('userlevel');
                }
            }
        }
    }

    public function delete($role_id)
    {
		$this->userlevel_model->destroy($role_id);
        $this->userlevel_model->destroy_permission($role_id);
        $this->session->set_flashdata('message2', 'Data has deleted from database!');
		redirect('userlevel');
    }
}