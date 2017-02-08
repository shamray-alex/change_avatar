<?php

class Avatar extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAvatar($id)
    {
        $query = $this->db->get_where('avatar', ['id' => $id]);
        $result = $query->result()[0];
        $result->answer_object = $this->deserializeAnswers($result->answer_object);
        return $result;
    }

    public function getAllAvatars()
    {
        $query = $this->db->get('avatar');
        $result = $query->result();
        foreach ($result as $avatar) {
            $avatar->answer_object = $this->deserializeAnswers($avatar->answer_object);
        }
        return $result;
    }

    public function createAvatar($answers)
    {
        $this->db->insert('avatar', ['answer_object' => $this->serializeAnswers($answers), 'updated_at' => time()]);
        return $this->db->insert_id();
    }

    public function updateAvatar($id, $answers)
    {
        return $this->db->update('avatar', ['answer_object' => $this->serializeAnswers($answers)], array('id' => $id));
    }

    public function deleteAvatar($id)
    {
        return $this->db->delete('avatar', array('id' => $id));
    }

    private function serializeAnswers($answers)
    {
        return json_encode($answers);
    }

    private function deserializeAnswers($answersString)
    {
        return json_decode($answersString, true);
    }

}