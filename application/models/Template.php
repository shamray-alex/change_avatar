<?php

class Template extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getTemplate($id)
    {
        $query = $this->db->get_where('template', ['id' => $id]);
        return $query->result()[0];
    }

    public function getAllTemplates()
    {
        $query = $this->db->get('template');
        return $query->result();
    }

}