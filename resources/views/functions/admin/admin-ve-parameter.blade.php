<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var adminParameterVeTable;
    $(function() {
        adminParameterVeTable = $('#admin_parameter_ve_table').DataTable({
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
                url: "{{ __('routes.admin-parameter-ve-table') }}",
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
        $('#admin_parameter_ve_table_reload_button').click(function() {
            adminParameterVeTable.ajax.reload();
        })
    });

    function openVeParameter(id) {
        $('#admin_ve_parameter_change_buttons').show();
        $('#admin_ve_parameter_buttons').hide();
        $('.parameter-select-items-vector').find(
            'input').prop("checked", false);
        $('.parameter-select-items-image').find(
            'input').prop("checked", false);
        $('#selected_ve_parameter8').text("");
        $('#selected_ve_parameter9').text("");
        $('[name=admin_ve_parameter_customer_id]').val(id);
        $.ajax({
            url: '{{ __('routes.admin-parameter-ve') }}',
            type: 'GET',
            data: {
                id
            },
            success: (result) => {
                if (result[0] != null) {
                    var vectorFiles0 = result[0].parameter8.split(', ');
                    var imageFiles0 = result[0].parameter9.split(', ');
                    vectorFiles0.forEach(item => {
                        $('.parameter-select-items-vector').find(
                            'input[value="' + item + '"]').prop("checked", true);
                    });
                    imageFiles0.forEach(item => {
                        $('.parameter-select-items-image').find(
                            'input[value="' + item + '"]').prop("checked", true);
                    });
                    $('#selected_ve_parameter8').text(result[0].parameter8);
                    $('#selected_ve_parameter9').text(result[0].parameter9);

                    if (result[1] != null) {
                        $('#admin_ve_parameter_change_buttons').hide();
                        $('#admin_ve_parameter_buttons').show();
                        var vectorFiles1 = result[1].parameter8.split(', ');
                        var imageFiles1 = result[1].parameter9.split(', ');
                        vectorFiles1.forEach(item => {
                            $('.parameter-select-items-vector').find(
                                'input[value="' + item + '"]').prop("checked", true);
                        });
                        imageFiles1.forEach(item => {
                            $('.parameter-select-items-image').find(
                                'input[value="' + item + '"]').prop("checked", true);
                        });
                        $('#selected_ve_parameter8').text(result[1].parameter8);
                        $('#selected_ve_parameter9').text(result[1].parameter9);
                    }
                }
                $('#admin_customer_parameters_ve_popup').modal('show');
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
