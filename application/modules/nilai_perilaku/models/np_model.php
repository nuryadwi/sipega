<?php

class Np_model extends CI_Model
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

    public function validation_rules(Type $var = null)
    {
        return array(
            array(
                'field' => 'pelayanan',
                'rules' => 'trim|required|numeric',
                'label' => 'Orientasi Pelayanan',
            ),
            array(
                'field' => 'integritas',
                'rules' => 'trim|required|numeric',
                'label' => 'Integritas',
            ),
            array(
                'field' => 'komitmen',
                'rules' => 'trim|required|numeric',
                'label' => 'Komitmen',
            ),
            array(
                'field' => 'disiplin',
                'rules' => 'trim|required|numeric',
                'label' => 'Disiplin',
            ),
            array(
                'field' => 'kerjasama',
                'rules' => 'trim|required|numeric',
                'label' => 'Kerjasama',
            ),
        );
    }

    public function getNilai($user_id)
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

    public function insertNilaiPerilaku($saved)
	{
        $this->db->insert('tb_nilai_perilaku', $saved);
        return $this->db->insert_id();
    }
    
    public function getTahun($params)
    {
        return $this->db->get_where('tb_tahun', array('tahun' => $params));
    }
}