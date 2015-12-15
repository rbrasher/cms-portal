<?php if(!defined('BASEPATH')) exit('No direct script access allowed.');

class Videos extends MY_Controller {
    
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
     * All Videos
     */
    public function index() {
        //Get Videos
        $data['videos'] = $this->User_model->get_videos();
        
        //Load View
        $this->load->view('admin/header', $data);
        $this->load->view('admin/videos/index');
        $this->load->view('admin/footer');
    }
    
    /**
     * Add a video
     */
    public function add() {
        //Form validation
        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[4]|xss_clean');
        $this->form_validation->set_rules('description', 'trim|xss_clean');
        $this->form_validation->set_rules('video', 'Video', 'trim|required');
        
        if($this->form_validation->run() == FALSE) {
            //Load View
            $this->load->view('admin/header');
            $this->load->view('admin/videos/add');
            $this->load->view('admin/footer');
        } else {
            $data = array(
                'title'         => $this->input->post('title'),
                'description'   => $this->input->post('description'),
                'video'         => $this->input->post('video')
            );
            
            //Insert Video
            $this->User_model->insert_video($data);
            
            //Set Message
            $this->session->set_flashdata('video_saved', 'Video saved successfully.');
            
            redirect('admin/videos');
        }
    }
    
    /**
     * Edit a Video
     * 
     * @param int $id
     */
    public function edit($id) {
        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[4]|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');
        $this->form_validation->set_rules('video', 'Video', 'trim|required');
        
        if($this->form_validation->run() == FALSE) {
            $data['video'] = $this->User_model->get_video($id);
            
            //Load View
            $this->load->view('admin/header', $data);
            $this->load->view('admin/videos/edit');
            $this->load->view('admin/footer');
        } else {
            $data = array(
                'title'         => $this->input->post('title'),
                'description'   => $this->input->post('description'),
                'video'         => $this->input->post('video')
            );
            
            //Update Video
            $this->User_model->update_video($data, $id);
            
            //Set message
            $this->session->set_flashdata('video_saved', 'Video updated successfully.');
            
            redirect('admin/videos');
        }
    }
    
    public function delete($id) {
        $this->User_model->delete_video($id);
        
        //Set message
        $this->session->set_flashdata('video_deleted', 'Video deleted successfully.');
        
        redirect('admin/videos');
    }
}