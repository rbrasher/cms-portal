<?php if(!defined('BASEPATH')) exit('No direct script access allowed.');

class Settings extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Settings_model');
        
        //Access Control
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
        
        if($this->session->userdata('group') > 2) {
            redirect('main');
        }
    }
    
    public function index() {
        //Validation Rules
        $this->form_validation->set_rules('site_title', 'Site Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('site_description', 'Site Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('logo', 'Logo', 'required');
        
        //these may not be necessary
        $this->form_validation->set_rules('jumbotron_heading', 'Jumbotron Heading', 'trim|required|xss_clean');
        $this->form_validation->set_rules('jumbotron_text', 'Jumbotron Text', 'trim|required|xss_clean');
        $this->form_validation->set_rules('jumbotron_button_text', 'Jumbotron Button Text', 'trim|required|xss_clean');
        $this->form_validation->set_rules('jumbotron_button_link', 'Jumbotron Button Link', 'trim|required|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            $data['settings'] = $this->Settings_model->get_global_settings();
            
            //Load view
            $this->load->view('admin/header', $data);
            $this->load->view('admin/settings/index');
            $this->load->view('admin/footer');
        } else {
            $data = array(
                
            );
            
            //update settings
            
            //set message
            
            //redirect('admin/dashboard');
        }
    }
}