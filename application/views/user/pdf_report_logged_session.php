<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $data[0]['title'] ?? ""; ?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/report.css') ?>">
</head>

<body>

    <div class="content-header" style="text-align: center">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b><?php echo $data[0]['title'] ?? ""; ?></b></h1>
                    <h2><?php echo $data[0]['name'] ?? ""; ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-light p-3">
        <table class="table table-bordered table-striped dataTable dtr-inline p-3">
            <thead>
                <tr>
                    <th>Location</th>
                    <th>IP Address</th>
                    <th>Browser</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $value) {
                    echo '<tr>
                        <td>' . $value['location'] . '</td>
                        <td>' . $value['ip_address'] . '</td>
                        <td>' . $value['browser'] . '</td>
                        <td>' . $value['time_in'] . '</td>
                        <td>' . $value['time_out'] . '</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>