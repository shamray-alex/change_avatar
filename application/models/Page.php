<?php

class Page extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function getPage($id)
    {
        $query = $this->db->get_where('page', ['id' => $id]);
        return $query->result()[0];
    }

    public function getAllPages()
    {
        $query = $this->db->get('page');
        return $query->result();
    }

}