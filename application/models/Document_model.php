<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');

class Document_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Get all Documents
     * 
     * @return object
     */
    public function get_documents() {
        $this->db->select('a.*, c.first_name, c.last_name');
        $this->db->from('documents AS a');
        $this->db->join('users AS c', 'c.id = a.author', 'left');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
     * Get Single Document
     * 
     * @param type $id
     * @return object
     */
    public  function get_document($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('documents');
        
        return $query->row();
    }
    
    /**
     * Insert a new Document
     * 
     * @param type $data
     * @return boolean
     */
    public function insert_document($data) {
        $this->db->insert('documents', $data);
        
        return true;
    }
    
    /**
     * Update a Document
     * 
     * @param type $data
     * @param type $id
     * @return boolean
     */
    public function update_document($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('documents', $data);
        
        return true;
    }
    
    /**
     * Delete a Document
     * 
     * @param type $id
     * @return boolean
     */
    public function delete_document($id) {
        $this->db->where('id', $id);
        $this->db->delete('documents');
        
        return true;
    }
    
}