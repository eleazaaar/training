<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_');
    }

    public function getUserData()
    {
        $this->User_->getUserData();
    }

    public function createPDF()
    {
        $result = $this->User_->getDataForReports();

        $this->load->library('pdf');
        $dompdf = new PDF();

        $content = '';

        $content .= '
            <h1 style="text-align: center">Attendance</h1>
            <pre>
                <table border="1px solid" style="">
                    <thead>
                        <tr>
                            <th style="padding: 4px" width="225px">Name</th>
                            
                            <th style="padding: 4px" width="225px">Time In</th>
                            <th style="padding: 4px" width="225px">Time Out</th>
                        </tr>
                    </thead>
                    <tbody>
        ';

        foreach ($result as $value) {
            $content .=
                '<tr>
                    <td style="padding: 4px">' . $value['name'] . '</td>
                
                    <td style="padding: 4px">' . $value['time_in'] . '</td>
                    <td style="padding: 4px">' . $value['time_out'] . '</td>
                </tr>';
        }

        $content .= '
                    </tbody>
                </table>
            </pre>';

        $dompdf->loadHtml($content);
        $dompdf->setPaper('Letter');

        // Render the HTML as PDF
        $dompdf->render();

        $dompdf->stream("Attendance.pdf", array("Attachment" => false));

        exit(0);
    }
}
