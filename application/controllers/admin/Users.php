<?php if(!defined('BASEPATH')) exit('No direct script access allowed.');

class Users extends MY_Controller {
    
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
    
    /**
     * All Users
     */
    public function index() {
        $data['users'] = $this->User_model->get_users('id', 'DESC');
        
        //Load view
        $this->load->view('admin/header', $data);
        $this->load->view('admin/users/index');
        $this->load->view('admin/footer');
    }
    
    public function add() {
        //Validation Rules
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|xss_clean');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
        //not sure if these are necessary
        $this->form_validation->set_rules('group', 'Group', 'required|xss_clean');
        $this->form_validation->set_rules('location_id', 'Location', 'required|xss_clean');
        
        $data['groups'] = $this->User_model->get_groups();
        $data['locations'] = $this->User_model->get_locations();
        
        if($this->form_validation->run() == FALSE) {
            //Load view
            $this->load->view('admin/header', $data);
            $this->load->view('admin/users/add');
            $this->load->view('admin/footer');
        } else {
            $data = array(
                'first_name'        => $this->input->post('first_name'),
                'last_name'         => $this->input->post('last_name'),
                'username'          => $this->input->post('username'),
                'email'             => $this->input->post('email'),
                'password'          => md5($this->input->post('password')),
                'phone'             => $this->input->post('phone'),
                'group_id'          => $this->input->post('group'),
                'location_id'       => $this->input->post('location_id')
            );
            
            //Insert new user
            $this->User_model->insert($data);
            
            //Set message
            $this->session->set_flashdata('user_saved', 'User added successfully');
            
            redirect('admin/users');
        }
    }
    
//    public function edit($id) {
//        //Validation rules
//        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
//        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
//        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|xss_clean');
//        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|xss_clean');
//        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|xss_clean');
//        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
//        //not sure if these are necessary
//        $this->form_validation->set_rules('group', 'Group', 'required|xss_clean');
//        $this->form_validation->set_rules('location_id', 'Location', 'required|xss_clean');
//        
//        $data['groups'] = $this->User_model->get_groups();
//        $data['locations'] = $this->User_model->get_locations();
//        $data['user'] = $this->User_model->get_user($id);
//        
//        if($this->form_validation->run() == FALSE) {
//            //Load view
//            $this->load->view('admin/header', $data);
//            $this->load->view('admin/users/edit');
//            $this->load->view('admin/footer');
//        } else {
//            $data = array(
//                'first_name'        => $this->input->post('first_name'),
//                'last_name'         => $this->input->post('last_name'),
//                'username'          => $this->input->post('username'),
//                'email'             => $this->input->post('email'),
//                'password'          => md5($this->input->post('password')),
//                'phone'             => $this->input->post('phone'),
//                'group_id'          => $this->input->post('group'),
//                'location_id'       => $this->input->post('location_id')
//            );
//            
//            //Update User
//            $this->User_model->update($data, $id);
//            
//            //Set message
//            $this->session->set_flashdata('user_saved', 'User updated successfully');
//            
//            redirect('admin/users');
//        }
//    }
    
    /**
     * Delete User
     * 
     * @param type $id
     */
    public function delete($id) {
        $this->User_model->delete($id);
        
        //Set message
        $this->session->set_flashdata('user_deleted', 'User deleted successfully');
        
        redirect('admin/users');
    }
}
