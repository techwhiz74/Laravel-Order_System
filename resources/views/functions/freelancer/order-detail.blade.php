<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var free_detail_table;
    var folderType = 'Originaldatei';

    function freeOpenOrderDetailModal(id, type) {
        folderType = type;
        $('#freelancer_job_update_div').show();
        $('#freelacner_job_upload_div').hide();
        $('#green_job').hide();
        $('#yellow_job').hide();

        $('#embroidery_parameter_div').hide();
        $('#vector_parameter_div').hide();
        $('#order_form_upload_list tr').remove();

        $('[name=free_detail_id]').val(id);
        $('#free_subfolder_structure1').hide();
        $('#free_subfolder_structure2').hide();
        $('#free_subfolder_structure3').hide();

        $('#yarn_information').text("");
        $('#need_embroidery_files').text("");
        $('#cutting_options').text("");
        $('#special_cutting_options').text("");
        $('#needle_instructions').text("");
        $('#standard_instructions').text("");
        $('#special_standard_instructions').text("");
        $('#required_vector_file').text("");
        $('#required_image_file').text("");

        $.ajax({
            url: '{{ __('routes.freelancer-get-order-detail') }}',
            type: 'GET',
            data: {
                id
            },
            success: (data) => {
                var folderArray = [];
                data.detail.map((item, index) => {
                    item = item.split('/')[3];
                    if (folderArray.filter((el) => el == item).length == 0) {
                        folderArray.push(item);
                    }
                });
                console.log(data.en_order);
                var en_order = JSON.parse(data.en_order);
                if (data.order.status == 'Offen') {
                    $('#green_job').show();
                } else if (data.order.status == 'In Bearbeitung') {
                    $('#yellow_job').show();
                }
                if (data.order.width_height == "Höhe") {
                    $('#free_order_detail_popup').find('#detail_width_height').text("High");
                } else if (data.order.width_height == "Breite") {
                    $('#free_order_detail_popup').find('#detail_width_height').text("Width");
                }

                console.log(folderArray);
                $('#free_order_detail_popup').find('#detail_customer_number').text(data.order
                    .customer_number);
                $('[name=free_detail_id]').val(data.order.id);
                $('#free_order_detail_popup').find('#detail_order_number').text(data.order.order_number);
                $('#free_order_detail_popup').find('#detail_project_name').text(data.order.project_name);
                $('#free_order_detail_popup').find('#detail_size').text(data.order.size);
                $('#free_order_detail_popup').find('#detail_final_product').text(en_order.products);
                $('#free_order_detail_popup').find('#detail_special_instructions').text(en_order
                    .special_instructions);
                $data_type = data.order.type;
                if ($data_type == "Vector") {
                    $('.order_size').hide();
                    $('.order_final_product').hide();
                    $('#vector_parameter_div').show();
                } else {
                    $('.order_size').show();
                    $('.order_final_product').show();
                    $('#embroidery_parameter_div').show();
                }
                folderArray.forEach((item) => {
                    if (item == "Originaldatei") {
                        $('#free_subfolder_structure1').show();

                    } else if (item == "Stickprogramm") {
                        $('#free_subfolder_structure2').show();
                    } else if (item == "Vektordatei") {
                        $('#free_subfolder_structure3').show();
                    }
                })
            },
            error: () => {
                console.error('err');
            }
        })

        free_detail_table = $('#free_order_detail').DataTable({
            responsive: true,
            language: {

            },
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ __('routes.freelancer-order-detail') }}',
                data: function(d) {
                    d.id = id;
                    d.type = type;
                },
            },
            columns: [{
                    data: 'customer_number',
                    name: 'customer_number'
                },

                {
                    data: 'order_number',
                    name: 'order_number'
                },

                {
                    data: 'index',
                    name: 'index'
                },

                {
                    data: 'extension',
                    name: 'extension'
                },

                {
                    data: 'download',
                    name: 'download',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'delete',
                    name: 'delete',
                    orderable: false,
                    searchable: false
                },

            ]
        });

        $('#free_order_detail_popup').modal("show");
        free_detail_table.destroy();

        //customer parameter information
        $.ajax({
            url: '{{ __('routes.freelnacer-parameter') }}',
            type: 'GET',
            data: {
                id: $('[name=free_detail_id]').val()
            },
            success: (data) => {
                if (data[0] != null) {
                    data_em = JSON.parse(data[0]);
                    $('#yarn_information').text(data_em.parameter1);
                    $('#need_embroidery_files').text(data_em.parameter2);
                    $('#cutting_options').text(data_em.parameter3);
                    $('#special_cutting_options').text(data_em.parameter4);
                    $('#needle_instructions').text(data_em.parameter5);
                    $('#standard_instructions').text(data_em.parameter6);
                    $('#special_standard_instructions').text(data_em.parameter7);
                }
                if (data[1] != null) {
                    data_ve = JSON.parse(data[1]);
                    $('#required_vector_file').text(data_ve.parameter8);
                    $('#required_image_file').text(data_ve.parameter9);
                }
            },
            error: () => {
                console.error('error');
            }
        })
    }

    function freeMultipleDownload() {
        window.location.href = '{{ url('multi-download') }}/' + $('[name=free_detail_id]').val() + '?type=' +
            folderType;
    }
    $('#free_subfolder_structure1').click(function() {
        freeOpenOrderDetailModal($('[name=free_detail_id]').val(), 'Originaldatei');
    });
    $('#free_subfolder_structure2').click(function() {
        freeOpenOrderDetailModal($('[name=free_detail_id]').val(), 'Stickprogramm');
    });
    $('#free_subfolder_structure3').click(function() {
        freeOpenOrderDetailModal($('[name=free_detail_id]').val(), 'Vektordatei');
    });



    function StartJob() {
        StartJobConfirmAlert();
        $('#start_job_confirm').click(function() {
            $.ajax({
                url: '{{ __('routes.embroidery-freelancer-startjob') }}',
                type: 'GET',
                data: {
                    start_job_id: $('[name=free_detail_id]').val()
                },
                success: () => {
                    $('#em_freelancer_table_reload_btn').trigger('click');
                    $('#em_freelancer_all_table_reload_button').trigger('click');
                    $('#em_freelancer_green_table_reload_button').trigger('click');
                    $('#em_freelancer_yellow_table_reload_button').trigger('click');
                    $('#em_freelancer_red_table_reload_button').trigger('click');
                    $('#ve_freelancer_table_reload_btn').trigger('click');
                    $('#ve_freelancer_all_table_reload_button').trigger('click');
                    $('#ve_freelancer_green_table_reload_button').trigger('click');
                    $('#ve_freelancer_yellow_table_reload_button').trigger('click');
                    $('#ve_freelancer_red_table_reload_button').trigger('click');
                    $('#green_job').hide();
                    $('#start_job_confirm_popup').modal('hide');
                    $('#start_job_success_popup').modal('show');
                },
                error: () => {
                    console.error("error");
                }
            })
        })

    }

    function UpdateJob() {
        $('#freelacner_job_upload_div').show();
        // $('#freelancer_job_end_div').show();
        $('#freelancer_job_update_div').hide();
    }

    $('#freelancer_job_start_form').submit(function(e) {
        e.preventDefault();
    })
    $('.freelancer_job_start_submit').click(function(e) {
        e.preventDefault();
        $('[name=embroidery_request_id]').val("");
        $('[name=vector_request_id]').val("");
        var freelancer_job_data = new FormData();
        freelancer_job_data.append('free_detail_id', $('[name=free_detail_id]').val());
        $('#freelancer_job_upload').find('.fileupload-buttonbar .start').trigger('click');
    })

    function EndJob() {
        $('#free_order_count').modal('show');
        $('#free_order_count_confirm').click(function() {
            var data = new FormData();
            data.append('count_number', $('[name=free_order_count_select]').val());
            data.append('order_id', $('[name=free_detail_id]').val())
            $.ajax({
                url: '{{ __('routes.freelancer-order-count') }}',
                type: 'post',
                data: data,
                contentType: false,
                processData: false,
                success: () => {
                    $.ajax({
                        url: '{{ __('routes.embroidery-freelancer-endjob') }}',
                        type: 'GET',
                        data: {
                            end_job_id: $('[name=free_detail_id]').val()
                        },
                        success: () => {
                            $('#em_freelancer_table_reload_btn').trigger('click');
                            $('#em_freelancer_all_table_reload_button').trigger(
                                'click');
                            $('#em_freelancer_green_table_reload_button').trigger(
                                'click');
                            $('#em_freelancer_yellow_table_reload_button').trigger(
                                'click');
                            $('#em_freelancer_red_table_reload_button').trigger(
                                'click');
                            $('#ve_freelancer_table_reload_btn').trigger('click');
                            $('#ve_freelancer_all_table_reload_button').trigger(
                                'click');
                            $('#ve_freelancer_green_table_reload_button').trigger(
                                'click');
                            $('#ve_freelancer_yellow_table_reload_button').trigger(
                                'click');
                            $('#ve_freelancer_red_table_reload_button').trigger(
                                'click');
                            $('#em_freelancer_payment_table_reload_button').trigger(
                                'click');
                            $('#ve_freelancer_payment_table_reload_button').trigger(
                                'click');
                            $('#yellow_job').hide();
                            $('#free_upload_success_popup').modal('hide');
                            $('#free_order_count').modal('hide');
                            setTimeout(() => {
                                $('#end_job_success_popup').modal('show');
                            }, 1000);
                        },
                        error: () => {
                            $('#end_job_success_popup').modal('hide');
                            EndJobError();
                        }
                    })
                },
                error: () => {
                    console.error('error');
                }
            })
        })


    }

    function DeleteFile(id) {
        DeleteConfirmAlert();
        console.log(id);
        $('#delete_confirm').click(function() {
            $.ajax({
                url: '{{ __('routes.freelancer-delete-files') }}' + id,
                type: 'GET',
                success: () => {
                    $('#free_subfolder_structure1').trigger('click');
                    $('#delete_confirm_popup').modal('hide');
                },
                error: () => {
                    console.log("error");
                }
            })
        })
    }

    function StartJobConfirmAlert() {
        console.log("sadf");
        $('#start_job_confirm_popup').modal('show');
    }

    function DeleteConfirmAlert() {
        $('#delete_confirm_popup').modal('show');
    }


    function EndJobError() {
        $('#end_job_error_popup').modal('show');
    }
    $(function() {
        $('#freelancer_detail_file_input').on('change', function() {
            var files = $(this)[0].files;
            for (var i = 0; i < files.length; i++) {
                var fileName = files[i].name;
                var fileExtension = fileName.split('.').pop().toLowerCase();
                var fileSize = files[i].size;
                if ($.inArray(fileExtension, ['exe', 'bat']) !== -1) {
                    alert('You cannot upload .exe or .bat files');
                    $('#order_form_upload_list tr').remove();
                    return;
                }
                if (fileSize > 25 * 1024 * 1024) {
                    alert('File size should not exceed 25 MB');
                    $('#order_form_upload_list tr').remove();
                    return;
                }
            }
        });

    })
</script>
