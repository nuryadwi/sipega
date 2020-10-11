<?php

class Pegawai_capaian_model extends CI_Model
{
    public function __construct()
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

	// 	$query = $this->db->get();
	// 	$result = ($query->num_rows() > 0) ? $query->result() : FALSE;

	// 	return $result;
	// }
	
	public function getSKPbyId($user_id,$id_tahun)
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
		$this->db->where('ts.user_id', $user_id);
		$this->db->where('ts.id_tahun', $id_tahun);
		$this->db->order_by('ts.tanggal');

		$query = $this->db->get();
		$result = ($query->num_rows() > 0) ? $query->result() : FALSE;

		return $result;
	}
    
    public function getTugas($user_id,$id_tahun)
    {
        $this->db->select('
					tt.*
					,tu.full_name
					,tj.jabatan_name
					,td.departemen_name
				');
		$this->db->from('tb_tugas_tambahan_staff tt');
		$this->db->join('tb_users tu', 'tt.user_id = tu.user_id');
		$this->db->join('tb_jabatan tj', 'tu.id_jabatan = tj.id_jabatan');
        $this->db->join('tb_departemen td', 'tj.id_departemen = td.id_departemen');
        $this->db->join('tb_tahun thn', 'tt.id_tahun = thn.id_tahun');
        $this->db->where('tt.user_id', $user_id);
        $this->db->where('tt.id_tahun', $id_tahun);
        
		$this->db->order_by('tt.create_at', 'DESC');

		return $this->db->get();
    }
}