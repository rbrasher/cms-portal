<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Bulletin_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Get all Bulletins
     * 
     * @param type $order_by
     * @param type $sort
     * @param type $limit
     * @param type $offset
     */
    public function get_bulletins($order_by = null, $sort = 'DESC', $limit = null, $offset = 0) {
        $this->db->select('a.*, b.name AS category_name, c.first_name, c.last_name');
        $this->db->from('bulletins AS a');
        $this->db->join('categories AS b', 'b.id = a.category_id', 'left');
        $this->db->join('users AS c', 'c.id = a.user_id', 'left');
        
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
     * Get Filtered Bulletins
     * 
     * @param type $keywords
     * @param type $order_by
     * @param type $sort
     * @param type $limit
     * @param type $offset
     */
    public function get_filtered_bulletins($keywords, $order_by = null, $sort = 'DESC', $limit = null, $offset = 0) {
        $this->db->select('a.*, b.name as category_name, c.first_name, c.last_name');
        $this->db->from('bulletins AS a');
        $this->db->join('categories AS b', 'b.id = a.category_id', 'left');
        $this->db->join('users AS c', 'c.id = a.user_id', 'left');
        $this->db->like('title', $keywords);
        $this->db->or_like('body', $keywords);
        
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
     * Get Menu Items
     * 
     * @return type
     */
    public function get_menu_items() {
        $this->db->where('in_menu', 1);
        $this->db->order_by('order');
        $query = $this->db->get('bulletins');
        
        return $query->result();
    }
    
    /**
     * Get Single Bulletin
     * 
     * @param int $id
     * @return type
     */
    public function get_bulletin($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('bulletins');
        
        return $query->row();
    }
    
    /**
     * Get Categories
     * 
     * @param type $order_by
     * @param type $sort
     * @param type $limit
     * @param type $offset
     */
    public function get_categories($order_by = null, $sort = 'DESC', $limit = null, $offset = 0) {
        $this->db->select('*');
        $this->db->from('categories');
        
        if($limit != null) {
            $this->db->limit($limit);
        }
        
        if($order_by != null) {
            $this->db->order_by($order_by, $sort);
        }
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    /**
     * Get Single Category
     * 
     * @param type $id
     * @return boolean
     */
    public function get_category($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('categories');
        
        return $query->row();
    }
    
    /**
     * Insert a Bulletin
     * 
     * @param type $data
     * @return boolean
     */
    public function insert_bulletin($data) {
        $this->db->insert('bulletins', $data);
        
        return true;
    }
    
    /**
     * Update a Bulletin
     * 
     * @param type $data
     * @param type $id
     * @return boolean
     */
    public function update_bulletin($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('bulletins', $data);
        
        return true;
    }
    
    /**
     * Publish Bulletin
     * 
     * @param type $id
     */
    public function publish_bulletin($id) {
        $data = array(
            'is_published' => 1
        );
        
        $this->db->where('id', $id);
        $this->db->update('bulletins', $data);
    }
    
    /**
     * Unpublish a Bulletin
     * 
     * @param type $id
     */
    public function unpublish_bulletin($id) {
        $data = array(
            'is_published' => 0
        );
        
        $this->db->where('id', $id);
        $this->db->update('bulletins', $data);
    }
    
    /**
     * Delete a Bulletin
     * 
     * @param type $id
     * @return boolean
     */
    public function delete_bulletin($id) {
        $this->db->where('id', $id);
        $this->db->delete('bulletins');
        
        return true;
    }
    
    /**
     * Insert a Category
     * 
     * @param type $data
     * @return boolean
     */
    public function insert_category($data) {
        $this->db->insert('categories', $data);
        
        return true;
    }
    
    /**
     * Update a Category
     * 
     * @param type $data
     * @param type $id
     * @return boolean
     */
    public function update_category($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('categories', $data);
        
        return true;
    }
    
    /**
     * Delete a Category
     * 
     * @param type $id
     * @return boolean
     */
    public function delete_category($id) {
        $this->db->where('id', $id);
        $this->db->delete('categories');
        
        return true;
    }
}