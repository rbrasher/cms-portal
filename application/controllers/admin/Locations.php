<?php if(!defined('BASEPATH')) exit('No direct script access allowed.');

class Locations extends MY_Controller {
    
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
     * All Locations
     */
    public function index() {
        $data['locations'] = $this->User_model->get_locations();
        
        //Load View
        $this->load->view('admin/header', $data);
        $this->load->view('admin/locations/index');
        $this->load->view('admin/footer');
    }
    
    /**
     * Add Location
     */
    public function add() {
        //Validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'trim|xss_clean');
        $this->form_validation->set_rules('lat_lng', 'Latitude & Longitude', 'trim|xss_clean');
        $this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');
        $this->form_validation->set_rules('target_open_date', 'Target Open Date', 'trim|xss_clean');
        $this->form_validation->set_rules('manager', 'Manager', 'trim|xss_clean');
        $this->form_validation->set_rules('district', 'District', 'trim|xss_clean');
        $this->form_validation->set_rules('pricing_strategy', 'Pricing Strategy', 'trim|xss_clean');
        $this->form_validation->set_rules('accepts_cash', 'Accepts Cash', 'trim|required|xss_clean');
        $this->form_validation->set_rules('accepts_manual_credit', 'Accepts Manual Credit', 'trim|required|xss_clean');
        $this->form_validation->set_rules('require_picture_verification', 'Require Picture Verification', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cash_pricing_strategy', 'Cash Pricing Strategy', 'trim|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            
            //Load View
            $this->load->view('admin/header');
            $this->load->view('admin/locations/add');
            $this->load->view('admin/footer');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'type' => $this->input->post('type'),
                'address' => $this->input->post('address'),
                'lat_lng' => $this->input->post('lat_lng'),
                'state' => $this->input->post('state'),
                'status' => $this->input->post('status'),
                'target_open_date' => $this->input->post('target_open_date'),
                'manager' => $this->input->post('manager'),
                'district' => $this->input->post('district'),
                'pricing_strategy' => $this->input->post('pricing_strategy'),
                'accepts_cash' => $this->input->post('accepts_cash'),
                'accepts_manual_credit' => $this->input->post('accepts_manual_credit'),
                'require_picture_verification' => $this->input->post('require_picture_verification'),
                'cash_pricing_strategy' => $this->input->post('cash_pricing_strategy')
            );
            
            //Insert Location
            $this->User_model->insert_location($data);
            
            //Set message
            $this->session->set_flashdata('location_saved', 'Location has been added.');
            
            redirect('admin/locations');
        }
    }
    
    /**
     * Edit a Location
     * 
     * @param int $id
     */
    public function edit($id) {
        //Validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'trim|xss_clean');
        $this->form_validation->set_rules('lat_lng', 'Latitude & Longitude', 'trim|xss_clean');
        $this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');
        $this->form_validation->set_rules('target_open_date', 'Target Open Date', 'trim|xss_clean');
        $this->form_validation->set_rules('manager', 'Manager', 'trim|xss_clean');
        $this->form_validation->set_rules('district', 'District', 'trim|xss_clean');
        $this->form_validation->set_rules('pricing_strategy', 'Pricing Strategy', 'trim|xss_clean');
        $this->form_validation->set_rules('accepts_cash', 'Accepts Cash', 'trim|required|xss_clean');
        $this->form_validation->set_rules('accepts_manual_credit', 'Accepts Manual Credit', 'trim|required|xss_clean');
        $this->form_validation->set_rules('require_picture_verification', 'Require Picture Verification', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cash_pricing_strategy', 'Cash Pricing Strategy', 'trim|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            $data['location'] = $this->User_model->get_location($id);
            
            //Load View
            $this->load->view('admin/header', $data);
            $this->load->view('admin/locations/edit');
            $this->load->view('admin/footer');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'type' => $this->input->post('type'),
                'address' => $this->input->post('address'),
                'lat_lng' => $this->input->post('lat_lng'),
                'state' => $this->input->post('state'),
                'status' => $this->input->post('status'),
                'target_open_date' => $this->input->post('target_open_date'),
                'manager' => $this->input->post('manager'),
                'district' => $this->input->post('district'),
                'pricing_strategy' => $this->input->post('pricing_strategy'),
                'accepts_cash' => $this->input->post('accepts_cash'),
                'accepts_manual_credit' => $this->input->post('accepts_manual_credit'),
                'require_picture_verification' => $this->input->post('require_picture_verification'),
                'cash_pricing_strategy' => $this->input->post('cash_pricing_strategy')
            );
            
            //Update Location
            $this->User_model->update_location($data, $id);
            
            //Set message
            $this->session->set_flashdata('location_saved', 'Location has been updated.');
            
            redirect('admin/locations');
        }
    }
    
    /**
     * Delete a Location
     * 
     * @param int $id
     */
    public function delete($id) {
        $this->User_model->delete_location($id);
        
        //Set message
        $this->session->set_flashdata('location_deleted', 'Location has been deleted.');
        
        redirect('admin/locations');
    }
}
