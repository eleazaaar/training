<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_');
    }

    public function index()
    {
        $this->load->library('session');

        $data = ["title" => " | Login"];

        if (!isset($_SESSION['training_system'])) {
            $this->load->view('template/header', $data);
            $this->load->view('template/nav_bar');
            $this->load->view('login');
            $this->load->view('template/required_script');
            $this->load->view('jquery/jquery');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('index.php/Page/admin'));
        }
    }

    public function loginUser()
    {
        $this->Login_->index();
    }
}
