<?php
defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_');
        $this->load->library('user_agent');
    }

    public function index()
    {
        if (isset($_SESSION['training_system'])) {
            $image = $this->getLastImage();

            $data = array(
                "title" => " | Home",
                "image" => $image
            );

            $this->load->view('template/header', $data);
            $this->load->view('template/nav_bar');
            $this->load->view('user/index', $data);
            $this->load->view('template/required_script');
            $this->load->view('jquery/jquery');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('index.php/Page/index'));
        }
    }

    public function profile()
    {
        if (isset($_SESSION['training_system'])) {
            $data = array(
                "title" => " | My Profile",
                "information" => $this->User_->getUserInformation()
            );

            $this->load->view('template/header', $data);
            $this->load->view('template/nav_bar');
            $this->load->view('user/profile', $data);
            $this->load->view('template/required_script');
            $this->load->view('jquery/jquery');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('index.php/Page/index'));
        }
    }

    public function updateUserInformation()
    {
        $this->User_->updateUserInformation();
    }

    public function logged_session()
    {
        $this->load->library('session');

        $data = ["title" => " | Session"];

        if (isset($_SESSION['training_system'])) {
            $this->load->view('template/header', $data);
            $this->load->view('template/nav_bar');
            $this->load->view('user/logged_session');
            $this->load->view('template/required_script');
            $this->load->view('user/ajax');
            $this->load->view('jquery/jquery');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('index.php/Page/index'));
        }
    }

    public function attendance()
    {
        $this->load->library('session');

        $data = ["title" => " | Attendance"];

        if (isset($_SESSION['training_system'])) {
            $this->load->view('template/header', $data);
            $this->load->view('template/nav_bar');
            $this->load->view('user/attendance');
            $this->load->view('template/required_script');
            $this->load->view('user/ajax');
            $this->load->view('jquery/jquery');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('index.php/Page/index'));
        }
    }

    public function getUserDataForAttendance()
    {
        $this->User_->getUserDataForAttendance();
    }

    public function getUserDataForLoggedSession()
    {
        $this->User_->getUserDataForLoggedSession();
    }

    public function generatePDFLoggedSession()
    {
        $from = $this->input->post('date-from') != "" ? $this->input->post('date-from') : "";
        $to = $this->input->post('date-to') != "" ? date("Y-m-d", strtotime('+1 day', strtotime($this->input->post('date-to')))) : "";

        $data['data'] = $this->User_->getUserDataForLoggedSessionReport($from, $to);

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('user/pdf_report_logged_session', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function generatePDFAttendance()
    {
        $from = $this->input->post('attendance-date');
        $to = date("Y-m-d", strtotime('+1 day', strtotime($from)));

        $data['data']['attendance'] = $this->User_->getUserDataForAttendanceReport($from, $to);
        $data['data']['remarks'] = $this->User_->getAttendanceRemarks($from, $to);

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('user/pdf_report_attendance', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function timeIn()
    {
        $this->load->library('session');

        echo $this->User_->recordTimeIn();

        // redirect(base_url('index.php/Page/user'));
    }

    public function timeOut()
    {
        $this->load->library('session');

        echo $this->User_->recordTimeOut();

        // redirect(base_url('index.php/Page/user'));
    }

    public function checkUser()
    {
        $this->load->library('session');

        $this->User_->checkUserStatus();
    }

    public function getLastImage()
    {
        return $this->User_->getLastImage();
    }

    public function schedule()
    {
        $this->load->library('session');

        $data = [
            "title" => " | Attendance",
            "schedule" => $this->User_->getSchedule()
        ];

        if (isset($_SESSION['training_system'])) {
            $this->load->view('template/header', $data);
            $this->load->view('template/nav_bar');
            $this->load->view('user/schedule');
            $this->load->view('template/required_script');
            $this->load->view('user/ajax');
            $this->load->view('jquery/jquery');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('index.php/Page/index'));
        }
    }

    public function setSchedule()
    {
        $this->User_->setSchedule();
    }
}
