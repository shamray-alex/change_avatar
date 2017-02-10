<?php

class Template_headline extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getHeadlines($templateId)
    {
        $query = $this->db->get_where('template_headline', ['template_id' => $templateId]);
        $res=$query->result();
        $res=json_decode($res[0]->headline, true);
        return $res;
    }

}