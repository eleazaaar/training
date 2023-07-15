<div class="container p-4 bg-light" style="width:fit-content; height: fit-content; margin-top: 5%; border: 1px solid; border-radius: 5%">
    <h1 class="text-center">Register</h1>
    <div class="container" style="width: 50rem;">
        <form method="post">
            <!-- Email input -->
            <div class="row">
                <div class="form-group col-12">
                    <label for="email">Email</label>
                    <input type="email" id="new_email" name="new_email" class="form-control" required />
                </div>
            </div>
            <!-- First Name input -->
            <div class="row">
                <div class="form-group col-4">
                    <label for="first-name">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" required />
                </div>

                <!-- Middle Name input -->
                <div class="form-group col-4">
                    <label for="middle-name">Middle Name</label>
                    <input type="text" id="middle_name" name="middle_name" class="form-control" />
                </div>

                <!-- Last Name input -->
                <div class="form-group col-4">
                    <label for="last-name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" required />
                </div>
            </div>

            <!-- Password input -->
            <div class="row">
                <div class="form-group col-12">
                    <label for="password">Password</label>
                    <input type="password" id="new_password" name="new_password" class="form-control" required />
                </div>
            </div>
            <!-- Submit button -->
            <button type="button" onclick="register()" class="btn btn-primary btn-block mb-4">Register</button>

            <!-- Login buttons -->
            <div class="text-center">
                <p>Already have an Account? <a href="<?php echo site_url("Page/login") ?>">Login</a></p>
            </div>
        </form>
    </div>
</div>