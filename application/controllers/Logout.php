<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Logout_');
    }

    public function index()
    {
        $this->load->library('session');

        $this->Logout_->recordTimeOut();

        if (isset($_SESSION['training_system'])) {

            $data = array("training_system", "user_id", "email", "name");

            $this->session->unset_userdata($data);
        }

        redirect(base_url('index.php/Page/login'));
    }
}
