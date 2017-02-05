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
        $this->load->view('templates/header');
        $this->load->view('my_avatars', ['avatars' => $this->avatar->getAll()]);
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
            $data['avatar_questions'] = $this->avatar_question->getAll();
            $this->load->view('templates/header');
            $this->load->view('new-avatar', $data);
            $this->load->view('templates/footer');
        }
    }

}
