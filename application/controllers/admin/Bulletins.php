<?php if(!defined('BASEPATH')) exit('No direct script access allowed.');

class Bulletins extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Bulletin_model');
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
     * All Bulletins
     */
    public function index() {
        //Get Bulletins
        $data['bulletins'] = $this->Bulletin_model->get_bulletins('id', 'DESC');
        
        //Get Menu Items
        $data['menu_items'] = $this->Bulletin_model->get_menu_items();
        
        //Load View
        $this->load->view('admin/header', $data);
        $this->load->view('admin/bulletins/index');
        $this->load->view('admin/footer');
    }
    
    /**
     * Add a bulletin
     */
    public function add() {
        //Form Validation
        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[4]|xss_clean');
        $this->form_validation->set_rules('body', 'Body', 'trim|required|xss_clean');
        $this->form_validation->set_rules('is_published', 'Publish', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');
        
        $data['categories'] = $this->Bulletin_model->get_categories();
        $data['users'] = $this->User_model->get_users();
        $data['groups'] = $this->User_model->get_groups();
        
        if($this->form_validation->run() == FALSE) {
            $data['menu_items'] = $this->Bulletin_model->get_menu_items();
            
            //Load View
            $this->load->view('admin/header', $data);
            $this->load->view('admin/bulletins/add');
            $this->load->view('admin/footer');
        } else {
            $data = array(
                'category_id' => $this->input->post('category_id'),
                'user_id' => $this->input->post('user_id'),
                'title' => $this->input->post('title'),
                'body' => $this->input->post('body'),
                'access' => $this->input->post('access'),
                'is_published' => $this->input->post('is_published'),
                'in_menu' => $this->input->post('in_menu'),
                'order' => $this->input->post('order')
            );
            
            //Insert Bulletin 
            $this->Bulletin_model->insert_bulletin($data);
            
            if($data['is_published'] == 1) {
                $this->send_emails($data);
                $msg = 'Sending emails...';
            } else {
                $msg = 'No emails sent at this time.';
            }
            
            //Set message
            $this->session->set_flashdata('bulletin_saved', 'Bulletin Added.' . ' ' . $msg);
            
            //send emails here
            
            redirect('admin/bulletins');
        }
    }
    
    /**
     * Edit a Bulletin
     * 
     * @param int $id
     */
    public function edit($id) {
        //Form Validation
        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[4]|xss_clean');
        $this->form_validation->set_rules('body', 'Body', 'trim|required|xss_clean');
        $this->form_validation->set_rules('is_published', 'Publish', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');
        
        $data['categories'] = $this->Bulletin_model->get_categories();
        $data['users'] = $this->User_model->get_users();
        $data['bulletin'] = $this->Bulletin_model->get_bulletin($id);
        
        if($this->form_validation->run() == FALSE) {
            
            //Load View
            $this->load->view('admin/header', $data);
            $this->load->view('admin/bulletins/edit');
            $this->load->view('admin/footer');
        } else {
            $data = array(
                'category_id' => $this->input->post('category_id'),
                'user_id' => $this->input->post('user_id'),
                'title' => $this->input->post('title'),
                'body' => $this->input->post('body'),
                'access' => $this->input->post('access'),
                'is_published' => $this->input->post('is_published'),
                'in_menu' => $this->input->post('in_menu'),
                'order' => $this->input->post('order')
            );
            
            //Update Bulletin
            $this->Bulletin_model->update_bulletin($data, $id);
            
            if($data['is_published'] == 1) {
                $this->send_emails($data);
                $msg = 'Sending emails...';
            } else {
                $msg = 'No emails sent at this time.';
            }
            
            //Set message
            $this->session->set_flashdata('bulletin_saved', 'Bulletin Updated.' . ' ' . $msg);
            
            redirect('admin/bulletins');
        }
    }
    
    /**
     * Delete a Bulletin
     * 
     * @param int $id
     */
    public function delete($id) {
        $this->Bulletin_model->delete_bulletin($id);
        
        //set message
        $this->session->set_flashdata('bulletin_deleted', 'Bulletin Deleted.');
        
        redirect('admin/bulletins');
    }
    
    /**
     * Publish Article
     * 
     * @param int $id
     */
    public function publish($id) {
        $this->Bulletin_model->publish_bulletin($id);
        
        $bulletin = $this->Bulletin_model->get_bulletin($id);
        $this->send_emails($bulletin);
        
        //set message
        $this->session->set_flashdata('bulletin_published', 'Bulletin Published. Sending Emails...');
        
        redirect('admin/bulletins');
    }
    
    /**
     * Unpublish Bulletin
     * 
     * @param int $id
     */
    public function unpublish($id) {
        $this->Bulletin_model->unpublish_bulletin($id);
        
        //set message
        $this->session->set_flashdata('bulletin_unpublished', 'Bulletin Unpublished.');
        
        redirect('admin/bulletins');
    }
    
    public function send_emails($info) {
        $users = $this->User_model->get_users();
        
        $Name = "The Powerboard Team"; //senders name
        $email = "no-reply@thepowerboard.com"; //senders e-mail adress
        $subject = 'New Bulletin Notice | ' . $info->title; //mail subject
        $header = "From: ". $Name . " <" . $email . ">\r\n"; //optional headerfields
        
        foreach($users as $user) {
            $recipient = $user->email;      //recipient
            $mail_body = $info->body;       //mail body
            mail($recipient, $subject, $mail_body, $header); //mail command :) 
        }
    }
}
