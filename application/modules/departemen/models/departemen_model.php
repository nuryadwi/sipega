<?php

class Departemen_model extends CI_Model
{
    function __construct() 
	{
		parent::__construct();
		$this->load->database();
    }

    public function getData()
    {
        $this->db->select('*');
        $this->db->from('tb_departemen');
        $this->db->order_by('create_at','DESC');
        return $this->db->get()->result();
    }

    public function getDataById($params)
    {
        return $this->db->get_where('tb_departemen', array('id_departemen' => $params));
    }

    // public function dataDuplicate($params)
    // {
    //     $this->db->get_where('tb_departemen', array('departemen_name' => $params), 1);
	// 	return $this->db->affected_rows() > 0 ? FALSE : TRUE;
    // }

    public function saveData($params)
    {
        $params_insert['departemen_name'] = $params['departemen_name'];
        
        if(empty($params['id_departemen']))
        {
            $params_insert['create_at'] = date('Y-m-d H:i:s');
            $insert = $this->db->insert('tb_departemen', $params_insert);
            $id_departemen = $this->db->insert_id();

            return $id_departemen;
        }else{
            $params_insert['update_at'] = date('Y-m-d H:i:s');
            $id_departemen = $params['id_departemen'];
            $this->db->update('tb_departemen', $params_insert, array('id_departemen'=> $id_departemen));
            return $id_departemen;
        }
    }

    function destroy($id_departemen){
		$this->db->where('id_departemen', $id_departemen);
		$this->db->delete('tb_departemen');
    }

    function destroy_jabatan($id_departemen){
		$this->db->where('id_departemen', $id_departemen);
		$this->db->delete('tb_jabatan');
    }
    
}