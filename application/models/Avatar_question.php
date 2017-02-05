<?php

class Avatar_question extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAll()
    {
        $query = $this->db->get('avatar_question');
        return $query->result();
    }

}