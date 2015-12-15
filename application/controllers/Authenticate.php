<?php if(!defined('BASEPATH')) exit('No direct script access allowed.');

class Authenticate extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Authenticate_model');
    }
    
    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            //Load view 
            $this->load->view('login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            //Validate
            $user_id = $this->Authenticate_model->login_user($username, $password);
            
            if($user_id) {
                $user_data = array(
                    'user_id'   => $user_id,
                    'username'  => $username,
                    'group'     => $user_id->group_id,
                    'logged_in' => true
                );
                
                //set session userdata
                $this->session->set_userdata($user_data);
                
                //Set message
                $this->session->set_flashdata('pass_login', 'Logged in successfully');
                
                if($user_id->group_id <= 2) {
                    redirect('admin/dashboard');
                } else {
                    redirect('main');
                } 
            } else {
                $this->session->set_flashdata('fail_login', 'Invalid Username or Password');
                redirect('login');
            }
        }
    }
    
    public function logout() {
        //Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('group');
        $this->session->sess_destroy();
        
        //Set message
        $this->session->set_flashdata('logged_out', 'You have successfully logged out.');
        
        redirect('login');
    }
}