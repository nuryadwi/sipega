<?php

class Kelola_skp_model extends CI_Model
{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}
	
	// public function getAll($where = '')
	// {
	// 	$this->db->select('
	// 			ts.*
	// 			,tu.full_name
	// 			,tu.nip
	// 			,tu.id_jabatan
	// 			,tj.jabatan_name
	// 			,td.departemen_name
	// 	');
	// 	$this->db->from('tb_skp ts');
	// 	$this->db->join('tb_users tu', 'ts.user_id=tu.user_id');
	// 	$this->db->join('tb_jabatan tj', 'tu.id_jabatan=tj.id_jabatan');
	// 	$this->db->join('tb_departemen td', 'tj.id_departemen=td.id_departemen');
	// 	$this->db->where($where);
	// 	$this->db->order_by('ts.user_id');

	// 	return $this->db->get();
	// }



	public function getSKP($params)
	{
		$this->db->select('
				COUNT(skp_id) as count_skp
				,ts.user_id
				,tu.full_name
				,tu.id_jabatan
				,tj.jabatan_name
				,td.departemen_name
				,thn.id_tahun
				,thn.periode_start
				,thn.periode_end
				,thn.tahun

			');
		$this->db->from('tb_skp ts');
		$this->db->join('tb_users tu', 'ts.user_id=tu.user_id');
		$this->db->join('tb_jabatan tj', 'tu.id_jabatan=tj.id_jabatan');
		$this->db->join('tb_departemen td', 'tj.id_departemen=td.id_departemen');
		$this->db->join('tb_tahun thn', 'ts.id_tahun = thn.id_tahun');
		$this->db->where('ts.id_tahun', $params);
		$this->db->group_by('ts.user_id');

		$query = $this->db->get();
		$result = ($query->num_rows() > 0) ? $query->result() : FALSE;

		return $result;
	}

	public function getSKPbyId($id,$id_tahun)
	{
		$this->db->select('
				ts.*
				,tu.full_name
				,tu.nip
				,tu.id_jabatan
				,tj.jabatan_name
				,td.departemen_name
		');
		$this->db->from('tb_skp ts');
		$this->db->join('tb_users tu', 'ts.user_id=tu.user_id');
		$this->db->join('tb_jabatan tj', 'tu.id_jabatan=tj.id_jabatan');
		$this->db->join('tb_departemen td', 'tj.id_departemen=td.id_departemen');
		$this->db->where('ts.user_id', $id);
		$this->db->where('ts.id_tahun', $id_tahun);
		$this->db->order_by('ts.tanggal');

		$query = $this->db->get();
		$result = ($query->num_rows() > 0) ? $query->result() : FALSE;

		return $result;
	}

	public function getUserById($user_id)
	{
		$this->db->select('
				tu.user_id
				,tu.full_name
				,tu.nip
				,tr.role_name
				,tj.jabatan_name
				,td.departemen_name
		');
		$this->db->from('tb_users tu');
		$this->db->join('tb_roles tr','tu.role_id=tr.role_id', 'left');
		$this->db->join('tb_jabatan tj', 'tu.id_jabatan=tj.id_jabatan', 'left');
		$this->db->join('tb_departemen td', 'tj.id_departemen=td.id_departemen', 'left');
		$this->db->where("user_id = '$user_id' && active = 1 && banned = 0 && deleted = 0 ");
		
		return $this->db->get();
	}

	public function countSKP($where = '')
	{
		$this->db->select('
				COUNT(skp_id) as count_skp
				,ts.user_id
				,tu.full_name
				,tu.id_jabatan
				,tj.jabatan_name
				,td.departemen_name
			');
		$this->db->from('tb_skp ts');
		$this->db->join('tb_users tu', 'ts.user_id=tu.user_id');
		$this->db->join('tb_jabatan tj', 'tu.id_jabatan=tj.id_jabatan');
		$this->db->join('tb_departemen td', 'tj.id_departemen=td.id_departemen');
		$this->db->where($where);
		$this->db->group_by('ts.user_id');

		return $this->db->get();
	}

	public function update_skp($data, $skp_id)
    {
        $this->db->where('skp_id', $skp_id);
        $this->db->update('tb_skp', $data);
	}
	
	public function get_periode($tahun)
	{
		return $this->db->get_where('tb_tahun', array('tahun' => $tahun));
	}
}
