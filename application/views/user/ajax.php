<script>
    $(document).ready(function() {
        $('#table-logged-session').DataTable({
            ajax: {
                method: 'POST',
                url: "<?php echo base_url(); ?>index.php/User/getUserDataForLoggedSession",
            },
            columns: [{
                data: "location"
            }, {
                data: "ip_address"
            }, {
                data: "browser"
            }, {
                data: "time_in"
            }, {
                data: "time_out"
            }],

        });

        $('#table-attendance').DataTable({
            ajax: {
                method: 'POST',
                url: "<?php echo base_url(); ?>index.php/User/getUserDataForAttendance",
            },
            columns: [{
                data: "time_in"
            }, {
                data: "time_out"
            }],

        });
    });
</script>