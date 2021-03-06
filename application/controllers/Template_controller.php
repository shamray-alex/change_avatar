<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Template_controller extends CI_Controller
{

    private $avatarId = null;

//    private $avatarChanged = false;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('question');
        $this->load->model('template');
        $this->load->model('answer');
        $this->load->model('avatar');

        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->helper('cookie');

        $this->setAvatarId();
    }

    public function index()
    {
        $this->load->view('layouts/header', ['title' => 'Choose Template']);
        $this->load->view('layouts/topDropdown', ['avatars' => $this->avatar->getAllAvatars()]);
        $this->load->view('choose-template', ['templates' => $this->template->getAllTemplates()]);
        $this->load->view('layouts/footer');
    }

    public function template_questions($id, $pageType='create')
    {
//        if (count($this->input->post()) && !$this->avatarChanged) {
//            $form_data = $this->input->post();
//            $answers = [];
//            foreach ($form_data as $key => $value) {
//                $questionId = intval(trim($key, 'question_id_'));
//                $answers[$questionId] = $value;
//            }
////            $this->answer->createAnswer('template', $id, $answers);
//
//            redirect('/edit-template/' . $id);
//        } else {
        $data = [];
        $data['template'] = $this->template->getTemplate($id);
        $data['template_questions'] = $this->question->getQuestions($id);
        $data['pageType'] = $pageType;
        $this->load->view('layouts/header', ['title' => 'Template Questionnaire']);
        $this->load->view('layouts/topDropdown', ['avatars' => $this->avatar->getAllAvatars()]);
        $this->load->view('template-questions', $data);
        $this->load->view('layouts/footer');
//        }
    }

    public function preview_template($id)
    {
        if (!count($this->input->post())) {
            return $this->template_questions($id, 'preview');
        } else {
            $form_data = $this->input->post();
            $answers = [];
            foreach ($form_data as $key => $value) {
                $questionId = intval(trim($key, 'question_id_'));
                $answers[$questionId] = $value;
            }
            $data = [];
            $data['answers'] = [];
            $avatar_answers = $this->answer->getAnswer('avatar', $this->avatarId);

            foreach ($answers as $key => $value) {
                $data['answers'][$key] = $value;
            }
            foreach ($avatar_answers as $key => $value) {
                $data['answers'][$key] = $value;
            }
            $template = $this->template->getTemplate($id);
            $info = pathinfo($template->template);
            $fname = $info['filename'];
            $this->load->view('layouts/header', ['title' => 'Preview Template']);
            $this->load->view('layouts/topDropdown', ['avatars' => $this->avatar->getAllAvatars()]);
            $this->load->view('templates/' . $fname, $data);
            $this->load->view('layouts/carousel', ['headlines'=>$this->getHeadlines($id)]);
            $this->load->view('layouts/footer');
        }
    }

    public function edit_template($id)
    {
        if (!count($this->input->post())) {
            return $this->template_questions($id);
        } else {
            $form_data = $this->input->post();
            $answers = [];
            foreach ($form_data as $key => $value) {
                $questionId = intval(trim($key, 'question_id_'));
                $answers[$questionId] = $value;
            }
            $this->load->model('synonym');
            $answerData = [];
            $data = [];

            $answerData['answers'] = [];
            $avatar_answers = $this->answer->getAnswer('avatar', $this->avatarId);
            foreach ($answers as $key => $value) {
                $answerData['answers'][$key] = $value;
            }

            foreach ($avatar_answers as $key => $value) {
                $answerData['answers'][$key] = $value;
            }
            $data['answers'] = json_encode($answerData['answers']);
            $template = $this->template->getTemplate($id);
            $info = pathinfo($template->template);
            $fname = $info['filename'];
            $data['synonyms'] = json_encode($this->synonym->getSynonyms());

            $this->load->view('layouts/header', ['title' => 'Preview Template']);
            $this->load->view('layouts/topDropdown', ['avatars' => $this->avatar->getAllAvatars()]);
            $this->load->view('templates/' . $fname, $answerData);
            $this->load->view('edit-template', $data);
            $this->load->view('layouts/carousel', ['headlines'=>$this->getHeadlines($id)]);
            $this->load->view('layouts/footer');
        }
    }

    public function clear_template_answers($id)
    {
        $this->answer->deleteAnswer('template', $id);
        redirect('/choose-template');
    }

    private function getHeadlines($templateId)
    {
        $this->load->model('template_headline');
        $headlines = $this->template_headline->getHeadlines($templateId);
//        for ($i = 0; $i < count($headlines); $i++) {
//            $matches = [];
//            preg_match_all('/{%([0-9]+)%}/', $headlines[$i], $matches);
//            for ($j = 0; $j < count($matches[0]); $j++) {
//                $ans = isset($answers[$matches[1][$j]]) ? $answers[$matches[1][$j]] : '';
//                $headlines[$i] = str_replace($matches[0][$j], $ans, $headlines[$i]);
//            }
//        }
        return $headlines;
    }

    private function setAvatarId()
    {
//        $post_data = $this->input->post();
//        if (isset($post_data['changeAvatarId'])) {
//            $this->avatarId = $post_data['changeAvatarId'];
//            $this->avatarChanged = true;
//        }
        if (!$this->avatarId) {
            $this->avatarId = get_cookie('avatarId');
            if (!$this->avatarId) {
                $avatar = $this->avatar->getFirstAvatar();
                $this->avatarId = isset($avatar) ? $avatar->id : '';
            }
        }
        if (!$this->avatarId) {
            redirect('/create-avatar');
        } else {
            set_cookie('avatarId', $this->avatarId, 2592000);
        }
    }

}
