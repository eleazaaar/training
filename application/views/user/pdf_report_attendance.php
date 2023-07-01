<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $data['attendance'][0]['title'] ?? ""; ?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/report.css') ?>">
</head>

<body>
    <div class="content-header" style="text-align: center">
        <div>
            <div>
                <div>
                    <h1 class="m-0"><b><?php echo $data['attendance'][0]['title'] ?? ""; ?></b></h1>
                    <h2><?php echo $data['attendance'][0]['name'] ?? ""; ?></h2>
                    <h3><?php echo date_format(date_create($data['attendance'][0]['date'] ?? ""), "l - F d, Y"); ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th style="background: #333; color: white">Time In</th>
                    <th style="background: #333; color: white">Time Out</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data['attendance'] as $value) {
                    echo '<tr>
                        <td style="text-align: center">' . $value['time_in'] . '</td>
                        <td style="text-align: center">' . $value['time_out'] . '</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <div>
        <pre> Remarks: <?= $data['remarks']; ?></pre>
    </div>
</body>

</html>