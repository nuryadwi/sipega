<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_login();
        $this->load->model('periode_model');
    }

    public function index()
    {
        $data = configs('Setting Periode Penilaian');
        $this->template->load('main','periode_list', $data);
    }

}