<div class="content-wrapper" style="min-height: 711px;">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>Schedule</b></h1>
                    <h2><?php echo $this->session->name; ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-light p-3">
        <form action="<?= site_url('User/setSchedule') ?>" method="POST">
            <table class="table table-bordered table-striped dtr-inline p-3" id="table-schedule">
                <thead>
                    <tr>
                        <th>Day of Week</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Tardy Start</th>
                        <th>Absent Start</th>
                        <th>Under Time Start</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $days = array("mon" => "Monday", "tue" => "Tuesday", "wed" => "Wednesday", "thu" => "Thursday", "fri" => "Friday", "sat" => "Saturday", "sun" => "Sunday");
                    $row = 0;
                    foreach ($days as $key => $value) {
                    ?>
                        <tr id="<?= $key ?>">
                            <td style="text-align: center;"><input type="hidden" id="<?= $key ?>-day" name="<?= $key ?>-day" value="<?= $key ?>"><?= $value ?></td>
                            <td style="text-align: center;"><input type="time" id="<?= $key ?>-from" name="<?= $key ?>-from" onchange="setTardy('<?= $key ?>')"></td>
                            <td style="text-align: center;"><input type="time" id="<?= $key ?>-to" name="<?= $key ?>-to" onchange="setAbsentUnderTime('<?= $key ?>')"></td>
                            <td style=" text-align: center;"><input type="time" id="<?= $key ?>-tardy" name="<?= $key ?>-tardy" readonly></td>
                            <td style="text-align: center;"><input type="time" id="<?= $key ?>-absent" name="<?= $key ?>-absent" readonly></td>
                            <td style="text-align: center;"><input type="time" id="<?= $key ?>-under-time" name="<?= $key ?>-under-time" readonly></td>
                            <td style="text-align: center;"><button type="button" class="btn btn-success" id="add" onclick="addDay('<?= $key ?>')"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
                        </tr>
                    <?php $row++;
                    } ?>
                </tbody>
            </table>
            <div class="text-right p-1">
                <input type="submit" class="btn btn-success" value="Save Schedule">
            </div>
        </form>
    </div>
</div>