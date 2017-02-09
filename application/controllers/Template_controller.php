<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Template_controller extends CI_Controller {

    private $coockie = null;

    public function __construct() {
        parent::__construct();

        $this->load->model('question');
        $this->load->model('template');
        $this->load->model('answer');
        $this->load->model('avatar');

        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->helper('cookie');

        $this->coockie = get_cookie('avatarId');
        if (!$this->coockie) {
            $avatar = $this->avatar->getFirstAvatar();            
            $this->coockie = $avatar->id;
            set_cookie('avatarId', $this->coockie, 2592000);
        }
    }

    public function index() {
        $this->load->view('layouts/header', ['title' => 'Choose Template']);
        $this->load->view('layouts/topDropdown', ['avatars' => $this->avatar->getAllAvatars()]);
        $this->load->view('choose-template', ['templates' => $this->template->getAllTemplates()]);
        $this->load->view('layouts/footer');
    }

    public function template_questions($id) {
        if (count($this->input->post())) {
            $form_data = $this->input->post();
            $answers = [];
            foreach ($form_data as $key => $value) {
                $questionId = intval(trim($key, 'question_id_'));
                $answers[$questionId] = $value;
            }
            $this->answer->createAnswer('template', $id, $answers);

            redirect('/preview-template/' . $id);
        } else {
            $data = [];
            $data['template'] = $this->template->getTemplate($id);
            $data['template_questions'] = $this->question->getQuestions($id);
            $data['pageType'] = 'create';
            $this->load->view('layouts/header', ['title' => 'Template Questionnaire']);
            $this->load->view('layouts/topDropdown', ['avatars' => $this->avatar->getAllAvatars()]);
            $this->load->view('template-questions', $data);
            $this->load->view('layouts/footer');
        }
    }

    public function preview_template($id) {
        $answer = $this->answer->getAnswer('template', $id);
        if (!count($answer)) {
            return $this->template_questions($id);
        } else {
            $data = [];
            $data['answers'] = [];
            $avatar_answers = $this->answer->getAnswer('avatar', 18);
            foreach ($answer as $key => $value) {
                $data['answers'][$key] = $value;
            }
            foreach ($avatar_answers as $key => $value) {
                $data['answers'][$key] = $value;
            }
            $template = $this->template->getTemplate($id);
            $info = pathinfo($template->template);
            $fname = $info['filename'];

            $this->load->view('layouts/header', ['title' => 'Template Questionnaire']);
            $this->load->view('layouts/topDropdown', ['avatars' => $this->avatar->getAllAvatars()]);
            $this->load->view('templates/' . $fname, $data);
            $this->load->view('layouts/footer');
        }
    }

    public function edit_template($id) {
        $answer = $this->answer->getAnswer('template', $id);
        if (!count($answer)) {
            return $this->template_questions($id);
        } else {
            
        }
    }

}
