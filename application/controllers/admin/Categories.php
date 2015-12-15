<?php if(!defined('BASEPATH')) exit('No direct script access allowed.');

class Categories extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Bulletin_model');
        
        //Access Control
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
        
        if($this->session->userdata('group') > 2) {
            redirect('main');
        }
    }
    
    public function index() {
        $data['categories'] = $this->Bulletin_model->get_categories('id', 'DESC');
        
        //Load View
        $this->load->view('admin/header', $data);
        $this->load->view('admin/categories/index');
        $this->load->view('admin/header');
    }
    
    /**
     * Add Category
     */
    public function add() {
        //Validation Rules
        $this->form_validation->set_rules('name', 'Category Name', 'trim|required|min_length[3]|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            //Load View
            $this->load->view('admin/header');
            $this->load->view('admin/categories/add');
            $this->load->view('admin/footer');
        } else {
            $data = array(
                'name'  => $this->input->post('name')
            );
            
            //Insert Category
            $this->Bulletin_model->insert_category($data);
            
            //Set message
            $this->session->set_flashdata('category_saved', 'Your Category has been added.');
            
            redirect('admin/categories');
        }
    }
    
    /**
     * Edit Category
     * 
     * @param int $id
     */
    public function edit($id) {
        //validation rules
        $this->form_validation->set_rules('name', 'Category Name', 'trim|required|min_length[3]|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            $data['category'] = $this->Bulletin_model->get_category($id);
            
            //Load view
            $this->load->view('admin/header', $data);
            $this->load->view('admin/categories/edit');
            $this->load->view('admin/footer');
        } else {
            $data = array(
                'name' => $this->input->post('name')
            );
            
            //Update category
            $this->Bulletin_model->update_category($data, $id);
            
            //set message
            $this->session->set_flashdata('category_saved', 'Your Category has been updated.');
            
            redirect('admin/categories');
        }
    }
    
    /**
     * Delete a Category
     * 
     * @param int $id
     */
    public function delete($id) {
        $this->Bulletin_model->delete_category($id);
        
        //set message
        $this->session->set_flashdata('category_deleted', 'Your Category has been deleted.');
        
        redirect('admin/categories');
    }
}
