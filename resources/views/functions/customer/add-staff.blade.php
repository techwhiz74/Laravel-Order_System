<script>
    $(function() {
        $('#customer_staff_create_button').click(function() {

            $('#customer_staff_create_popup').modal('show');
            $('#staff_popup_title').text("{{ __('home.staff_create_title') }}")
            $('#employee_id').val('');
            $('#name').val('');
            $('#email').val('');
            $('#password').val('');
        });
    });
</script>
