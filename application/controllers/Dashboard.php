<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        
        //Access control
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
    }
    
	public function index() {
		$this->load->view('admin/header');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
	}
    
    
}
