<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Template_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('question');
        $this->load->model('template');
        $this->load->model('avatar');

        $this->load->helper('url_helper');
        $this->load->helper('form');
    }

    public function index()
    {
        $avatars = $this->avatar->getAllAvatars();
        $templates = $this->template->getAllTemplates();
        $this->load->view('templates/header', ['title' => 'Choose Template']);
        $this->load->view('templates/topDropdown', ['avatars' => $avatars]);
        $this->load->view('choose-template', ['templates' => $templates]);
        $this->load->view('templates/footer');
    }

}
