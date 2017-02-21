<?php

class Page extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('file');
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

    public function savePage($pageString)
    {
        $filename = time() . '.php';
        $file = FCPATH . 'application/views/saved-pages/' . $filename;
        if (write_file($file, $pageString, 'w+')) {
            $this->db->insert('page', ['filename' => $filename]);
            return $this->db->insert_id();
        }
        return null;
    }

}