<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<script>
    setInterval(function() {
        $.ajax({
            url: '<?php echo site_url('Page/time'); ?>',
            success: function(response) {
                $('#date').val(response);
            }
        })
    }, 1000);

    function updateUserInformation() {
        $.ajax({
            url: '<?= site_url('User/updateUserInformation') ?>',
            method: 'POST',
            data: $('#form-information').serialize(),
            success: function(response) {
                // console.log(response);
                if (response === "Success") {
                    Swal.fire(response, "", "success")
                        .then(() => {
                            location.replace("<?php echo site_url('User/profile'); ?>");
                        });
                } else {
                    Swal.fire(response, "", "warning")
                }
            },
            fail: function(error) {
                console.log(error);
            }
        })
    }

    $("#email, #password").on("keypress", function(event) {
        if (event.which == 13) {
            login();
        }
    });

    $("#new_email, #new_password").on("keypress", function(event) {
        if (event.which == 13) {
            register();
        }
    });

    function login() {
        $.ajax({
                method: 'POST',
                url: '<?php echo site_url(); ?>/Login/loginUser',
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
                            location.replace("<?php echo site_url(); ?>/Page/user");
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
                url: '<?php echo site_url(); ?>/Register/registerUser',
                data: {
                    email: $('#new_email').val(),
                    first_name: $('#first_name').val(),
                    middle_name: $('#middle_name').val(),
                    last_name: $('#last_name').val(),
                    password: $('#new_password').val()
                }
            })
            .done(function(response) {
                // console.log(response)
                if (response === "Success") {
                    Swal.fire(response, "", "success")
                        .then(() => {
                            location.replace("<?php echo site_url(); ?>/Page/login");
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
                url: '<?php echo site_url(); ?>/User/checkUser'
            })
            .done(function(response) {
                // console.log(response)
                if (response == '1') {
                    $('#time-in').hide();
                    $('#time-out').show();
                    $('#time-in-modal').hide();
                    $('#time-out-modal').show();
                    $('#timeData').html("Time In");
                } else {
                    $('#time-in').show();
                    $('#time-out').hide();
                    $('#time-in-modal').show();
                    $('#time-out-modal').hide();
                    $('#timeData').html("Time Out");
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

            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
            $('#image-name').val(data_uri);
        });
    }

    counter = 15;

    function addDay(day) {
        markup = '<tr>' +
            '<td style="text-align: center;"><input class="form-control" type="hidden" name="' + day + counter + '[]" id="' + day + '-day-' + counter + '" value="' + day + '"></td>' +
            '<td style="text-align: center;"><input class="form-control" type="time" name="' + day + counter + '[]" id="' + day + '-from-' + counter + '" onchange="setTardys(\'' + day + '\',\'' + counter + '\')"></td>' +
            '<td style="text-align: center;"><input class="form-control" type="time" name="' + day + counter + '[]" id="' + day + '-to-' + counter + '" onchange="setAbsentUnderTimes(\'' + day + '\',\'' + counter + '\')"></td>' +
            '<td style="text-align: center;"><input class="form-control" type="time" name="' + day + counter + '[]" id="' + day + '-tardy-' + counter + '" readonly></td>' +
            '<td style="text-align: center;"><input class="form-control" type="time" name="' + day + counter + '[]" id="' + day + '-absent-' + counter + '" readonly></td>' +
            '<td style="text-align: center;"><input class="form-control" type="time" name="' + day + counter + '[]" id="' + day + '-under-time-' + counter + '" readonly></td>' +
            '<td style="text-align: center;"><button type="button" class="btn btn-danger" id="remove' + counter + '" onclick="remove(' + counter + ')"><i class="fa fa-minus" aria-hidden="true"></i></td>' +
            '</tr>';

        tableBody = $("#" + day);

        tableBody.after(markup);

        counter++;
    }

    function remove(counter) {
        $('#remove' + counter).parent().parent().remove();
    }

    function setTardy(day) {
        tardy_period = 10; // Minutes

        from = $('#' + day + '-from').val();
        tardy = moment.utc(from, 'HH:mm').add(tardy_period, 'minutes').format('HH:mm');
        $('#' + day + '-tardy').val(tardy);
    }

    function setTardys(day, row) {
        tardy_period = 10; // Minutes

        from = $('#' + day + '-from-' + row).val();
        tardy = moment.utc(from, 'HH:mm').add(tardy_period, 'minutes').format('HH:mm');
        $('#' + day + '-tardy-' + row).val(tardy);
    }

    function setAbsentUnderTime(day) {
        under_time_period = 1; // Hour

        to = $('#' + day + '-to').val();
        $('#' + day + '-absent').val(to);
        under_time = moment.utc(to, 'HH:mm').subtract(under_time_period, 'hour').format('HH:mm');
        $('#' + day + '-under-time').val(under_time);
    }

    function setAbsentUnderTimes(day, row) {
        under_time_period = 1; // Hour

        to = $('#' + day + '-to-' + row).val();
        $('#' + day + '-absent-' + row).val(to);
        under_time = moment.utc(to, 'HH:mm').subtract(under_time_period, 'hour').format('HH:mm');
        $('#' + day + '-under-time-' + row).val(under_time);
    }

    function saveSchedule() {
        data = $('#form-schedule').serialize();
        $.ajax({
                method: 'POST',
                url: '<?php echo site_url(); ?>/User/setSchedule',
                data: data
            })
            .done(function(response) {
                // console.log(response)
                if (response === "Success") {
                    Swal.fire("Schedule Save Success", "", "success");
                } else {
                    Swal.fire(response, "", "warning")
                }
            })
            .fail(function(errorThrown) {
                console.log(errorThrown);
            });
    }
</script>