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

            <label for="attendance-date">Date</label>
            <input type="date" name="attendance-date" id="attendance-date" required>

            <button type="submit" class="btn btn-dark m-3">Print</button>
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