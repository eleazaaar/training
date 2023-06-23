<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_ extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        // echo $this->checkUser();
        if ($this->checkUser() === true) {
            // echo $this->validateInputs();
            if ($this->validateInputs() === true) {
                $data = array(
                    "email" => $_POST['email'],
                    "first_name" => $_POST['first_name'],
                    "middle_name" => $_POST['middle_name'],
                    "last_name" => $_POST['last_name'],
                    "password" => password_hash($_POST['password'], PASSWORD_BCRYPT)
                );

                $result = $this->db->insert('user', $data);

                if ($result) {
                    echo "Success";
                } else {
                    echo "Failed";
                }
            } else {
                echo $this->validateInputs();
            }
        } else {
            echo $this->checkUser();
        }
    }

    public function checkUser()
    {
        $this->db->select('id');
        $this->db->from('user');
        $this->db->where('email', $_POST['email']);
        $query = $this->db->get();

        if ($query->result()) {
            return "Email is Already Taken";
        } else {
            return true;
        }
    }

    public function validateInputs()
    {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            return "Invalid Email";
        } else if ($_POST['email'] == null) {
            return "Email Required";
        } else if ($_POST['first_name'] == null) {
            return "First Name Required";
        } else if ($_POST['last_name'] == null) {
            return "Last Name Required";
        } else if ($_POST['password'] == null) {
            return "Password Required";
        } else {
            return true;
        }
    }
}
