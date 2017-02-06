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

    public function updateAll($data)
    {
        return $this->db->update_batch('avatar_answer', $data, 'id');
    }

    public function getByAvatarId($id){
        $query = $this->db->get_where('avatar_answer', ['avatar_id'=>$id]);
        return $query->result();
    }

    public function deleteAnswer($id){
        return $this->db->delete('avatar_answer', ['id' => $id]);
    }

}