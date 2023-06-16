<script>
    $(document).ready(function() {
        $('#table-user').DataTable({
            ajax: {
                method: 'POST',
                url: "<?php echo base_url(); ?>index.php/User/getUserData",
            },
            columns: [{
                data: "name"
            }, {
                data: "email"
            }, {
                data: "time_in"
            }, {
                data: "time_out"
            }],

        });
    });
</script>