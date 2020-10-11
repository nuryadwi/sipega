<?php

class Profile_model extends CI_Model
{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
  }

  public function getUserById($user_id)
  {
      $this->db->select('
              tu.*
              ,tr.role_name
              ,tj.id_jabatan
              ,tj.jabatan_name
              ,td.id_departemen
              ,td.departemen_name
      ');
      $this->db->from('tb_users tu');
      $this->db->join('tb_roles tr','tu.role_id=tr.role_id', 'left');
      $this->db->join('tb_jabatan tj', 'tu.id_jabatan=tj.id_jabatan', 'left');
      $this->db->join('tb_departemen td', 'tj.id_departemen=td.id_departemen', 'left');
      $this->db->where("user_id = '$user_id' && active = 1 && banned = 0 && deleted = 0 ");
      return $this->db->get();
  }

  public function validation_rules()
  {
    return array(
        array(
          'field' => 'nip',
          'rules' => 'trim|required',
          'label' => 'Nomor Induk Pegawai',
        ),
        array(
          'field' => 'nik',
          'rules' => 'trim|required',
          'label' => 'Nomor Induk Kependudukan',
        ),
        array(
          'field' => 'full_name',
          'rules' => 'trim|required',
          'label' => 'Nama Lengkap',
        ),
        array(
          'field' => 'born_date',
          'rules' => 'trim|required',
          'label' => 'Tanggal Lahir',
        ),
        array(
          'field' => 'phone',
          'rules' => 'trim|required',
          'label' => 'No. Telepon',
        ),
        array(
          'field' => 'gender',
          'rules' => 'trim|required|alpha',
          'label' => 'Jenis Kelamin',
        ),
        array(
          'field' => 'address',
          'rules' => 'trim|required',
          'label' => 'Alamat Sesuai KTP',
        )
    );
  }

  public function updateProfile($user_id , $data)
  {
    $this->db->where('user_id', $user_id);
    return $this->db->update('tb_users', $data);
  }

  public function updatePass($data, $user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('tb_users', $data);
        return $this->db->affected_rows();
    }

}