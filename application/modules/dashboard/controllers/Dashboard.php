<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

        function __construct()
        {
                parent::__construct();
                is_login();
                $this->user_id = $this->session->userdata('user_id');
		
        }
        
	public function index()
	{
                $data = configs('Dashboard');
                $this->template->load('main','dashboard', $data);
        
	}
}
