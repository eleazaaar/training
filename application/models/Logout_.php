<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout_ extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function recordTimeOut()
    {
        $user = array("email" => $_SESSION['email']);

        $query = $this->db->get_where('users', $user);

        if ($result = $query->row()) {
            // echo "User found";
            // print_r($result);

            $id = $result->id;

            // Current time
            $this->load->helper('date');
            $format = "%Y-%m-%d %H:%i:%s";
            $date = (string) mdate($format);

            $data = array(
                "time_out" => $date
            );

            $this->db->order_by('id', 'DESC');
            $this->db->update('user_data', $data, "users_id = $id", 1);
        }
    }
}
