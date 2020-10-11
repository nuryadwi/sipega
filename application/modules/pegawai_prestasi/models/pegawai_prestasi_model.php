<?php

class Pegawai_prestasi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();   
    }

    public function getNilaiCapaian($user_id,$tahun)
    {
        $this->db->select('
                            tc.*
                    ');
        $this->db->from('tb_nilai_capaian tc');
        $this->db->join('tb_users tu','tc.user_id = tu.user_id');
        $this->db->where('tc.user_id', $user_id);
        $this->db->where('tc.id_tahun', $tahun);
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
        $this->db->join('tb_users tu','tnp.user_id = tu.user_id');
        $this->db->where('tnp.user_id', $user_id);
        $this->db->where('tnp.id_tahun', $tahun);
        $this->db->where('tu.deleted', 0);
        $this->db->where('tu.banned', 0);
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
        $this->db->join('tb_users tu','tps.user_id = tu.user_id');
        $this->db->where('tps.user_id', $user_id);
        $this->db->where('tps.id_tahun', $tahun);
        $this->db->where('tu.deleted', 0);
        $this->db->where('tu.banned', 0);
        $query = $this->db->get();
		$result = ($query->num_rows() > 0) ? $query->result() : FALSE;

		return $result;
    }

}