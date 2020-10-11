<?php defined('BASEPATH') || exit('No direct script access allowed');

class Block extends MY_Controller
{

    public function __construct(){
		parent::__construct();
		
    }

    public function index()
    {
        $this->session->unset_userdata('user_id');
        $this->session->sess_destroy();
		
		redirect('login', 'refresh');
    }
}