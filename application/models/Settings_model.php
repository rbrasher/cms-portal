<?php if(!defined('BASEPATH')) exit('No direct script access allowed.');

class Settings_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Get Global Settings
     * 
     * @return type
     */
    public function get_global_settings() {
        $query = $this->db->get('settings');
        $result = $query->result();
        
        return $result;
    }
    
    public function update_global_settings($data) {
        $this->db->update('settings', $data);
        
        //maybe set flash message here
        return true;
    }
}