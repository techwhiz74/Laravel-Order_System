<script>
    $(function() {
        window.prettyPrint() && prettyPrint();
        $('[name=admin_parameter_require_image_file]').multiselect({
            // buttonWidth: '300px'
        });
    });
    $(function() {
        window.prettyPrint() && prettyPrint();
        $('[name=admin_parameter_require_vector_file]').multiselect({
            // buttonWidth: '300px'
        });
    });
    $(function() {
        $('#admin_ve_parameter_change').click(function() {
            var ve_parameter_change_data = new FormData();
            ve_parameter_change_data.append('parameter8', $('#selected_ve_parameter8').text());
            ve_parameter_change_data.append('parameter9', $('#selected_ve_parameter9').text());
            ve_parameter_change_data.append('customer_id', $('[name=admin_ve_parameter_customer_id]')
                .val());
            var confirm = window.confirm('Möchten Sie diesen Kundenvektorparameter ändern?');
            if (confirm == true) {
                $.ajax({
                    url: '{{ __('routes.admin-change-ve-parameter-change') }}',
                    type: 'post',
                    data: ve_parameter_change_data,
                    contentType: false,
                    processData: false,
                    success: () => {
                        $('#admin_ve_parameter_buttons').hide();
                        console.log("success");
                    },
                    error: () => {
                        console.error("error");
                    }
                })
            }
        })
        $('#admin_ve_parameter_confirm').click(function() {
            var ve_parameter_conform_data = new FormData();
            ve_parameter_conform_data.append('parameter8', $('#selected_ve_parameter8').text());
            ve_parameter_conform_data.append('parameter9', $('#selected_ve_parameter9').text());
            ve_parameter_conform_data.append('customer_id', $('[name=admin_ve_parameter_customer_id]')
                .val());
            $.ajax({
                url: '{{ __('routes.admin-change-ve-parameter-confirm') }}',
                type: 'post',
                data: ve_parameter_conform_data,
                contentType: false,
                processData: false,
                success: () => {
                    $('#admin_ve_parameter_buttons').hide();
                    $.ajax({
                        url: '{{ __('routes.admin-change-ve-parameter-confirm-mail') }}',
                        type: 'get',
                        data: {
                            customer_id: $('[name=admin_ve_parameter_customer_id]')
                                .val()
                        },
                        success: () => {
                            console.log("success");
                        },
                        error: () => {
                            console.error("error");
                        }
                    })
                },
                error: () => {
                    console.error("error");
                }
            })
        })
        $('#admin_ve_parameter_decline').click(function() {
            $.ajax({
                url: '{{ __('routes.admin-change-ve-parameter-decline') }}',
                type: 'post',
                data: {
                    customer_id: $('[name=admin_ve_parameter_customer_id]').val()
                },
                success: () => {
                    $('#admin_ve_parameter_buttons').hide();
                    $.ajax({
                        url: '{{ __('routes.admin-change-ve-parameter-decline-mail') }}',
                        type: 'get',
                        data: {
                            customer_id: $('[name=admin_ve_parameter_customer_id]')
                                .val()
                        },
                        success: () => {
                            console.log("success");
                        },
                        error: () => {
                            console.error("error");
                        }
                    })
                },
                error: () => {
                    console.error("error");
                }
            })
        })
    })
</script>
