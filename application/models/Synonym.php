<?php

class Synonym extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function getSynonyms()
    {
        $query = $this->db->get('synonym');
        return $query->result();
    }
        
}
