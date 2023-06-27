<div class="content-wrapper" style="min-height: 711px;">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>Welcome! </b></h1>
                    <h2><?php echo $this->session->name; ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-light p-3">
        <table class="table table-bordered dtr-inline p-3" id="table-user">
            <tbody>
                <tr>
                    <th>
                        <div class="container">
                            <div style="height: 300px; width: 300px; text-align: center">
                                <img src="<?php echo $image; ?>" alt="Me.jpg" style="width: 300px;">
                                <h3 class="mt-4" id="timeData" hidden></h3>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="container" style="width: auto; height: 300px;">
                            <textarea class="container" style="height: 100%; text-align: center; font-size: 64px; border: none; border-bottom: 1px solid #ccc;" id="date" disabled></textarea>
                        </div>
                    </th>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <button type="button" id="attendace" data-toggle="modal" data-target="#capture-modal" class="btn btn-info">Attendance</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="capture-modal" tabindex="-1" role="dialog" aria-labelledby="capture-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="user-modal-label">Attendance Capture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="margin: 0 auto">
                <div class="content">
                    <div class="container" style="display:flex">
                        <div id="my_camera" style="width:320px; height:240px; border: 1px solid; margin: 10px;"></div>
                        <div id="results" style="width:320px; height:240px; border: 1px solid; margin: 10px;"></div>
                    </div>
                    <input type="text" id="image-name" hidden>
                    <div class="container" style="display: flex; justify-content: center; align-items: center;">
                        <input type="button" class="btn btn-warning" value="Access Camera" onClick="setup(); $(this).hide().next().show();">
                        <input type="button" class="btn btn-info" value="Take Snapshot" onClick="take_snapshot()" style="display:none">
                        <button type="button" id="time-in" onclick="timeIn()" class="btn btn-success m-2">Time In</button>
                        <button type="button" id="time-out" onclick="timeOut()" class="btn btn-danger m-2">Time Out</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>