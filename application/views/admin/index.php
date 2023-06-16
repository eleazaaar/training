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
        <a href="<?php echo site_url(); ?>/User/createPDF" class="btn btn-dark mb-4 ml-3" target="_blank">Print</a>
        <table class="table table-bordered table-striped dataTable dtr-inline p-3" id="table-user">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                </tr>
            </thead>
        </table>
    </div>
</div>