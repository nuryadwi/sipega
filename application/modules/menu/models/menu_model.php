<?php

class Menu_model extends CI_Model
{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_menu()
	{
		$this->db->order_by('menu_id', 'DESC');
		return $this->db->get('tb_menu');
	}

	public function getMenu($params)
	{
		$this->db->select('*');
		$this->db->from('tb_menu tm');
		$this->db->where('menu_id', $params);
		$query = $this->db->get();
		return $query;
	}

	public function insertMenu($menu)
	{
		return $this->db->insert('tb_menu', $menu);
	}

	public function updateMenu($menu_id , $data)
	{
		$this->db->where('menu_id', $menu_id);
		return $this->db->update('tb_menu', $data);
	}

	public function saveMenu( $params )
	{
		$params_insert['title'] = $params['title'];
		$params_insert['url'] = $params['url'];
		$params_insert['icon'] = $params['icon'];
		$params_insert['is_main_menu'] = $params['is_main_menu'];
		$params_insert['is_active'] = $params['is_aktif'];
		
		if( empty($params['menu_id']))
		{
			$params_insert['create_at'] = date('Y-m-d H:i:s');

			$insert = $this->db->insert('tb_menu', $params_insert);
			$menu_id = $this->db->insert_id();

			return $menu_id;
		}else{
			$menu_id = $params['menu_id'];
			$this->db->update('tb_menu', $params_insert, array('menu_id' => $menu_id));
			return $menu_id;
		}
	}

	function destroy($menu_id)
    {
        $this->db->where('menu_id', $menu_id);
        $this->db->delete('tb_menu');
	}
	
	function destroy_akses($menu_id)
    {
        $this->db->where('menu_id', $menu_id);
        $this->db->delete('tb_role_permission');
    }


}