<?php

class Question extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getQuestion($template_id=null)
    {
        $query = $this->db->get_where('question', ['template_id' => $template_id]);
        $result = $query->result();
        foreach ($result as $res) {
            if ($res->predefined_answers) {
                $res->predefined_answers = json_decode($res->predefined_answers, true);
            }
        }
        return $result;
    }

}