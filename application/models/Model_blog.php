<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_blog extends CI_Model {

    private $table = 'articles';

    public function __construct(){
        parent::__construct();   
    }

    public function get_all(){
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_article_by_id($id){
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        $results = $query->result();
        if (!empty($results)){
            return $query->result()[0];
        }
        return null;
    }

    public function delete($id){
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    public function create($data = array()){
        if (isset($data['title'])){
            $this->db->set('title', $data['title']);
        }
        if (isset($data['user_id'])){
            $this->db->set('user_id', $data['user_id']);
        }
        if (isset($data['description'])){
            $this->db->set('description', $data['description']);
        }
        if (isset($data['content'])){
            $this->db->set('content', $data['content']);
        }
        $this->db->insert($this->table);
        return $this->db->insert_id();
    }
}