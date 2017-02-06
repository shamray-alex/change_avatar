<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Avatar_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('avatar_question');
        $this->load->model('avatar');
        $this->load->model('avatar_answer');

        $this->load->helper('url_helper');
        $this->load->helper('form');
    }

    public function index() {
        $this->load->view('templates/header', ['title'=>'My Avatars']);
        $this->load->view('templates/topDropdown', ['answers' => $this->getAnswers()]);
        $this->load->view('my-avatars', ['answers' => $this->getAnswers()]);
        $this->load->view('templates/footer');
    }

    public function create_avatar() {
        if ($form_data = $this->input->post()) {
            $newAvatarId = $this->avatar->createAvatar();
            $answers = [];
            foreach ($form_data as $key => $value) {
                if ($value) {
                    $questionId = intval(trim($key, 'question_id_'));
                    array_push($answers, ['avatar_id' => $newAvatarId,
                        'avatar_question_id' => $questionId,
                        'answer' => $value]);
                }
            }
            $isCreated = $this->avatar_answer->createAll($answers);
            var_dump($isCreated);
            exit;
        } else {
            $data = [];
            $data['pageType']='create';
            $data['avatar_questions'] = $this->avatar_question->getAll();
            $this->load->view('templates/header', ['title'=>'Create Avatar']);
            $this->load->view('templates/topDropdown', ['answers' => $this->getAnswers()]);
            $this->load->view('new-avatar', $data);
            $this->load->view('templates/footer');
        }
    }

    public function update_avatar_answers($id=null) {
        if (!$id || $form_data = $this->input->post()) {
            $answers=[];
            foreach ($form_data as $key => $value) {
                $questionId = intval(trim($key, 'question_id_'));
                if ($value) {
                    array_push($answers, [
                        'id' => $questionId,
                        'answer' => $value]);
                }
                else{
                    $this->avatar_answer->deleteAnswer($questionId);
                }
            }
            $isUpdated = $this->avatar_answer->updateAll($answers);
            var_dump($isUpdated);
            exit;
        } else {
            $data = [];
            $data['avatar_questions'] = $this->avatar_question->getAll();
            $data['pageType']='edit';
            $data['avatarId']=$id;
            $avatarAnswers= $this->avatar_answer->getByAvatarId($id);
            for ($i=0;$i<count($data['avatar_questions']);$i++){
                for ($j=0;$j<count($avatarAnswers);$j++){
                    if($avatarAnswers[$j]->avatar_question_id==$data['avatar_questions'][$i]->id){
                        $data['avatar_questions'][$i]->answer=$avatarAnswers[$j]->answer;
                        break;
                    }
                }
            }

            $this->load->view('templates/header', ['title'=>'Edit Avatar']);
            $this->load->view('templates/topDropdown', ['answers' => $this->getAnswers()]);
            $this->load->view('new-avatar', $data);
            $this->load->view('templates/footer');
        }
    }

    private function getAnswers(){
        $avatars = $this->avatar->getAll();
        $answers=[];
        foreach ($avatars as $key=>$value){
            array_push($answers, $this->avatar_answer->getByAvatarId($value->id));
        }
        return $answers;
    }

}
