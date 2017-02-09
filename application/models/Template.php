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

//    public function getTemplateQuestions($id)
//    {
//        $query = $this->db->get_where('question', ['template_id' => $id]);
//        return $query->result();
//    }

    public function getAllTemplates()
    {
        $this->load->model('template_headline');

        $query = $this->db->get('template');
        $result = $query->result();
        foreach ($result as $res) {
            $res->headlines = $this->template_headline->getHeadlines($res->id);
        }
        return $result;
    }

}