<?php

class Avatar extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function getAvatar($id) {
        $query = $this->db->get_where('avatar', ['id' => $id]);
        $result = $query->result()[0];
        $result->answer_object = $this->answer->getAnswer('avatar', $id);
        return $result;
    }

    public function getAllAvatars() {
        $this->load->model('answer');
        $query = $this->db->get('avatar');
        $result = $query->result();
        foreach ($result as $avatar) {
            $avatar->answer_object = $this->answer->getAnswer('avatar', $avatar->id);
        }
        return $result;
    }

    public function getFirstAvatar() {
        $query = $this->db->get('avatar', 1);
        $res = $query->result();
        return count($res) ? $res[0] : null;
    }

    public function createAvatar() {
        $this->db->insert('avatar', ['created_at' => time()]);
        return $this->db->insert_id();
    }

   
    public function deleteAvatar($id) {
        $this->answer->deleteAnswer('avatar', $id);
        return $this->db->delete('avatar', array('id' => $id));
    }

}
