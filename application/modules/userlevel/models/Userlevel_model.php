<?php

class Userlevel_model extends CI_Model
{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
    }

    public function get_all($table)
    {
        $this->db->from($table);
        return $this->db->get();
    }

    public function getRole($params)
    {
        return $this->db->get_where('tb_roles', array('role_id' => $params));
    }

    public function insertRoles($data)
	{
        $this->db->insert('tb_roles', $data);
        $role_id = $this->db->insert_id();
            
        return $role_id;
	}

	public function updateRoles($role_id , $data)
	{
		$this->db->where('role_id', $role_id);
		return $this->db->update('tb_roles', $data);
	}

    function destroy($role_id){
		$this->db->where('role_id', $role_id);
		$this->db->delete('tb_roles');
    }
    
    function destroy_permission($role_id)
    {
        $this->db->where('role_id', $role_id);
        $this->db->delete('tb_role_permission');
    }
    
}