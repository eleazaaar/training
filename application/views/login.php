<div class="container p-4 bg-light" style="width:fit-content; height: fit-content; margin-top: 10%; border: 1px solid; border-radius: 5%">
    <h1 class="text-center">Login</h1>
    <div class="container" style="width: 25rem;">
        <form method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" />
            </div>

            <!-- Submit button -->
            <button type="button" onclick="login()" class="btn btn-primary btn-block mb-4">Log in</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Don't have an Account? <a href="<?php echo site_url("Page/register") ?>">Register</a></p>
            </div>
        </form>
    </div>
</div>