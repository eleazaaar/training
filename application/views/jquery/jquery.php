<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<script>
    setInterval(function() {
        $.ajax({
                url: '<?php echo base_url(); ?>index.php/Page/time'
            })
            .done(function(response) {
                $('#date').val(response);
            });
    }, 1000);

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
                            location.replace("<?php echo base_url(); ?>index.php/Page/user");
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

    function timeIn() {
        image = $('#image-name').val();

        if (image == '') {
            Swal.fire("Capture Image First", "", "info");
        } else {
            $.ajax({
                    method: 'POST',
                    url: '<?php echo site_url('User/timeIn'); ?>',
                    data: {
                        image: image
                    },
                })
                .done(function(response) {
                    // console.log(response)
                    if (response === "Success") {
                        Swal.fire("Time In Success", "", "success")
                            .then(() => {
                                check();
                                location.reload();
                            });
                    } else {
                        Swal.fire(response, "", "warning")
                    }
                })
                .fail(function(errorThrown) {
                    console.log(errorThrown);
                });
        }

    }

    function timeOut() {
        image = $('#image-name').val();

        if (image == '') {
            Swal.fire("Capture Image First", "", "info");
        } else {
            $.ajax({
                    method: 'POST',
                    url: '<?php echo site_url('User/timeOut'); ?>',
                    data: {
                        image: image
                    },

                })
                .done(function(response) {
                    // console.log(response)
                    if (response === "Success") {
                        Swal.fire("Time Out Success", "", "success")
                            .then(() => {
                                check();
                                location.reload();
                            });
                    } else {
                        Swal.fire(response, "", "warning")
                    }
                })
                .fail(function(errorThrown) {
                    console.log(errorThrown);
                });
        }
    }

    function check() {
        $.ajax({
                url: '<?php echo base_url(); ?>index.php/User/checkUser',
            })
            .done(function(response) {
                // console.log(response)
                if (response == '1') {
                    $('#time-in').hide();
                    $('#time-out').show();
                    $('#time-in-modal').hide();
                    $('#time-out-modal').show();
                } else {
                    $('#time-in').show();
                    $('#time-out').hide();
                    $('#time-in-modal').show();
                    $('#time-out-modal').hide();
                }
            })
            .fail(function(errorThrown) {
                console.log(errorThrown);
            });
    }

    $(document).ready(function() {
        check();
    });

    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpg',
        jpeg_quality: 90
    });

    function setup() {
        Webcam.reset();
        Webcam.attach('#my_camera');
    }

    function take_snapshot() {
        // take snapshot and get image data
        Webcam.snap(function(data_uri) {
            // display results in page

            Webcam.upload(data_uri, '<?php echo site_url('User/storeImage') ?>', function(code, text) {
                // console.log(text);
                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
                $('#image-name').val(text);
            });
        });
    }
</script>