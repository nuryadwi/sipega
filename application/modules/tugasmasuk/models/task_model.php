<?php

class Task_model extends CI_Model
{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function getAll()
	{
		$query = $this->db->query("SELECT
					tts.*
					,tu.full_name
					,tj.jabatan_name
					,td.departemen_name

				FROM tb_tugas_tambahan_staff tts
				JOIN tb_users tu ON tts.user_id = tu.user_id
				JOIN tb_jabatan tj ON tu.id_jabatan = tj.id_jabatan
				JOIN tb_departemen td ON tj.id_departemen = td.id_departemen
				WHERE tts.create_at BETWEEN DATE_FORMAT(SUBDATE(NOW(),9), '%Y-%m-%d') AND NOW()
				ORDER BY tts.create_at DESC
		");
		return $query;
	}
	
	public function filterTugas($where)
	{
		$this->db->select('
					tt.*
					,tu.full_name
					,tj.jabatan_name
					,td.departemen_name
				');
		$this->db->from('tb_tugas_tambahan tt');
		$this->db->join('tb_users tu', 'tt.user_id = tu.user_id');
		$this->db->join('tb_jabatan tj', 'tu.id_jabatan = tj.id_jabatan');
		$this->db->join('tb_departemen td', 'tj.id_departemen = td.id_departemen');
		$this->db->where($where);
		$this->db->order_by('tt.create_at', 'DESC');

		return $this->db->get();
	}

	function approve_task($table = null, $data=null, $where=null){
		$this->db->update($table, $data, $where);
	}

	public function getAllTaskSkp($where)
	{
		$this->db->select('
				tsr.*
				,tu.full_name
				,tj.jabatan_name
				,td.departemen_name
				,ts.kegiatan
				,ts.satuan
		');
		$this->db->from('tb_skp_realisasi tsr');
		$this->db->join('tb_skp ts', 'tsr.skp_id = ts.skp_id');
		$this->db->join('tb_users tu', 'tsr.user_id = tu.user_id');
		$this->db->join('tb_jabatan tj', 'tu.id_jabatan = tj.id_jabatan');
		$this->db->join('tb_departemen td', 'tj.id_departemen = td.id_departemen');
		$this->db->where($where);
		$this->db->order_by('tsr.create_at', 'DESC');
		
		return $this->db->get();
	}

	public function filterTugasSkp($where)
	{
		$this->db->select('
				tsr.*
				,ts.kegiatan
				,ts.satuan
				,tu.full_name
				,tj.jabatan_name
				,td.departemen_name
		');
		$this->db->from('tb_skp_realisasi tsr');
		$this->db->join('tb_skp ts', 'tsr.skp_id = ts.skp_id');
		$this->db->join('tb_users tu', 'tsr.user_id = tu.user_id');
		$this->db->join('tb_jabatan tj', 'tu.id_jabatan = tj.id_jabatan');
		$this->db->join('tb_departemen td', 'tj.id_departemen = td.id_departemen');
		$this->db->where($where);
		$this->db->order_by('tsr.create_at','DESC');

		return $this->db->get();
	}

	public function get_file_skp($id)
	{
		$query = $this->db->get_where('tb_skp_realisasi', array('id_skp_realisasi' => $id));
		return $query->row_array();
	}
}
