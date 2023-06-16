<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<script>
    function login() {
        $.ajax({
                method: 'POST',
                url: '<?php echo base_url(); ?>index.php/Login/loginUser',
                data: {
                    email: $('#email').val(),
                    password: $('#password').val()
                }
            })
            .done(function(response) {
                // console.log(response)
                if (response === "Success") {
                    Swal.fire(response, "", "success")
                        .then(() => {
                            location.replace("<?php echo base_url(); ?>index.php/Page/admin");
                        });
                } else {
                    Swal.fire(response, "", "warning")
                }
            })
            .fail(function(errorThrown) {
                console.log(errorThrown);
            });
    }

    function register() {
        $.ajax({
                method: 'POST',
                url: '<?php echo base_url(); ?>index.php/Register/registerUser',
                data: {
                    email: $('#email').val(),
                    first_name: $('#first_name').val(),
                    middle_name: $('#middle_name').val(),
                    last_name: $('#last_name').val(),
                    password: $('#password').val()
                }
            })
            .done(function(response) {
                // console.log(response)
                if (response === "Success") {
                    Swal.fire(response, "", "success")
                        .then(() => {
                            location.replace("<?php echo base_url(); ?>index.php/Page/login");
                        });
                } else {
                    Swal.fire(response, "", "warning")
                }
            })
            .fail(function(errorThrown) {
                console.log(errorThrown);
            });
    }
</script>