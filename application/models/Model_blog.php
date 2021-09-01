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
}