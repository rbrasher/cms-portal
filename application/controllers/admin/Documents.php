<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');

class Documents extends MY_Controller {
    
    function __construct() {
        parent::__construct();
        
        //$this->load->library('upload');
        $this->load->helper(array('string'));
        $this->load->model('Document_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        
        //Access Control
        if(!$this->session->userdata('logged_in')) {
            redirect('authenticate/login');
        }
        
        if($this->session->userdata('group') > 2) {
            redirect('main');
        }
    }
    
    /**
     * View all Documents
     */
    public function index() {
        $data['documents'] = $this->Document_model->get_documents();
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/documents/index');
        $this->load->view('admin/footer');
    }
    
    /**
     * Add a new Document
     */
    public function add() {
        $config['upload_path'] = './documents/';
        $config['allowed_types'] = 'pdf';
        $this->load->library('upload', $config);
        
        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[4]|xss_clean');
        $user = $this->session->userdata('user_id');
        
        if($this->form_validation->run() == FALSE) {
            $this->load->view('admin/header');
            $this->load->view('admin/documents/add');
            $this->load->view('admin/footer');
        } else {

            if(!$this->upload->do_upload('userfile')) {
                //$error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('upload_error', 'There was an error uploading your document.');
                
                redirect('admin/documents/add');
            } else {
                $file_data = $this->upload->data();
                
                $data = array(
                    'title' => $this->input->post('title'),
                    'file_name' => $file_data['file_name'],
                    'author' => intval($user->id)
                );
                
                $this->Document_model->insert_document($data);
                
                $this->session->set_flashdata('upload_success', 'Document uploaded successfully.');
                
                redirect('admin/documents');
                
            }
        }
    }
    
    /**
     * Edit an existing document.
     * 
     * @param int $id
     */
    public function edit($id) {
        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[4]|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            $data['document'] = $this->Document_model->get_document($id);
            
            //load view
            $this->load->view('admin/header', $data);
            $this->load->view('admin/documents/edit');
            $this->load->view('admin/header');
        } else {
            $data = array(
                'title' => $this->input->post('title')
            );
            
            $this->Document_model->update_document($data, $id);
            
            //set message
            $this->session->set_flashdata('document_saved', 'Document updated successfully.');
            
            redirect('admin/documents');
        }
    }
    
    /**
     * Delete a Document
     * 
     * @param int $id
     */
    public function delete($id) {
        $this->Document_model->delete_document($id);
        
        //set message
        $this->session->set_flashdata('document_deleted', 'Document deleted successfully.');
        
        //redirect
        redirect('admin/documents');
    }
    
    /**
     * Process upload
     */
//    public function do_upload() {
//        $config['upload_path'] = base_url() . 'documents/';
//        $config['allowed_types'] = 'pdf';
//        
//        
//        $this->load->library('upload', $config);
//        
//        if(!$this->upload->do_upload('userfile')) {
//            $error = array('error' => $this->upload->display_errors());
//            
//            $this->session->set_flashdata('upload_error', $error);
//        } else {
//            $file_data = array('upload_data' => $this->upload->data());
//            
//            $this->session->set_flashdata('upload_success', 'Document uploaded successfully.');
//            
//            return $file_data;
//        }
//    }
    
    
}