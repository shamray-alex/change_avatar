<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Template_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('question');
        $this->load->model('template');
        $this->load->model('answer');
        $this->load->model('avatar');

        $this->load->helper('url_helper');
        $this->load->helper('form');
    }

    public function index()
    {
        $this->load->view('templates/header', ['title' => 'Choose Template']);
        $this->load->view('templates/topDropdown', ['avatars' => $this->avatar->getAllAvatars()]);
        $this->load->view('choose-template', ['templates' => $this->template->getAllTemplates()]);
        $this->load->view('templates/footer');
    }

    public function template_questions($id){
        $data=[];
        $data['template']=$this->template->getTemplate($id);
        $data['template_questions']=$this->question->getQuestions($id);
        $data['pageType']='create';
        $this->load->view('templates/header', ['title' => 'Template Questionnaire']);
        $this->load->view('templates/topDropdown', ['avatars' => $this->avatar->getAllAvatars()]);
        $this->load->view('template-questions', $data);
        $this->load->view('templates/footer');
    }

    public function preview_template($id){
        $answer=$this->answer->getAnswer('remplate', $id);
        if(!count($answer)){
            return $this->template_questions($id);
        }else{

        }

    }
    public function edit_template($id){
        if(!$id){
            return $this->template_questions($id);
        }else{

        }
    }

}
