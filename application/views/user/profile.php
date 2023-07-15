<div class="content-wrapper" style="min-height: 711px;">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>My Profile</b></h1>
                    <h2><?php echo $this->session->name; ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-light p-3">
        <form id="form-information" method="post">
            <div class="container">
                <div class="row p-2">
                    <div class="form-group col-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= $information[0]['email'] ?>">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-4">
                        <label for="first-name">First Name</label>
                        <input type="text" class="form-control" name="first-name" id="first-name" value="<?= $information[0]['first_name'] ?>">
                    </div>
                    <div class="col-4">
                        <label for="middle-name">Middle Name</label>
                        <input type="text" class="form-control" name="middle-name" id="middle-name" value="<?= $information[0]['middle_name'] ?>">
                    </div>
                    <div class="col-4">
                        <label for="last-name">Last Name</label>
                        <input type="text" class="form-control" name="last-name" id="last-name" value="<?= $information[0]['last_name'] ?>">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-12">
                        <button type="button" class="form-control btn-info" onclick="updateUserInformation()">Update Information</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>