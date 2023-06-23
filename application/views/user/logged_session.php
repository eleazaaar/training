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

            <label for="date-from">Date From</label>
            <input type="date" name="date-from" id="date-from">

            <label for="date-to">Date To</label>
            <input type="date" name="date-to" id="date-to">

            <button type="submit" class="btn btn-dark m-3">Print</button>
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