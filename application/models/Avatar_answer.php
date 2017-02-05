<?php

class Avatar_answer extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function createAll($data)
    {
        return $this->db->insert_batch('avatar_answer', $data);
    }

}