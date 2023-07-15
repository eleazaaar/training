<div class="content-wrapper" style="min-height: 711px;">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>Logged Session</b></h1>
                    <h2><?php echo $this->session->name; ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-light p-3">
        <form action="<?php echo site_url(); ?>/User/generatePDFLoggedSession" method="post" target="_blank">
            <div class="row mb-4">
                <div class="col-3">
                    <label for="date-from">Date From</label>
                    <input class="form-control" type="date" name="date-from" id="date-from">
                </div>
                <div class="col-3">
                    <label for="date-to">Date To</label>
                    <input class="form-control" type="date" name="date-to" id="date-to">
                </div>
                <div class="col-2">
                    <label for="print">.</label>
                    <input type="submit" name="print" id="print" value="Print Report" class="form-control btn-dark">
                </div>
            </div>
        </form>
        <table class="table table-bordered table-striped dataTable dtr-inline p-3" id="table-logged-session">
            <thead>
                <tr>
                    <th>Location</th>
                    <th>IP Adress</th>
                    <th>Browser</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                </tr>
            </thead>
        </table>
    </div>
</div>