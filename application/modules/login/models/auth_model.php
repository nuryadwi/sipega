<?php

class Auth_model extends CI_Model
{
    function __construct() 
	{
		parent::__construct();
		$this->load->database();
    }
    
    public function auth($email)
    {
        $this->db->select('*');
        $this->db->from('tb_users u');
        $this->db->join('tb_roles r','u.role_id=r.role_id', 'LEFT');
        $this->db->where("email = '$email' && active = 1 && banned = 0");
        $query = $this->db->get();
        $row = $query->result();

        
		if($row == NULL){
			$response = array(
				'status' => '0',
				'message' => 'No data');
		} else{
			$response = array(
				'status' => '1',
				'message' => 'Data found',
				'data' => $query->result());
		}
		
		return $response;

	}
	
	public function updateLastlogin($user_id)
	{
		date_default_timezone_set('ASIA/JAKARTA');
        $this->db->where('user_id', $user_id);
        $this->db->update('tb_users', array('last_login' => date('Y-m-d H:i:s')));
        return;
	}

}