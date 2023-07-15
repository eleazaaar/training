<?php

use Mpdf\Http\Response;

defined('BASEPATH') or exit('No direct script access allowed');

class User_ extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->library('user_agent');
        $this->load->helper('url', 'form');
    }

    public function getUserInformation()
    {
        $query = $this->db->query("SELECT email, first_name, middle_name, last_name FROM user WHERE id = " . $_SESSION['user_id']);

        return $query->result_array();
    }

    public function updateUserInformation()
    {
        $response = "";

        try {
            $this->db->query("UPDATE user 
                SET email = '" . $this->input->post('email') . "', 
                first_name = '" . $this->input->post('first-name') . "', 
                middle_name = '" . $this->input->post('middle-name') . "', 
                last_name = '" . $this->input->post('last-name') . "' 
                WHERE id = " . $_SESSION['user_id']);

            $response =  "Success";
        } catch (\Throwable $th) {
            $response = $th;
        } finally {
            echo $response;
        }
    }

    public function getUserDataForLoggedSession()
    {
        // $this->db->select('*');
        // $this->db->from('user_data');
        // $this->db->join('user', 'user.id = user_data.user_id');
        // $this->db->where('user_data.user_id', $_SESSION['user_id']);
        // $this->db->order_by('time_in', 'desc');
        // $query = $this->db->get();

        $query = $this->db->query("SELECT * FROM user_data
        INNER JOIN user ON user.id = user_data.user_id
        WHERE user_data.user_id = " . $_SESSION['user_id'] .
            " ORDER BY time_in DESC");

        $result = [];

        foreach ($query->result() as $value) {
            $name = $value->first_name . " " . $value->middle_name . " " . $value->last_name;
            $timeIn = date_format(date_create($value->time_in), "l F d, Y - h:i A");
            $timeOut = $value->time_out != "0000-00-00 00:00:00" ? date_format(date_create($value->time_out), "l F d, Y - h:i A") : "";
            $country = $value->country;
            $location = $country . ', ' . $value->city;
            $values = array("time_in" => $timeIn, "time_out" => $timeOut, "location" => $location, "ip_address" => $value->ip_address, "browser" => $value->browser);
            array_push($result, $values);
        }

        echo json_encode(array('data' => $result));
    }

    public function getUserDataForAttendance()
    {
        // $this->db->select('*');
        // $this->db->from('user_data');
        // $this->db->join('user', 'user.id = user_data.user_id');
        // $this->db->where('user_data.user_id', $_SESSION['user_id']);
        // $this->db->order_by('time_in', 'desc');
        // $query = $this->db->get();

        $query = $this->db->query("SELECT * FROM user_data 
        INNER JOIN user ON user.id = user_data.user_id 
        WHERE user_data.user_id = '" . $_SESSION['user_id'] . "'");

        $result = [];

        foreach ($query->result() as $value) {
            $timeIn = date_format(date_create($value->time_in), "l F d, Y - h:i A");
            $timeOut = $value->time_out != "0000-00-00 00:00:00" ? date_format(date_create($value->time_out), "l F d, Y - h:i A") : "";
            $values = array("time_in" => $timeIn, "time_out" => $timeOut);
            array_push($result, $values);
        }

        echo json_encode(array('data' => $result));
    }

    public function getUserDataForLoggedSessionReport($from, $to)
    {
        // $this->db->select('*');
        // $this->db->from('user_data');
        // $this->db->join('user', 'user.id = user_data.user_id');
        // $this->db->where('user_data.user_id', $_SESSION['user_id']);
        // $from != "" ? $this->db->where('time_in >=', $from) : "";
        // $to != "" ? $this->db->where('time_in <=', $to) : "";
        // $this->db->order_by('time_in', 'desc');
        // $query = $this->db->get();

        $where_clause = "";

        $from != "" ? $where_clause .= "AND time_in >= '" . $from . " 00:00:00' " : "";
        $to != "" ? $where_clause .= "AND time_in <= '" . $to . " 00:00:00' " : "";

        $query = $this->db->query("SELECT * FROM user_data
            INNER JOIN user ON user.id = user_data.user_id
            WHERE 1 " . $where_clause .
            "ORDER BY time_in DESC");

        $result = [];

        foreach ($query->result() as $value) {
            $name = $value->first_name . " " . $value->middle_name . " " . $value->last_name;
            $timeIn = date_format(date_create($value->time_in), "F d, Y - h:i A");
            $timeOut = $value->time_out != "0000-00-00 00:00:00" ? date_format(date_create($value->time_out), "F d, Y - h:i A") : "";
            $country = $value->country;
            $location = $country . ', ' . $value->city;
            $values = array("title" => "Logged Session Report", "name" => $name, "time_in" => $timeIn, "time_out" => $timeOut, "location" => $location, "ip_address" => $value->ip_address, "browser" => $value->browser);
            array_push($result, $values);
        }

        return $result;
    }

    public function getUserDataForAttendanceReport($from, $to)
    {
        $this->db->select('*');
        $this->db->from('user_data');
        $this->db->join('user', 'user.id = user_data.user_id');
        $this->db->where('user_data.user_id', $_SESSION['user_id']);
        $this->db->where('time_in >=', $from);
        $this->db->where('time_in <=', $to);
        $this->db->order_by('time_in', 'asc');
        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $value) {
            $name = $value->first_name . " " . $value->middle_name . " " . $value->last_name;
            $timeIn = date_format(date_create($value->time_in), "h:i A");
            $timeOut = $value->time_out != "0000-00-00 00:00:00" ? date_format(date_create($value->time_out), "h:i A") : "";
            $values = array("title" => "Attendance Report", "date" => $from, "name" => $name, "time_in" => $timeIn, "time_out" => $timeOut);
            array_push($result, $values);
        }

        return $result;
    }

    public function getAttendanceRemarks($from, $to)
    {
        $day = strtolower(date_format(date_create($from), "D"));

        $attendance = $this->getUserDataForAttendanceReport($from, $to);

        $this->db->select('*');
        $this->db->from('user_schedule');
        $this->db->join('user', 'user.id = user_schedule.user_id');
        $this->db->where('user_schedule.user_id', $_SESSION['user_id']);
        $this->db->where('day', $day);
        $scheduleQuery = $this->db->get();

        $result = $scheduleQuery->result_array();
        $output = $attendance;

        // return $result;
        return "hihi";
    }

    public function getSchedule()
    {
        $user = array("user_id" => $_SESSION['user_id']);
        $query = $this->db->get_where('user_schedule', $user);
        return $query->result();
    }

    public function getDateToday()
    {
        return date('Y-m-d H:i:s');
    }

    public function getTimeIn()
    {
        $id = array('user_id' => $_SESSION['user_id']);
        $this->db->order_by('time_in', 'desc');
        $query = $this->db->get_where('user_data', $id, 1);
        if ($result = $query->row()) {
            return $result->time_in;
        }
    }

    public function getTimeOut()
    {
        $id = array('user_id' => $_SESSION['user_id']);
        $this->db->order_by('time_in', 'desc');
        $query = $this->db->get_where('user_data', $id, 1);
        if ($result = $query->row()) {
            return $result->time_out;
        }
    }

    public function recordTimeIn()
    {
        $timeOut = strtotime($this->getTimeOut());
        $now = strtotime($this->getDateToday());
        $interval = 60;

        // $location = json_decode(file_get_contents("http://ipinfo.io/"));
        $location = json_decode(file_get_contents("http://ip-api.com/json/"));

        if ($now - $timeOut > $interval) {
            try {
                $user = array("email" => $_SESSION['email']);

                $query = $this->db->get_where('user', $user);

                if ($result = $query->row()) {
                    // echo "User found";
                    // print_r($result);

                    if ($this->agent->is_browser()) {
                        $agent = $this->agent->browser() . ' ' . $this->agent->version();
                    } else if ($this->agent->is_robot()) {
                        $agent = $this->agent->robot();
                    } else if ($this->agent->is_mobile()) {
                        $agent = $this->agent->mobile();
                    } else {
                        $agent = 'Unidentified User Agent';
                    }

                    $data = array(
                        "user_id" => $result->id,
                        "time_in_image" => $_POST['image'],
                        "ip_address" => $location->query,
                        "browser" => $agent,
                        "country" => $location->country,
                        "city" => $location->city
                    );

                    $this->db->insert('user_data', $data);
                }

                $this->db->set('status', 1, FALSE);
                $this->db->where('id', $_SESSION['user_id']);
                $this->db->update('user');

                echo 'Success';
            } catch (\Throwable $th) {
                echo $th;
            }
        } else {
            echo 'Wait for ' . (string) ($interval - ($now - $timeOut)) . ' seconds please';
        }
    }

    public function recordTimeOut()
    {
        $timeIn = strtotime($this->getTimeIn());
        $now = strtotime($this->getDateToday());
        $interval = 60;

        if ($now - $timeIn > $interval) {
            try {
                $user = array("email" => $_SESSION['email']);

                $query = $this->db->get_where('user', $user);

                if ($result = $query->row()) {
                    // echo "User found";
                    // print_r($result);

                    $id = $result->id;

                    $date = $this->getDateToday();

                    $data = array(
                        "time_out_image" => $_POST['image'],
                        "time_out" => $date
                    );

                    $this->db->order_by('id', 'DESC');
                    $this->db->update('user_data', $data, "user_id = $id", 1);
                }

                $this->db->set('status', 0, FALSE);
                $this->db->where('id', $_SESSION['user_id']);
                $this->db->update('user');

                echo 'Success';
            } catch (\Throwable $th) {
                echo $th;
            }
        } else {
            echo 'Wait for ' . (string) ($interval - ($now - $timeIn)) . ' seconds please';
        }
    }

    public function checkuserStatus()
    {
        $user = array("id" => $_SESSION['user_id']);

        $query = $this->db->get_where('user', $user);

        if ($result = $query->row()) {
            echo $result->status;
        }
    }

    public function getLastImage()
    {
        $user = array("user_id" => $_SESSION['user_id']);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get_where('user_data', $user);

        if ($result = $query->row()) {
            return $result->time_out_image == "" ? $result->time_in_image : $result->time_out_image;
        }
    }

    public function setSchedule()
    {
        try {
            $this->db->delete('user_schedule', ['user_id' => $_SESSION['user_id']]);

            foreach ($_POST as $value) {
                $data = array(
                    "user_id" => $_SESSION['user_id'],
                    "day" => $value[0],
                    "duty_from" => $value[1],
                    "duty_to" => $value[2],
                    "tardy" => $value[3],
                    "absent" => $value[4],
                    "under_time" => $value[5]
                );
                $this->db->insert('user_schedule', $data);
            }
            echo "Success";
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
