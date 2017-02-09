<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Avatar_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('question');
        $this->load->model('avatar');
        $this->load->model('answer');

        $this->load->helper('url_helper');
        $this->load->helper('form');
    }

    public function index()
    {
        $avatars = $this->avatar->getAllAvatars();
        $this->load->view('templates/header', ['title' => 'My Avatars']);
        $this->load->view('templates/topDropdown', ['avatars' => $avatars]);
        $this->load->view('my-avatars', ['avatars' => $avatars]);
        $this->load->view('templates/footer');
    }

    public function create_avatar()
    {
        if ($form_data = $this->input->post()) {
            $answers = [];
            foreach ($form_data as $key => $value) {
                if ($value) {
                    $questionId = intval(trim($key, 'question_id_'));
                    $answers[$questionId] = $value;
                }
            }
            $newAvatarId = $this->avatar->createAvatar();
            $this->answer->createAnswer('avatar', $newAvatarId, $answers);

            redirect('/my-avatars');
        } else {
            $data = [];
            $data['pageType'] = 'create';
            $data['avatar_questions'] = $this->question->getQuestions(null);
            $this->load->view('templates/header', ['title' => 'Create Avatar']);
            $this->load->view('templates/topDropdown', ['avatars' => $this->avatar->getAllAvatars()]);
            $this->load->view('new-avatar', $data);
            $this->load->view('templates/footer');
        }
    }

    public function update_avatar_answers($id = null)
    {
        if ($form_data = $this->input->post()) {
            $answers = [];
            foreach ($form_data as $key => $value) {
                if ($value) {
                    $questionId = intval(trim($key, 'question_id_'));
                    $answers[$questionId] = $value;
                }
            }
            $isUpdated = $this->avatar->updateAvatar($id, $answers);
            redirect('/my-avatars');
        } else {
            $data = [];
            $data['avatar_questions'] = $this->question->getQuestions(null);
            $data['pageType'] = 'edit';
            $data['avatar'] = $this->avatar->getAvatar($id);
            $this->load->view('templates/header', ['title' => 'Edit Avatar']);
            $this->load->view('templates/topDropdown', ['avatars' => $this->avatar->getAllAvatars()]);
            $this->load->view('new-avatar', $data);
            $this->load->view('templates/footer');
        }
    }

    public function deleteAvatar($id){
        if(!$id){
            return redirect('/my-avatars');
        }
        $this->avatar->deleteAvatar($id);
        return redirect('/my-avatars');
    }

}
