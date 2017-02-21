<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_controller extends CI_Controller
{

    private $avatarId = null;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('page');
        $this->load->model('avatar');
        $this->load->model('answer');

        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->helper('cookie');

        $this->setAvatarId();
    }

    public function index()
    {
        $avatars = $this->avatar->getAllAvatars();
        $pages = $this->page->getAllPages();
        $this->load->view('layouts/header', ['title' => 'Pages']);
        $this->load->view('layouts/topDropdown', ['avatars' => $avatars]);
        $this->load->view('pages', ['avatars' => $avatars, 'pages' => $pages]);
        $this->load->view('layouts/footer');
    }

    public function view($id)
    {
        $page = $this->page->getPage($id);
        $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $page->filename);
        $this->load->view('layouts/header', ['title' => 'Page']);
        $this->load->view('layouts/topDropdown', ['avatars' => $this->avatar->getAllAvatars()]);
        $this->load->view('saved-pages/' . $filename);
        $this->load->view('layouts/footer');
    }

    public function save()
    {
        $form_data = $this->input->post();
        if ($form_data && isset($form_data['pageString'])) {
            $pageString = $form_data['pageString'];
            $id = $this->page->savePage($pageString);
        }
        redirect('/pages');
    }

    private function setAvatarId()
    {
        if (!$this->avatarId) {
            $this->avatarId = get_cookie('avatarId');
            if (!$this->avatarId) {
                $avatar = $this->avatar->getFirstAvatar();
                $this->avatarId = isset($avatar) ? $avatar->id : '';
            }
        }
        set_cookie('avatarId', $this->avatarId, 2592000);
    }

}
