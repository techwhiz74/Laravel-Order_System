<script>
    $(function() {
        $('#customer_order_form_mail').click(function() {
            var order_form_mail_data = {
                project_name: $('[name=project_name]').val(),
                size: $('[name=size]').val(),
                width_height: $('[name=width_height]:checked').val(),
                products: $('[name=products]').val(),
                special_instructions: $('[name=special_instructions]').val()
            };
            $.ajax({
                url: '{{ __('routes.customer-order-form-mail') }}',
                type: 'get',
                data: order_form_mail_data,
                success: () => {
                    console.log('Success');
                },
                error: () => {
                    console.error('error');
                }
            })
        });
    })
</script>
