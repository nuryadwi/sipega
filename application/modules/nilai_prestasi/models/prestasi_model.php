<?php

class Prestasi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();   
    }
	
	public function getStaff()
    {
        $this->db->select('
                    tu.*
                    ,tj.jabatan_name
                    ,td.departemen_name
                ');
        $this->db->from('tb_users tu');
        $this->db->join('tb_jabatan tj', 'tu.id_jabatan = tj.id_jabatan');
        $this->db->join('tb_departemen td', 'tj.id_departemen = td.id_departemen');

        $this->db->where('role_id', 3);
        $this->db->where('deleted', 0);
        $this->db->where('banned', 0);
        return $this->db->get();
    }

    public function getNilaiCapaian($user_id,$tahun)
    {
        $this->db->select('
                            tc.*
                    ');
        $this->db->from('tb_nilai_capaian tc');
        $this->db->join('tb_users tu','tc.user_id = tu.user_id');
        $this->db->where('tc.user_id', $user_id);
        $this->db->where('id_tahun', $tahun);
        $this->db->where('tu.deleted', 0);
        $this->db->where('tu.banned', 0);
        $query = $this->db->get();
		$result = ($query->num_rows() > 0) ? $query->result() : FALSE;

		return $result;
    }
    public function getNilaiPerilaku($user_id,$tahun)
    {
        $this->db->select('
                            tnp.*
                    ');
        $this->db->from('tb_nilai_perilaku tnp');
        $this->db->where('user_id', $user_id);
        $this->db->where('id_tahun', $tahun);
        $query = $this->db->get();
		$result = ($query->num_rows() > 0) ? $query->result() : FALSE;

		return $result;
    }
    public function getNilaiPrestasi($user_id,$tahun)
    {
        $this->db->select('
                            tps.*
                    ');
        $this->db->from('tb_nilai_prestasi tps');
        $this->db->where('user_id', $user_id);
        $this->db->where('id_tahun', $tahun);
        $query = $this->db->get();
		$result = ($query->num_rows() > 0) ? $query->result() : FALSE;

		return $result;
    }
}