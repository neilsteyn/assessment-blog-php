<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

    private $table = 'users';

    public function __construct(){
        parent::__construct();
        
    }

    public function get_articles($user_id){
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('articles');
        return $query->result();
    }

    public function create($user_data = array()){
        $this->db->set('email', $user_data['email']);
        $this->db->set('password', password_hash($user_data['password'], PASSWORD_DEFAULT));
        $this->db->insert($this->table);
        return $this->db->insert_id();
    }

    public function get_user_by_email($email){
        $this->db->where('email', $email);
        $query = $this->db->get($this->table);
        return $query->result();
    }
}