<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugasmasuk extends MY_Controller {

    public function __construct()
	{
        parent::__construct();
        is_login();
        $this->load->model('task_model');
        $this->id = $this->session->userdata('user_id');
    }
    
    
    

    public function approve()
    {
        
        if(!is_numeric($this->uri->segment(3))) {
            redirect('task_incoming_daily');
        }
        else{
            $this->task_model->approve_task('tb_tugas_tambahan', ['status' => '1'], ['id_tambahan' => $this->uri->segment(3)]);
            $this->session->set_flashdata('message2', 'Berhasil di approve');
            redirect('task_incoming_daily');
        }
    }

    public function jabatan()
    {
        $date = array();
        if(!empty(($_POST['cari'])))
        {
            $postdata = $this->input->post();
            $start = $postdata['start_date'];
            $end = $postdata['end_date'];
            $where = ['tsr.tanggal >=' => $start, 'tsr.tanggal <=' => $end];
            $get_tugas_skp = $this->task_model->filterTugasSkp($where)->result();
            $date = array('start' => $start, 'end' => $end);
            $tugas_skp = $get_tugas_skp;
        }else{
            $bln = date('m');
            $thn = date('Y');
            $start = $thn.'-'.$bln.'-01';
            $end = $thn.'-'.$bln.'-31';
            $where = ['tsr.tanggal >=' => $start, 'tsr.tanggal <=' => $end];
            $tugas_skp = $this->task_model->getAllTaskSkp($where)->result();
        }

        $data = configs('Laporan Tugas Masuk Jabatan');
        $data['tugas'] = $tugas_skp;
        $data['date'] = $date;

        $this->template->load('main', 'task_report_skp', $data);
    }

    public function download_skp($id)
    {
        $this->load->helper('download');
        $fileinfo = $this->task_model->get_file_skp($id);
        echo $user_id = formatFolderUser($fileinfo['user_id']);
        $file = './assets/media/'.$user_id.'/file_task/'.$fileinfo['file'];
        force_download($file, NULL);
    }

    public function tambahan()
    {
        $date = array();
        if(!empty(($_POST['cari'])))
        {
            $postdata = $this->input->post();
            $start = $postdata['start_date'];
            $end = $postdata['end_date'];
            $where = ['tt.tanggal >=' => $start, 'tt.tanggal <=' => $end, 'status' => '0'];
            $get_tugas = $this->task_model->filterTugas($where)->result();
            $date = array('start' => $start, 'end' => $end);
            $tugas = $get_tugas;
        }else{
            $tugas = $this->task_model->getAll()->result();

        }
        
        $data = configs('Laporan Tugas Masuk');
        $data['tugas'] = $tugas;
        $data['date'] = $date;
        $this->template->load('main', 'task_report_tambahan', $data);
    }
}