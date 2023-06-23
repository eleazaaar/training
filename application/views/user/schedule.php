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
        <form>
            <table class="table table-bordered table-striped dtr-inline p-3">
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
                    <tr tag="grp" dayofweek="MONDAY">
                        <td style="text-align: center;"><input type="hidden" id="m-day" value="monday">Monday</td>
                        <td style="text-align: center;"><input type="time" id="m-from" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="m-to" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="m-tardy" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="m-absent" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="m-under-time" onchange="setSchedule()"></td>
                    </tr>
                    <tr tag="grp" dayofweek="TUESDAY">
                        <td style="text-align: center;"><input type="hidden" id="t-day" value="tuesday">Tuesday</td>
                        <td style="text-align: center;"><input type="time" id="t-from" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="t-to" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="t-tardy" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="t-absent" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="t-under-time" onchange="setSchedule()"></td>

                    </tr>
                    <tr tag="grp" dayofweek="WEDNESDAY">
                        <td style="text-align: center;"><input type="hidden" id="w-day" value="wednesday">Wednesday</td>
                        <td style="text-align: center;"><input type="time" id="w-from" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="w-to" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="w-tardy" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="w-absent" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="w-under-time" onchange="setSchedule()"></td>
                    </tr>
                    <tr tag="grp" dayofweek="THURSDAY">
                        <td style="text-align: center;"><input type="hidden" id="th-day" value="thursday">Thursday</td>
                        <td style="text-align: center;"><input type="time" id="th-from" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="th-to" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="th-tardy" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="th-absent" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="th-under-time" onchange="setSchedule()"></td>
                    </tr>
                    <tr tag="grp" dayofweek="FRIDAY">
                        <td style="text-align: center;"><input type="hidden" id="f-day" value="friday">Friday</td>
                        <td style="text-align: center;"><input type="time" id="f-from" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="f-to" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="f-tardy" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="f-absent" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="f-under-time" onchange="setSchedule()"></td>
                    </tr>
                    <tr tag="grp" dayofweek="SATURDAY">
                        <td style="text-align: center;"><input type="hidden" id="sat-day" value="satuday">Satuday</td>
                        <td style="text-align: center;"><input type="time" id="sat-from" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="sat-to" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="sat-tardy" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="sat-absent" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="sat-under-time" onchange="setSchedule()"></td>
                    </tr>
                    <tr tag="grp" dayofweek="SUNDAY">
                        <td style="text-align: center;"><input type="hidden" id="sun-day" value="sunday">Sunday</td>
                        <td style="text-align: center;"><input type="time" id="sun-from" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="sun-to" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="sun-tardy" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="sun-absent" onchange="setSchedule()"></td>
                        <td style="text-align: center;"><input type="time" id="sun-under-time" onchange="setSchedule()"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>