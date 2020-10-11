<?php

class Settings_model extends CI_Model
{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
    }

    public function get_config()
    {
        return $this->db->get_where('tb_konfigurasi', array('id_konfigurasi' => 1));
    }

    public function validation_rules()
    {
        return array(
            array(
                'field' => 'name_app',
                'rules' => 'trim|required',
                'label' => 'Nama Aplikasi'
            ),
            array(
                'field' => 'email',
                'rules' => 'trim|required|valid_email',
                'label' => 'Email Kantor',
            ),
            array(
                'field' => 'alamat',
                'rules' => 'trim|required',
                'label' => 'Alamat',
            ),
            array(
                'field' => 'phone',
                'rules' => 'trim|required',
                'label' => 'No. Telepon',
            ),
        );
    }

    public function savingData($id_konfigurasi , $data)
    {
        $this->db->where('id_konfigurasi', $id_konfigurasi);
        return $this->db->update('tb_konfigurasi', $data);
    }

}