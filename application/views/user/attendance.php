<div class="content-wrapper" style="min-height: 711px;">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>Attendance</b></h1>
                    <h2><?php echo $this->session->name; ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-light p-3">
        <form action="<?php echo site_url(); ?>/User/generatePDFAttendance" method="post" target="_blank">
            <div class="row mb-4">
                <div class="col-3">
                    <label for="attendance-date">Date</label>
                    <input class="form-control" type="date" name="attendance-date" id="attendance-date" required>
                </div>
                <div class="col-2">
                    <label for="print">.</label>
                    <input type="submit" name="print" id="print" value="Print Report" class="form-control btn-dark">
                </div>
            </div>
        </form>
        <table class="table table-bordered table-striped dataTable dtr-inline p-3" id="table-attendance">
            <thead>
                <tr>
                    <th>Time In</th>
                    <th>Time Out</th>
                </tr>
            </thead>
        </table>
    </div>
</div>