<?php if(!defined('BASEPATH')) exit('No direct script access allowed.');

class Main extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Bulletin_model');
        $this->load->model('User_model');
        $this->load->model('Document_model');
        
        //Access Control
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
    }
    
    public function index() {
        //Get Bulletins
        $data['bulletins'] = $this->Bulletin_model->get_bulletins('id', 'DESC', 10);
        $data['faqs'] = $this->User_model->get_faqs();
        $data['videos'] = $this->User_model->get_videos();
        $data['documents'] = $this->Document_model->get_documents();
        
        //Get Menu Items
        $data['menu_items'] = $this->Bulletin_model->get_menu_items();
        
        //Load View
        $this->load->view('header', $data);
        $this->load->view('main');
        $this->load->view('footer');
    }
    
    public function view($id) {
        //Get Menu Items
        //$data['menu_items'] = $this->Bulletin_model->get_menu_items();
        
        //Get Bulletin
        $data['bulletin'] = $this->Bulletin_model->get_bulletin($id);
        
        //Load View
        $this->load->view('header', $data);
        $this->load->view('bulletin');
        $this->load->view('footer');
    }
    
    public function watch($id) {
        $data['video'] = $this->User_model->get_video($id);
        
        //Load View
        $this->load->view('header', $data);
        $this->load->view('video');
        $this->load->view('footer');
    }
}