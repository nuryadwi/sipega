<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_task_skp extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_login();
        $this->load->model('task_model');
        $this->id = $this->session->userdata('user_id');
    }
    
    public function index()
    {
        $data = configs('Laporan Tugas Skp Harian');
        $this->template->load('main', 'task_skp_report', $data);
    }
}