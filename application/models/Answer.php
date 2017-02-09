<?php

class Answer extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAnswer($entityType, $entityId)
    {
        $query = $this->db->get_where('answer', ['entity_type' => $entityType, 'entity_id' => $entityId]);
        $result = $query->result();
        if(count($result)>0) {
            $result = $result[0];
            $result->answer_object = $this->deserializeAnswers($result->answer_object);
            return $result->answer_object;
        }
        return $result;
    }

    public function createAnswer($entityType, $entityId, $answers)
    {
        $this->db->insert('answer', ['answer_object' => $this->serializeAnswers($answers), 'entity_type' => $entityType, 'entity_id' => $entityId]);
        return $this->db->insert_id();
    }

    public function updateAnswer($entityType, $entityId, $answer)
    {
        return $this->db->update('answer', ['answer_object' => $this->serializeAnswers($answer)], array('entity_type' => $entityType, 'entity_id' => $entityId));
    }

    public function deleteAnswer($entityType, $entityId)
    {
        return $this->db->delete('answer', array('entity_type' => $entityType, 'entity_id' => $entityId));
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