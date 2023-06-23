<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<script>
    setInterval(function() {
        $.ajax({
                url: '<?php echo site_url(); ?>/Page/time'
            })
            .done(function(response) {
                $('#date').val(response);
            });
    }, 1000);

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

    function setSchedule() {
        data = {
            monday: {
                m_from: $('#m-from').val(),
                m_to: $('#m-to').val(),
                m_tardy: $('#m-tardy').val(),
                m_absent: $('#m-absent').val(),
                m_under_time: $('#m-under-time').val()
            },

            tuesday: {
                t_from: $('#t-from').val(),
                t_to: $('#t-to').val(),
                t_tardy: $('#t-tardy').val(),
                t_absent: $('#t-absent').val(),
                t_under_time: $('#t-under-time').val(),
            },

            wednesday: {
                w_from: $('#w-from').val(),
                w_to: $('#w-to').val(),
                w_tardy: $('#w-tardy').val(),
                w_absent: $('#w-absent').val(),
                w_under_time: $('#w-under-time').val(),
            },

            thursday: {
                th_from: $('#th-from').val(),
                th_to: $('#th-to').val(),
                th_tardy: $('#th-tardy').val(),
                th_absent: $('#th-absent').val(),
                th_under_time: $('#th-under-time').val(),
            },

            friday: {
                f_from: $('#f-from').val(),
                f_to: $('#f-to').val(),
                f_tardy: $('#f-tardy').val(),
                f_absent: $('#f-absent').val(),
                f_under_time: $('#f-under-time').val(),
            },

            saturday: {
                sat_from: $('#sat-from').val(),
                sat_to: $('#sat-to').val(),
                sat_tardy: $('#sat-tardy').val(),
                sat_absent: $('#sat-absent').val(),
                sat_under_time: $('#sat-under-time').val(),
            },

            sunday: {
                sun_from: $('#sun-from').val(),
                sun_to: $('#sun-to').val(),
                sun_tardy: $('#sun-tardy').val(),
                sun_absent: $('#sun-absent').val(),
                sun_under_time: $('#sun-under-time').val()
            }
        };

        $.ajax({
                method: 'POST',
                url: '<?php echo site_url(); ?>/User/setSchedule',
                data: data
            })
            .done(function(response) {
                console.log(response)
            })
            .fail(function(errorThrown) {
                console.log(errorThrown);
            });
    }


    // function setSchedule() {
    //     data = {
    //         monday: {
    //             m_from: $('#m-from').val(),
    //             m_to: $('#m-to').val(),
    //             m_tardy: $('#m-tardy').val(),
    //             m_absent: $('#m-absent').val(),
    //             m_under_time: $('#m-under-time').val()
    //         },

    //         tuesday: {
    //             t_from: $('#t-from').val(),
    //             t_to: $('#t-to').val(),
    //             t_tardy: $('#t-tardy').val(),
    //             t_absent: $('#t-absent').val(),
    //             t_under_time: $('#t-under-time').val(),
    //         },

    //         wednesday: {
    //             w_from: $('#w-from').val(),
    //             w_to: $('#w-to').val(),
    //             w_tardy: $('#w-tardy').val(),
    //             w_absent: $('#w-absent').val(),
    //             w_under_time: $('#w-under-time').val(),
    //         },

    //         thursday: {
    //             th_from: $('#th-from').val(),
    //             th_to: $('#th-to').val(),
    //             th_tardy: $('#th-tardy').val(),
    //             th_absent: $('#th-absent').val(),
    //             th_under_time: $('#th-under-time').val(),
    //         },

    //         friday: {
    //             f_from: $('#f-from').val(),
    //             f_to: $('#f-to').val(),
    //             f_tardy: $('#f-tardy').val(),
    //             f_absent: $('#f-absent').val(),
    //             f_under_time: $('#f-under-time').val(),
    //         },

    //         saturday: {
    //             sat_from: $('#sat-from').val(),
    //             sat_to: $('#sat-to').val(),
    //             sat_tardy: $('#sat-tardy').val(),
    //             sat_absent: $('#sat-absent').val(),
    //             sat_under_time: $('#sat-under-time').val(),
    //         },

    //         sunday: {
    //             sun_from: $('#sun-from').val(),
    //             sun_to: $('#sun-to').val(),
    //             sun_tardy: $('#sun-tardy').val(),
    //             sun_absent: $('#sun-absent').val(),
    //             sun_under_time: $('#sun-under-time').val()
    //         }
    //     };

    //     $.ajax({
    //             method: 'POST',
    //             url: '<?php // echo site_url(); 
                            ?>/User/setSchedule',
    //             data: data
    //         })
    //         .done(function(response) {
    //             console.log(response)
    //         })
    //         .fail(function(errorThrown) {
    //             console.log(errorThrown);
    //         });
    // }
</script>