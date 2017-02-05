<?php

class Avatar extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

     public function getAll()
    {
        $query = $this->db->get('avatar');
        return $query->result();
    }
    public function createAvatar(){
        $this->db->insert('avatar', ['updated_at'=>time()]);
        return $this->db->insert_id();
    }

}