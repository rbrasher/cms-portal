<?php if(!defined('BASEPATH')) exit('No direct script access allowed.');

class Groups extends MY_Controller {
    
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
     * All Groups
     * 
     */
    public function index() {
        $data['groups'] = $this->User_model->get_groups();
        
        //Load view
        $this->load->view('admin/header', $data);
        $this->load->view('admin/groups/index');
        $this->load->view('admin/footer');
    }
    
    /**
     * Add Group
     */
    public function add() {
        //Validation rules
        $this->form_validation->set_rules('name', 'Group Name', 'trim|required|min_length[3]|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            //Load view
            $this->load->view('admin/header');
            $this->load->view('admin/groups/add');
            $this->load->view('admin/footer');
        } else {
            $data = array(
                'name' => $this->input->post('name')
            );
            
            //Insert Group
            $this->User_model->insert_group($data);
            
            //set message
            $this->session->set_flashdata('group_saved', 'User Group has been added');
            
            redirect('admin/groups');
        }
    }
    
    /**
     * Edit a group
     * 
     * @param int $id
     */
    public function edit($id) {
        //Validation rules
        $this->form_validation->set_rules('name', 'Group Name', 'trim|required|min_length[3]|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            $data['group'] = $this->User_model->get_group($id);
            
            //Load view
            $this->load->view('admin/header', $data);
            $this->load->view('admin/groups/edit');
            $this->load->view('admin/footer');
        } else {
            $data = array(
                'name' => $this->input->post('name')
            );
            
            //Update Group
            $this->User_model->update_group($data, $id);
            
            //set message
            $this->session->set_flashdata('group_saved', 'User Group has been updated.');
            
            redirect('admin/groups');
        }
    }
    
    public function delete($id) {
        $this->User_model->delete_group($id);
        
        //set message
        $this->session->set_flashdata('group_deleted', 'User Group deleted successfully.');
        
        redirect('admin/groups');
    }
}