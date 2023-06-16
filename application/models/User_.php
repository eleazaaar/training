<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_ extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function getUserData()
    {
        $this->db->select('*');
        $this->db->from('user_data');
        $this->db->join('users', 'users.id = user_data.users_id');
        $this->db->where('user_data.users_id', $_SESSION['user_id']);
        $this->db->order_by('time_in', 'desc');
        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $value) {
            $name = $value->first_name . " " . $value->middle_name . " " . $value->last_name;
            $timeIn = date_format(date_create($value->time_in), "l F d, Y - h:i A");
            $timeOut = $value->time_out != "0000-00-00 00:00:00" ? date_format(date_create($value->time_out), "l F d, Y - h:i A") : "";
            $values = array("name" => $name, "email" => $value->email, "time_in" => $timeIn, "time_out" => $timeOut);
            array_push($result, $values);
        }

        echo json_encode(array('data' => $result));
    }

    public function getDataForReports()
    {
        $this->db->select('*');
        $this->db->from('user_data');
        $this->db->join('users', 'users.id = user_data.users_id');
        $this->db->where('user_data.users_id', $_SESSION['user_id']);
        $this->db->order_by('time_in', 'desc');
        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $value) {
            $name = $value->first_name . " " . $value->middle_name . " " . $value->last_name;
            $timeIn = date_format(date_create($value->time_in), "l F d, Y - h:i A");
            $timeOut = $value->time_out != "0000-00-00 00:00:00" ? date_format(date_create($value->time_out), "l F d, Y - h:i A") : "";
            $values = array("name" => $name, "email" => $value->email, "time_in" => $timeIn, "time_out" => $timeOut);
            array_push($result, $values);
        }

        return $result;
    }
}
