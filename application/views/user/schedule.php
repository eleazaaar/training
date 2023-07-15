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
        <form method="POST" id="form-schedule">
            <table class="table table-bordered" id="table-schedule">
                <thead style="text-align: center;">
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

                    $oldKey = "";
                    $counter = 1;

                    foreach ($schedule as $value) {
                        $oldKey = $key ?? "";
                        $key = $value->day;
                        $day = $days[$key];
                        $from = $value->duty_from != '00:00:00' ? $value->duty_from : '';
                        $to = $value->duty_to != '00:00:00' ? $value->duty_to : '';
                        $tardy = $value->tardy != '00:00:00' ? $value->tardy : '';
                        $absent = $value->absent != '00:00:00' ? $value->absent : '';
                        $under_time = $value->under_time != '00:00:00' ? $value->under_time : '';
                    ?>
                        <tr id="<?= $key ?>">
                            <td style="text-align: center;"><input class="form-control" type="hidden" id="<?= $key ?>-day" name="<?= $key . $counter ?>[]" value="<?= $key ?>"><?= $key != $oldKey ? $day : ""; ?></td>
                            <td style="text-align: center;"><input class="form-control" type="time" id="<?= $key ?>-from" name="<?= $key . $counter ?>[]" onchange="setTardy('<?= $key ?>')" value="<?= $from ?>"></td>
                            <td style="text-align: center;"><input class="form-control" type="time" id="<?= $key ?>-to" name="<?= $key . $counter ?>[]" onchange="setAbsentUnderTime('<?= $key ?>')" value="<?= $to ?>"></td>
                            <td style=" text-align: center;"><input class="form-control" type="time" id="<?= $key ?>-tardy" name="<?= $key . $counter ?>[]" value="<?= $tardy ?>" readonly></td>
                            <td style="text-align: center;"><input class="form-control" type="time" id="<?= $key ?>-absent" name="<?= $key . $counter ?>[]" value="<?= $absent ?>" readonly></td>
                            <td style="text-align: center;"><input class="form-control" type="time" id="<?= $key ?>-under-time" name="<?= $key . $counter ?>[]" value="<?= $under_time ?>" readonly></td>
                            <td style="text-align: center;">
                                <?php
                                if ($key != $oldKey) {
                                ?>
                                    <button type="button" class="btn btn-success" id="add" onclick="addDay('<?= $key ?>')"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                <?php } else { ?>
                                    <button type="button" class="btn btn-danger" id="remove<?= $counter ?>" onclick="remove('<?= $counter ?>')"><i class="fa fa-minus" aria-hidden="true"></i>
                                    <?php } ?>
                            </td>
                        </tr>
                    <?php $counter++;
                    } ?>
                </tbody>
            </table>
            <div class="text-right p-1">
                <button type="button" class="btn btn-success" onclick="saveSchedule()">Save Schedue</button>
            </div>
        </form>
    </div>
</div>