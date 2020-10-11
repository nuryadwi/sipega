<?php

class Users_model extends CI_Model
{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllUsers()
	{
		$this->db->select('*');
		$this->db->from('tb_users us');
		$this->db->join('tb_roles ro', 'us.role_id=ro.role_id');
		$this->db->where('deleted', 0);
		$query = $this->db->get();
		return $query;
	}
	
	public function emailDuplicate($email)
	{
		$this->db->get_where('tb_users', array('email' => $email), 1);
		return $this->db->affected_rows() > 0 ? FALSE : TRUE;
	}

	public function insert($data)
	{
		$this->db->insert('tb_users', $data);
	}

	public function getUser($params)
	{
		$this->db->select('*');
		$this->db->from('tb_users tu');
		$this->db->join('tb_roles tr', 'tu.role_id=tr.role_id');
		$this->db->where('user_id', $params);
		$this->db->where('deleted', 0);
		$query = $this->db->get();
		return $query;
	}

	public function saveUsers($params)
	{
		
		
		$params_insert['role_id'] = $params['role_id'];
		$params_insert['nip'] = $params['nip'];
		$params_insert['full_name'] = $params['fullname'];
		
		$params_insert['born_date'] = $params['born_date'];
		$params_insert['email'] = $params['email'];
		$params_insert['id_jabatan'] = $params['id_jabatan'];
		//get displayname
		$fullname = $params['fullname'];
		$explode = explode(" ", $fullname);
		$firstname = $explode[0];
		$params_insert['display_name'] = $firstname;

		//generate password from born date
		$tgl = $params['born_date'];
		$pisah = explode('-', $tgl);
		$larik = array($pisah[2], $pisah[1],$pisah[0]);
		$merger = implode("", $larik);
		$password = $merger;
		
		
		if( empty($params['user_id']))
		{
			$params_insert['create_at'] = date('Y-m-d H:i:s');
			$options = array('cost' => 4);
			$hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
			$params_insert['password'] = $hashPassword;
			$params_insert['images'] = "user.png";

			$insert = $this->db->insert('tb_users', $params_insert);
			$user_id = $this->db->insert_id();

			return $user_id;
		}else{
			$user_id = $params['user_id'];
			$params_update['update_at'] =  date('Y-m-d H:i:s');
			
			$params_update['role_id'] = $params['role_id'];
			$params_update['nip'] = $params['nip'];
			$params_update['full_name'] = $params['fullname'];
			$params_update['display_name'] = $firstname;
			$params_update['born_date'] = $params['born_date'];
			$params_update['email'] = $params['email'];
			$params_update['id_jabatan'] = $params['id_jabatan'];
			$this->db->update('tb_users', $params_update, array('user_id' => $user_id));
			return $user_id;
		}
	}

	function update_banned($table = null, $data=null, $where=null){
		$this->db->update($table, $data, $where);
	}

	public function reset_pass($data, $user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('tb_users', $data);
        return $this->db->affected_rows();
	}
	
	public function deleted($user_id, $deleted)
	{
		$this->db->where('user_id', $user_id);
        $this->db->update('tb_users', $deleted);
        return $this->db->affected_rows();
	}

    
}