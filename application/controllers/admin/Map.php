<?php if(!defined('BASEPATH')) exit('No direct script access allowed.');

class Map extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        
        //Access control
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
        
        if($this->session->userdata('group') > 2) {
            redirect('main');
        }
    }
    
    public function index() {
        //$this->output->enable_profiler(TRUE);
        $data['locations'] = $this->User_model->get_locations();
        
        //Load View
        $this->load->view('admin/header', $data);
        $this->load->view('admin/map/index');
        $this->load->view('admin/footer');
    }
}
