<?php

class Avatar extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_avatars($ids)
    {
        $query = $this->db->get_where('avatar', array('id' => $ids));
        return $query->result_array();

    }

}