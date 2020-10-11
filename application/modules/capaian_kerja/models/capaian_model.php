<?php

class Capaian_model extends CI_Model
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

    public function getNilaiPerilaku($user_id)
    {
        $thn = date('Y');
        $this->db->select('
                        np.*
                        ,th.tahun
                        ,th.periode_start
                        ,th.periode_end
                    ');
        $this->db->from('tb_nilai_perilaku np');
        $this->db->join('tb_tahun th', 'np.id_tahun = th.id_tahun','right');
        $this->db->where('th.tahun',$thn);
        $this->db->where('user_id', $user_id);
        return $this->db->get();
    }

    public function isDuplicate($user_id,$tahun)
    {
        $this->db->get_where('tb_nilai_capaian', array('user_id' => $user_id, 'id_tahun' => $tahun), 1);
        return $this->db->affected_rows() > 0 ? FALSE : TRUE;
    }

    public function isDuplicatePrestasi($user_id,$tahun)
    {
        $this->db->get_where('tb_nilai_prestasi', array('user_id' => $user_id, 'id_tahun' => $tahun), 1);
        return $this->db->affected_rows() > 0 ? FALSE : TRUE;
    }

    public function insertNilaiPrestasi($saved)
    {
        $this->db->insert('tb_nilai_prestasi', $saved);
        return $this->db->insert_id();
    }

    public function insertNilai($saved)
    {
        $this->db->insert('tb_nilai_capaian', $saved);
        return $this->db->insert_id();
    }

    public function destroy_capaian($user_id, $tahun)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('id_tahun', $tahun);
        $this->db->delete('tb_nilai_capaian');
    }
    public function destroy_prestasi($user_id, $tahun)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('id_tahun', $tahun);
        $this->db->delete('tb_nilai_prestasi');
    }

    
}