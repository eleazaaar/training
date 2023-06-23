<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout_ extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function index()
    {
        // $this->Logout_->recordTimeOut();

        if (isset($_SESSION['training_system'])) {

            $data = array("training_system", "user_id", "email", "name");

            $this->session->unset_userdata($data);
        }

        redirect(base_url('index.php/Page/index'));
    }
}
