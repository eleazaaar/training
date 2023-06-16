<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_');
    }

    public function index()
    {
        $this->load->library('session');

        $data = ["title" => " | Register"];

        $this->load->view('template/header', $data);
        $this->load->view('template/nav_bar');
        $this->load->view('register');
        $this->load->view('template/required_script');
        $this->load->view('jquery/jquery');
        $this->load->view('template/footer');
    }

    public function registerUser()
    {
        $this->Register_->index();
    }
}
