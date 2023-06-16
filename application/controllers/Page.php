<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
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
            $this->admin();
        }
    }

    public function admin()
    {
        $this->load->library('session');

        $data = ["title" => ""];

        if (isset($_SESSION['training_system'])) {
            $this->load->view('template/header', $data);
            $this->load->view('template/nav_bar');
            $this->load->view('admin/index');
            $this->load->view('template/required_script');
            $this->load->view('admin/ajax');
            $this->load->view('jquery/jquery');
            $this->load->view('template/footer');
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
            $this->admin();
        }
    }

    public function register()
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
}
