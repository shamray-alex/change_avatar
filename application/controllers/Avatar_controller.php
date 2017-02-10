<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Avatar_controller extends CI_Controller
{

    private $avatarId = null;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('question');
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
        $this->load->view('layouts/header', ['title' => 'My Avatars']);
        $this->load->view('layouts/topDropdown', ['avatars' => $avatars]);
        $this->load->view('my-avatars', ['avatars' => $avatars]);
        $this->load->view('layouts/footer');
    }

    public function create_avatar()
    {
        if ($form_data = $this->input->post()) {
            $answers = [];
            foreach ($form_data as $key => $value) {
//                if ($value) {
                    $questionId = intval(trim($key, 'question_id_'));
                    $answers[$questionId] = $value;
//                }
            }
            $newAvatarId = $this->avatar->createAvatar();
            $this->answer->createAnswer('avatar', $newAvatarId, $answers);

            redirect('/my-avatars');
        } else {
            $data = [];
            $data['pageType'] = 'create';
            $data['avatar_questions'] = $this->question->getQuestions(null);
            $this->load->view('layouts/header', ['title' => 'Create Avatar']);
            $this->load->view('layouts/topDropdown', ['avatars' => $this->avatar->getAllAvatars()]);
            $this->load->view('new-avatar', $data);
            $this->load->view('layouts/footer');
        }
    }

    public function update_avatar_answers($id = null)
    {
        if ($form_data = $this->input->post()) {
            $answers = [];
            foreach ($form_data as $key => $value) {
//                if ($value) {
                    $questionId = intval(trim($key, 'question_id_'));
                    $answers[$questionId] = $value;
//                }
            }
            $isUpdated = $this->avatar->updateAvatar($id, $answers);
            redirect('/my-avatars');
        } else {
            $data = [];
            $data['avatar_questions'] = $this->question->getQuestions(null);
            $data['pageType'] = 'edit';
            $data['avatar'] = $this->avatar->getAvatar($id);
            $this->load->view('layouts/header', ['title' => 'Edit Avatar']);
            $this->load->view('layouts/topDropdown', ['avatars' => $this->avatar->getAllAvatars()]);
            $this->load->view('new-avatar', $data);
            $this->load->view('layouts/footer');
        }
    }

    public function deleteAvatar($id){
        if(!$id){
            return redirect('/my-avatars');
        }
        $this->avatar->deleteAvatar($id);
        return redirect('/my-avatars');
    }

    private function setAvatarId(){
        $post_data = $this->input->post();
        if(isset($post_data['changeAvatarId'])){
            $this->avatarId =$post_data['changeAvatarId'];
        }
        if (!$this->avatarId) {
            $this->avatarId = get_cookie('avatarId');
            if (!$this->avatarId) {
                $avatar = $this->avatar->getFirstAvatar();
                $this->avatarId = $avatar->id;
            }
        }
        set_cookie('avatarId', $this->avatarId, 2592000);
    }

}
