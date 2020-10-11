<?php

class Jabatan_model extends CI_Model
{
    function __construct() 
	{
		parent::__construct();
		$this->load->database();
    }

    public function getAllJabatan()
    {
        $this->db->select('*');
        $this->db->from('tb_jabatan j');
        $this->db->join('tb_departemen d', 'j.id_departemen=d.id_departemen','LEFT');
        $this->db->order_by('id_jabatan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getJabatanById($params)
    {
        $this->db->select('*');
        $this->db->from('tb_jabatan j');
        $this->db->join('tb_departemen d', 'j.id_departemen=d.id_departemen','LEFT');
        $this->db->where('id_jabatan', $params);
        $this->db->order_by('id_jabatan', 'DESC');
        return $this->db->get();
    }
    
    public function saveJabatan($params)
    {
        $params_insert['jabatan_name'] = $params['jabatan_name'];
        $params_insert['id_departemen'] = $params['id_departemen'];

        if(empty($params['id_jabatan']))
        {
            $params_insert['create_at'] = date('Y-m-d H:i:s');

            $insert = $this->db->insert('tb_jabatan', $params_insert);
            $id_jabatan = $this->db->insert_id();

            return $id_jabatan;
        }else{
            $params_insert['update_at'] = date('Y-m-d H:i:s');
            $id_jabatan = $params['id_jabatan'];
            $this->db->update('tb_jabatan', $params_insert, array('id_jabatan'=>$id_jabatan));
            
            return $id_jabatan;
        }
    }

    function destroy($id_jabatan){
		$this->db->where('id_jabatan', $id_jabatan);
		$this->db->delete('tb_jabatan');
    }
}