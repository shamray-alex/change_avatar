<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('avatar');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data=[];
        $data['avatars']=$this->avatar->get_avatars(1);
        $this->load->view('templates/header');
        $this->load->view('home', $data);
        $this->load->view('templates/footer');
    }
    
    public function new_avatar()
    {       
        $data=[];
        $data['avatars']=$this->avatar->get_avatars(1);
        $this->load->view('templates/header');
        $this->load->view('new-avatar', $data);
        $this->load->view('templates/footer');
    }
}