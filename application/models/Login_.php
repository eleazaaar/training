<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_ extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $user = array("email" => $_POST['email']);
        $password = $_POST['password'];

        $query = $this->db->get_where('user', $user);

        if ($result = $query->row()) {
            // echo "User found";
            // print_r($result);

            $data = array(
                "training_system" => "login_system",
                "user_id" => $result->id,
                "email" => $result->email,
                "name" => $result->first_name . " " . $result->middle_name . " " . $result->last_name,
            );

            if (password_verify($password, $result->password)) {
                $this->load->library('session');

                $this->session->set_userdata($data);

                // $this->recordTimeIn();

                echo "Success";
            } else {
                echo "Wrong Password";
            }
        } else {
            echo "No user found";
        }
    }
}
