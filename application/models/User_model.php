<?php if(!defined('BASEPATH')) exit('No direct script access allowed.');

class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Get All Users
     * 
     * @param type $order_by
     * @param type $sort
     * @param type $limit
     * @param type $offset
     */
    public function get_users($order_by = null, $sort = 'DESC', $limit = null, $offset = 0) {
        $this->db->select('*');
        $this->db->from('users');
        
        if($limit != null) {
            $this->db->limit($limit, $offset);
        }
        
        if($order_by != null) {
            $this->db->order_by($order_by, $sort);
        }
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    /**
     * Get Single User
     * 
     * @param type $id
     * @return type
     */
    public function get_user($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        
        return $query->row();
    }
    
    /**
     * Insert a user
     * 
     * @param type $data
     * @return boolean
     */
    public function insert($data) {
        $this->db->insert('users', $data);
        return true;
    }
    
    /**
     * Update a User
     * 
     * @param type $data
     * @param type $id
     * @return boolean
     */
    public function update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        
        return true;
    }
    
    /**
     * Delete User
     * 
     * @param type $id
     */
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('users');
        
        return true;
    }
    
    /**
     * Get User Groups
     * 
     * @return type
     */
    public function get_groups() {
        $query = $this->db->get('groups');
        return $query->result();
    }
    
    /**
     * Get Single Group
     * 
     * @param type $id
     * @return type
     */
    public function get_group($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('groups');
        
        return $query->row();
    }
    
    /**
     * Insert new group
     * 
     * @param type $data
     * @return boolean
     */
    public function insert_group($data) {
        $this->db->insert('groups', $data);
        return true;
    }
    
    /**
     * Update a group
     * 
     * @param type $data
     * @param type $id
     * @return boolean
     */
    public function update_group($data, $id) {
        $this->db->where('id', $id);
        $this->db->udpate('groups', $data);
        
        return true;
    }
    
    /**
     * Delete a group
     * 
     * @param type $id
     * @return boolean
     */
    public function delete_group($id) {
        $this->db->where('id', $id);
        $this->db->delete('groups');
        
        return true;
    }
    
    /**
     * Get Locations
     * 
     * @return type
     */
    public function get_locations() {
        $query = $this->db->get('locations');
        
        return $query->result();
    }
    
    /**
     * Get Single Location
     * 
     * @param type $id
     * @return type
     */
    public function get_location($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('locations');
        
        return $query->row();
    }
    
    /**
     * Insert a Location
     * 
     * @param type $data
     * @return boolean
     */
    public function insert_location($data) {
        $this->db->insert('locations', $data);
        return true;
    }
    
    /**
     * Update a Location
     * 
     * @param type $data
     * @param type $id
     * @return boolean
     */
    public function update_location($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('locations', $data);
        
        return true;
    }
    
    /**
     * Delete a Location
     * 
     * @param int $id
     * @return boolean
     */
    public function delete_location($id) {
        $this->db->where('id', $id);
        $this->db->delete('locations');
        
        return true;
    }
    
    /**
     * Get all FAQs
     * 
     * @return type
     */
    public function get_faqs() {
        $query = $this->db->get('faq');
        return $query->result();
    }
    
    /**
     * Get Single FAQ
     * 
     * @param int $id
     * @return type
     */
    public function get_faq($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('faq');
        
        return $query->row();
    }
    
    /**
     * Insert a new FAQ
     * 
     * @param array $data
     * @return boolean
     */
    public function insert_faq($data) {
        $this->db->insert('faq', $data);
        return true;
    }
    
    /**
     * Update FAQ
     * 
     * @param array $data
     * @param int $id
     * @return boolean
     */
    public function update_faq($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('faq', $data);
        
        return true;
    }
    
    /**
     * Delete a FAQ
     * 
     * @param int $id
     * @return boolean
     */
    public function delete_faq($id) {
        $this->db->where('id', $id);
        $this->db->delete('faq');
        
        return true;
    }
    
    /**
     * Get all videos
     * 
     * @return type
     */
    public function get_videos() {
        $query = $this->db->get('videos');
        return $query->result();
    }
    
    /**
     * Get single video
     * 
     * @param int $id
     * @return object
     */
    public function get_video($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('videos');
        
        return $query->row();
    }
    
    /**
     * Insert New Video
     * 
     * @param array $data
     * @return boolean
     */
    public function insert_video($data) {
        $this->db->insert('videos', $data);
        return true;
    }
    
    /**
     * Update a video
     * 
     * @param array $data
     * @param int $id
     * @return boolean
     */
    public function update_video($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('videos', $data);
        
        return true;
    }
    
    /**
     * Delete a video
     * 
     * @param int $id
     * @return boolean
     */
    public function delete_video($id) {
        $this->db->where('id', $id);
        $this->db->delete('videos');
        
        return true;
    }
}