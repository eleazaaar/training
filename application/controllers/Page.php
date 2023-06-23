<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
    public function index()
    {
        $this->load->library('session');

        $data = ["title" => ""];

        if (!isset($_SESSION['training_system'])) {
            $this->load->view('template/header', $data);
            $this->load->view('template/nav_bar');
            $this->load->view('index');
            $this->load->view('template/required_script');
            $this->load->view('jquery/jquery');
            $this->load->view('template/footer');
        } else {
            $this->user();
        }
    }

    public function user()
    {
        $this->load->library('session');

        if (isset($_SESSION['training_system'])) {
            redirect(base_url('index.php/User/index'));
        } else {
            $this->login();
        }
    }

    public function login()
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
            $this->user();
        }
    }

    public function register()
    {
        $this->load->library('session');

        $data = ["title" => " | Register"];

        if (!isset($_SESSION['training_system'])) {
            $this->load->view('template/header', $data);
            $this->load->view('template/nav_bar');
            $this->load->view('register');
            $this->load->view('template/required_script');
            $this->load->view('jquery/jquery');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('index.php/User/index'));
        }
    }

    public function time()
    {
        echo date("l" . "\n" . "F d, Y" . "\n" . "h:i:s A");
    }
}
