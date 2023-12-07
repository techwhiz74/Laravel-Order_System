<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var adminParameterEmTable;
    $(function() {
        adminParameterEmTable = $('#admin_parameter_em_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: true,
            language: {
                paginate: {
                    next: '<i class="fa-solid fa-chevron-right"></i>', // or '→'
                    previous: '<i class="fa-solid fa-chevron-left"></i>' // or '←'
                }
            },
            ajax: {
                url: "{{ __('routes.admin-parameter-em-table') }}",
                type: "get",
            },
            order: [
                [0, 'desc']
            ],

            columns: [{
                    data: 'customer_number',
                    name: 'customer_number',
                },
                {

                    data: 'company',
                    name: 'company'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'first_name',
                    name: 'first_name'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'street_number',
                    name: 'street_number'
                },

                {
                    data: 'postal_code',
                    name: 'postal_code',
                },
                {
                    data: 'location',
                    name: 'location',
                },
                {
                    data: 'country',
                    name: 'country',
                },
                {
                    data: 'parameter',
                    name: 'parameter',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        $('#admin_parameter_em_table_reload_button').click(function() {
            adminParameterEmTable.ajax.reload();
        })
    });

    function openEmParameter(id) {
        $('#admin_em_parameter_change_buttons').show();
        $('#admin_em_parameter_buttons').hide();
        $('.parameter-select-items-file').find(
            'input').prop("checked", false);
        $('[name=admin_parameter_yarn_information]').val("");
        $('#selected_em_parameter3').text("");
        $('[name=admin_parameter_cutting_options]').val("");
        $('[name=admin_parameter_special_cutting_options]').val("");
        $('[name=admin_parameter_needle_instructions]').val("");
        $('[name=admin_parameter_standard_instructions]').val("");
        $('[name=admin_parameter_special_standard_instructions]').val("");
        $('[name=admin_em_parameter_customer_id]').val(id);
        $.ajax({
            url: '{{ __('routes.admin-parameter-em') }}',
            type: 'GET',
            data: {
                id
            },
            success: (result) => {
                if (result[0] != null) {
                    $('[name=admin_parameter_yarn_information]').val(result[0].parameter1);
                    $('#selected_em_parameter3').text(result[0].parameter2);
                    $('[name=admin_parameter_cutting_options]').val(result[0].parameter3);
                    $('[name=admin_parameter_special_cutting_options]').val(result[0].parameter4);
                    $('[name=admin_parameter_needle_instructions]').val(result[0].parameter5);
                    $('[name=admin_parameter_standard_instructions]').val(result[0].parameter6);
                    $('[name=admin_parameter_special_standard_instructions]').val(result[0].parameter7);
                    var fileFiles0 = result[0].parameter2.split(', ');
                    fileFiles0.forEach(item => {
                        $('.parameter-select-items-file').find(
                            'input[value="' + item + '"]').prop("checked", true);
                    });
                    if (result[1] != null) {
                        $('#admin_em_parameter_change_buttons').hide();
                        $('#admin_em_parameter_buttons').show();
                        $('[name=admin_parameter_yarn_information]').val(result[1].parameter1);
                        $('#selected_em_parameter3').text(result[1].parameter2);
                        $('[name=admin_parameter_cutting_options]').val(result[1].parameter3);
                        $('[name=admin_parameter_special_cutting_options]').val(result[1].parameter4);
                        $('[name=admin_parameter_needle_instructions]').val(result[1].parameter5);
                        $('[name=admin_parameter_standard_instructions]').val(result[1].parameter6);
                        $('[name=admin_parameter_special_standard_instructions]').val(result[1].parameter7);
                        var fileFiles1 = result[1].parameter2.split(', ');
                        fileFiles1.forEach(item => {
                            $('.parameter-select-items-file').find(
                                'input[value="' + item + '"]').prop("checked", true);
                        });
                    }
                }
                $('#admin_customer_parameters_em_popup').modal('show');
            },
            error: () => {
                console.error("error");
            }
        })
    }
</script>
<script>
    $(function() {
        window.prettyPrint() && prettyPrint();
        $('[name=admin_parameter_need_embroidery_files]').multiselect({
            // buttonWidth: '300px'
        });
    });
    $(function() {
        $('#admin_em_parameter_change').click(function() {
            var em_parameter_change_data = new FormData();
            em_parameter_change_data.append('parameter1', $('[name=admin_parameter_yarn_information]')
                .val());
            em_parameter_change_data.append('parameter2', $('#selected_em_parameter3').text());
            em_parameter_change_data.append('parameter3', $('[name=admin_parameter_cutting_options]')
                .val());
            em_parameter_change_data.append('parameter4', $(
                '[name=admin_parameter_special_cutting_options]').val());
            em_parameter_change_data.append('parameter5', $(
                '[name=admin_parameter_needle_instructions]').val());
            em_parameter_change_data.append('parameter6', $(
                '[name=admin_parameter_standard_instructions]').val());
            em_parameter_change_data.append('parameter7', $(
                '[name=admin_parameter_special_standard_instructions]').val());
            em_parameter_change_data.append('customer_id', $('[name=admin_em_parameter_customer_id]')
                .val());
            var confirm = window.confirm('Möchten Sie diesen Kundenstickparameter ändern?');
            if (confirm == true) {
                $.ajax({
                    url: '{{ __('routes.admin-change-em-parameter-change') }}',
                    type: 'post',
                    data: em_parameter_change_data,
                    contentType: false,
                    processData: false,
                    success: () => {
                        $('#admin_em_parameter_buttons').hide();
                        console.log("success");
                    },
                    error: () => {
                        console.error("error");
                    }
                })
            }
        })
        $('#admin_em_parameter_confirm').click(function() {
            var em_parameter_conform_data = new FormData();
            em_parameter_conform_data.append('parameter1', $('[name=admin_parameter_yarn_information]')
                .val());
            em_parameter_conform_data.append('parameter2', $('#selected_em_parameter3').text());
            em_parameter_conform_data.append('parameter3', $('[name=admin_parameter_cutting_options]')
                .val());
            em_parameter_conform_data.append('parameter4', $(
                '[name=admin_parameter_special_cutting_options]').val());
            em_parameter_conform_data.append('parameter5', $(
                '[name=admin_parameter_needle_instructions]').val());
            em_parameter_conform_data.append('parameter6', $(
                '[name=admin_parameter_standard_instructions]').val());
            em_parameter_conform_data.append('parameter7', $(
                '[name=admin_parameter_special_standard_instructions]').val());
            em_parameter_conform_data.append('customer_id', $('[name=admin_em_parameter_customer_id]')
                .val());
            $.ajax({
                url: '{{ __('routes.admin-change-em-parameter-confirm') }}',
                type: 'post',
                data: em_parameter_conform_data,
                contentType: false,
                processData: false,
                success: () => {
                    $('#admin_em_parameter_buttons').hide();
                    $.ajax({
                        url: '{{ __('routes.admin-change-em-parameter-confirm-mail') }}',
                        type: 'get',
                        data: {
                            customer_id: $('[name=admin_em_parameter_customer_id]')
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
        $('#admin_em_parameter_decline').click(function() {
            $.ajax({
                url: '{{ __('routes.admin-change-em-parameter-decline') }}',
                type: 'post',
                data: {
                    customer_id: $('[name=admin_em_parameter_customer_id]').val()
                },
                success: () => {
                    $('#admin_em_parameter_buttons').hide();
                    $.ajax({
                        url: '{{ __('routes.admin-change-em-parameter-decline-mail') }}',
                        type: 'get',
                        data: {
                            customer_id: $('[name=admin_em_parameter_customer_id]')
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
