<?php if(!defined('BASEPATH')) exit('No direct script access allowed.');

class Faq extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        
        //Access Control
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
        
        if($this->session->userdata('group') > 2) {
            redirect('main');
        }
    }
    
    /**
     * All FAQs
     */
    public function index() {
        $data['faqs'] = $this->User_model->get_faqs();
        
        //Load View
        $this->load->view('admin/header', $data);
        $this->load->view('admin/faq/index');
        $this->load->view('admin/footer');
    }
    
    /**
     * Add a FAQ
     */
    public function add() {
        //Validation Rules
        $this->form_validation->set_rules('question', 'Question', 'trim|required|xss_clean');
        $this->form_validation->set_rules('answer', 'Answer', 'trim|required|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            //Load View
            $this->load->view('admin/header');
            $this->load->view('admin/faq/add');
            $this->load->view('admin/footer');
        } else {
            $data = array(
                'question' => $this->input->post('question'),
                'answer' => $this->input->post('answer')
            );
            
            //Insert FAQ
            $this->User_model->insert_faq($data);
            
            //Set message
            $this->session->set_flashdata('faq_saved', 'Your FAQ has been added.');
            
            redirect('admin/faq');
        }
    }
    
    public function edit($id) {
        //Validation Rules
        $this->form_validation->set_rules('question', 'Question', 'trim|required|xss_clean');
        $this->form_validation->set_rules('answer', 'Answer', 'trim|required|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            $data['faq'] = $this->User_model->get_faq($id);
            
            //Load view
            $this->load->view('admin/header', $data);
            $this->load->view('admin/faq/edit');
            $this->load->view('admin/footer');
        } else {
            $data = array(
                'question' => $this->input->post('question'),
                'answer' => $this->input->post('answer')
            );
            
            //Update FAQ
            $this->User_model->update_faq($data, $id);
            
            //Set message
            $this->session->set_flashdata('faq_saved', 'Your FAQ has been updated.');
            
            redirect('admin/faq');
        }
    }
    
    public function delete_faq($id) {
        $this->User_model->delete_faq($id);
        
        //Set message
        $this->session->set_flashdata('faq_deleted', 'FAQ deleted successfully.');
        
        redirect('admin/faq');
    }
}
