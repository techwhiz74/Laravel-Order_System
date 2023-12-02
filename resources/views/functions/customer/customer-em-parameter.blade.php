<script>
    $(function() {
        window.prettyPrint() && prettyPrint();
        $('[name=parameter_need_embroidery_files]').multiselect({
            // buttonWidth: '300px'
        });
    });
    $(function() {
        $('#customer_parameters_em1').click(function() {
            $.ajax({
                url: '{{ __('routes.customer-get-em-parameter') }}',
                type: 'get',
                success: (parameter) => {
                    $('[name=parameter_yarn_information]').val(parameter.parameter1);
                    $('[name=parameter_need_embroidery_files]').val(parameter.parameter2);
                    $('[name=parameter_cutting_options]').val(parameter.parameter3);
                    $('[name=parameter_special_cutting_options]').val(parameter.parameter4);
                    $('[name=parameter_needle_instructions]').val(parameter.parameter5);
                    $('[name=parameter_standard_instructions]').val(parameter.parameter6);
                    $('[name=parameter_special_standard_instructions]').val(parameter
                        .parameter7);
                },
                error: () => {
                    console.error("error");
                }
            })
        })
        $('#customer_em_parameter_submit').click(function() {
            var em_parameter_data = new FormData();
            em_parameter_data.append('parameter1', $('[name=parameter_yarn_information]').val());
            em_parameter_data.append('parameter2', $('[name=parameter_need_embroidery_files]').val()
                .join(', '));
            em_parameter_data.append('parameter3', $('[name=parameter_cutting_options]').val());
            em_parameter_data.append('parameter4', $('[name=parameter_special_cutting_options]').val());
            em_parameter_data.append('parameter5', $('[name=parameter_needle_instructions]').val());
            em_parameter_data.append('parameter6', $('[name=parameter_standard_instructions]').val());
            em_parameter_data.append('parameter7', $('[name=parameter_special_standard_instructions]')
                .val());
            var confirm = window.confirm('{{ __('home.click_customer_parameter_change') }}');
            if (confirm == true) {
                $.ajax({
                    url: '{{ __('routes.customer - e m - p a rameter - c h ange') }}',
                    type: 'post',
                    data: em_parameter_data,
                    contentType: false,
                    processData: false,
                    success: () => {
                        $('#customer_em_parameter_submit').hide();
                        $.ajax({
                            url: '{{ __('routes.customer - e m - p a rameter - c h ange - m a il') }}',
                            type: 'get',
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
            }

        })
    })
</script>
